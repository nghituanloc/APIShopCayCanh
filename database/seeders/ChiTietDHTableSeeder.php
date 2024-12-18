<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietDHTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('CHITIETDH')->insert([
            [
                'MADH'            => 1,
                'MASP'            => 1,
                'TENDANGNHAPKH'   => 'kh1',
                'TONGTIEN'        => 1500000,
                'SOLUONGCTDH'     => 2,
            ],
            [
                'MADH'            => 1,
                'MASP'            => 2,
                'TENDANGNHAPKH'   => 'kh1',
                'TONGTIEN'        => 700000,
                'SOLUONGCTDH'     => 1,
            ],
            [
                'MADH'            => 2,
                'MASP'            => 3,
                'TENDANGNHAPKH'   => 'kh2',
                'TONGTIEN'        => 350000,
                'SOLUONGCTDH'     => 3,
            ],
        ]);
    }
}
