@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Danh sách đơn hàng</h1>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Mã đơn hàng</th>
                <th class="border p-2">Người đặt (user_id)</th>
                <th class="border p-2">Tổng tiền</th>
                <th class="border p-2">Trạng thái</th>
                <th class="border p-2">Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="text-center">
                    <td class="border p-2">{{ $loop->iteration }}</td>
                    <td class="border p-2">#{{ $order->id }}</td>
                    <td class="border p-2">{{ $order->user_id }}</td>
                    <td class="border p-2">{{ number_format($order->total, 0, ',', '.') }}₫</td>
                    <td class="border p-2">{{ ucfirst($order->status) }}</td>
                    <td class="border p-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
