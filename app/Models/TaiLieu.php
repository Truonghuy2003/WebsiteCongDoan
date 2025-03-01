<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaiLieu extends Model
{
    use HasFactory;

    protected $table = 'tai_lieu';

    protected $fillable = [
        'ten_tai_lieu',
        'file_path',
        'nguoi_dung_id',
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'nguoi_dung_id');
    }
}
