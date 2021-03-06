<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
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
//     return view('welcome');
// });

//trang chu

Route::get('/',[HomeController::class,'index']);
Route::get('/sort-low-to-high',[HomeController::class,'sort_low_to_high']);
Route::get('/sort-high-to-low',[HomeController::class,'sort_high_to_low']);
Route::get('/client-product-detail/{product_id}',[HomeController::class,'product_detail']);
Route::get('/search-product-brands/{brand_id}',[HomeController::class,'search_product_brand']);
Route::post('/search-product',[HomeController::class,'search_product']);
Route::get('new-product',[HomeController::class,'new_product']);
Route::get('best-sell',[HomeController::class,'best_sell']);

//Client
Route::get('/register-client',[ClientController::class,'register']);
Route::get('/login-client',[ClientController::class,'login']);
Route::post('/register-client',[ClientController::class,'store_client']);
Route::post('/login',[ClientController::class,'handle_login']);
Route::get('/logout-client',[ClientController::class,'logout']);

Route::get('/login-facebook',[ClientController::class,'login_facebook']);
Route::get('/facebook/callback',[ClientController::class,'callback_facebook']);

//Cart
Route::post('add-quatity/{product_id}',[CartController::class,'store_cart']);
Route::get('list-items',[CartController::class,'list_item']);
Route::get('minus-quantity/{cart_id}',[CartController::class,'minus_quantity']);
Route::get('plus-quantity/{cart_id}',[CartController::class,'plus_quantity']);
Route::get('delete-cart/{cart_id}',[CartController::class,'delete_cart']);

//Order
Route::post('order-item',[OrderController::class,'order']);
Route::post('purchase/{product_id}',[OrderController::class,'purchase']);
Route::post('/checkout',[OrderController::class,'checkout']);
Route::get('purchase-history',[OrderController::class,'purchase_history']);
Route::get('confirm-order/{order_id}',[OrderController::class,'confirm_order']);
Route::get('delete-order/{order_id}',[OrderController::class,'delete_order']);

//Admin
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);

Route::get('/admin_register',[AdminController::class,'show_register']);
Route::post('/admin_register',[AdminController::class,'store_member']);
Route::post('/admin_login',[AdminController::class,'login']);
Route::get('/logout',[AdminController::class,'logout']);
Route::get('revenue',[AdminController::class,'revenue']);
Route::get('/filter-by-date',[AdminController::class,'filter_by_date']);

// Brand Product
Route::get('/brand-product',[BrandProductController::class,'brand']); //list catagory product
Route::get('/add-brand-product',[BrandProductController::class,'add_brand']);
Route::post('/store-brand',[BrandProductController::class,'store_brand']);

Route::get('/edit-brand/{brand_id}',[BrandProductController::class,'edit_brand']);
Route::post('/edit-brand/{brand_id}',[BrandProductController::class,'update_brand']);
Route::get('/delete-brand/{brand_id}',[BrandProductController::class,'delete_brand']);

// Product
Route::get('/product',[ProductController::class,'product']); //list product
Route::get('/add-product',[ProductController::class,'add_product']);
Route::post('/store-product',[ProductController::class,'store_product']);
Route::get('/product-detail/{pro_id}',[ProductController::class,'product_detail']);
Route::post('/product-detail/{pro_id}',[ProductController::class,'store_prodetail']);

Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::post('/edit-product/{product_id}',[ProductController::class,'update_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);

// Admin Manage Order
Route::get('manage-order',[AdminOrderController::class,'manage_order']);
Route::get('cancel-order/{order_id}',[AdminOrderController::class,'cancel_order']);
Route::get('detail-order/{order_id}',[AdminOrderController::class,'detail_order']);
Route::post('inspect-order/{order_id}',[AdminOrderController::class,'inspect_order']);