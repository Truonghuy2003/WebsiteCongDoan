<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     use HasFactory, Notifiable;

    protected $table = 'nguoi_dung';
    protected $fillable = [
        'username',  
        'email',
        'password',
        'so_dien_thoai',
        'dia_chi',
    ];
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Tự động mã hóa mật khẩu khi lưu vào database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Quan hệ với vai trò
    public function vaiTro()
    {
        return $this->belongsToMany(VaiTro::class, 'nguoi_dung_vai_tro', 'nguoi_dung_id', 'vai_tro_id');
    }

    // Quan hệ với bài viết
    public function baiViet()
    {
        return $this->hasMany(BaiViet::class, 'nguoi_dung_id');
    }

    // Quan hệ với tài liệu
    public function taiLieu()
    {
        return $this->hasMany(TaiLieu::class, 'nguoi_dung_id');
    }

    // Quan hệ với thông báo
    public function thongBao()
    {
        return $this->hasMany(ThongBao::class, 'nguoi_dung_id');
    }
}
