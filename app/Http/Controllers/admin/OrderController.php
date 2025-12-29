<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        // Simple middleware-like check: redirect non-admins to admin login
        $this->middleware(function ($request, $next) {
            $sess = session('user');
            $isAdmin = false;
            if (is_array($sess)) {
                if (isset($sess['user_role']) && $sess['user_role'] == 1) $isAdmin = true;
                if (isset($sess['user_role']) && $sess['user_role'] == '1') $isAdmin = true;
                if (isset($sess[0]) && is_array($sess[0]) && isset($sess[0]['user_role']) && $sess[0]['user_role'] == 1) $isAdmin = true;
            }
            if (!$isAdmin) {
                return redirect('/admin/dang-nhap')->with('error', 'Bạn cần quyền quản trị');
            }
            return $next($request);
        });
    }

    // danh sách đơn hàng
    public function index()
    {
        $orders = Order::with('items')->orderByDesc('created_at')->get();
        return view('admin.orders_list', ['orders' => $orders]);
    }

    // chi tiết đơn
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('admin.order_detail', ['order' => $order]);
    }
}
