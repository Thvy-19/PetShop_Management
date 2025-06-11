<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session; 

class OrderController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function checkout(): View
    {
        $cart = Session::get('cart', []);
        
        return view('order.checkout', compact('cart')); // Truyền biến $cart vào view
    }

    /**
     * Process the checkout.
     */
    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Đơn hàng của bạn đã được đặt thành công (phiên bản đơn giản)!');
    }
}
