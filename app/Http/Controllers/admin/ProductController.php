<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
class ProductController extends Controller
{
//     public function show($id) {
//     $product = ProductModel::with('category')->findOrFail($id);
//     return view('product_detail', compact('product'));
// }

    public function insert_form(){
        $categories=CategoryModel::all();
        return view('admin/product_insert_form',['categories'=>$categories]); //gán biến danh sách lấy dữ liệu cho biến categories (xanh lá)
    }
    public function action_insert(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category = $request->input('category');

        $img_name = '';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $img_name = 'img/' . $filename;
        }

        $result = [
            'product_name' => $name,
            'product_img' => $img_name,
            'product_price' => $price,
            'product_category' => $category,
            'product_description' => $description
        ];

        ProductModel::insert($result);
        return redirect()->to('admin/danh-sach-san-pham')->with('success', 'Sản phẩm đã được thêm thành công!');
    }


    public function action_update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|integer',
            'description' => 'nullable|string',
            'id' => 'required|integer',
        ]);

        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $id = $request->input('id');
        $category = $request->input('category');

        $img_name = $request->input('img_old');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $img_name = 'img/' . $filename;
        }

        $result = [
            'product_name' => $name,
            'product_img' => $img_name,
            'product_price' => $price,
            'product_category' => $category,
            'product_description' => $description
        ];

        ProductModel::where('product_id', $id)->update($result);
        return redirect()->to('admin/danh-sach-san-pham')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }
    public function get_all(){
        $products=ProductModel::join('category','product_category' , '=', 'category_id')->get();
        return view('admin/product_list',['products'=>$products]);
    }
    public function del($id){
        $products=ProductModel::where('product_id',$id)->delete();
        return redirect()->to('admin/danh-sach-san-pham');
    }
    public function show($id){
        $products=ProductModel::join('category','product_category' , '=', 'category_id')->where('product_id',$id)->get();
        $categories=CategoryModel::all();
        return view('admin/product_info_form',['products'=>$products,'categories'=>$categories]);
    }
}
