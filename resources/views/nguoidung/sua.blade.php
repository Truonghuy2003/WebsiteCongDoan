@extends('layouts.master')

@section('title', 'Sửa Người Dùng')

@section('content')
    <h2>Sửa Người Dùng</h2>

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

    <form action="{{ route('nguoidung.postSua', $nguoiDung->id) }}" method="POST">
        @csrf

        <label for="username">Họ Tên:</label>
        <input type="text" name="username" value="{{ old('username', $nguoiDung->username) }}" required>
        @error('username')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $nguoiDung->email) }}" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Cập Nhật</button>
    </form>
@endsection
