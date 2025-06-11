@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen -mt-16">
    <div class="bg-white rounded-lg shadow-xl p-8 md:p-10 lg:p-12 w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
        <div class="md:border-r md:pr-8 lg:pr-12">
            <h1 class="text-4xl font-extrabold text-indigo-700 mb-8 text-center md:text-left">Thanh toán</h1>
            
            <form action="{{ route('order.processCheckout') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Họ tên:</label>
                    <input type="text" id="name" name="name" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                           placeholder="Nhập họ tên của bạn">
                </div>
                <div>
                    <label for="phone" class="block text-lg font-medium text-gray-700 mb-2">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                           placeholder="Nhập số điện thoại của bạn">
                </div>
                <div>
                    <label for="address" class="block text-lg font-medium text-gray-700 mb-2">Địa chỉ nhận hàng:</label>
                    <textarea id="address" name="address" rows="4" required
                              class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-base"
                              placeholder="Nhập địa chỉ nhận hàng của bạn"></textarea>
                </div>
                
                <div class="pt-4">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300 shadow-lg transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                        Đặt hàng
                    </button>
                </div>
            </form>
        </div>
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center md:text-left">Đơn hàng của bạn</h2>
            @if(session('cart') && count(session('cart')) > 0)
                <ul class="space-y-4 mb-6 max-h-80 overflow-y-auto pr-2">
                    @php $totalOrder = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                        @php $itemSubtotal = $item['price'] * $item['quantity']; $totalOrder += $itemSubtotal; @endphp
                        <li class="flex justify-between items-center bg-gray-50 p-4 rounded-md shadow-sm">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $item['name'] }}</p>
                                <p class="text-sm text-gray-600">{{ number_format($item['price'], 0, ',', '.') }} VNĐ x {{ $item['quantity'] }}</p>
                            </div>
                            <span class="font-bold text-indigo-600">{{ number_format($itemSubtotal, 0, ',', '.') }} VNĐ</span>
                        </li>
                    @endforeach
                </ul>
                <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                    <span class="text-xl font-bold text-gray-900">Tổng cộng:</span>
                    <span class="text-2xl font-extrabold text-green-600">{{ number_format($totalOrder, 0, ',', '.') }} VNĐ</span>
                </div>
            @else
                <p class="text-gray-600 text-center md:text-left">Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi thanh toán.</p>
            @endif
        </div>
    </div>
</div>
@endsection
