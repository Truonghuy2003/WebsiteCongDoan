@extends('layouts.master')

@section('title', 'Sửa Thông Báo')

@section('content')
    <h2>Sửa Thông Báo</h2>
    <form action="{{ route('thongbao.postSua', $thongBao->id) }}" method="POST">
        @csrf
        <label for="tieu_de">Tiêu Đề:</label>
        <input type="text" name="tieu_de" value="{{ $thongBao->tieu_de }}" required>

        <label for="noi_dung">Nội Dung:</label>
        <textarea name="noi_dung" rows="5" required>{{ $thongBao->noi_dung }}</textarea>

        <button type="submit">Cập Nhật</button>
    </form>
@endsection
