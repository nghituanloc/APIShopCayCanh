<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ví dụ: Giỏ hàng có mã 1 chứa các sản phẩm MASP 1 và 2
        DB::table('CHUA')->insert([
            [
                'MAGH'    => 1,
                'MASP'    => 1,
                'SOLUONG' => 2,
            ],
            [
                'MAGH'    => 1,
                'MASP'    => 2,
                'SOLUONG' => 1,
            ],
        ]);

         DB::table('CHUA')->insert([
            [
                'MAGH'    => 2,
                'MASP'    => 3,
                'SOLUONG' => 5,
            ],
        ]);
    }
}
