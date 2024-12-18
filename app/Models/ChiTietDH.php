<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDH extends Model
{
    protected $table = 'CHITIETDH';
    public $timestamps = false;
    protected $primaryKey = 'MACTDH';
    public $incrementing = true;

    // Composite key không hỗ trợ trực tiếp

    protected $fillable = [
        'MADH',
        'MASP',
        'TENDANGNHAPKH',
        'SOLUONGCTDH',
        'TONGTIEN'
    ];

    // Quan hệ đến DONHANG
    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'MADH', 'MADH');
    }

    // Quan hệ đến SANPHAM
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MASP', 'MASP');
    }

    // Quan hệ đến KHACHHANG
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'TENDANGNHAPKH', 'TENDANGNHAPKH');
    }
}
