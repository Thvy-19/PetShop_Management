<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Thêm dòng này nếu bạn dùng type hinting cho return type

class ShopController extends Controller
{
    /**
     * Display a listing of the shop items.
     */
    public function index(): View // Hoặc public function index()
    {
        return view('shop.index');
    }
}
    