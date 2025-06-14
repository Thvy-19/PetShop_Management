<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; 
use App\Models\Product; 

class ProductManagementController extends Controller
{
    public function index(): View
    {
        try {
            $products = Product::all(); 
            return view('admin.products.index', compact('products'));
        } catch (\Exception $e) {
            \Log::error("Error in ProductManagementController@index: " . $e->getMessage());
            if (env('APP_DEBUG')) {
                dd($e->getMessage()); 
            }
            return view('admin.error_page')->with('message', 'Có lỗi xảy ra khi tải sản phẩm.'); 
        }
    }
    public function create(): View
    {
        return view('admin.products.create');
    }
    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, Product $product): RedirectResponse
    {
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}
    