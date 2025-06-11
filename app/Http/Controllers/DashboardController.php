<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the user's dashboard with products.
     */
    public function index(): View 
    {
        $products = Product::all(); 
        return view('dashboard', compact('products')); 
    }
}
