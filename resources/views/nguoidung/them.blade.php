@extends('layouts.master')

@section('title', 'Thêm Người Dùng')

@section('content')
    <h2>Thêm Người Dùng</h2>

    {{-- Hiển thị lỗi nếu có --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nguoidung.postThem') }}" method="POST">
        @csrf

        <label for="username">Họ Tên:</label>
        <input type="text" name="username" value="{{ old('username') }}" required>
        @error('username')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="password">Mật Khẩu:</label>
        <input type="password" name="password" required>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Thêm</button>
    </form>
@endsection
