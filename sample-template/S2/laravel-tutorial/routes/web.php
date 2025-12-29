<?php

use Illuminate\Support\Facades\Route;
Route::get('admin/them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'insert_form']);
Route::post('admin/xu-ly-them-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_insert']);
Route::get('admin/danh-sach-nguoi-dung',[\App\Http\Controllers\UserController::class, 'get_all']);
Route::get('admin/xoa-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'del']);
Route::get('admin/thong-tin-nguoi-dung/{id}',[\App\Http\Controllers\UserController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-nguoi-dung',[\App\Http\Controllers\UserController::class, 'action_update']);

//Sản phẩm
Route::get('admin/them-san-pham',[\App\Http\Controllers\ProductController::class, 'insert_form']);
Route::post('admin/xu-ly-them-san-pham',[\App\Http\Controllers\ProductController::class, 'action_insert']);
Route::get('admin/danh-sach-san-pham',[\App\Http\Controllers\ProductController::class, 'get_all']);
Route::get('admin/xoa-san-pham/{id}',[\App\Http\Controllers\ProductController::class, 'del']);
Route::get('admin/thong-tin-san-pham/{id}',[\App\Http\Controllers\ProductController::class, 'show']);
Route::post('admin/xu-ly-cap-nhat-san-pham',[\App\Http\Controllers\ProductController::class, 'action_update']);

Route::get('/', function () {
    return view('welcome');
});
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


