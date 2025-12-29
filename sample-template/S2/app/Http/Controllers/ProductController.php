<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{

    public function get_all(){
        //session()->forget('cart.products');
        $products=ProductModel::join('category','product_category' , '=', 'category_id')->get();
        return view('product_list',['products'=>$products]);
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
