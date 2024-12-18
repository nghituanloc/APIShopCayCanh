<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GioHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('GIOHANG')->insert([
            [
                'TENDANGNHAPKH' => 'kh1',
                'TAMTINH'       => 500000, 
            ],
            [
                'TENDANGNHAPKH' => 'kh2',
                'TAMTINH'       => 250000,
            ],
        ]);
    }
}
