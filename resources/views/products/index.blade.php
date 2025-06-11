@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Danh sách sản phẩm</h1>
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
    @forelse($products as $product)
        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
            
            <img src="{{ asset($product->image) }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-48 object-cover">
            
            <div class="p-5">
                <h3 class="text-xl font-semibold text-indigo-700 mb-2">
                    <a href="{{ route('products.show', $product->id) }}" class="hover:underline">{{ $product->name }}</a>
                </h3>
                <p class="text-gray-700 text-lg font-bold mb-1">Giá: {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
                <p class="text-gray-600 text-sm">Số lượng: {{ $product->stock }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                        Thêm vào giỏ
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-600 col-span-full">Không có sản phẩm nào để hiển thị.</p>
    @endforelse
</div>
@endsection
