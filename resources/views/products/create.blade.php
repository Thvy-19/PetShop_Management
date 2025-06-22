<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Thêm sản phẩm') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <x-input-label for="name" value="Tên sản phẩm" />
                <x-text-input id="name" name="name" class="block w-full" required />

                <x-input-label for="price" value="Giá" />
                <x-text-input id="price" name="price" type="number" min="0" class="block w-full" required />

                <x-input-label for="quantity" value="Số lượng" />
                <x-text-input id="quantity" name="quantity" type="number" min="0" class="block w-full" required />

                <x-input-label for="description" value="Mô tả" />
                <textarea id="description" name="description" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>

                <x-input-label for="image" value="Ảnh sản phẩm" />
                <input type="file" name="image" class="block w-full text-gray-700 dark:text-white" />

                <x-primary-button>Thêm sản phẩm</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
