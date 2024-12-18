<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiSPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('LOAISP')->insert([
            [
                'TENLOAI'   => 'Cây Bonsai',
                'MOTALOAI'  => 'Cây cảnh được tạo dáng nghệ thuật, nhỏ gọn, thích hợp trang trí trong nhà.'
            ],
            [
                'TENLOAI'   => 'Cây Xương Rồng',
                'MOTALOAI'  => 'Cây cảnh chịu hạn tốt, đa dạng kiểu dáng, thích hợp đặt bàn làm việc.'
            ],
            [
                'TENLOAI'   => 'Cây Thủy Sinh',
                'MOTALOAI'  => 'Cây sống trong môi trường nước, dễ chăm sóc, tạo không gian xanh mát.'
            ],
            [
                'TENLOAI'   => 'Cây Kiểng Lá',
                'MOTALOAI'  => 'Cây cảnh trồng trong chậu, lá đẹp, phong phú về hình dạng và màu sắc.'
            ],
            [
                'TENLOAI'   => 'Cây Hoa Cảnh',
                'MOTALOAI'  => 'Cây cho hoa đẹp, rực rỡ màu sắc, thích hợp trang trí ban công, sân vườn.'
            ],
        ]);
    }
}
