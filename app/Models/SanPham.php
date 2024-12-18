<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'SANPHAM';
    protected $primaryKey = 'MASP';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // Tắt time

    protected $fillable = [
        'MALOAI',
        'TENSP',
        'HINHANHSP',
        'MOTASP',
        'GIASP'
    ];

    // Quan hệ đến loại sản phẩm
    public function loaiSP()
    {
        return $this->belongsTo(LoaiSP::class, 'MALOAI', 'MALOAI');
    }

    // Quan hệ nhiều-nhiều với GioHang qua bảng CHUA
    public function gioHangs()
    {
        return $this->belongsToMany(GioHang::class, 'CHUA', 'MASP', 'MAGH')->withPivot('SOLUONG');
    }

    // Một sản phẩm có nhiều đánh giá
    public function danhGias()
    {
        return $this->hasMany(DanhGia::class, 'MASP', 'MASP');
    }
}
