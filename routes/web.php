<?php

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



/*===========================================================================
=========== Auth Routes ======================================================
===========================================================================*/
Auth::routes();
// Custom Routes
Route::post("/register" , [App\Http\Controllers\Auth\CustomAuthController::class , "register"])->name('register');
Route::post("/login" , [App\Http\Controllers\Auth\CustomAuthController::class , "login"])->name('login');





/*===========================================================================
=========== Web Routes ======================================================
===========================================================================*/
// Home                           
Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
// About Us                           
Route::get('/about', [App\Http\Controllers\Web\AboutController::class, 'index'])->name('about');
// Contact Us                           
Route::get('/contact', [App\Http\Controllers\Web\ContactController::class, 'index'])->name('contact');
// SHIPPING & DELIVERY                           
Route::get('/shipping', [App\Http\Controllers\Web\ShippingController::class, 'index'])->name('shipping');
// RETURNS & EXCHANGE                            
Route::get('/returns', [App\Http\Controllers\Web\ReturnsController::class, 'index'])->name('returns');
// Privacy                            
Route::get('/privacy', [App\Http\Controllers\Web\PrivacyController::class, 'index'])->name('privacy');
// Search                            
Route::get('/search', [App\Http\Controllers\Web\SearchController::class, 'index'])->name('search');
// Product                            
Route::get('/product', [App\Http\Controllers\Web\ProductController::class, 'index'])->name('product');
// Cart                            
Route::get('/cart', [App\Http\Controllers\Web\CartController::class, 'index'])->name('cart');
// wishlist                            
Route::get('/wishlist', [App\Http\Controllers\Web\WishlistController::class, 'index'])->name('wishlist');
// Category                            
Route::get('/category', [App\Http\Controllers\Web\CategoryController::class, 'index'])->name('category');
// Orders                            
Route::get('/orders', [App\Http\Controllers\Web\OrderController::class, 'index'])->name('orders');
// Profile                            
Route::get('/profile', [App\Http\Controllers\Web\ProfileController::class, 'index'])->name('profile');
// order_prescription                            
Route::get('/order_prescription', [App\Http\Controllers\Web\PrescriptionController::class, 'order_prescription'])->name('order_prescription');
// prescriptions                            
Route::get('/prescriptions', [App\Http\Controllers\Web\PrescriptionController::class, 'index'])->name('prescriptions');




/*===========================================================================
========== Admin Routes =====================================================
===========================================================================*/

Route::group([ "prefix" => "admin" ,  'namespace'=> 'App\Http\Controllers\Admin' , "as" => "admin." ] , function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

});

