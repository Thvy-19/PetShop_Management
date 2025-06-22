<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quản lý sản phẩm') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('products.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Thêm sản phẩm
            </a>

            <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-4">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Ảnh</th>
                            <th class="border px-4 py-2">Tên</th>
                            <th class="border px-4 py-2">Giá</th>
                            <th class="border px-4 py-2">SL</th>
                            <th class="border px-4 py-2">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100">
                        @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="h-16 w-16 object-cover rounded">
                                    @endif
                                </td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ number_format($product->price) }} đ</td>
                                <td class="border px-4 py-2">{{ $product->quantity }}</td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">Sửa</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Xác nhận xoá?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline" type="submit">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
