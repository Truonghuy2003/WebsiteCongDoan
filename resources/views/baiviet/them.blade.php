@extends('layouts.master')

@section('title', 'Thêm Bài Viết')

@section('content')
    <h2>Thêm Bài Viết</h2>

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

    <form action="{{ route('baiviet.postThem') }}" method="POST">
        @csrf

        <label for="tieu_de">Tiêu Đề:</label>
        <input type="text" name="tieu_de" value="{{ old('tieu_de') }}" required>
        @error('tieu_de')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="noi_dung">Nội Dung:</label>
        <textarea name="noi_dung" rows="5" required>{{ old('noi_dung') }}</textarea>
        @error('noi_dung')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Thêm</button>
    </form>
@endsection
