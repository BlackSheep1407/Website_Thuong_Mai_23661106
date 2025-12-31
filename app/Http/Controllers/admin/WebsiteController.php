<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    // Website Management Index
    public function index()
    {
        // Get current logo
        $logo = WebsiteSetting::where('setting_key', 'logo')->first();

        // Get all sliders
        $sliders = Slider::orderBy('sort_order')->get();

        return view('admin.website.index', compact('logo', 'sliders'));
    }

    // Update Logo
    public function updateLogo(Request $request)
    {
        try {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');

                // Ensure directory exists
                $logosPath = storage_path('app/public/logos');
                if (!file_exists($logosPath)) {
                    mkdir($logosPath, 0755, true);
                }

                $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('logos', $filename, 'public');

                if (!$path) {
                    return redirect()->back()->with('error', 'Không thể lưu file logo!');
                }

                // Delete old logo if exists
                $oldLogo = WebsiteSetting::where('setting_key', 'logo')->first();
                if ($oldLogo && $oldLogo->setting_value && Storage::disk('public')->exists($oldLogo->setting_value)) {
                    Storage::disk('public')->delete($oldLogo->setting_value);
                }

                // Save new logo
                WebsiteSetting::updateOrCreate(
                    ['setting_key' => 'logo'],
                    [
                        'setting_value' => $path,
                        'setting_type' => 'image',
                    ]
                );

                return redirect()->back()->with('success', 'Logo đã được cập nhật thành công!')->with('active_tab', 'logo');
            }

            return redirect()->back()->with('error', 'Vui lòng chọn file logo!');
        } catch (\Exception $e) {
            \Log::error('Logo upload error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tải logo lên: ' . $e->getMessage());
        }
    }

    // Update Favicon
    public function updateFavicon(Request $request)
    {
        \Log::info('Favicon update method called', [
            'has_file' => $request->hasFile('favicon'),
            'all_files' => $request->allFiles(),
            'all_data' => $request->all()
        ]);

        try {
            // Very basic validation first
            if (!$request->hasFile('favicon')) {
                \Log::warning('No favicon file in request');
                return redirect()->back()->with('error', 'Vui lòng chọn file favicon!');
            }

            $file = $request->file('favicon');
            \Log::info('Favicon file details', [
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'extension' => $file->getClientOriginalExtension(),
                'is_valid' => $file->isValid()
            ]);

            // Check if file is valid
            if (!$file->isValid()) {
                \Log::error('Invalid favicon file');
                return redirect()->back()->with('error', 'File favicon không hợp lệ!');
            }

            // Ensure directory exists
            $faviconsPath = storage_path('app/public/favicons');
            if (!file_exists($faviconsPath)) {
                mkdir($faviconsPath, 0755, true);
                \Log::info('Created favicons directory', ['path' => $faviconsPath]);
            }

            // Generate filename
            $extension = $file->getClientOriginalExtension();
            if (empty($extension)) {
                $extension = 'ico';
            }
            $filename = 'favicon_' . time() . '.' . $extension;

            // Store file
            $path = $file->storeAs('favicons', $filename, 'public');
            \Log::info('File stored result', ['path' => $path, 'storage_path' => storage_path('app/public/' . $path)]);

            if (!$path) {
                \Log::error('File storage returned false');
                return redirect()->back()->with('error', 'Không thể lưu file favicon!');
            }

            // Check if file actually exists
            if (!Storage::disk('public')->exists($path)) {
                \Log::error('File does not exist after storage', ['path' => $path]);
                return redirect()->back()->with('error', 'File không được lưu thành công!');
            }

            // Delete old favicon if exists
            $oldFavicon = WebsiteSetting::where('setting_key', 'favicon')->first();
            if ($oldFavicon && $oldFavicon->setting_value && Storage::disk('public')->exists($oldFavicon->setting_value)) {
                Storage::disk('public')->delete($oldFavicon->setting_value);
                \Log::info('Deleted old favicon', ['old_path' => $oldFavicon->setting_value]);
            }

            // Save new favicon
            $saved = WebsiteSetting::updateOrCreate(
                ['setting_key' => 'favicon'],
                [
                    'setting_value' => $path,
                    'setting_type' => 'image',
                ]
            );

            \Log::info('Favicon saved to database', ['saved' => $saved, 'path' => $path]);

            return redirect()->back()->with('success', 'Favicon đã được cập nhật thành công!')->with('active_tab', 'favicon');

        } catch (\Exception $e) {
            \Log::error('Favicon upload error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tải favicon lên: ' . $e->getMessage());
        }
    }



    // Create Slider
    public function createSlider(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:500',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'link' => 'nullable|url',
                'sort_order' => 'nullable|integer|min:0',
                'is_active' => 'nullable|boolean',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // Ensure directory exists
                $slidersPath = storage_path('app/public/sliders');
                if (!file_exists($slidersPath)) {
                    mkdir($slidersPath, 0755, true);
                }

                $filename = 'slider_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('sliders', $filename, 'public');

                if (!$path) {
                    return redirect()->back()->with('error', 'Không thể lưu file slider!');
                }

                Slider::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image_path' => $path,
                    'link' => $request->link,
                    'sort_order' => $request->sort_order ?? 0,
                    'is_active' => $request->is_active ?? true,
                ]);

                return redirect()->back()->with('success', 'Slider đã được tạo thành công!')->with('active_tab', 'slider');
            }

            return redirect()->back()->with('error', 'Vui lòng chọn file ảnh slider!');
        } catch (\Exception $e) {
            \Log::error('Slider create error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo slider: ' . $e->getMessage());
        }
    }

    // Update Slider
    public function updateSlider(Request $request, $id)
    {
        try {
            $slider = Slider::findOrFail($id);

            $request->validate([
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'link' => 'nullable|url',
                'sort_order' => 'nullable|integer|min:0',
                'is_active' => 'nullable|boolean',
            ]);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->is_active ?? true,
            ];

            if ($request->hasFile('image')) {
                // Ensure directory exists
                $slidersPath = storage_path('app/public/sliders');
                if (!file_exists($slidersPath)) {
                    mkdir($slidersPath, 0755, true);
                }

                // Delete old image
                if ($slider->image_path && Storage::disk('public')->exists($slider->image_path)) {
                    Storage::disk('public')->delete($slider->image_path);
                }

                // Upload new image
                $file = $request->file('image');
                $filename = 'slider_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('sliders', $filename, 'public');

                if (!$path) {
                    return redirect()->back()->with('error', 'Không thể lưu file slider!');
                }

                $data['image_path'] = $path;
            }

            $slider->update($data);

            return redirect()->back()->with('success', 'Slider đã được cập nhật thành công!')->with('active_tab', 'slider');
        } catch (\Exception $e) {
            \Log::error('Slider update error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật slider: ' . $e->getMessage());
        }
    }

    // Delete Slider
    public function deleteSlider($id)
    {
        $slider = Slider::findOrFail($id);

        // Delete image file
        if ($slider->image_path && Storage::disk('public')->exists($slider->image_path)) {
            Storage::disk('public')->delete($slider->image_path);
        }

        $slider->delete();

        return redirect()->back()->with('success', 'Slider đã được xóa thành công!')->with('active_tab', 'slider');
    }

    // Get Slider Info (for AJAX)
    public function getSliderInfo($id)
    {
        $slider = Slider::findOrFail($id);

        return response()->json([
            'success' => true,
            'slider' => $slider
        ]);
    }
}
