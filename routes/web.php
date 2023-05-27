<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/Ad', [App\Http\Controllers\AdminController::class, 'index'])->name('Ad');
    Route::get('/ContactaAd', [App\Http\Controllers\AdminController::class, 'contact'])->name('Admincontact');
    Route::post('/deleteContact', [App\Http\Controllers\AdminController::class,'deleteContact'])->name('deleteContact');
    Route::get('/post', [App\Http\Controllers\AdminController::class, 'post'])->name('post');
    Route::post('/storepost', [App\Http\Controllers\AdminController::class,'storepost'])->name('addpost');
    Route::post('/updatePost', [App\Http\Controllers\AdminController::class,'updatePost'])->name('post.update');
    Route::post('/deletePost', [App\Http\Controllers\AdminController::class,'deletePost'])->name('deletePost');
    Route::get('/prodact', [App\Http\Controllers\AdminController::class, 'prodact'])->name('prodact');
    Route::get('/order', [App\Http\Controllers\AdminController::class, 'order'])->name('order');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
    Route::post('/storeprodact', [App\Http\Controllers\AdminController::class,'storeproduct'])->name('addproduct');
    Route::post('/updateproduct', [App\Http\Controllers\AdminController::class,'updateproduct'])->name('updateproduct');
    Route::post('/deleteproduct', [App\Http\Controllers\AdminController::class,'deleteproduct'])->name('deleteprodact');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Contact', [App\Http\Controllers\HomeController::class, 'Contact'])->name('Contact');
Route::post('/Contact/store', [App\Http\Controllers\HomeController::class, 'store'])->name('contact_us.store');
Route::get('/Blog', [App\Http\Controllers\PostController::class, 'index'])->name('blog');
Route::get('/Blog-{id}', [App\Http\Controllers\PostController::class, 'show'])->name('single-blog');
Route::post('/comments', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/Prodact-{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('single-product');
Route::get('/Shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/Shop-{id}', [App\Http\Controllers\ShopController::class, 'filter'])->name('filter');
Route::post('/add-to-cart',[App\Http\Controllers\ShopController::class, 'addToCart']) ;
Route::get('/Cart', [App\Http\Controllers\ShopController::class, 'cart'])->name('cart');
Route::post('/stripepayment', [App\Http\Controllers\StripeController::class, 'processPayment'])->name('stripe.payment');



