<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID của đơn hàng
            $table->string('customer_name'); // Tên khách hàng
            $table->string('customer_phone'); // Số điện thoại
            $table->string('customer_address'); // Địa chỉ giao hàng
            $table->decimal('total_price', 15, 2); // Tổng giá trị đơn hàng
            $table->string('status')->default('pending'); // Trạng thái đơn hàng: pending, completed, canceled
            $table->timestamps(); // Tự động tạo created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Xóa bảng khi rollback
        Schema::dropIfExists('orders');
    }
};
