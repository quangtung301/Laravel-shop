<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\User\LoginController;
use \App\Http\Controllers\Admin\MainController;

Route::get('admin/user/login',[LoginController::class,'index']);
Route::post('admin/user/login/store',[LoginController::class,'store']);


Route::get('admin',[MainController::class,'index'])-> name('admin');
Route::get('admin/main',[MainController::class,'index']);

#Menu
Route::prefix('admin/menus')->group(function (){
    Route::get('add',[\App\Http\Controllers\Admin\MenuController::class,'create']);
    Route::post('add',[\App\Http\Controllers\Admin\MenuController::class,'store']);
    Route::get('list',[\App\Http\Controllers\Admin\MenuController::class,'index']);
    Route::get('edit/{menu}',[\App\Http\Controllers\Admin\MenuController::class,'show']);
    Route::post('edit/{menu}',[\App\Http\Controllers\Admin\MenuController::class,'update']);
    Route::DELETE('destroy',[\App\Http\Controllers\Admin\MenuController::class,'destroy']);

});

#Product
Route::prefix('admin/products')->group(function () {
    Route::get('add', [\App\Http\Controllers\Admin\ProductController::class, 'create']);
    Route::post('add', [\App\Http\Controllers\Admin\ProductController::class, 'store']);
    Route::get('list', [\App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('edit/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'show']);
    Route::post('edit/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::DELETE('destroy', [\App\Http\Controllers\Admin\ProductController::class, 'destroy']);
});

#Sliders
Route::prefix('admin/sliders')->group(function () {
    Route::get('add', [\App\Http\Controllers\Admin\SliderController::class, 'create']);
    Route::post('add', [\App\Http\Controllers\Admin\SliderController::class, 'store']);
    Route::get('list', [\App\Http\Controllers\Admin\SliderController::class, 'index']);
    Route::get('edit/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'show']);
    Route::post('edit/{slider}', [\App\Http\Controllers\Admin\SliderController::class, 'update']);
    Route::DELETE('destroy', [\App\Http\Controllers\Admin\SliderController::class, 'destroy']);
});
#Cart
Route::get('admin/customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
Route::get('admin/customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
Route::post('admin/customers/edit/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'updateCartAdmin']);
Route::DELETE('destroy', [\App\Http\Controllers\Admin\CartController::class, 'destroy']);



#//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
#Upload
Route::post('admin/upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);


//send mail
Route::get('/send_mail', [App\Http\Controllers\CartController::class, 'send_mail']);


Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);



Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('cart', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('cart/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('cart', [App\Http\Controllers\CartController::class, 'addCart']);
