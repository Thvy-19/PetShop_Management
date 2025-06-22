<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Quan hệ: mỗi cart item thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Quan hệ: mỗi cart item liên kết tới 1 sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
