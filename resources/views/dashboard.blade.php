<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cửa hàng thú cưng') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Thông báo đăng nhập, bạn có thể giữ hoặc xóa nó --}}
                    {{ __("Bạn đã đăng nhập!") }}

                    {{-- Bắt đầu nội dung từ shop.blade.php --}}
                    <h1 class="text-3xl font-bold mt-6 mb-4">Danh sách sản phẩm</h1>
                    <ul class="list-disc pl-5">
                        @forelse ($products as $product) {{-- Dùng @forelse để xử lý khi không có sản phẩm --}}
                            <li class="mb-2">
                                <span class="font-medium">{{ $product->name }}</span> - <span class="text-green-500">{{ number_format($product->price, 0, ',', '.') }} VND</span>
                            </li>
                        @empty
                            <li>Không có sản phẩm nào để hiển thị.</li>
                        @endforelse
                    </ul>
                    {{-- Kết thúc nội dung từ shop.blade.php --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
