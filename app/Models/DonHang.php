<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hang';
    protected $primaryKey = 'MA_DH';

    protected $fillable = [
        'MA_KH',
        'MA_DG',
        'NGAY_DAT',
        'NGAY_NHAN',
        'TONG_TIEN',
    ];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'MA_KH');
    }

    public function danhGia()
    {
        return $this->hasOne(DanhGiaDh::class, 'MA_DG');
    }
}
