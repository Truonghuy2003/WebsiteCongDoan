@extends('layouts.master')

@section('title', 'Danh Sách Người Dùng')

@section('content')
    <h2>Danh Sách Người Dùng</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Hành Động</th>
        </tr>
        @foreach($nguoiDung as $nd)
        <tr>
            <td>{{ $nd->id }}</td>
            <td>{{ $nd->username }}</td>
            <td>{{ $nd->email }}</td>
            <td>
                <a href="{{ route('nguoidung.sua', $nd->id) }}">Sửa</a>
                <a href="{{ route('nguoidung.xoa', $nd->id) }}" onclick="return confirm('Xóa người dùng này?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
