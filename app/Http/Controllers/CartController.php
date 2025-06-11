<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session; 
use App\Models\Product; 

class CartController extends Controller
{
    /**
     * Display a listing of the cart items.
     */
    public function index(): View
    {
        $cart = Session::get('cart', []); 

        return view('cart.index', compact('cart')); 
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, string $id)
    {
        $product = Product::findOrFail($id); 

        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                // "image" => $product->image // Thêm ảnh
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    /**
     * Remove a product from the cart.
     */
    public function remove(string $id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
}
    