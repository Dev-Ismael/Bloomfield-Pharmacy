<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
===========================================================================*/
Route::pattern('num', '[0-9]+');
Route::pattern('id', '[0-9]+');



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
Route::post('/search', [App\Http\Controllers\Web\SearchController::class, 'search'])->name('search');
Route::post('/search/hasOffer', [App\Http\Controllers\Web\SearchController::class, 'search'])->name('search');

// Product
Route::get('/product/{slug}', [App\Http\Controllers\Web\ProductController::class, 'index'])->name('product');

// Category
Route::get('/category/{categorySlug}/{subCategorySlug}', [App\Http\Controllers\Web\CategoryController::class, 'index'])->name('category');

// offeredProducts
Route::get('/offered_products', [App\Http\Controllers\Web\OfferedProductsController::class, 'index'])->name('offered_products');

Route::group([ 'middleware'=> 'auth'  ] , function(){

    // order_prescription
    Route::get('/order_prescription', [App\Http\Controllers\Web\PrescriptionController::class, 'order_prescription'])->name('order_prescription');
    // upload_prescription
    Route::post('/upload_prescription', [App\Http\Controllers\Web\PrescriptionController::class, 'upload_prescription'])->name('upload_prescription');
    // delete_prescription
    Route::post('/delete_prescription/{id}', [App\Http\Controllers\Web\PrescriptionController::class, 'delete_prescription'])->name('delete_prescription');
    // start_prescription_schedule
    Route::post('/start_prescription_schedule/{id}', [App\Http\Controllers\Web\PrescriptionController::class, 'start_prescription_schedule'])->name('start_prescription_schedule');
    // stop_prescription_schedule
    Route::post('/stop_prescription_schedule/{id}', [App\Http\Controllers\Web\PrescriptionController::class, 'stop_prescription_schedule'])->name('stop_prescription_schedule');
    // create_prescription_orders
    Route::post('/create_prescription_orders/{id}', [App\Http\Controllers\Web\PrescriptionController::class, 'create_prescription_orders'])->name('create_prescription_orders');
    // prescriptions
    Route::get('/prescriptions', [App\Http\Controllers\Web\PrescriptionController::class, 'index'])->name('prescriptions');


    // wishlists
    Route::get('/wishlist', [App\Http\Controllers\Web\WishlistController::class, 'index'])->name('wishlist');
    // add wishlist
    Route::post('/add_wishlist/{id}', [App\Http\Controllers\Web\WishlistController::class, 'add_wishlist'])->name('add_wishlist');
    // remove wishlist
    Route::post('/remove_wishlist/{id}', [App\Http\Controllers\Web\WishlistController::class, 'remove_wishlist'])->name('remove_wishlist');

    // Carts
    Route::get('/cart', [App\Http\Controllers\Web\CartController::class, 'index'])->name('cart');
    // add cart
    Route::post('/add_cart/{id}', [App\Http\Controllers\Web\CartController::class, 'add_cart'])->name('add_cart');
    // remove cart
    Route::post('/remove_cart/{id}', [App\Http\Controllers\Web\CartController::class, 'remove_cart'])->name('remove_cart');


    // Profile
    Route::get('/profile', [App\Http\Controllers\Web\ProfileController::class, 'index'])->name('profile');
    // Update Profile
    Route::post('/update_profile', [App\Http\Controllers\Web\ProfileController::class, 'update_profile'])->name('update_profile');


    // Orders
    Route::get('/orders', [App\Http\Controllers\Web\OrderController::class, 'index'])->name('orders');
    // Create Order
    Route::post('/create_order', [App\Http\Controllers\Web\OrderController::class, 'create_order'])->name('create_order');

});



/*===========================================================================
========== Admin Routes =====================================================
===========================================================================*/

Route::group([ "prefix" => "admin" , 'middleware'=> 'admin' , "as" => "admin." ] , function(){

    // Dashboard
    Route::get('/dashboard' , [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


    // Users
    Route::get('users/perPage/{num}' , [App\Http\Controllers\Admin\UserController::class, 'perPage'])->name("users.perPage");
    Route::post('users/search' , [App\Http\Controllers\Admin\UserController::class, 'search'])->name("users.search");
    Route::post('users/multiAction' , [App\Http\Controllers\Admin\UserController::class, 'multiAction'])->name("users.multiAction");
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::get('users/destroy/{id}' , [App\Http\Controllers\Admin\UserController::class, 'destroy'] )->name("users.destroy");



    // Categories
    Route::get('categories/perPage/{num}' , [App\Http\Controllers\Admin\CategoryController::class, 'perPage'])->name("categories.perPage");
    Route::post('categories/search' , [App\Http\Controllers\Admin\CategoryController::class, 'search'])->name("categories.search");
    Route::post('categories/multiAction' , [App\Http\Controllers\Admin\CategoryController::class, 'multiAction'])->name("categories.multiAction");
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::get('categories/destroy/{id}' , [App\Http\Controllers\Admin\CategoryController::class, 'destroy'] )->name("categories.destroy");



    // SubCategories
    Route::get('subcategories/perPage/{num}' , [App\Http\Controllers\Admin\SubcategoryController::class, 'perPage'])->name("subcategories.perPage");
    Route::post('subcategories/search' , [App\Http\Controllers\Admin\SubcategoryController::class, 'search'])->name("subcategories.search");
    Route::post('subcategories/multiAction' , [App\Http\Controllers\Admin\SubcategoryController::class, 'multiAction'])->name("subcategories.multiAction");
    Route::resource('subcategories', App\Http\Controllers\Admin\SubcategoryController::class);
    Route::get('subcategories/destroy/{id}' , [App\Http\Controllers\Admin\SubcategoryController::class, 'destroy'] )->name("subcategories.destroy");



    // Products
    Route::get('products/perPage/{num}' , [App\Http\Controllers\Admin\ProductController::class, 'perPage'])->name("products.perPage");
    Route::post('products/search' , [App\Http\Controllers\Admin\ProductController::class, 'search'])->name("products.search");
    Route::post('products/multiAction' , [App\Http\Controllers\Admin\ProductController::class, 'multiAction'])->name("products.multiAction");
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::get('products/destroy/{id}' , [App\Http\Controllers\Admin\ProductController::class, 'destroy'] )->name("products.destroy");



    // Prescriptions
    Route::get('prescriptions/perPage/{num}' , [App\Http\Controllers\Admin\PrescriptionController::class, 'perPage'])->name("prescriptions.perPage");
    Route::post('prescriptions/search' , [App\Http\Controllers\Admin\PrescriptionController::class, 'search'])->name("prescriptions.search");
    Route::post('prescriptions/multiAction' , [App\Http\Controllers\Admin\PrescriptionController::class, 'multiAction'])->name("prescriptions.multiAction");
    Route::resource('prescriptions', App\Http\Controllers\Admin\PrescriptionController::class);
    Route::get('prescriptions/destroy/{id}' , [App\Http\Controllers\Admin\PrescriptionController::class, 'destroy'] )->name("prescriptions.destroy");



    // Orders
    Route::get('orders/perPage/{num}' , [App\Http\Controllers\Admin\OrderController::class, 'perPage'])->name("orders.perPage");
    Route::post('orders/search' , [App\Http\Controllers\Admin\OrderController::class, 'search'])->name("orders.search");
    Route::post('orders/multiAction' , [App\Http\Controllers\Admin\OrderController::class, 'multiAction'])->name("orders.multiAction");
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::get('orders/destroy/{id}' , [App\Http\Controllers\Admin\OrderController::class, 'destroy'] )->name("orders.destroy");


});

