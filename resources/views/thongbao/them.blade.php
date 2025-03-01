@extends('layouts.master')

@section('title', 'Thêm Thông Báo')

@section('content')
    <h2>Thêm Thông Báo</h2>
    <form action="{{ route('thongbao.postThem') }}" method="POST">
        @csrf
        <label for="tieu_de">Tiêu Đề:</label>
        <input type="text" name="tieu_de" required>

        <label for="noi_dung">Nội Dung:</label>
        <textarea name="noi_dung" rows="5" required></textarea>

        <button type="submit">Thêm</button>
    </form>
@endsection
