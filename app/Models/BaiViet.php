<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'bai_viet';

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'nguoi_dung_id',
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'nguoi_dung_id');
    }

    

}
