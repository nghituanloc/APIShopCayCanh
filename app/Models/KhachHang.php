<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'KHACHHANG';
    protected $primaryKey = 'TENDANGNHAPKH';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // Thêm dòng này


    protected $fillable = [
        'TENDANGNHAPKH',
        'MATKHAUKH',
        'HOTENKH',
        'SDTKH',
        'EMAIL',
        'DIACHI',
        'ANHDAIDIENKH'
    ];

    protected $hidden = [
        'MATKHAUKH'
    ];
}
