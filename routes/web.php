<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Trang gốc → chuyển đến login
Route::get('/', function () {
    return redirect()->route('login');
});

// Người dùng (User)
Route::get('/home', [UserController::class, 'index'])->name('user.home');
Route::get('/shop', [ProductController::class, 'showToUser'])->name('shop');
Route::get('/buy/{id}', [UserController::class, 'buy'])->name('user.buy');
Route::get('/checkout/{id}', [ProductController::class, 'checkout'])->name('checkout');

// Các route yêu cầu xác thực chung
Route::middleware(['auth'])->group(function () {
    // Hồ sơ cá nhân
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Người dùng thường
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

// Quản trị viên
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
});

// Import các route từ Laravel Breeze/Fortify (login, register, logout, forgot password, etc.)
require __DIR__.'/auth.php';
