@extends('layouts.master')

@section('title', 'Sửa Bài Viết')

@section('content')
    <h2>Sửa Bài Viết</h2>
    <form action="{{ route('baiviet.postSua', $baiViet->id) }}" method="POST">
        @csrf
        <label for="tieu_de">Tiêu Đề:</label>
        <input type="text" name="tieu_de" value="{{ $baiViet->tieu_de }}" required>

        <label for="noi_dung">Nội Dung:</label>
        <textarea name="noi_dung" rows="5" required>{{ $baiViet->noi_dung }}</textarea>

        <button type="submit">Cập Nhật</button>
    </form>
@endsection
