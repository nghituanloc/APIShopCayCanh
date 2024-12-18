<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KhachHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('KHACHHANG')->insert([
            [
                'TENDANGNHAPKH' => 'kh1',
                'MATKHAUKH'     => Hash::make('123456'),
                'HOTENKH'       => 'Nguyễn Văn A',
                'SDTKH'         => '0123456789',
                'EMAIL'         => 'nguyenvana@example.com',
                'DIACHI'        => '123 Đường ABC, Quận 1, TP. HCM',
                'ANHDAIDIENKH'  => 'path/to/image1.jpg',
            ],
            [
                'TENDANGNHAPKH' => 'kh2',
                'MATKHAUKH'     => Hash::make('666666'),
                'HOTENKH'       => 'Trần Thị B',
                'SDTKH'         => '0987654321',
                'EMAIL'         => 'tranthib@example.com',
                'DIACHI'        => '456 Đường XYZ, Quận 2, TP. HCM',
                'ANHDAIDIENKH'  => 'path/to/image2.jpg',
            ],
        ]);
    }
}
