<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel; // your product model
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private function getUserCart()
    {
        return session('cart', []);
    }

    private function saveUserCart($cartData)
    {
        session()->put('cart', $cartData);
    }

    public function content()
{
    $cart = session('cart', []);
    return response()->json($cart);
}

    // Lấy nội dung giỏ hàng (AJAX)
    // public function getCart()
    // {
    //     $cart = session('cart', []);
    //     $count = array_sum(array_column($cart, 'qty')) ?: 0;
    //     $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);

    //     return response()->json([
    //         'cart'  => $cart,
    //         'count' => $count,
    //         'total' => $total
    //     ]);
    // }
    public function getCart()
    {
        try {
            $cart = $this->getUserCart();
            $count = array_sum(array_column($cart, 'qty')) ?: 0;
            $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);

            return response()->json([
                'cart'  => $cart,
                'count' => $count,
                'total' => $total
            ]);
        } catch (\Throwable $e) {
            \Log::error('Lỗi getCart: '.$e->getMessage());
            return response()->json(['error' => 'Lỗi khi lấy giỏ hàng'], 500);
        }
    }


    // Thêm sản phẩm
    public function add(Request $request, $id)
    {
        $product = ProductModel::where('product_id', $id)->first();
        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        $qty = (int) ($request->input('qty', 1));
        $cart = $this->getUserCart();

        if (isset($cart[$id])) {
            // tăng bằng đúng qty gửi lên
            $cart[$id]['qty'] += $qty;
        } else {
           $cart[$id] = [
                'id'       => $product->product_id,
                'name'     => $product->product_name,
                'price'    => (int) $product->product_price,
                'image'    => $product->product_img,
                'category' => $product->category->category_name ?? '', // ⭐ LẤY TÊN DANH MỤC
                'qty'      => $qty
            ];

        }

        $this->saveUserCart($cart);

        return $this->jsonCart();
    }

    // Cập nhật số lượng (increase/decrease). id là product_id
    public function update(Request $request, $id)
    {
        $action = $request->input('action');
        $cart = $this->getUserCart();

        if (!isset($cart[$id])) {
            return $this->jsonCart();
        }

        if ($action === 'increase') {
            $cart[$id]['qty']++;
        } elseif ($action === 'decrease') {
            $cart[$id]['qty']--;
            if ($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }
        } elseif ($request->has('qty')) {
            $new = max(0, (int) $request->input('qty'));
            if ($new <= 0) unset($cart[$id]); else $cart[$id]['qty'] = $new;
        }

        $this->saveUserCart($cart);

        return $this->jsonCart();
    }

    // Xóa sản phẩm (id = product_id)
    public function remove(Request $request, $id)
    {
        $cart = $this->getUserCart();
        if (isset($cart[$id])) unset($cart[$id]);
        $this->saveUserCart($cart);

        return $this->jsonCart();
    }

    // Helper trả chung JSON
    private function jsonCart()
    {
        $cart = $this->getUserCart();
        $count = array_sum(array_column($cart ?: [], 'qty')) ?: 0;
        $total = collect($cart)->sum(fn($i) => $i['price'] * $i['qty']);

        return response()->json([
            'cart'  => $cart,
            'count' => $count,
            'total' => $total
        ]);
    }
}
