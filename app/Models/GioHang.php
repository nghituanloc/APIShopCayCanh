<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $table = 'GIOHANG';
    protected $primaryKey = 'MAGH';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // Tắt time

    protected $fillable = [
        'TENDANGNHAPKH',
        'TAMTINH'
    ];

    // Một giỏ hàng thuộc về một khách hàng
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'TENDANGNHAPKH', 'TENDANGNHAPKH');
    }
    // Định nghĩa quan hệ 1-nhiều với bảng CHUA
    public function chua()
    {
        return $this->hasMany(Chua::class, 'MAGH', 'MAGH');
    }

    // Giỏ hàng có nhiều sản phẩm qua bảng CHUA
    public function sanPhams()
    {
        return $this->belongsToMany(SanPham::class, 'CHUA', 'MAGH', 'MASP')->withPivot('SOLUONG');
    }
}
