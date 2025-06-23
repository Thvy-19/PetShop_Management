@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-lg shadow-md p-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Chào mừng đến với Dashboard Admin!</h1>
    <p class="text-gray-600 text-lg">Bạn có thể quản lý sản phẩm, đơn hàng và người dùng tại đây.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
        <div class="bg-indigo-500 text-white rounded-lg p-6 shadow-lg flex items-center space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.794 3.391C18.15 22.5 18.75 22.5 18.75 22.5H2.25m15.794-3.391A25.164 25.164 0 0 1 12 20.25c-5.148 0-9.404-2.296-12-5.753m12 5.753v-9m-4.776-9h.218C13.26 2.5 16.5 3.5 16.5 5.25c0 1.75-3.24 2.75-7.164 2.75h-.218m0-4.5H9.75m0 0H9m-9 3.75h-.218C.74 18.5 4 19.5 4 21.25c0 1.75-3.24 2.75-7.164 2.75h-.218" />
            </svg>
            <div>
                <p class="text-2xl font-bold">12</p>
                <p class="text-sm">Tổng sản phẩm</p>
            </div>
        </div>
        <div class="bg-green-500 text-white rounded-lg p-6 shadow-lg flex items-center space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9.75h19.5M2.25 11.25h19.5M2.25 12.75h19.5M2.25 14.25h19.5" />
            </svg>
            <div>
                <p class="text-2xl font-bold">5</p>
                <p class="text-sm">Tổng đơn hàng</p>
            </div>
        </div>
        <div class="bg-yellow-500 text-white rounded-lg p-6 shadow-lg flex items-center space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
            </svg>
            <div>
                <p class="text-2xl font-bold">15</p>
                <p class="text-sm">Tổng người dùng</p>
            </div>
        </div>
    </div>
</div>
@endsection
