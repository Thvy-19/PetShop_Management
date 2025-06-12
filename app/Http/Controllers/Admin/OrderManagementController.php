<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection; 

class OrderManagementController extends Controller
{
    /**
     * Display a listing of the orders for admin.
     */
    public function index(): View
    {
        $orders = Collection::make([]);                                                                   
        return view('admin.orders.index', compact('orders'));
    }
}
