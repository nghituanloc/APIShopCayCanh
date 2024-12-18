<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('DANHGIA')->insert([
            [
                'TENDANGNHAPKH' => 'kh1',
                'MASP'          => 1,
                'NOIDUNGDG'     => 'Sản phẩm rất chất lượng, hình dáng đẹp.',
                'SAO'           => 5,
            ],
            [
                'TENDANGNHAPKH' => 'kh1',
                'MASP'          => 2,
                'NOIDUNGDG'     => 'Chất lượng ổn, giá hợp lý.',
                'SAO'           => 4,
            ],
        ]);
    }
}
