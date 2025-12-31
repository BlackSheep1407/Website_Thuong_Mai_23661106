<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function insert_form(){
        return view('admin/user_insert_form');
    }
    public function action_insert(Request $request){
        $request->validate([
            'username' => 'required|string|max:255|unique:user,user_username',
            'password' => 'required|string|min:6',
            'fullname' => 'required|string|max:255',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'role' => 'required|in:0,1',
        ]);

        $result = [
            'user_username' => $request->username,
            'user_password' => Hash::make($request->password),
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'user_address' => $request->address,
            'user_role' => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Users::insert($result);
        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Thêm người dùng thành công!');
    }
    public function action_update(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'role' => 'required|in:0,1',
        ]);

        $id = $request->input('id');
        $updateData = [
            'user_username' => $request->username,
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'user_address' => $request->address,
            'user_role' => $request->role,
        ];

        // Only update password if provided
        if (!empty($request->password)) {
            $updateData['user_password'] = Hash::make($request->password);
        }

        Users::where('user_id', $id)->update($updateData);
        return redirect()->to('admin/danh-sach-nguoi-dung')->with('success', 'Cập nhật thông tin người dùng thành công!');
    }

    public function set_role($id, $role){
        // Validate role (only 0 or 1 allowed)
        if (!in_array($role, [0, 1])) {
            return redirect()->back()->with('error', 'Vai trò không hợp lệ!');
        }

        // Prevent admin from demoting themselves
        $currentAdmin = session('user');
        if ($currentAdmin && $currentAdmin['id'] == $id && $role == 0) {
            return redirect()->back()->with('error', 'Bạn không thể tự hạ cấp quyền Admin của mình!');
        }

        // Update user role
        $user = Users::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Người dùng không tồn tại!');
        }

        $user->user_role = $role;
        $user->save();

        $roleText = $role == 1 ? 'Admin' : 'Khách hàng';
        return redirect()->back()->with('success', "Đã cập nhật vai trò của {$user->user_fullname} thành {$roleText}!");
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
    //login
    public function login(){
        // Check if user is already logged in as customer (user_role != 1)
        $user = session('user');

        // Debug: Log session data
        \Log::info('Admin login check - Raw session user:', ['user' => $user]);

        // Check if user is logged in and not an admin
        $isLoggedInAsCustomer = false;
        if ($user && is_array($user)) {
            $userRole = $user['user_role'] ?? null;
            // Convert to int for comparison (handle both string and int)
            $userRoleInt = is_numeric($userRole) ? (int) $userRole : 0;

            \Log::info('Admin login check - User role:', ['role' => $userRole, 'role_int' => $userRoleInt]);

            if ($userRoleInt !== 1) { // Not admin
                $isLoggedInAsCustomer = true;
            }
        }

        if ($isLoggedInAsCustomer) {
            \Log::info('Blocking customer user from admin login');
            // User is logged in as customer, show access denied page like other admin routes
            return response()->view('errors.access-denied', [], 403);
        }

        return view('admin/login');
    }
    //logout
    public function logout(){
        session()->forget ('user');
        //$request->session()->flush();
        return redirect()->to('admin/dang-nhap');
    }
    //xử lý action_login
    public function action_login(Request $request){
        $name = $request->input('username');
        $pswd = $request->input('pswd');
        $user = Users::where('user_username', $name)->where('user_role', 1)->first();

        // Check password - handle both hashed and plain text for backward compatibility
        $passwordValid = false;
        if ($user) {
            // Check if password is hashed (bcrypt starts with $2y$)
            if (str_starts_with($user->user_password, '$2y$')) {
                // Password is hashed, use Hash::check
                $passwordValid = Hash::check($pswd, $user->user_password);
            } else {
                // Password is plain text, check directly
                $passwordValid = ($user->user_password === $pswd);
                // If valid, hash the password for future use
                if ($passwordValid) {
                    $user->user_password = Hash::make($pswd);
                    $user->save();
                }
            }
        }

        if ($user && $passwordValid) {
            // Store session in same format as regular user login
            session::put("user", [
                'id' => $user->user_id,
                'username' => $user->user_username,
                'user_role' => $user->user_role,
            ]);

            // Welcome message with admin name
            $welcomeMessage = 'Chào mừng ' . $user->user_fullname . ' đã đăng nhập thành công!';

            return redirect()->to('admin/dashboard')->with('welcome', $welcomeMessage);
        }
        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }
}
