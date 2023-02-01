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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('p', [ProductController::class, 'index'])->name("p");


Route::get('/',function(){
    return view('frontend.index');
});

Auth::routes();

Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);

// Route::get('/blog',function(){
//     return view('frontend.blog');
// });

Route::get('shop','Frontend\ProductController@shop')->name('shop');

Route::get('single-product/{product}','Frontend\ProductController@singleProduct');

Route::get('orders','Frontend\OrderController@index');
Route::post('orders/{product}','Frontend\OrderController@order');

// Route::get('order_lists','Frontend\OrderController@index')->name('order_lists');

// Route::get('shop',function(){
//     return view('frontend.shop');
// });



//Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
// Route::get('/products/image',[ProductController::class,'create'] );

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/products/index', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
