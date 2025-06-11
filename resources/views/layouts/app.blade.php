<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng thú cưng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased min-h-screen flex flex-col">
    <header class="bg-gradient-to-r from-indigo-700 to-blue-600 shadow-xl py-4">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center space-x-2 text-white text-3xl font-extrabold tracking-tight transform hover:scale-105 transition-transform duration-300 rounded-lg p-2">
                {{-- Logo SVG --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182A.75.75 0 0 1 12 21h-2.25m.94-3.636c.59-2.182.833-4.37.643-6.57-.156-1.806-.114-3.57.367-5.337A2.25 2.25 0 0 1 16.5 2.25c2.278 0 4.241 1.03 5.378 2.684C21.75 6.208 22.5 8.22 22.5 10.25c0 2.278-.75 4.241-2.392 5.378-1.642 1.137-3.654 1.887-5.676 1.887H12m0-17.55c.994 0 1.953.111 2.871.314V10.5m0 0a2.25 2.25 0 0 0 2.25 2.25M12 10.5a2.25 2.25 0 0 1-2.25 2.25m3.75-5.666V10.5m0 0a2.25 2.25 0 0 0-2.25 2.25c-2.278 0-4.241 1.03-5.378 2.684C1.5 6.208.75 8.22.75 10.25c0 2.278.75 4.241 2.392 5.378 1.137 3.654 1.887 5.676 1.887H12" />
                </svg>
                <span>PET SHOP</span>
            </a>
            <nav class="space-x-6">
                <a href="{{ url('/') }}" class="text-white text-lg font-medium hover:text-blue-100 transition duration-300 px-4 py-2 rounded-lg hover:bg-blue-700/30">Trang chủ</a>
                <a href="{{ route('cart.index') }}" class="text-white text-lg font-medium hover:text-blue-100 transition duration-300 px-4 py-2 rounded-lg hover:bg-blue-700/30">Giỏ hàng</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="text-white text-lg font-medium hover:text-blue-100 transition duration-300 px-4 py-2 rounded-lg hover:bg-blue-700/30">Admin</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit" class="text-white text-lg font-medium hover:text-blue-100 transition duration-300 px-4 py-2 rounded-lg bg-blue-700/20 hover:bg-blue-700/50">Đăng xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white text-lg font-medium hover:text-blue-100 transition duration-300 px-4 py-2 rounded-lg hover:bg-blue-700/30">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="text-white text-lg font-medium hover:text-blue-100 transition duration-300 px-4 py-2 rounded-lg hover:bg-blue-700/30">Đăng ký</a>
                @endauth
            </nav>
        </div>
    </header>
    <main class="flex-grow py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
    <footer class="bg-gray-900 text-gray-300 py-6 text-center shadow-inner mt-auto">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-sm">&copy; {{ date('Y') }} Cửa hàng thú cưng. Tất cả quyền được bảo lưu.</p>
            <p class="text-xs mt-2">Được xây dựng với Laravel và Tailwind CSS.</p>
        </div>
    </footer>
</body>
</html>
