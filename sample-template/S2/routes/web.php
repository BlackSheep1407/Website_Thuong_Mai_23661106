<?php

use Illuminate\Support\Facades\Route;
Route::get('/',[\App\Http\Controllers\ProductController::class, 'get_all']);
Route::get('/danh-sach-san-pham',[\App\Http\Controllers\ProductController::class, 'get_all']);
Route::get('/them-gio-hang/{id}',[\App\Http\Controllers\CartController::class, 'add_cart']);
Route::get('/gio-hang',[\App\Http\Controllers\CartController::class, 'cart']);
Route::post('/cap-nhat-gio-hang',[\App\Http\Controllers\CartController::class, 'update_cart']);
Route::get('/thanh-toan',[\App\Http\Controllers\CartController::class, 'order']);
Route::get('/xoa-gio-hang/{id}',[\App\Http\Controllers\CartController::class, 'del_cart']);

Route::get('dang-nhap',[\App\Http\Controllers\UserController::class, 'login']);
Route::post('xu-ly-dang-nhap',[\App\Http\Controllers\UserController::class, 'action_login']);
Route::get('thoat',[\App\Http\Controllers\UserController::class, 'logout']);


Route::get('admin/them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'insert_form']);
Route::post('admin/xu-ly-them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_insert']);
Route::get('admin/danh-sach-nguoi-dung',[\App\Http\Controllers\UserController::class, 'get_all']);
Route::get('admin/xoa-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'del']);
Route::get('admin/thong-tin-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_update']);

//Sản phẩm
Route::get('admin/them-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'insert_form']);
Route::post('admin/xu-ly-them-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'action_insert']);
Route::get('admin/danh-sach-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'get_all']);
Route::get('admin/xoa-san-pham/{id}',[\App\Http\Controllers\admin\ProductController::class, 'del']);
Route::get('admin/thong-tin-san-pham/{id}',[\App\Http\Controllers\admin\ProductController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-san-pham',[\App\Http\Controllers\admin\ProductController::class, 'action_update']);
//Don hang
Route::get('admin/danh-sach-don-hang',[\App\Http\Controllers\admin\OrderController::class, 'get_all']);


Route::get('admin/dang-nhap',[\App\Http\Controllers\admin\UserController::class, 'login']);
Route::post('admin/xu-ly-dang-nhap',[\App\Http\Controllers\admin\UserController::class, 'action_login']);
Route::get('admin/thoat',[\App\Http\Controllers\admin\UserController::class, 'logout']);

Route::get('home', function () {
    return view('home',['title' => 'HCE', 'body' => 'Body']);
});
Route::prefix('greeting')->group(function () {

	// work for: /greeting/vn
    Route::get('vn', function () {
        return "Xin chào!";
    });

    // work for: /greeting/en
    Route::get('en', function () {
        return "Hello!";
    });

    // work for: /greeting/cn
    Route::get('cn', function () {
        return "你好!";
    });
});
Route::get('user/{id}/comment/{commentId}', function ($id, $commentId) {
    return "User id: $id and comment id: $commentId";
});
Route::get('laydulieu', function () {
    $data = DB::table('user')->get();
    print_r($data);
});


