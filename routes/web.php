<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\NguoiDungVaiTroController;
use App\Http\Controllers\VaiTroController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\TaiLieuController;
use App\Http\Controllers\ThongBaoController;

// Trang chủ
Route::get('/', function () {
    return view('welcome');
})->name('trangchu');

// Nhóm route yêu cầu đăng nhập
Route::middleware(['auth'])->group(function () {
    
    // Quản lý người dùng
    Route::prefix('nguoi-dung')->group(function () {
        Route::get('danh-sach', [NguoiDungController::class, 'getDanhSach'])->name('nguoidung.danhsach');
        Route::get('them', [NguoiDungController::class, 'getThem'])->name('nguoidung.them');
        Route::post('them', [NguoiDungController::class, 'postThem'])->name('nguoidung.postThem');
        Route::get('sua/{id}', [NguoiDungController::class, 'getSua'])->name('nguoidung.sua');
        Route::post('sua/{id}', [NguoiDungController::class, 'postSua'])->name('nguoidung.postSua');
        Route::get('xoa/{id}', [NguoiDungController::class, 'getXoa'])->name('nguoidung.xoa');
    });

    // Quản lý vai trò
    Route::prefix('vai-tro')->group(function () {
        Route::get('danh-sach', [VaiTroController::class, 'getDanhSach'])->name('vaitro.danhsach');
        Route::get('them', [VaiTroController::class, 'getThem'])->name('vaitro.them');
        Route::post('them', [VaiTroController::class, 'postThem'])->name('vaitro.postThem');
        Route::get('xoa/{id}', [VaiTroController::class, 'getXoa'])->name('vaitro.xoa');
    });

    //Người dùng vai trò

    Route::prefix('nguoi-dung-vai-tro')->group(function () {
        Route::get('danh-sach', [NguoiDungVaiTroController::class, 'getDanhSach'])->name('nguoidungvaitro.danhsach');
        Route::get('them', [NguoiDungVaiTroController::class, 'getThem'])->name('nguoidungvaitro.them');
        Route::post('them', [NguoiDungVaiTroController::class, 'postThem'])->name('nguoidungvaitro.postThem');
        Route::get('xoa/{nguoi_dung_id}/{vai_tro_id}', [NguoiDungVaiTroController::class, 'getXoa'])->name('nguoidungvaitro.xoa');
    });

    // Quản lý bài viết
    Route::prefix('bai-viet')->group(function () {
        Route::get('danh-sach', [BaiVietController::class, 'getDanhSach'])->name('baiviet.danhsach');
        Route::get('them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
        Route::post('them', [BaiVietController::class, 'postThem'])->name('baiviet.postThem');
        Route::get('sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
        Route::post('sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.postSua');
        Route::get('xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa');
    });

    // Quản lý tài liệu
    Route::prefix('tai-lieu')->group(function () {
        Route::get('danh-sach', [TaiLieuController::class, 'getDanhSach'])->name('tailieu.danhsach');
        Route::get('them', [TaiLieuController::class, 'getThem'])->name('tailieu.them');
        Route::post('them', [TaiLieuController::class, 'postThem'])->name('tailieu.postThem');
        Route::get('sua/{id}', [TaiLieuController::class, 'getSua'])->name('tailieu.sua');
        Route::post('sua/{id}', [TaiLieuController::class, 'postSua'])->name('tailieu.postSua');
        Route::get('xoa/{id}', [TaiLieuController::class, 'getXoa'])->name('tailieu.xoa');
    });

    // Quản lý thông báo
    Route::prefix('thong-bao')->group(function () {
        Route::get('danh-sach', [ThongBaoController::class, 'getDanhSach'])->name('thongbao.danhsach');
        Route::get('them', [ThongBaoController::class, 'getThem'])->name('thongbao.them');
        Route::post('them', [ThongBaoController::class, 'postThem'])->name('thongbao.postThem');
        Route::get('sua/{id}', [ThongBaoController::class, 'getSua'])->name('thongbao.sua');
        Route::post('sua/{id}', [ThongBaoController::class, 'postSua'])->name('thongbao.postSua');
        Route::get('xoa/{id}', [ThongBaoController::class, 'getXoa'])->name('thongbao.xoa');
    });

});

// Auth routes
Auth::routes();
