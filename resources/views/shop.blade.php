<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng thú cưng</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->price }} VND</li>
        @endforeach
    </ul>
</body>
</html>
