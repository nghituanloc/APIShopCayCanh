<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ADMIN')->insert([
            'TENDANGNHAPADMIN' => 'admin',
            'MATKHAUADMIN'     => Hash::make('123456'), // Mật khẩu được mã hoá
            'HOTENADMIN'       => 'Admin Nguyễn Văn C',
        ]);

        // Bạn có thể chèn thêm nhiều bản ghi nếu muốn
        DB::table('ADMIN')->insert([
            'TENDANGNHAPADMIN' => 'admin2',
            'MATKHAUADMIN'     => Hash::make('666666'),
            'HOTENADMIN'       => 'Quản trị viên 2',
        ]);
    }
}
