@extends('layouts.app')

@section('title', 'Trang chủ - Thú cưng')

@section('content')
    <h1 class="text-center mb-4">Chào mừng đến với Hệ thống quản lý thú cưng!</h1>

    <form action="{{ route('home') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm thú cưng theo tên, loài, giống..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Xóa tìm kiếm</a>
        </div>
    </form>

    <div class="card-grid">
        @forelse($pets as $pet)
            <div class="card">
                @if ($pet->profile_image)
                    <img src="{{ asset('storage/' . $pet->profile_image) }}" alt="{{ $pet->name }}">
                @else
                    <img src="{{ asset('images/default_pet.png') }}" alt="Ảnh mặc định" style="max-width: 100%; height: 200px; object-fit: cover;">
                @endif
                <h3><a href="{{ route('public.pets.show', $pet->id) }}">{{ $pet->name }}</a></h3>
                <p><strong>Loài:</strong> {{ $pet->species }}</p>
                <p><strong>Giống:</strong> {{ $pet->breed ?? 'N/A' }}</p>
                <p><strong>Chủ sở hữu:</strong> {{ $pet->owner->name ?? 'Không rõ' }}</p>
                <a href="{{ route('public.pets.show', $pet->id) }}" class="btn btn-info btn-sm text-center">Xem chi tiết</a>
            </div>
        @empty
            <p>Không có thú cưng nào được tìm thấy.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $pets->links() }}
    </div>
@endsection