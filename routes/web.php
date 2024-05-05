<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Frontend
Route::get('/', [HomeController::class,'index']);
Route::get('/trang-chu', [HomeController::class,'index']);
Route::post('/tim-kiem', [HomeController::class,'search']);
Route::get('/show-customer', [CheckoutController::class,'show_customer']);
Route::post('/update-customer/{customer_id}', [CheckoutController::class,'update_customer']);


//Danh muc san pham trang chu
Route::get('/danh_muc_sp/{category_id}', [CategoryProduct::class,'show_category_home']);
Route::get('/chi_tiet_sp/{product_id}', [ProductController::class,'details_product']);





//Backend
Route::get('/admin', [AdminController::class,'index']);
Route::get('/dashboard', [AdminController::class,'show_dashboard']);
Route::get('/logout', [AdminController::class,'logout']);
Route::post('/admin-dashboard', [AdminController::class,'dashboard']);
Route::get('/login',[AdminController::class,'index']);

//Category-product
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']);
Route::get('/edit-category-product/{category_id}',[CategoryProduct::class,'edit_category_product']);
Route::get('/delete-category-product/{category_id}',[CategoryProduct::class,'delete_category_product']);

Route::post('/save-category-product',[CategoryProduct::class,'save_category_product']);
Route::post('/update-category-product/{category_id}',[CategoryProduct::class,'update_category_product']);

//Product
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/all-product',[ProductController::class,'all_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);

Route::post('/save-product',[ProductController::class,'save_product']);
Route::post('/update-product/{product_id}',[ProductController::class,'update_product']);

Route::get('/on-product/{product_id}',[ProductController::class,'on_product']);
Route::get('/off-product/{product_id}',[ProductController::class,'off_product']);

//card
Route::post('/save-cart',[CartController::class,'save_cart']);
Route::post('/update-qty-cart',[CartController::class,'update_qty_cart']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/delete-cart/{rowId}',[CartController::class,'delete_cart']);

//Checkout
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::post('/login-customer',[CheckoutController::class,'login_customer']);
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);
Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::post('/save-checkout',[CheckoutController::class,'save_checkout']);
Route::get('/payment',[CheckoutController::class,'payment']);
Route::post('/order-place',[CheckoutController::class,'order_place']);

//Order
Route::get('/manager-order',[CheckoutController::class,'manager_order']);
Route::get('/view-order/{order_id}',[CheckoutController::class,'view_order']);
Route::get('/delete-order/{order_id}',[CheckoutController::class,'delete_order']);

//Counpon
Route::post('/check-discount',[CheckoutController::class,'check_discount']);
Route::get('/insert-counpon',[CounponController::class,'insert_counpon']);
Route::get('/list-counpon',[CounponController::class,'list_counpon']);
Route::post('/insert-counpon-code',[CounponController::class,'insert_counpon_code']);
Route::get('/edit-counpon/{counpon_id}',[CounponController::class,'edit_counpon']);
Route::post('/update-counpon/{counpon_id}',[CounponController::class,'update_counpon']);
Route::get('/delete-counpon/{counpon_id}',[CounponController::class,'delete_counpon']);
Route::get('/unset-counpon',[CounponController::class,'unset_counpon']);




