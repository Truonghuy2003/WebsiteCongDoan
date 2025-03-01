<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VaiTro extends Model
{
    use HasFactory;

    protected $table = 'vai_tro';

    protected $fillable = [
        'ten_vai_tro',
    ];

    public function nguoiDung()
    {
        return $this->belongsToMany(NguoiDung::class, 'nguoi_dung_vai_tro', 'vai_tro_id', 'nguoi_dung_id');
    }
}
