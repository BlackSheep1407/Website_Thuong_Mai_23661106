<?php
use Illuminate\Support\Facades\Route; //khai báo trước route
use App\Models\CategoryModel; // ⬅️ DÒNG CẦN THIẾT
use App\Models\ProductModel;   // ⬅️ DÒNG CẦN THIẾT


// use Illuminate\Http\Request; //Import Request để xử lý dữ liệu POST
// use Iluminate\Support\Facades\Session; //Đảm bảo đã import Session (sử dụng help function nên ko cần)

/*
|--------------------------------------------------------------------------
| HELPER FUNCTION (Lấy ID Session)
|--------------------------------------------------------------------------
*/
function getSessionId() {
    return session()->getId();
}
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;


// routes/web.php

// ...
// ROUTE XEM CHI TIẾT SẢN PHẨM
// Route::get('product/{id}', function ($id) {
    
//     // Tìm sản phẩm theo ID và tải cả Category của nó
//     $product = ProductModel::with('category')->find($id); 

//     if ($product) {
//         // Truyền biến $product sang view 'product_detail'
//         return view('product_detail', compact('product')); 
//     }
    
//     abort(404);
    
// })->name('product.show');



//Chi tiết sản phẩm
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');




//admin
Route::middleware('admin')->group(function () {
    Route::get('admin/them-nguoi-dung',[\App\Http\Controllers\admin\UserController::class, 'insert_form']);
    Route::post('admin/xu-ly-them-nguoi-dung',[\App\Http\Controllers\admin\UserController::class, 'action_insert']);
    Route::get('admin/danh-sach-nguoi-dung',[\App\Http\Controllers\admin\UserController::class, 'get_all']);
Route::get('admin/xoa-nguoi-dung/{id}',[\App\Http\Controllers\admin\UserController::class, 'del']);
Route::get('admin/thong-tin-nguoi-dung/{id}',[\App\Http\Controllers\admin\UserController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-nguoi-dung',[\App\Http\Controllers\admin\UserController::class, 'action_update']);
Route::get('admin/set-role/{id}/{role}',[\App\Http\Controllers\admin\UserController::class, 'set_role']);
    // Quản lý đơn hàng (admin)
    Route::get('admin/don-hang', [\App\Http\Controllers\admin\OrderController::class, 'index']);
    Route::get('admin/don-hang/{id}', [\App\Http\Controllers\admin\OrderController::class, 'show']);

    //Sản phẩm
    Route::get('admin/them-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'insert_form']);
    Route::post('admin/xu-ly-them-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'action_insert']);
    Route::get('admin/danh-sach-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'get_all']);
    Route::get('admin/xoa-san-pham/{id}',[\App\Http\Controllers\admin\ProductController::class, 'del']);
    Route::get('admin/thong-tin-san-pham/{id}',[\App\Http\Controllers\admin\ProductController::class, 'show']);
Route::get('admin/sua-san-pham/{id}',[\App\Http\Controllers\ProductController::class, 'admin_show']);
    Route::post('admin/xu-ly-cap-nhat-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'action_update']);

    //Danh Mục
    Route::get('admin/them-danh-muc',[\App\Http\Controllers\admin\CategoryController::class, 'insert_form']);
    Route::post('admin/xu-ly-them-danh-muc',[\App\Http\Controllers\admin\CategoryController::class, 'action_insert']);
    Route::get('admin/danh-sach-danh-muc',[\App\Http\Controllers\admin\CategoryController::class, 'get_all']);
    Route::get('admin/xoa-danh-muc/{id}',[\App\Http\Controllers\admin\CategoryController::class, 'del']);
    Route::get('admin/thong-tin-danh-muc/{id}',[\App\Http\Controllers\admin\CategoryController::class, 'show']);
    Route::post('admin/xu-ly-cap-nhat-danh-muc',[\App\Http\Controllers\admin\CategoryController::class, 'action_update']);

    // Website Management
    Route::get('admin/quan-ly-website', [\App\Http\Controllers\admin\WebsiteController::class, 'index'])->name('admin.website.index');
    Route::post('admin/cap-nhat-logo', [\App\Http\Controllers\admin\WebsiteController::class, 'updateLogo'])->name('admin.website.updateLogo');
    Route::post('admin/cap-nhat-favicon', [\App\Http\Controllers\admin\WebsiteController::class, 'updateFavicon'])->name('admin.website.updateFavicon');
    Route::post('admin/tao-slider', [\App\Http\Controllers\admin\WebsiteController::class, 'createSlider'])->name('admin.website.createSlider');
    Route::post('admin/cap-nhat-slider/{id}', [\App\Http\Controllers\admin\WebsiteController::class, 'updateSlider'])->name('admin.website.updateSlider');
    Route::get('admin/xoa-slider/{id}', [\App\Http\Controllers\admin\WebsiteController::class, 'deleteSlider'])->name('admin.website.deleteSlider');
    Route::get('admin/thong-tin-slider/{id}', [\App\Http\Controllers\admin\WebsiteController::class, 'getSliderInfo'])->name('admin.website.getSliderInfo');

    // Debug route for favicon testing
    Route::get('admin/test-favicon', function() {
        $favicon = \App\Models\WebsiteSetting::where('setting_key', 'favicon')->first();
        $logo = \App\Models\WebsiteSetting::where('setting_key', 'logo')->first();

        $faviconExists = $favicon && $favicon->setting_value && \Storage::disk('public')->exists($favicon->setting_value);
        $logoExists = $logo && $logo->setting_value && \Storage::disk('public')->exists($logo->setting_value);

        return response()->json([
            'favicon' => [
                'exists_in_db' => $favicon ? true : false,
                'value' => $favicon ? $favicon->setting_value : null,
                'url' => $favicon ? asset($favicon->setting_value) : null,
                'file_exists' => $faviconExists,
                'full_path' => $favicon ? storage_path('app/public/' . $favicon->setting_value) : null,
            ],
            'logo' => [
                'exists_in_db' => $logo ? true : false,
                'value' => $logo ? $logo->setting_value : null,
                'url' => $logo ? asset($logo->setting_value) : null,
                'file_exists' => $logoExists,
                'full_path' => $logo ? storage_path('app/public/' . $logo->setting_value) : null,
            ],
            'storage_paths' => [
                'storage_app_public' => storage_path('app/public'),
                'public_storage_link' => public_path('storage'),
                'favicon_dir' => storage_path('app/public/favicons'),
                'logo_dir' => storage_path('app/public/logos'),
            ],
            'directories_exist' => [
                'favicons' => file_exists(storage_path('app/public/favicons')),
                'logos' => file_exists(storage_path('app/public/logos')),
            ],
        ]);
    });

    // Test upload route
    Route::post('admin/test-upload', function(\Illuminate\Http\Request $request) {
        try {
            if (!$request->hasFile('test_file')) {
                return response()->json(['error' => 'No file uploaded']);
            }

            $file = $request->file('test_file');
            $path = $file->store('test', 'public');

            return response()->json([
                'success' => true,
                'path' => $path,
                'url' => asset($path),
                'file_exists' => \Storage::disk('public')->exists($path),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    });

    // Fix duplicate sliders
    Route::get('admin/fix-duplicate-sliders', function() {
        $duplicates = \App\Models\Slider::selectRaw('title, image_path, COUNT(*) as count')
            ->groupBy('title', 'image_path')
            ->having('count', '>', 1)
            ->get();

        $fixed = 0;
        foreach ($duplicates as $duplicate) {
            $sliders = \App\Models\Slider::where('title', $duplicate->title)
                ->where('image_path', $duplicate->image_path)
                ->orderBy('id')
                ->get();

            // Keep the first one, delete the rest
            for ($i = 1; $i < $sliders->count(); $i++) {
                $sliders[$i]->delete();
                $fixed++;
            }
        }

        return response()->json([
            'message' => "Đã xóa $fixed slider trùng lặp",
            'duplicates_found' => $duplicates->count(),
        ]);
    });

    // Quick favicon debug (no middleware required for debugging)
    Route::get('admin/favicon-debug', function() {
        $favicon = \App\Models\WebsiteSetting::where('setting_key', 'favicon')->first();

        $debug = [
            'favicon_in_db' => $favicon ? true : false,
            'favicon_path' => $favicon ? $favicon->setting_value : null,
            'file_exists' => $favicon && $favicon->setting_value ? \Storage::disk('public')->exists($favicon->setting_value) : false,
            'full_path' => $favicon ? storage_path('app/public/' . $favicon->setting_value) : null,
            'public_path' => public_path('storage'),
            'favicon_dir_exists' => file_exists(storage_path('app/public/favicons')),
            'favicon_files' => file_exists(storage_path('app/public/favicons')) ? scandir(storage_path('app/public/favicons')) : [],
            'current_time' => now()->toDateTimeString(),
            'favicon_url' => $favicon ? asset('storage/' . $favicon->setting_value) : null,
            'storage_link_exists' => file_exists(public_path('storage')),
        ];

        return response()->json($debug, 200, [], JSON_PRETTY_PRINT);
    });

    // Test favicon display on homepage
    Route::get('test-favicon-display', function() {
        return view('home');
    });

    // Direct favicon test
    Route::get('direct-favicon-test', function() {
        $favicon = \App\Models\WebsiteSetting::where('setting_key', 'favicon')->first();

        $html = '
        <html>
        <head>
        <title>Favicon Test</title>
        ';

        if ($favicon) {
            $url = asset('storage/' . $favicon->setting_value);
            $html .= '<link rel="icon" type="image/x-icon" href="' . $url . '?v=' . time() . '">';
            $html .= '<link rel="shortcut icon" type="image/x-icon" href="' . $url . '?v=' . time() . '">';
            $html .= '<meta name="favicon-url" content="' . $url . '">';
        }

        $html .= '
        </head>
        <body>
        <h1>Favicon Direct Test</h1>
        <p>Check if favicon appears in browser tab</p>
        ';

        if ($favicon) {
            $html .= '<p><strong>Favicon URL:</strong> ' . asset('storage/' . $favicon->setting_value) . '?v=' . time() . '</p>';
            $html .= '<p><strong>Database value:</strong> ' . $favicon->setting_value . '</p>';
            $html .= '<p><strong>File exists:</strong> ' . (\Storage::disk('public')->exists($favicon->setting_value) ? 'YES' : 'NO') . '</p>';
            $html .= '<p><strong>Direct image:</strong> <img src="' . asset('storage/' . $favicon->setting_value) . '?v=' . time() . '" style="width:32px;height:32px;" alt="favicon"></p>';
        } else {
            $html .= '<p><strong>No favicon in database</strong></p>';
        }

        $html .= '
        <br><a href="' . url('/') . '">Back to Home</a>
        <br><a href="' . url('favicon-force-refresh') . '">Force Refresh Test</a>
        </body>
        </html>';

        return $html;
    });

    // Force favicon refresh test
    Route::get('favicon-force-refresh', function() {
        $favicon = \App\Models\WebsiteSetting::where('setting_key', 'favicon')->first();

        if ($favicon && \Storage::disk('public')->exists($favicon->setting_value)) {
            $path = storage_path('app/public/' . $favicon->setting_value);

            // Force browser to not cache
            return response()->file($path, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0',
                'Content-Type' => 'image/x-icon'
            ]);
        }

        return response('Favicon not found', 404);
    });

    // Test favicon upload directly
    Route::get('admin/test-favicon-upload', function() {
        return '
        <html>
        <head><title>Test Favicon Upload</title></head>
        <body>
        <h1>Test Favicon Upload</h1>
        <form action="' . url('admin/test-favicon-process') . '" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <input type="file" name="favicon" accept="image/*" required>
            <button type="submit">Upload Favicon</button>
        </form>
        <br>
        <a href="' . url('admin/favicon-debug') . '">Check Debug Info</a>
        <br>
        <a href="' . url('admin/test-favicon-process') . '">Test Process Route</a>
        </body>
        </html>';
    });

    Route::post('admin/test-favicon-process', function(\Illuminate\Http\Request $request) {
        try {
            \Log::info('Test favicon upload started', [
                'has_file' => $request->hasFile('favicon'),
                'all_files' => $request->allFiles(),
                'method' => $request->method(),
                'url' => $request->fullUrl(),
            ]);

            if (!$request->hasFile('favicon')) {
                return 'No favicon file uploaded';
            }

            $file = $request->file('favicon');

            \Log::info('File details', [
                'name' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
                'size' => $file->getSize(),
                'extension' => $file->getClientOriginalExtension(),
                'is_valid' => $file->isValid(),
            ]);

            // Ensure directory exists
            $faviconsPath = storage_path('app/public/favicons');
            if (!file_exists($faviconsPath)) {
                mkdir($faviconsPath, 0755, true);
                \Log::info('Created favicons directory', ['path' => $faviconsPath]);
            }

            // Store file
            $filename = 'test_favicon_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('favicons', $filename, 'public');

            \Log::info('File stored', ['path' => $path]);

            if (!$path) {
                return 'Failed to store file';
            }

            // Save to database
            $saved = \App\Models\WebsiteSetting::updateOrCreate(
                ['setting_key' => 'favicon'],
                ['setting_value' => $path, 'setting_type' => 'image']
            );

            \Log::info('Saved to database', ['saved' => $saved]);

            return 'SUCCESS: Favicon uploaded and saved!<br>
                   Path: ' . $path . '<br>
                   URL: ' . asset('storage/' . $path) . '<br>
                   <a href="' . url('admin/favicon-debug') . '">Check Debug</a>';

        } catch (\Exception $e) {
            \Log::error('Test favicon upload error: ' . $e->getMessage());
            return 'ERROR: ' . $e->getMessage() . '<br>
                   <a href="' . url('admin/test-favicon-upload') . '">Try Again</a>';
        }
    });
});

////login admin - không cần middleware vì đây là trang đăng nhập
Route::get('admin/dang-nhap',[\App\Http\Controllers\admin\UserController::class,'login']);
Route::post('admin/xu-ly-dang-nhap',[\App\Http\Controllers\admin\UserController::class,'action_login']);
Route::get('admin/thoat',[App\Http\Controllers\admin\UserController::class,'logout']);
Route::get('admin/profile', function () {
    // Check custom session auth
    $user = session('user');
    if (!$user || ($user['user_role'] ?? 0) != 1) {
        return redirect('/admin/dang-nhap');
    }
    return view('admin/profile');
})->name('admin.profile');
Route::post('/admin/profile/update', function (Illuminate\Http\Request $request) {
    // Check custom session auth
    $user = session('user');
    if (!$user || ($user['user_role'] ?? 0) != 1) {
        return redirect('/admin/dang-nhap');
    }

    $userId = $user['id'] ?? null;

    if ($userId) {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        \App\Models\Users::where('user_id', $userId)->update([
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'user_address' => $request->address,
            'updated_at' => now(),
        ]);

        return redirect('/admin/profile')->with('success', 'Cập nhật thông tin thành công!');
    }

    return redirect('/admin/profile')->with('error', 'Không thể cập nhật thông tin.');
});

Route::post('/admin/avatar', function (Illuminate\Http\Request $request) {
    // Check custom session auth
    $user = session('user');
    if (!$user || ($user['user_role'] ?? 0) != 1) {
        return response()->json(['success' => false, 'message' => 'Chưa đăng nhập']);
    }

    $userId = $user['id'] ?? null;

    if (!$userId || !$request->hasFile('avatar')) {
        return response()->json(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
    }

    $file = $request->file('avatar');

    // Validate file
    if (!$file->isValid()) {
        return response()->json(['success' => false, 'message' => 'File không hợp lệ']);
    }

    // Check file size (max 5MB)
    if ($file->getSize() > 5 * 1024 * 1024) {
        return response()->json(['success' => false, 'message' => 'File quá lớn (tối đa 5MB)']);
    }

    // Check file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file->getMimeType(), $allowedTypes)) {
        return response()->json(['success' => false, 'message' => 'Chỉ chấp nhận file ảnh (JPEG, PNG, GIF, WebP)']);
    }

    try {
        // Generate unique filename
        $extension = $file->getClientOriginalExtension();
        $filename = 'admin_avatar_' . $userId . '_' . time() . '.' . $extension;

        // Move file to avatars directory
        $file->move(public_path('avatars'), $filename);

        // Update user avatar in database
        $userModel = \App\Models\Users::find($userId);
        if ($userModel) {
            // Delete old avatar if exists
            if ($userModel->avatar && file_exists(public_path($userModel->avatar))) {
                unlink(public_path($userModel->avatar));
            }

            $userModel->avatar = 'avatars/' . $filename;
            $userModel->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Ảnh đại diện đã được cập nhật',
            'avatar_url' => asset('avatars/' . $filename)
        ]);

    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra khi tải ảnh lên']);
    }
})->name('admin.avatar');

// ----------------------------------------------------
// người dùng đăng nhập
Route::get('dang-nhap',[\App\Http\Controllers\UserController::class, 'login']);
Route::post('xu-ly-dang-nhap',[\App\Http\Controllers\UserController::class, 'action_login']);
Route::get('thoat',[\App\Http\Controllers\UserController::class, 'logout']);
// Profile
Route::get('/profile', function () {
    // Check custom session auth
    $user = session('user');
    if (!$user) {
        return redirect('/dang-nhap');
    }
    return view('profile');
});
Route::post('/profile/avatar', function (Illuminate\Http\Request $request) {
    // Check custom session auth
    $user = session('user');
    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Chưa đăng nhập']);
    }

    $userId = null;
    if (is_array($user)) {
        if (isset($user['id'])) {
            $userId = $user['id'];
        } elseif (isset($user[0]) && is_array($user[0])) {
            $userId = $user[0]['id'] ?? null;
        }
    }

    if (!$userId || !$request->hasFile('avatar')) {
        return response()->json(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
    }

    $file = $request->file('avatar');

    // Validate file
    if (!$file->isValid()) {
        return response()->json(['success' => false, 'message' => 'File không hợp lệ']);
    }

    // Check file size (max 5MB)
    if ($file->getSize() > 5 * 1024 * 1024) {
        return response()->json(['success' => false, 'message' => 'File quá lớn (tối đa 5MB)']);
    }

    // Check file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file->getMimeType(), $allowedTypes)) {
        return response()->json(['success' => false, 'message' => 'Chỉ chấp nhận file ảnh (JPEG, PNG, GIF, WebP)']);
    }

    try {
        // Generate unique filename
        $extension = $file->getClientOriginalExtension();
        $filename = 'avatar_' . $userId . '_' . time() . '.' . $extension;

        // Move file to avatars directory
        $file->move(public_path('avatars'), $filename);

        // Update user avatar in database
        $userModel = \App\Models\Users::find($userId);
        if ($userModel) {
            // Delete old avatar if exists
            if ($userModel->avatar && file_exists(public_path($userModel->avatar))) {
                unlink(public_path($userModel->avatar));
            }

            $userModel->avatar = 'avatars/' . $filename;
            $userModel->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Avatar đã được cập nhật',
            'avatar_url' => asset('avatars/' . $filename)
        ]);

    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra khi tải ảnh lên']);
    }
})->name('profile.avatar');

Route::post('/profile/update', function (Illuminate\Http\Request $request) {
    // Check custom session auth
    $user = session('user');
    if (!$user) {
        return redirect('/dang-nhap');
    }

    $userId = null;
    if (is_array($user)) {
        if (isset($user['id'])) {
            $userId = $user['id'];
        } elseif (isset($user[0]) && is_array($user[0])) {
            $userId = $user[0]['id'] ?? null;
        }
    }

    if ($userId) {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        \App\Models\Users::where('user_id', $userId)->update([
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'user_address' => $request->address,
            'updated_at' => now(),
        ]);

        return redirect('/profile')->with('success', 'Cập nhật thông tin thành công!');
    }

    return redirect('/profile')->with('error', 'Không thể cập nhật thông tin.');
});

// Hiển thị form đăng ký
// Hiển thị form đăng ký
Route::get('/dang-ky', function () {
    return view('register');
});

// Xử lý đăng ký (POST)
Route::post('/xu-ly-dang-ky', [\App\Http\Controllers\UserController::class, 'action_register']);

// Password Reset Routes
Route::get('/quen-mat-khau', [App\Http\Controllers\UserController::class, 'showForgotPasswordForm'])->name('password.forgot');
Route::post('/quen-mat-khau', [App\Http\Controllers\UserController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [App\Http\Controllers\UserController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\UserController::class, 'resetPassword'])->name('password.update');

// Trang welcome - trang chào mừng người dùng
Route::get('/', function () {
    return view('welcome');
});

// Danh sách sản phẩm (admin) - chỉ dành cho admin
Route::get('/danh-sach-san-pham',[\App\Http\Controllers\ProductController::class, 'get_all']);
Route::get('/them-gio-hang/{id}',[\App\Http\Controllers\CartController::class, 'add_cart']);
Route::get('/gio-hang',[\App\Http\Controllers\CartController::class, 'cart']);
Route::post('/cap-nhat-gio-hang',[\App\Http\Controllers\CartController::class, 'update_cart']);
Route::get('/thanh-toan',[\App\Http\Controllers\CartController::class, 'order']);
Route::get('/xoa-gio-hang/{id}',[\App\Http\Controllers\CartController::class, 'del_cart']);

// ================= GIỎ HÀNG (Cart) =================

// Route::middleware('auth')->prefix('cart')->group(function () {
//     Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
//     Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
//     Route::post('/delete/{id}', [CartController::class, 'remove'])->name('cart.delete');
//     Route::get('/content', [CartController::class, 'getCart'])->name('cart.get');
// });

Route::prefix('cart')->group(function () {
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/delete/{id}', [CartController::class, 'remove'])->name('cart.delete');
    Route::get('/content', [CartController::class, 'getCart'])->name('cart.get');
});

Route::get('/checkout', function (Illuminate\Http\Request $request) {
    // Check custom session auth
    $user = session('user');
    if (!$user) {
        // Instead of redirecting, show home page with login modal
        $categories = \App\Models\CategoryModel::with('products')->get();
        $searchQuery = $request->get('search');
        $searchResults = null;

        if ($searchQuery) {
            $searchResults = \App\Models\ProductModel::where('product_name', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('product_description', 'LIKE', '%' . $searchQuery . '%')
                ->orWhereHas('category', function($query) use ($searchQuery) {
                    $query->where('category_name', 'LIKE', '%' . $searchQuery . '%');
                })
                ->with('category')
                ->get();
        }

        return view('home', compact('categories', 'searchQuery', 'searchResults'))
               ->with('show_login_modal', true)
               ->with('login_message', 'Vui lòng đăng nhập để tiếp tục thanh toán');
    }

    // Check if user has complete profile information
    $userId = null;
    if (is_array($user)) {
        if (isset($user['id'])) {
            $userId = $user['id'];
        } elseif (isset($user[0]) && is_array($user[0])) {
            $userId = $user[0]['id'] ?? null;
        }
    }

    if ($userId) {
        $userInfo = \App\Models\Users::find($userId);
        if ($userInfo) {
            // Check if required fields are filled
            if (empty($userInfo->user_fullname) || empty($userInfo->user_address)) {
                return redirect('/profile')->with('error', 'Vui lòng cập nhật đầy đủ thông tin cá nhân (họ tên và địa chỉ) trước khi thanh toán!');
            }
        }
    }

    return app(CheckoutController::class)->index();
})->name('checkout');






// Checkout process
Route::post('checkout', [CheckoutController::class, 'process'])->name('checkout.process');

// Xem lịch sử đơn hàng (cho user đã đăng nhập)
Route::get('/orders', function () {
    // Check custom session auth
    $user = session('user');
    if (!$user) {
        return redirect('/dang-nhap');
    }
    return app(CheckoutController::class)->userOrders();
})->name('user.orders');

Route::get('/orders/{id}', function ($id) {
    // Check custom session auth
    $user = session('user');
    if (!$user) {
        return redirect('/dang-nhap');
    }
    return app(CheckoutController::class)->showOrder($id);
})->name('user.order.show');

// Trang cảm ơn (nhận query `order_id` và truyền vào view)
Route::get('/thank-you', function() {
    $orderId = request('order_id');
    return view('thankyou', ['order_id' => $orderId]);
})->name('thank.you');





//home-routes:
Route::get('/about', function () {
    return view('about');
})->name('about'); // <-- Đặt tên cho route là 'about'

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:1000',
    ]);

    // Save contact notification to database
    \DB::table('contact_notifications')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->subject . ': ' . $request->message,
        'is_read' => false,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
})->name('contact.submit');

// Admin Dashboard
Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', function () {
        $notifications = \App\Models\ContactNotification::orderBy('created_at', 'desc')
            ->limit(20)
            ->get();
        return view('admin/dashboard', compact('notifications'));
    })->name('admin.dashboard');

    Route::post('admin/notifications/{id}/mark-read', function ($id) {
        \DB::table('contact_notifications')
            ->where('id', $id)
            ->update(['is_read' => true]);
        return response()->json(['success' => true]);
    });

    Route::delete('admin/notifications/{id}', function ($id) {
        \DB::table('contact_notifications')
            ->where('id', $id)
            ->delete();
        return response()->json(['success' => true]);
    });
});

