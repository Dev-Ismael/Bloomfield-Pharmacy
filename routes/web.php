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

Auth::routes();



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
