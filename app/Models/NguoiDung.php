<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'nguoi_dung'; // Tên bảng trong DB

    protected $fillable = [
        'ho_ten',
        'email',
        'password',
        'so_dien_thoai',
        'dia_chi',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function vaiTro()
    {
        return $this->belongsToMany(VaiTro::class, 'nguoi_dung_vai_tro', 'nguoi_dung_id', 'vai_tro_id');
    }
    
    public function baiViet()
    {
        return $this->hasMany(BaiViet::class, 'nguoi_dung_id');
    }

    public function taiLieu()
    {
        return $this->hasMany(TaiLieu::class, 'nguoi_dung_id');
    }

    public function thongBao()
    {
        return $this->hasMany(ThongBao::class, 'nguoi_dung_id');
    }
}
