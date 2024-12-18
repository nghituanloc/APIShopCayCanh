<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'DANHGIA';
    protected $primaryKey = 'MADG';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'TENDANGNHAPKH',
        'MASP',
        'NOIDUNGDG',
        'SAO'
    ];

    // Quan hệ đến KHACHHANG
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'TENDANGNHAPKH', 'TENDANGNHAPKH');
    }

    // Quan hệ đến SANPHAM
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }
}
