<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class OrderController extends Controller
{
    
    public function action_insert(Request $request){
        $name = $request->input('name'); 
        $price = $request->input('price'); 
        $description = $request->input('description'); 
        
        if ($request->hasFile('img')) {
            $request->file('img')->move('img', $request->file('img')->getClientOriginalName());
            $img_name='img/'.$request->file('img')->getClientOriginalName();
        }
        $category=$request->input('category');
        $result=['product_name'=>$name,
                    'product_img'=>$img_name,
                    'product_price'=>$price,
                    'product_category'=>$category,
                    'product_description'=>$description];
        ProductModel::insert($result);
        return redirect()->to('admin/danh-sach-san-pham');
    }
    public function action_update(Request $request){
        $name = $request->input('name'); 
        $price = $request->input('price'); 
        $description = $request->input('description'); 
        $id=$request->input('id');
        if ($request->hasFile('img')) {
            $request->file('img')->move('img', $request->file('img')->getClientOriginalName());
            $img_name='img/'.$request->file('img')->getClientOriginalName();
        }
        else
            $img_name=$request->input('img_old');
        $category=$request->input('category');
        $result=['product_name'=>$name,
                    'product_img'=>$img_name,
                    'product_price'=>$price,
                    'product_category'=>$category,
                    'product_description'=>$description];
        ProductModel::where('product_id',$id)->update($result);
        return redirect()->to('admin/danh-sach-san-pham');
    }
    public function get_all(){
        //DB::enableQueryLog();
        $orders=OrderModel::join('user','user_id' , '=', 'orders.order_customer')
                    ->join('order_detail','order_detail.order_id' , '=', 'orders.order_id')
                    ->select('order_detail.order_id','order_date','order_customer','order_status','user_fullname', DB::raw('SUM(order_product_quantity*order_product_price) as total_sales'))
                    ->groupBy('order_detail.order_id','order_date','order_customer','order_status','user_fullname')
                    ->get();
                    //$quries = DB::getQueryLog();dd($quries);die();
        return view('admin/order_list',['orders'=>$orders]);
    }
    public function del($id){
        OrderDetailModel::where('order_id',$id)->delete();
        OrderModel::where('order_id',$id)->delete();
        return redirect()->to('admin/danh-sach-don-hang');
    }
    public function show($id){
        $order=OrderModel::join('order_detail','order_detail.order_id' , '=', 'orders.order_id')->where('order_id',$id)->get();
        //$categories=CategoryModel::all();
        return view('admin/order_detail_id',['order'=>$order]);
    }
    
}
