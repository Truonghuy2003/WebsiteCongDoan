@extends('layouts.master')

@section('title', 'Danh Sách Người Dùng')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Danh Sách Người Dùng</h4>
    </div>
    <div class="card-body table-responsive">
        <p><a href="{{ route('nguoidung.them') }}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a></p>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Họ Tên</th>
                    <th width="25%">Email</th>
                    <th width="15%">Quyền</th>
                    <th width="10%">Sửa</th>
                    <th width="10%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nguoiDung as $index => $nd)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $nd->username }}</td>
                    <td>{{ $nd->email }}</td>
                    <td>{{ $nd->role }}</td>
                    <td class="text-center">
                        <a href="{{ route('nguoidung.sua', $nd->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('nguoidung.xoa', $nd->id) }}" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $nd->username }}?')">
                            <i class="fa fa-trash"></i> Xóa
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
