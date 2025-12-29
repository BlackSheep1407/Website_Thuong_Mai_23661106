<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function show($id){
        $users=Users::where('user_id',$id)->where('user_role',0)->get();
        return view('admin/user_info_form',['users'=>$users]);
    }
    public function login(){
        return view('login');
    }
    public function logout(){
        session()->forget('user');
        return redirect()->to('/danh-sach-san-pham');
    }
    public function action_login(Request $request){
        $name = $request->input('username'); 
        $pswd = $request->input('pswd'); 
        $user=Users::where('user_username',$name)->where('user_password',$pswd)->where('user_role',0)->first();
        if($user){
            $sessions = Session::put("user", [['id' => $user->user_id, 'username' => $user->user_username]]);
            return redirect()->to('/danh-sach-san-pham');
        }
    }
}
