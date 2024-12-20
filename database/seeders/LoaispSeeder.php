<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaispSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loaisp')->insert([
            [
                'TENLOAI' => 'PlayStation 5',
                'MOTALOAI' => 'Máy chơi game thế hệ mới nhất của Sony.',
            ],
            [
                'TENLOAI' => 'PlayStation 4',
                'MOTALOAI' => 'Máy chơi game thế hệ trước của Sony, vẫn còn phổ biến.',
            ],
            [
                'TENLOAI' => 'PlayStation 4 Pro',
                'MOTALOAI' => 'Phiên bản nâng cấp của PlayStation 4, hỗ trợ chơi game 4K.',
            ],
            [
                'TENLOAI' => 'PlayStation VR',
                'MOTALOAI' => 'Thiết bị thực tế ảo cho PlayStation 4 và PlayStation 5',
            ],
        ]);
    }
}