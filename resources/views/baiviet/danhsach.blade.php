@extends('layouts.master')

@section('title', 'Danh Sách Bài Viết')

@section('content')
    <h2>Danh Sách Bài Viết</h2>
    <a href="{{ route('baiviet.them') }}">Thêm bài viết</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tiêu Đề</th>
            <th>Nội Dung</th>
            <th>Hành Động</th>
        </tr>
        @foreach($baiViet as $bv)
        <tr>
            <td>{{ $bv->id }}</td>
            <td>{{ $bv->tieu_de }}</td>
            <td>{{ Str::limit($bv->noi_dung, 50) }}</td>
            <td>
                <a href="{{ route('baiviet.sua', $bv->id) }}">Sửa</a>
                <a href="{{ route('baiviet.xoa', $bv->id) }}" onclick="return confirm('Xóa bài viết này?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
