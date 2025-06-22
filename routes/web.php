<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\User\CheckoutController;

Route::get('/', function () {
    return redirect()->route('login');
});
//usercontroller
Route::get('/home', [UserController::class, 'index'])->name('user.home');

// Trang chủ hiển thị danh sách sản phẩm cho người dùng
Route::get('/shop', [ProductController::class, 'showToUser'])->name('shop');
// Mua sản phẩm
Route::get('/buy/{id}', [App\Http\Controllers\User\UserController::class, 'buy'])->name('user.buy');

Route::get('/checkout/{id}', [ProductController::class, 'checkout'])->name('checkout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/update/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
});
// Client route
Route::middleware(['auth', 'userMiddleware'])->group(function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');
});

//Admin Route
Route::middleware(['auth', 'adminMiddleware']) -> group(function(){
    Route::get('/admin/dashboard',[AdminController::class, 'index' ] ) ->name('admin.dashboard');
    Route::resource('products', ProductController::class);
});
