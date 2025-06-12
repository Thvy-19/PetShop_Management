<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // ID của chi tiết đơn hàng
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Liên kết với bảng orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Liên kết với bảng products
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 15, 2); // Giá mỗi sản phẩm tại thời điểm đặt hàng
            $table->timestamps(); // Tự động tạo created_at, updated_at
        });
    }
    public function down(): void
    {
        //Xóa bảng khi rollback
        Schema::dropIfExists('order_items');
    }
};
