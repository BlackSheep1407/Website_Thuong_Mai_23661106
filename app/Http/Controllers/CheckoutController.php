<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\CartItemModel;

class CheckoutController extends Controller
{
    private function getUserCart()
    {
        $user = session('user');

        // If user is logged in, get cart from database
        if ($user) {
            $userId = null;
            if (is_array($user)) {
                if (isset($user['user_id'])) {
                    $userId = $user['user_id'];
                } elseif (isset($user['id'])) {
                    $userId = $user['id'];
                } elseif (isset($user[0]) && is_array($user[0])) {
                    $userId = $user[0]['user_id'] ?? $user[0]['id'] ?? null;
                }
            }

            if ($userId) {
                $cart = CartModel::where('user_id', $userId)->first();
                if ($cart) {
                    $items = CartItemModel::where('cart_id', $cart->id)->with('product')->get();
                    $cartData = [];
                    foreach ($items as $item) {
                        $cartData[$item->product_id] = [
                            'id' => $item->product_id,
                            'name' => $item->product->product_name,
                            'price' => $item->product->product_price,
                            'image' => $item->product->product_img,
                            'category' => $item->product->category->category_name ?? '',
                            'qty' => $item->qty
                        ];
                    }
                    return $cartData;
                }
            }
        }

        // For guests or if no database cart, use session (though checkout requires login)
        return session('cart', []);
    }

    private function clearUserCart()
    {
        $user = session('user');
        if (!$user) {
            return;
        }

        $userId = null;
        if (is_array($user)) {
            if (isset($user['user_id'])) {
                $userId = $user['user_id'];
            } elseif (isset($user['id'])) {
                $userId = $user['id'];
            } elseif (isset($user[0]) && is_array($user[0])) {
                $userId = $user[0]['user_id'] ?? $user[0]['id'] ?? null;
            }
        }

        if (!$userId) {
            return;
        }

        $cart = CartModel::where('user_id', $userId)->first();
        if ($cart) {
            CartItemModel::where('cart_id', $cart->id)->delete();
        }
    }
    // Hiển thị form checkout (wrapper)
    public function index()
    {
        return $this->checkoutForm();
    }

