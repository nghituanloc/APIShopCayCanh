<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sanpham')->insert([
            [
                 // Tương tự LoaiPSSeeder, bạn có thể bỏ qua hoặc set giá trị cho MASP (auto-increment)
                'MALOAI' => 1, // PlayStation 5
                'TENSP' => 'Máy chơi game PlayStation 5 Standard Edition',
                'HINHANHSP' => 'ps5_standard.jpg',
                'MOTASP' => 'Máy chơi game PlayStation 5 phiên bản tiêu chuẩn, ổ đĩa vật lý.',
                'GIASP' => '15000000',
                
            ],
            [
                
                'MALOAI' => 1, // PlayStation 5
                'TENSP' => 'Máy chơi game PlayStation 5 Digital Edition',
                'HINHANHSP' => 'ps5_digital.jpg',
                'MOTASP' => 'Máy chơi game PlayStation 5 phiên bản kỹ thuật số, không có ổ đĩa vật lý.',
                'GIASP' => '13000000',
            ],
            [
                
                'MALOAI' => 2, // PlayStation 4
                'TENSP' => 'Máy chơi game PlayStation 4 Slim 1TB',
                'HINHANHSP' => 'ps4_slim.jpg',
                'MOTASP' => 'Máy chơi game PlayStation 4 phiên bản mỏng, dung lượng 1TB.',
                'GIASP' => '7000000',
            ],
            [
                
                'MALOAI' => 3, // PlayStation 4 Pro
                'TENSP' => 'Máy chơi game PlayStation 4 Pro 1TB',
                'HINHANHSP' => 'ps4_pro.jpg',
                'MOTASP' => 'Máy chơi game PlayStation 4 Pro, hỗ trợ chơi game 4K, dung lượng 1TB.',
                'GIASP' => '9000000',
            ],
            [
                
                'MALOAI' => 4, // PlayStation VR
                'TENSP' => 'Kính thực tế ảo PlayStation VR',
                'HINHANHSP' => 'psvr.jpg',
                'MOTASP' => 'Kính thực tế ảo cho PlayStation 4 và PlayStation 5',
                'GIASP' => '6000000',
            ],
            [
                
                'MALOAI' => 1,
                'TENSP' => 'Tay cầm DualSense cho PlayStation 5',
                'HINHANHSP' => 'dualsense.jpg',
                'MOTASP' => 'Tay cầm không dây DualSense cho PlayStation 5, tích hợp phản hồi xúc giác và trigger thích ứng.',
                'GIASP' => '2000000',
            ],
            // Thêm dữ liệu sản phẩm khác nếu cần
        ]);
    }
}