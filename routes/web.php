<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProductController;

// Trang gốc → chuyển đến login
Route::get('/', function () {
    return redirect()->route('login');
});

// Các route không cần phân quyền
Route::get('/shop', [ProductController::class, 'showToUser'])->name('shop');
Route::get('/buy/{id}', [UserController::class, 'buy'])->name('user.buy');
Route::get('/checkout/{id}', [ProductController::class, 'checkout'])->name('checkout');

// Route yêu cầu xác thực
Route::middleware(['auth'])->group(function () {
    // Hồ sơ cá nhân
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Người dùng thường (User)
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('user.home');
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

// Quản trị viên (Admin)
Route::middleware(['auth', 'adminMiddleware'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);

    // Quản lý sản phẩm
    Route::resource('/products', ProductController::class);

    // Quản lý đơn hàng
    Route::resource('/orders', OrderController::class); 

    //
    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
});
require __DIR__.'/auth.php';
