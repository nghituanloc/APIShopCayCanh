<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaDh extends Model
{
    use HasFactory;

    protected $table = 'danh_gia_dh';
    protected $primaryKey = 'MA_DG';

    protected $fillable = [
        'MA_DH',
        'NOI_DUNG_DG',
        'THANG_DIEM',
        'NGAY_DG',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'MA_DH');
    }
}
