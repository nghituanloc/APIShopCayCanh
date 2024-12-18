<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chua extends Model
{
    protected $table = 'CHUA';
    protected $primaryKey = 'MaChua';
    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'MAGH',
        'MASP',
        'SOLUONG'
    ];

    // Quan hệ đến GIOHANG
    public function gioHang()
    {
        return $this->belongsTo(GioHang::class, 'MAGH', 'MAGH');
    }

    // Quan hệ đến SANPHAM
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
