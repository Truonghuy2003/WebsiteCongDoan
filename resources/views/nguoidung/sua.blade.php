@extends('layouts.master')

@section('title', 'Sửa Người Dùng')

@section('content')
<div class="card">
    <div class="card-header bg-warning text-white">
        <h4>Sửa Người Dùng</h4>
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

        <form action="{{ route('nguoidung.postSua', $nguoiDung->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Họ Tên:</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" 
                       name="username" value="{{ old('username', $nguoiDung->username) }}" required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email', $nguoiDung->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox">
                <label class="form-check-label" for="change_password_checkbox">Đổi mật khẩu</label>
            </div>

            <div id="change_password_group" class="d-none">
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu mới:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới:</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                           id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Cập Nhật
            </button>
        </form>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $("#change_password_checkbox").change(function() {
            if ($(this).is(":checked")) {
                $("#change_password_group").removeClass("d-none");
                $("#password, #password_confirmation").attr("required", "required");
            } else {
                $("#change_password_group").addClass("d-none");
                $("#password, #password_confirmation").removeAttr("required");
            }
        });
    });
</script>
@endsection
