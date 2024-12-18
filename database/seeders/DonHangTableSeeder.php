<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('DONHANG')->insert([
            [
                'NGAYDAT'         => Carbon::now()->subDays(2)->toDateString(), 
                'DIACHIGIAOHANG'  => '123 Đường ABC, Phường X, Quận Y, TP. HCM',
            ],
            [
                'NGAYDAT'         => Carbon::now()->subDays(1)->toDateString(),
                'DIACHIGIAOHANG'  => '456 Đường DEF, Phường M, Quận N, Hà Nội',
            ],
            [
                'NGAYDAT'         => Carbon::now()->toDateString(),
                'DIACHIGIAOHANG'  => '789 Đường XYZ, Phường A, Quận B, Đà Nẵng',
            ],
        ]);
    }
}
