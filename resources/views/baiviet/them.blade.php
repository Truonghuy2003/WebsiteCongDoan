@extends('layouts.master')

@section('title', 'Thêm Bài Viết')

@section('content')
    <h2>Thêm Bài Viết</h2>
    <form action="{{ route('baiviet.postThem') }}" method="POST">
        @csrf
        <label for="tieu_de">Tiêu Đề:</label>
        <input type="text" name="tieu_de" required>

        <label for="noi_dung">Nội Dung:</label>
        <textarea name="noi_dung" rows="5" required></textarea>

        <button type="submit">Thêm</button>
    </form>
@endsection
