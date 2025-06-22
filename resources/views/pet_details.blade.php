@extends('layouts.app')

@section('title', 'Chi tiết Thú cưng: ' . $pet->name)

@section('content')
    <h1>Chi tiết Thú cưng: {{ $pet->name }}</h1>

    <div class="card">
        @if ($pet->profile_image)
            <img src="{{ asset('storage/' . $pet->profile_image) }}" alt="{{ $pet->name }}" style="max-width: 300px; display: block; margin: 0 auto 20px;">
        @else
            <img src="{{ asset('images/default_pet.png') }}" alt="Ảnh mặc định" style="max-width: 300px; display: block; margin: 0 auto 20px;">
        @endif

        <p><strong>Loài:</strong> {{ $pet->species }}</p>
        <p><strong>Giống:</strong> {{ $pet->breed ?? 'Chưa xác định' }}</p>
        <p><strong>Ngày sinh:</strong> {{ $pet->date_of_birth ? \Carbon\Carbon::parse($pet->date_of_birth)->format('d/m/Y') : 'Không rõ' }}</p>
        <p><strong>Giới tính:</strong> {{ $pet->gender ?? 'Không rõ' }}</p>
        <p><strong>Chủ sở hữu:</strong> {{ $pet->owner->name ?? 'Không rõ' }}
            @if($pet->owner)
                (Email: {{ $pet->owner->email ?? 'N/A' }})
            @endif
        </p>
        @if ($pet->description)
            <p><strong>Mô tả:</strong> {{ $pet->description }}</p>
        @endif
    </div>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Quay lại danh sách</a>
@endsection