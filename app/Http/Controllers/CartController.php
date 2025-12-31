<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\CartItemModel;
class CartController extends Controller
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

        // For guests or if no database cart, use session
        return session('cart', []);
    }

    private function saveUserCart($cartData)
    {
        $user = session('user');

        // If user is logged in, save to database
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
                $cart = CartModel::firstOrCreate(['user_id' => $userId]);

                // Get existing cart items
                $existingItems = CartItemModel::where('cart_id', $cart->id)
                    ->pluck('qty', 'product_id')
                    ->toArray();

                $currentProductIds = array_keys($cartData);

                // Update existing items or create new ones
                foreach ($cartData as $productId => $item) {
                    if (isset($existingItems[$productId])) {
                        // Update quantity if different
                        if ($existingItems[$productId] != $item['qty']) {
                            CartItemModel::where('cart_id', $cart->id)
                                ->where('product_id', $productId)
                                ->update(['qty' => $item['qty']]);
                        }
                    } else {
                        // Create new item
                        CartItemModel::create([
                            'cart_id' => $cart->id,
                            'product_id' => $productId,
                            'qty' => $item['qty']
                        ]);
                    }
                }

                // Remove items that are no longer in cart
                $itemsToRemove = array_diff(array_keys($existingItems), $currentProductIds);
                if (!empty($itemsToRemove)) {
                    CartItemModel::where('cart_id', $cart->id)
                        ->whereIn('product_id', $itemsToRemove)
                        ->delete();
                }

                return;
            }
        }

        // For guests, save to session
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
