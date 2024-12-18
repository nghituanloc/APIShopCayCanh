<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KhachHangTableSeeder::class,
            AdminTableSeeder::class,
            LoaiSPTableSeeder::class,
            SanPhamTableSeeder::class,
            DonHangTableSeeder::class,
            GioHangTableSeeder::class,
            ChuaTableSeeder::class,
            DanhGiaTableSeeder::class,
            ChiTietDHTableSeeder::class
        ]);
    }
    
}
