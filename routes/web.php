<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;

// Route trang chủ hiển thị sản phẩm
Route::get('/', [ProductController::class, 'index'])->name('home');

// Route shop 
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// Route quản lý admin
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Quản lý sản phẩm
Route::resource('products', ProductController::class)->only(['index', 'show']);

// Quản lý giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Quản lý đơn hàng
Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('order.processCheckout');
 
//Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});