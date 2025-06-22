<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // Các cột cho phép gán hàng loạt
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'category',
    ];
}
