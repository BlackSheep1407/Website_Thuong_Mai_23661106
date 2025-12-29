<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;

class UserController extends Controller
{
    public function insert_form(){
        return view('admin/user_insert_form');
    }
    public function action_insert(Request $request){
        $name = $request->input('username'); 
        $password = $request->input('password'); 
        $fullname = $request->input('fullname'); 
        $address = $request->input('address'); 
        $result=['user_username'=>$name,
                    'user_password'=>$password,
                    'user_fullname'=>$fullname,
                    'user_address'=>$address];
        Users::insert($result);
        return redirect()->to('admin/danh-sach-nguoi-dung');
    }
    public function action_update(Request $request){
        $name = $request->input('username'); 
        $id = $request->input('id'); 
        $fullname = $request->input('fullname'); 
        $address = $request->input('address'); 
        $result=['user_username'=>$name,
                    'user_fullname'=>$fullname,
                    'user_address'=>$address];
        Users::where('user_id',$id)->update($result);
        return redirect()->to('admin/danh-sach-nguoi-dung');
    }
    public function get_all(){
        $users=Users::all();
        return view('admin/user_list',['users'=>$users]);
    }
    public function del($id){
        $users=Users::where('user_id',$id)->delete();
        return redirect()->to('admin/danh-sach-nguoi-dung');
    }
    public function show($id){
        $users=Users::where('user_id',$id)->get();
        return view('admin/user_info_form',['users'=>$users]);
    }
}
