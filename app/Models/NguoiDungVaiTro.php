<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NguoiDungVaiTro extends Model
{
    //
    use HasFactory;

    protected $table = 'nguoi_dung_vai_tro';

    protected $fillable = [
        'nguoi_dung_id',
        'vai_tro_id',
    ];
}
