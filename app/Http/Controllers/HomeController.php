<?php
use App\Http\Controllers\HomeController; // Sẽ tạo controller này
use App\Http\Controllers\PetController; // Đã có, nhưng có thể dùng lại hoặc tạo controller riêng cho public

// --- Các route dành cho Người dùng công khai ---
Route::get('/', [HomeController::class, 'index'])->name('home'); // Trang chủ hiển thị thú cưng
Route::get('/pets/{pet}', [HomeController::class, 'showPet'])->name('public.pets.show'); // Chi tiết thú cưng

// Các route cho admin (đã có từ trước)
Route::middleware(['auth'])->group(function () { // Chỉ cho phép người dùng đã đăng nhập truy cập phần admin
    Route::resource('owners', OwnerController::class);
    Route::resource('pets', PetController::class); // Đây là PetController của Admin
});

// Các route của Laravel Breeze (đặt Breeze sau các route của mình để tránh ghi đè)
require __DIR__.'/auth.php';