    @extends('layouts.admin')

    @section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Chi tiết đơn hàng #{{ $order->id }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-700 mb-3">Thông tin khách hàng</h2>
                <p><strong>Họ tên:</strong> {{ $order->customer_name }}</p>
                <p><strong>Điện thoại:</strong> {{ $order->customer_phone }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->customer_address }}</p>
                <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-700 mb-3">Thông tin đơn hàng</h2>
                <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Trạng thái:</strong> <span class="font-semibold text-green-600">{{ $order->status }}</span></p>
                <p><strong>Tổng tiền:</strong> <span class="font-bold text-lg text-indigo-600">{{ number_format($order->total_amount, 0, ',', '.') }} VNĐ</span></p>
            </div>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-3">Sản phẩm trong đơn hàng</h2>
        @if($order->orderItems->isEmpty())
            <p class="text-gray-600">Không có sản phẩm nào trong đơn hàng này.</p>
        @else
            <div class="overflow-x-auto mb-6">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Sản phẩm
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Giá
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Số lượng
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tổng phụ
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->product->name ?? 'Sản phẩm không rõ' }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ number_format($item->price, 0, ',', '.') }} VNĐ</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $item->quantity }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VNĐ</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="flex justify-end">
            <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Quay lại danh sách đơn hàng
            </a>
        </div>
    </div>
    @endsection
    