// Search suggestions API
Route::get('/api/search-suggestions', function (Illuminate\Http\Request $request) {
    $query = $request->get('q', '');

    if (strlen($query) < 2) {
        return response()->json([]);
    }

    $suggestions = \App\Models\ProductModel::where('product_name', 'LIKE', '%' . $query . '%')
        ->orWhere('product_description', 'LIKE', '%' . $query . '%')
        ->orWhereHas('category', function($q) use ($query) {
            $q->where('category_name', 'LIKE', '%' . $query . '%');
        })
        ->limit(10)
        ->pluck('product_name')
        ->unique()
        ->values();

    return response()->json($suggestions);
})->name('search.suggestions');

// Product Reviews
Route::post('/product/{id}/review', [ProductController::class, 'storeReview'])->name('product.review.store');
Route::put('/product/{id}/review', [ProductController::class, 'updateReview'])->name('product.review.update');
Route::delete('/product/{id}/review', [ProductController::class, 'deleteReview'])->name('product.review.delete');
Route::get('/product/{id}/reviews', [ProductController::class, 'getReviews'])->name('product.reviews');

// Popular products API for focus suggestions
Route::get('/api/popular-products', function () {
    // Get top 8 products from database (you can modify this logic as needed)
    $popularProducts = \App\Models\ProductModel::limit(8)
        ->pluck('product_name')
        ->values();

    return response()->json($popularProducts);
})->name('popular.products');




