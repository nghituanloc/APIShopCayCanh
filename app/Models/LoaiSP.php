<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    protected $table = 'LOAISP';
    protected $primaryKey = 'MALOAI';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // Tắt time

    protected $fillable = [
        'TENLOAI',
        'MOTALOAI'
    ];

    // Một loại SP có nhiều Sản phẩm
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'MALOAI', 'MALOAI');
    }
}
