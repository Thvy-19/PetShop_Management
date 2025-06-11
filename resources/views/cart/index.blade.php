@extends('layouts.app')

@section('content')
<h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Giỏ hàng của bạn</h1>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if(!$cart || count($cart) == 0)
    <div class="bg-white rounded-lg shadow-md p-8 text-center">
        <p class="text-gray-600 text-lg">Giỏ hàng của bạn đang trống.</p>
        <a href="{{ url('/') }}" class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            Tiếp tục mua sắm
        </a>
    </div>
@else
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Sản phẩm
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Số lượng
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Giá
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tổng
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $id => $product)
                    @php $subtotal = $product['price'] * $product['quantity']; @endphp
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $product['name'] }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $product['quantity'] }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ number_format($product['price'], 0, ',', '.') }} VNĐ</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                            <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded-lg text-xs transition duration-300">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php $total += $subtotal; @endphp
                @endforeach
                <tr>
                    <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-right text-lg font-semibold text-gray-900"><strong>Tổng cộng</strong></td>
                    <td colspan="2" class="px-5 py-5 border-b border-gray-200 bg-white text-left text-lg font-bold text-indigo-700"><strong>{{ number_format($total, 0, ',', '.') }} VNĐ</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="text-center">
        <a href="{{ route('order.checkout') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300 shadow-md hover:shadow-lg">
            Tiến hành thanh toán
        </a>
    </div>
@endif
@endsection