// Route::get('home', function () {
//     return view('home',['title' => 'HCE', 'body' => 'Body']);
// });


// ----------------------------------------------------
// ROUTE TRANG CHỦ (Home)
// ----------------------------------------------------
Route::get('home', function (Illuminate\Http\Request $request) {

    // 🔥 KHẮC PHỤC LỖI: Lấy dữ liệu và Eager Loading quan hệ 'products'
    // Biến $categories sẽ được khai báo ở đây
    $categories = CategoryModel::with('products')->get();

    // Handle search functionality
    $searchQuery = $request->get('search');
    $searchResults = null;

    if ($searchQuery) {
        // Search products by name, description, or category
        $searchResults = \App\Models\ProductModel::where('product_name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('product_description', 'LIKE', '%' . $searchQuery . '%')
            ->orWhereHas('category', function($query) use ($searchQuery) {
                $query->where('category_name', 'LIKE', '%' . $searchQuery . '%');
            })
            ->with('category')
            ->get();
    }

    // TRUYỀN biến $categories sang view 'home'
    return view('home', compact('categories', 'searchQuery', 'searchResults'));

})->name('home');



Route::prefix('greeting')->group(function () {

	// work for: /greeting/vn
    Route::get('vn', function () {
        return "Xin chào!";
    });

    // work for: /greeting/en
    Route::get('en', function () {
        return "Hello!";
    });

    // work for: /greeting/cn
    Route::get('cn', function () {
        return "你好!";
    });
});
Route::get('user/{id}/comment/{commentId}', function ($id, $commentId) {
    return "User id: $id and comment id: $commentId";
});
Route::get('laydulieu', function () {
    $data = DB::table('user')->get();
    print_r($data);
});
