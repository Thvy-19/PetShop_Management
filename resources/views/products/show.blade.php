@extends('layouts.app')

@section('content')
<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Giá: {{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
<p>Còn lại: {{ $product->stock }}</p>

<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <label>Số lượng:</label>
    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}">
    <button type="submit">Thêm vào giỏ hàng</button>
</form>
@endsection
