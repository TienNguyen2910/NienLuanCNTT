<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
});


//Admin
Route::get('/admin',[AdminController::class,'index']);
Route::get('/dashboard',[AdminController::class,'show_dashboard']);

Route::get('/admin_register',[AdminController::class,'show_register']);
Route::post('/admin_register',[AdminController::class,'store_member']);
Route::post('/admin_login',[AdminController::class,'login']);
Route::get('/logout',[AdminController::class,'logout']);

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