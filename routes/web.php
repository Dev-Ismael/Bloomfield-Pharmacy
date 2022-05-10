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
=========== Route Pattern ======================================================
===========================================================================*/\
Route::pattern('num', '[0-9]+');



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
// Category                            
Route::get('/category', [App\Http\Controllers\Web\CategoryController::class, 'index'])->name('category');
// order_prescription                            
Route::get('/order_prescription', [App\Http\Controllers\Web\PrescriptionController::class, 'order_prescription'])->name('order_prescription');


Route::group([  'middleware'=> 'auth'  ] , function(){

    // Profile                            
    Route::get('/profile', [App\Http\Controllers\Web\ProfileController::class, 'index'])->name('profile');
    // Orders                            
    Route::get('/orders', [App\Http\Controllers\Web\OrderController::class, 'index'])->name('orders');
    // wishlist                            
    Route::get('/wishlist', [App\Http\Controllers\Web\WishlistController::class, 'index'])->name('wishlist');
    // prescriptions                            
    Route::get('/prescriptions', [App\Http\Controllers\Web\PrescriptionController::class, 'index'])->name('prescriptions');
    // Cart                            
    Route::get('/cart', [App\Http\Controllers\Web\CartController::class, 'index'])->name('cart');

});



/*===========================================================================
========== Admin Routes =====================================================
===========================================================================*/

Route::group([ "prefix" => "admin" , 'middleware'=> 'admin' , "as" => "admin." ] , function(){

    // Dashboard
    Route::get('/dashboard' , [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::get('users/perPage/{num}',[App\Http\Controllers\Admin\UserController::class, 'perPage'])->name("users.perPage");
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

});

