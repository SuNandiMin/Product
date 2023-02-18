<?php

use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('frontend.index');
});

Auth::routes();

Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);

Route::get('shop','Frontend\ProductController@shop')->name('shop');

Route::get('orders','Frontend\OrderController@index')->name('orders');
Route::get('single-product/{product}','Frontend\OrderController@create');
Route::post('orders/{product}','Frontend\OrderController@order');
Route::delete('orders/{order}','Frontend\OrderController@destroy');

Route::get('order-items/{id}','Frontend\OrderController@showOrderItem');

Route::get('cartOrder','Frontend\OrderController@cartOrder')->name('cartOrder');

Route::get('cart','Frontend\ProductController@cart')->name('cart');
Route::get('add-to-cart/{id}','Frontend\ProductController@addToCart')->name('add.to.cart');
Route::get('updateQty','Frontend\ProductController@cartUpdate');
Route::get('remove-cart/{id}','Frontend\ProductController@cartRemove')->name('remove.cart');
// Route::post('cart/{product}','Frontend\OrderController@cart');
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
