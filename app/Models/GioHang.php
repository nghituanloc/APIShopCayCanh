<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'gio_hang';
    protected $primaryKey = 'MA_GH';

    protected $fillable = [
        'TENDANGNHAPADMIN',
        'SO_LUONG',
        'DON_GIA',
        'TIEN_TAM_TINH',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'TENDANGNHAPADMIN');
    }
}
