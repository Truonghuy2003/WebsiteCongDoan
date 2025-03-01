@extends('layouts.master')

@section('title', 'Danh Sách Thông Báo')

@section('content')
    <h2>Danh Sách Thông Báo</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tiêu Đề</th>
            <th>Ngày Đăng</th>
            <th>Hành Động</th>
        </tr>
        @foreach($thongBao as $tb)
        <tr>
            <td>{{ $tb->id }}</td>
            <td>{{ $tb->tieu_de }}</td>
            <td>{{ $tb->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('thongbao.sua', $tb->id) }}">Sửa</a>
                <a href="{{ route('thongbao.xoa', $tb->id) }}" onclick="return confirm('Xóa thông báo này?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
