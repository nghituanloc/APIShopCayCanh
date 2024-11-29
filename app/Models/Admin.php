<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'TENDANGNHAPADMIN';
    public $incrementing = false; // Vì khóa chính không phải auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'TENDANGNHAPADMIN',
        'MATKHAUADMIN',
        'HOTENADMIN',
    ];

    // Ẩn trường MATKHAUADMIN khi trả về JSON
    protected $hidden = [
        'MATKHAUADMIN',
    ];

    // Mutator để mã hóa mật khẩu khi lưu
    public function setMatkhauadminAttribute($value)
    {
        $this->attributes['MATKHAUADMIN'] = bcrypt($value);
    }
}
