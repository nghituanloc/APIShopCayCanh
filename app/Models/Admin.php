<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'ADMIN';
    protected $primaryKey = 'TENDANGNHAPADMIN';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false; // Tắt time


    protected $fillable = [
        'TENDANGNHAPADMIN',
        'MATKHAUADMIN',
        'HOTENADMIN'
    ];

    protected $hidden = ['MATKHAUADMIN'];
}