    // Hiển thị form checkout
    public function checkoutForm()
    {
        // Check authentication
        $user = session('user');
        if (!$user) {
            return redirect('/dang-nhap')->with('error', 'Vui lòng đăng nhập trước khi thanh toán!');
        }

        // Check if user has complete profile information
        $userId = null;
        if (is_array($user)) {
            if (isset($user['user_id'])) {
                $userId = $user['user_id'];
            } elseif (isset($user['id'])) {
                $userId = $user['id'];
            } elseif (isset($user[0]) && is_array($user[0])) {
                $userId = $user[0]['user_id'] ?? $user[0]['id'] ?? null;
            }
        }

        if ($userId) {
            $userInfo = \App\Models\Users::find($userId);
            if ($userInfo && (empty($userInfo->user_fullname) || empty($userInfo->user_address))) {
                return redirect('/profile')->with('error', 'Vui lòng cập nhật đầy đủ thông tin cá nhân (họ tên và địa chỉ) trước khi thanh toán!');
            }
        }

        // Get cart from database
        $cart = $this->getUserCart();
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Giỏ hàng đang trống!');
        }
        $total = collect($cart)->sum(fn ($item) => $item['price'] * $item['qty']);
        return view('checkout', compact('cart', 'total'));
    }

    // Xử lý form checkout (wrapper dùng bởi route)
    public function process(Request $request)
    {
        try {
            $result = $this->processCheckout($request);

            // If it's a JSON response (AJAX), return it
            if ($result instanceof \Illuminate\Http\JsonResponse) {
                return $result;
            }

            // For form POST, redirect to thank you page
            if (isset($result['success']) && $result['success']) {
                return redirect()->route('thank.you', ['order_id' => $result['order_id']])
                    ->with('success', 'Đặt hàng thành công!');
            }

            return redirect()->route('checkout')->with('error', $result['error'] ?? 'Có lỗi xảy ra');

        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    // Xử lý form checkout
    public function processCheckout(Request $request)
    {
        try {
            // Read cart from database
            $cart = $this->getUserCart();
            if (empty($cart)) {
                return response()->json(['error' => 'Giỏ hàng đang trống'], 400);
            }

            // compute total
            $total = collect($cart)->sum(fn ($item) => $item['price'] * $item['qty']);

            // determine user id and info from session
            $userId = null;
            $customerName = 'Khách hàng';
            $customerEmail = '';
            $customerPhone = '';
            $customerAddress = '';

            $sessUser = session('user');
            if (is_array($sessUser)) {
                if (isset($sessUser['user_id'])) {
                    $userId = $sessUser['user_id'];
                } elseif (isset($sessUser['id'])) {
                    $userId = $sessUser['id'];
                } elseif (isset($sessUser[0]) && is_array($sessUser[0])) {
                    $userId = $sessUser[0]['user_id'] ?? $sessUser[0]['id'] ?? null;
                }
            }

            // get customer info from user if logged in
            if ($userId) {
                try {
                    $user = \App\Models\Users::find($userId);
                    if ($user) {
                        $customerName = $user->user_fullname ?: $customerName;
                        $customerEmail = $user->user_email ?: $customerEmail;
                        $customerPhone = $user->user_phone ?: $customerPhone;
                        $customerAddress = $user->user_address ?: $customerAddress;
                    }
                } catch (\Exception $e) {
                    \Log::warning('Could not find user for checkout: ' . $e->getMessage());
                }
            }

            // Validate request data
            $rules = [];

            // For logged-in users with complete profiles, make fields optional
            if ($userId && !empty($customerName) && !empty($customerAddress)) {
                // User is logged in with complete profile - fields are optional
                $rules['name'] = 'nullable|string|max:255';
                $rules['address'] = 'nullable|string|max:500';
                $rules['email'] = 'nullable|email';
                $rules['phone'] = 'nullable|string|max:20';
            } else {
                // User not logged in or profile incomplete - fields are required
                $rules['name'] = 'required|string|max:255';
                $rules['address'] = 'required|string|max:500';
                $rules['email'] = 'nullable|email';
                $rules['phone'] = 'nullable|string|max:20';
            }

            $request->validate($rules);

            // Use form data, fallback to user data
            $finalName = $request->name ?: $customerName;
            $finalEmail = $request->email ?: $customerEmail;
            $finalPhone = $request->phone ?: $customerPhone;
            $finalAddress = $request->address ?: $customerAddress;

            $shippingAddress = json_encode([
                'name' => $finalName,
                'email' => $finalEmail,
                'phone' => $finalPhone,
                'address' => $finalAddress,
            ]);

            // create order
            $order = Order::create([
                'user_id' => $userId,
                'customer_name' => $finalName,
                'total' => $total,
                'status' => 'pending',
                'shipping_address' => $shippingAddress,
            ]);

            // create order items
            foreach ($cart as $pid => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'] ?? $pid,
                    'product_name' => $item['name'] ?? '',
                    'price' => $item['price'] ?? 0,
                    'qty' => $item['qty'] ?? 1,
                    'subtotal' => ($item['price'] ?? 0) * ($item['qty'] ?? 1),
                ]);
            }

            // clear cart
            $this->clearUserCart();

            // return JSON summary
            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'cart' => [],
                'count' => 0,
                'total' => 0,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = [];
            if (isset($e->errors()['name'])) {
                $errors[] = 'Họ tên: ' . implode(', ', $e->errors()['name']);
            }
            if (isset($e->errors()['address'])) {
                $errors[] = 'Địa chỉ: ' . implode(', ', $e->errors()['address']);
            }
            // Only show email/phone errors if they were actually filled but invalid
            if (isset($e->errors()['email'])) {
                $errors[] = 'Email: ' . implode(', ', $e->errors()['email']);
            }
            if (isset($e->errors()['phone'])) {
                $errors[] = 'Số điện thoại: ' . implode(', ', $e->errors()['phone']);
            }

            return response()->json([
                'error' => 'Dữ liệu không hợp lệ: ' . implode('; ', $errors)
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Checkout error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Có lỗi xảy ra khi xử lý đơn hàng: ' . $e->getMessage()
            ], 500);
        }
    }

    // Hiển thị lịch sử đơn hàng của user
    public function userOrders()
    {
        $user = session('user');
        $userId = null;

        if (is_array($user)) {
            if (isset($user['user_id'])) {
                $userId = $user['user_id'];
            } elseif (isset($user['id'])) {
                $userId = $user['id'];
            } elseif (isset($user[0]) && is_array($user[0])) {
                $userId = $user[0]['user_id'] ?? $user[0]['id'] ?? null;
            }
        }

        if (!$userId) {
            return redirect('/dang-nhap')->with('error', 'Vui lòng đăng nhập để xem đơn hàng');
        }

        $orders = Order::where('user_id', $userId)
            ->with('items')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user_orders', compact('orders'));
    }

    // Hiển thị chi tiết đơn hàng
    public function showOrder($id)
    {
        $user = session('user');
        $userId = null;

        if (is_array($user)) {
            if (isset($user['user_id'])) {
                $userId = $user['user_id'];
            } elseif (isset($user['id'])) {
                $userId = $user['id'];
            } elseif (isset($user[0]) && is_array($user[0])) {
                $userId = $user[0]['user_id'] ?? $user[0]['id'] ?? null;
            }
        }

        if (!$userId) {
            return redirect('/dang-nhap')->with('error', 'Vui lòng đăng nhập để xem đơn hàng');
        }

        $order = Order::where('id', $id)
            ->where('user_id', $userId)
            ->with('items')
            ->first();

        if (!$order) {
            return redirect()->route('user.orders')->with('error', 'Đơn hàng không tồn tại');
        }

        return view('user_order_detail', compact('order'));
    }
}
