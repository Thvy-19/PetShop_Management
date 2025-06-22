<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chỉnh sửa sản phẩm') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- Tên --}}
                <x-input-label for="name" value="Tên sản phẩm" />
                <x-text-input id="name" name="name" class="block w-full" value="{{ old('name', $product->name) }}" required />

                {{-- Giá --}}
                <x-input-label for="price" value="Giá" />
                <x-text-input id="price" name="price" type="number" min="0" class="block w-full" value="{{ old('price', $product->price) }}" required />

                {{-- Số lượng --}}
                <x-input-label for="quantity" value="Số lượng" />
                <x-text-input id="quantity" name="quantity" type="number" min="0" class="block w-full" value="{{ old('quantity', $product->quantity) }}" required />

                {{-- Mô tả --}}
                <x-input-label for="description" value="Mô tả" />
                <textarea id="description" name="description" rows="4" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">{{ old('description', $product->description) }}</textarea>

                {{-- Ảnh hiện tại --}}
                @if ($product->image)
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Ảnh hiện tại:</label>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh sản phẩm" class="h-24 w-24 object-cover rounded">
                    </div>
                @endif

                {{-- Ảnh mới --}}
                <x-input-label for="image" value="Cập nhật ảnh (nếu có)" />
                <input type="file" name="image" id="image" class="block w-full text-gray-700 dark:text-white" />

                <div class="flex justify-end">
                    <x-primary-button>Cập nhật sản phẩm</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
