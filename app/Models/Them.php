<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Them extends Model
{
    use HasFactory;

    protected $table = 'them';
    public $incrementing = false; // Vì sử dụng khóa chính là composite
    protected $primaryKey = null; // Laravel không hỗ trợ composite key trực tiếp

    protected $fillable = [
        'MA_SP',
        'MA_GH',
        'MA_KH',
        'SOLUONG',
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MA_SP');
    }

    public function gioHang()
    {
        return $this->belongsTo(GioHang::class, 'MA_GH');
    }

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'MA_KH');
    }
}
