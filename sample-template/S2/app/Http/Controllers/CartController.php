<?php
namespace App\Http\Controllers;
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
class CartController extends Controller
{
    public function add_cart($id){
        $product=ProductModel::join('category','product_category' , '=', 'category_id')->where('product_id',$id)->first();
        //print_r($product->product_category);die();
        if (!session()->has('cart.products')) {
            $sessions = Session::put("cart.products", [['id' => $id, 'item' => 1,'img'=>$product->product_img,'price'=>$product->product_price,'name'=>$product->product_name]]);
        }else{
            $flag=true;
            $arr=session()->get('cart.products');
            session()->forget('cart.products');
            for ($i=0;$i< count($arr);$i++ ){
                if($arr[$i]['id'] ==$id){
                    $flag=false;
                    ++$arr[$i]['item'];
                    session::push("cart.products", ['id' => $arr[$i]['id'], 'item' => $arr[$i]['item'],'img' => $arr[$i]['img'], 'price' => $arr[$i]['price'],'name'=>$arr[$i]['name']]);
                }else
                session::push("cart.products", ['id' => $arr[$i]['id'], 'item' => $arr[$i]['item'],'img' => $arr[$i]['img'], 'price' => $arr[$i]['price'],'name'=>$arr[$i]['name']]);
            }
            if($flag) $sessions = Session::push("cart.products", ['id' => $id, 'item' => 1,'img'=>$product->product_img,'price'=>$product->product_price,'name'=>$product->product_name]);
        }
        //print_r(session()->get('cart.products'));die();
        return redirect()->to('/danh-sach-san-pham');
    }
    public function cart(){
        return view('cart');
    }
    public function update_cart(Request $request){
        if (session()->has('cart.products')) {
            $qty=$request->input("qty");
            $arr=session()->get('cart.products');
            session()->forget('cart.products');
            for ($i=0;$i< count($arr);$i++ ){
                if($qty[$arr[$i]['id']]>0){
                    session::push("cart.products", ['id' => $arr[$i]['id'], 'item' => $qty[$arr[$i]['id']],'img' => $arr[$i]['img'], 'price' => $arr[$i]['price'],'name'=>$arr[$i]['name']]);
                }
            }
        }
        return redirect()->to('/gio-hang');
    }
    public function del_cart($id){
        if (session()->has('cart.products')) {
            $arr=session()->get('cart.products');
            session()->forget('cart.products');
            for ($i=0;$i< count($arr);$i++ ){
                if($arr[$i]['id']!=$id){
                    session::push("cart.products", ['id' => $arr[$i]['id'], 'item' => $arr[$i]['item'],'img' => $arr[$i]['img'], 'price' => $arr[$i]['price'],'name'=>$arr[$i]['name']]);
                }
            }
        }
        return redirect()->to('/gio-hang');
    }
    public function order(){
        $user=session()->get('user');
        $result=['order_date'=>Carbon::now(),
                    'order_customer'=>$user[0]['username'],
                    'order_status'=>1,
                    'order_note'=>"Ghi chú"];
        $order_id=OrderModel::insertGetId($result);
        $arr=session()->get('cart.products');
        session()->forget('cart.products');
        for ($i=0;$i< count($arr);$i++ ){
            $result=['order_id'=>$order_id,
                    'order_product_id'=>$arr[$i]['id'],
                    'order_product_quantity'=>$arr[$i]['item'],
                    'order_product_price'=>$arr[$i]['price']];
                    OrderDetailModel::insert($result);        
        }
        return redirect()->to('/danh-sach-san-pham');
    }
}
