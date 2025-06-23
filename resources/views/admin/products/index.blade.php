@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Danh sách sản phẩm</h1>

    <table class="w-full table-auto border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Tên sản phẩm</th>
                <th class="border p-2">Giá</th>
                <th class="border p-2">Số lượng</th>
                <th class="border p-2">Danh mục</th>
                <th class="border p-2">Hình ảnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="text-center">
                    <td class="border p-2">{{ $loop->iteration }}</td>
                    <td class="border p-2">{{ $product->name }}</td>
                    <td class="border p-2">{{ number_format($product->price, 0, ',', '.') }}₫</td>
                    <td class="border p-2">{{ $product->quantity }}</td>
                    <td class="border p-2">{{ $product->category }}</td>
                    <td class="border p-2">
                        <img src="{{ asset('images/' . $product->image) }}" alt="" class="h-12 mx-auto">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
