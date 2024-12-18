<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'DONHANG';
    protected $primaryKey = 'MADH';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // Tắt time

    protected $fillable = [
        'NGAYDAT',
        'DIACHIGIAOHANG'
    ];

    // Một đơn hàng có nhiều chi tiết đơn hàng
    public function chiTietDHs()
    {
        return $this->hasMany(ChiTietDH::class, 'MADH', 'MADH');
    }
}
