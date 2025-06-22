<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // ← ✅ Thêm dòng này

class UserController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get(); // Lấy danh sách sản phẩm
        return view('dashboard', compact('products')); // Truyền về view
    }
}
