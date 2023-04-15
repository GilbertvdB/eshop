<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\OrderController;

use Illuminate\Support\Facades\Route;


Route::group(['prefix'  =>  'admin'], function () {

Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function () {
    // Admin dashboard route
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    // Settings Route
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

    // Categories Route
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('admin.categories.delete');
    });

    // Brands route
    Route::resource('brands', BrandController::class)->names('admin.brands');

    // Products Route
    Route::resource('products', ProductController::class)->names('admin.products');

    // Images Route
    Route::post('images/upload', [ProductImageController::class, 'upload'])->name('admin.products.images.upload');
    Route::get('images/{id}/delete', [ProductImageController::class, 'delete'])->name('admin.products.images.delete');

    // Order Manangement Route
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/{order}/show', [OrderController::class, 'show'])->name('admin.orders.show');

});

});