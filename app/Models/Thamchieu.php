<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thamchieu extends Model
{
    use HasFactory;

    protected $table = 'thamchieu';
    public $incrementing = false; // Vì sử dụng khóa chính là composite
    protected $primaryKey = null; // Laravel không hỗ trợ composite key trực tiếp

    protected $fillable = [
        'MA_DH',
        'MA_SP',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'MA_DH');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MA_SP');
    }
}
