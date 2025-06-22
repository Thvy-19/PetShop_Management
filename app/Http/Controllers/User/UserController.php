<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(10)->get();
        return view('user.home', compact('products'));
    }
    public function buy($id)
    {
        $product = Product::findOrFail($id);
        // Giả sử mặc định số lượng là 1 khi mua ngay
        $cart = [
            [
                'product' => $product,
                'quantity' => 1,
            ]
        ];
        // Tính tổng tiền
        $total = $product->price * 1;

        return view('user.checkout', compact('cart', 'total'));
    }
}
