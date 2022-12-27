<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//routegroup for the models tables.
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('product', ProductController::class);
});

//routes for Cart
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('cart/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

//routes for Wishlist
Route::get('wishlist', [WishListController::class, 'cartList'])->name('wishlist.list');
Route::post('wishlist', [WishListController::class, 'addToCart'])->name('wishlist.store');
Route::post('update-wishlist', [WishListController::class, 'updateCart'])->name('wishlist.update');
Route::post('remove', [WishListController::class, 'removeCart'])->name('wishlist.remove');
Route::post('clear', [WishListController::class, 'clearAllCart'])->name('wishlist.clear');


require __DIR__.'/auth.php';
