<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanLoaiSp extends Model
{
    use HasFactory;

    protected $table = 'phan_loai_sp';
    protected $primaryKey = 'MA_PHAN_LOAI';

    protected $fillable = [
        'TEN_PHAN_LOAI',
        'MO_TA_PL',
    ];

    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'MA_PHAN_LOAI');
    }
}
