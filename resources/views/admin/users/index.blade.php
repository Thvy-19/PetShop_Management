@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold">Danh sách người dùng</h1>

<table class="w-full border">
    <thead>
        <tr>
            <th class="border p-2">#</th>
            <th class="border p-2">Tên</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Vai trò</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td class="border p-2">{{ $loop->iteration }}</td>
                <td class="border p-2">{{ $user->name }}</td>
                <td class="border p-2">{{ $user->email }}</td>
                <td class="border p-2">{{ $user->role }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center p-4 text-gray-500">Không có người dùng nào.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
