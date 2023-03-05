<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\GenerateGuestSessionMiddleware;

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

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('product.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//routegroup for the product models tables. Public routes
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');

//non public routes for the product models tables.
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('product', ProductController::class)->except(['index', 'show']);
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

//routes for checkout
Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
    Route::get('checkout/payment/complete', [CheckoutController::class, 'complete'])->name('checkout.payment.complete');
    // Route::view('/checkout/success', 'checkout.success')->name('success');
});

//routes for Review
Route::get('review', [ReviewController::class, 'index'])->name('review.index');
Route::post('review', [ReviewController::class, 'store'])->name('review.store');

//routes for orders
Route::get('account/orders', [AccountController::class, 'getOrders'])->name('account.orders');

//admin routes
require 'admin.php';

require __DIR__.'/auth.php';
