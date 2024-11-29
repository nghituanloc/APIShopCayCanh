<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khach_hang';
    protected $primaryKey = 'MA_KH';

    protected $fillable = [
        'TEN_DANG_NHAP',
        'MAT_KHAU',
        'TEN_KH',
        'DIA_CHI_KH',
        'SDT_KH',
        'EMAIL_KH',
    ];

    public function donHangs()
    {
        return $this->hasMany(DonHang::class, 'MA_KH');
    }
}
