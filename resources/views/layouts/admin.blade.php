<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PET SHOP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  
            scrollbar-width: none; 
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex">
    <aside class="w-64 bg-gray-800 text-white flex flex-col p-4 shadow-xl no-scrollbar overflow-y-auto">
        <div class="text-2xl font-bold mb-8 text-center text-indigo-400">Admin Panel</div>
        <nav class="flex-grow space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg text-lg font-medium hover:bg-gray-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 2.25h16.5m-16.5 2.25h16.5m-16.5 2.25h16.5M12 3.75v16.5m-2.25-16.5h4.5m-4.5 2.25h4.5m-4.5 2.25h4.5m-4.5 2.25h4.5M12 20.25h1.5m-1.5-2.25h1.5m-1.5-2.25h1.5m-1.5-2.25h1.5M12 3.75h1.5m-1.5 2.25h1.5m-1.5 2.25h1.5m-1.5 2.25h1.5" />
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.products.index') }}" class="flex items-center space-x-3 p-3 rounded-lg text-lg font-medium hover:bg-gray-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.794 3.391C18.15 22.5 18.75 22.5 18.75 22.5H2.25m15.794-3.391A25.164 25.164 0 0 1 12 20.25c-5.148 0-9.404-2.296-12-5.753m12 5.753v-9m-4.776-9h.218C13.26 2.5 16.5 3.5 16.5 5.25c0 1.75-3.24 2.75-7.164 2.75h-.218m0-4.5H9.75m0 0H9m-9 3.75h-.218C.74 18.5 4 19.5 4 21.25c0 1.75-3.24 2.75-7.164 2.75h-.218" />
                </svg>
                <span>Quản lý sản phẩm</span>
            </a>
            <a href="{{ route('admin.orders.index') }}" class="flex items-center space-x-3 p-3 rounded-lg text-lg font-medium hover:bg-gray-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9.75h19.5M2.25 11.25h19.5M2.25 12.75h19.5M2.25 14.25h19.5" />
                </svg>
                <span>Quản lý đơn hàng</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 p-3 rounded-lg text-lg font-medium hover:bg-gray-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
                <span>Quản lý người dùng</span>
            </a>
        </nav>
        <div class="mt-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center space-x-3 p-3 rounded-lg text-lg font-medium bg-red-600 hover:bg-red-700 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H6" />
                    </svg>
                    <span>Đăng xuất</span>
                </button>
            </form>
        </div>
    </aside>
    <div class="flex-1 flex flex-col">
        <header class="w-full bg-white shadow-md p-4 flex justify-end items-center">
            <span class="text-gray-700 text-lg font-medium">Xin chào, {{ Auth::user()->name ?? 'Admin' }}!</span>
        </header>
        <main class="flex-1 p-6 overflow-y-auto no-scrollbar">
            @yield('content')
        </main>
        <footer class="bg-gray-200 text-gray-600 p-4 text-center text-sm shadow-inner mt-auto">
            &copy; {{ date('Y') }} Admin Panel - PET SHOP.
        </footer>
    </div>

</body>
</html>
