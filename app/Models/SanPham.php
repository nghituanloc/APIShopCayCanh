<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_pham';
    protected $primaryKey = 'MA_SP';

    protected $fillable = [
        'MA_PHAN_LOAI',
        'TEN_SP',
        'GIA_SP',
        'SO_LUONG_TON_KHO',
        'MO_TA_SP',
    ];

    public function phanLoai()
    {
        return $this->belongsTo(PhanLoaiSp::class, 'MA_PHAN_LOAI');
    }
}
