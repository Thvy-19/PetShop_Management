@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow-md p-6">

<div class="flex justify-between items-center mb-6">

<h1 class="text-2xl font-bold text-gray-800">Quản lý sản phẩm</h1>

<a href="{{ route('admin.products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
Thêm sản phẩm mới
</a>

        </div>



        @if(session('success'))

            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">

                <span class="block sm:inline">{{ session('success') }}</span>

            </div>

        @endif



        @if($products->isEmpty())

            <p class="text-gray-600">Chưa có sản phẩm nào.</p>

        @else

            <div class="overflow-x-auto">

                <table class="min-w-full leading-normal">

                    <thead>

                        <tr>

                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                ID

                            </th>

                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                Ảnh

                            </th>

                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                Tên sản phẩm

                            </th>

                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                Giá

                            </th>

                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                                Tồn kho

                            </th>

                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100">

                                Hành động

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($products as $product)

                            <tr>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    <p class="text-gray-900 whitespace-no-wrap">{{ $product->id }}</p>

                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-md">

                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    <p class="text-gray-900 whitespace-no-wrap">{{ $product->name }}</p>

                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    <p class="text-gray-900 whitespace-no-wrap">{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>

                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    <p class="text-gray-900 whitespace-no-wrap">{{ $product->stock }}</p>

                                </td>

                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                    <div class="flex space-x-2">

                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Sửa</a>

                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?');">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="text-red-600 hover:text-red-900">Xóa</button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

    @endsection

    