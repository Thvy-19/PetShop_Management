<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProductManagementController; 
use App\Http\Controllers\Admin\OrderManagementController;  
use App\Http\Controllers\Admin\UserManagementController;  

// Route trang chủ hiển thị sản phẩm
Route::get('/', [ProductController::class, 'index'])->name('home');

// Route shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// Quản lý sản phẩm 
Route::resource('products', ProductController::class)->only(['index', 'show']);

// Quản lý giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Quản lý đơn hàng 
Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('order.processCheckout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () { 
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard'); 

    // Routes quản lý sản phẩm
    Route::get('/products', [ProductManagementController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductManagementController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductManagementController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductManagementController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductManagementController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductManagementController::class, 'destroy'])->name('products.destroy');

    // Routes quản lý đơn hàng
    Route::get('/orders', [OrderManagementController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderManagementController::class, 'show'])->name('orders.show');

    // Routes quản lý người dùng
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
});

