@extends('layouts.master')

@section('title', 'Thêm Người Dùng')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Thêm Người Dùng</h4>
    </div>
    <div class="card-body">
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

        <form action="{{ route('nguoidung.postThem') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Họ Tên:</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" 
                       name="username" value="{{ old('username') }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-user-plus"></i> Thêm vào CSDL
            </button>
        </form>
    </div>
</div>
@endsection
