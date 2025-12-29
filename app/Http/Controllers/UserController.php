<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
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
        return redirect()->to('/home');
    }
    public function action_login(Request $request){
        $name = $request->input('username'); 
        $pswd = $request->input('pswd'); 
        $user = Users::where('user_username', $name)->where('user_role', 0)->first();
        if ($user && Hash::check($pswd, $user->user_password)) {
            Session::put('user', [
                'id' => $user->user_id,
                'username' => $user->user_username,
                'user_role' => $user->user_role,
            ]);
            return redirect()->to('/home');
        }
        return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }

    //register
    public function action_register(Request $request)
    {
    // 1. Validate dữ liệu
    $request->validate([
        'username' => 'required|min:4',
        'pswd'     => 'required|min:6',
        'fullname' => 'required',
        'email'    => 'required|email',
        'phone'    => 'required',
        'address'  => 'required',
    ], [
        'username.required' => 'Vui lòng nhập tên đăng nhập',
        'pswd.required'     => 'Vui lòng nhập mật khẩu',
        'email.required'    => 'Vui lòng nhập email',
        'email.email'       => 'Email không hợp lệ',
        'phone.required'    => 'Vui lòng nhập số điện thoại',
    ]);

    $name     = $request->input('username');
    $password = $request->input('pswd');
    $fullname = $request->input('fullname');
    $email    = $request->input('email');
    $phone    = $request->input('phone');
    $address  = $request->input('address');

    // 2. Kiểm tra trùng username
    $exist = Users::where('user_username', $name)->first();
    if ($exist) {
        return redirect()->back()->with('error', 'Tên đăng nhập đã tồn tại');
    }

    // 3. Lưu user
    Users::create([
        'user_username' => $name,
        'user_password' => Hash::make($password), // mã hóa
        'user_fullname' => $fullname,
        'user_email'    => $email,
        'user_phone'    => $phone,
        'user_address'  => $address,
        'user_role'     => 0
    ]);

    return redirect()->to('/dang-nhap')
        ->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
}

    // Password Reset Methods
    public function showForgotPasswordForm()
    {
        return view('forgot_password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user,user_email',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email này không tồn tại trong hệ thống',
        ]);

        $user = Users::where('user_email', $request->email)->first();
        $token = Str::random(60);

        // Store token in database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($token),
                'created_at' => Carbon::now(),
            ]
        );

        // Send email
        try {
            Mail::send('emails.password_reset', [
                'user' => $user,
                'token' => $token,
                'resetUrl' => url('/reset-password/' . $token . '?email=' . urlencode($request->email))
            ], function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Đặt lại mật khẩu - 2Tfresh Market');
            });

            return back()->with('success', 'Đã gửi email hướng dẫn đặt lại mật khẩu. Vui lòng kiểm tra hộp thư của bạn!');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi gửi email. Vui lòng thử lại sau!');
        }
    }

    public function showResetPasswordForm($token)
    {
        $email = request('email');

        // Check if token exists and is valid
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$resetRecord || !Hash::check($token, $resetRecord->token)) {
            return redirect('/dang-nhap')->with('error', 'Link đặt lại mật khẩu không hợp lệ hoặc đã hết hạn!');
        }

        // Check if token is expired (1 hour)
        if (Carbon::parse($resetRecord->created_at)->addHour()->isPast()) {
            DB::table('password_reset_tokens')->where('email', $email)->delete();
            return redirect('/dang-nhap')->with('error', 'Link đặt lại mật khẩu đã hết hạn!');
        }

        return view('reset_password', ['token' => $token, 'email' => $email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user,user_email',
            'password' => 'required|string|min:6|confirmed',
            'token' => 'required',
        ]);

        // Verify token
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$resetRecord || !Hash::check($request->token, $resetRecord->token)) {
            return back()->with('error', 'Token không hợp lệ!');
        }

        // Check if token is expired
        if (Carbon::parse($resetRecord->created_at)->addHour()->isPast()) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return redirect('/dang-nhap')->with('error', 'Link đặt lại mật khẩu đã hết hạn!');
        }

        // Update password
        Users::where('user_email', $request->email)
            ->update(['user_password' => Hash::make($request->password)]);

        // Delete the token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect('/dang-nhap')->with('success', 'Mật khẩu đã được đặt lại thành công! Vui lòng đăng nhập với mật khẩu mới.');
    }
}
