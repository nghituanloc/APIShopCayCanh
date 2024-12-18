<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('SANPHAM')->insert([
            [
                'MALOAI'    => 1, // Ví dụ: MALOAI=1 là "Cây Bonsai" (dựa trên LoaiSPTableSeeder trước đó)
                'TENSP'     => 'Bonsai Tùng La Hán',
                'HINHANHSP' => 'images/bonsai_tung_la_han.jpg',
                'MOTASP'    => 'Cây tùng la hán bonsai, dáng cổ thụ, thích hợp trang trí sân vườn nhỏ.',
                'GIASP'     => '1500000', // giá tham khảo
            ],
            [
                'MALOAI'    => 1,
                'TENSP'     => 'Bonsai Linh Sam',
                'HINHANHSP' => 'images/bonsai_linh_sam.jpg',
                'MOTASP'    => 'Cây linh sam bonsai với lá xanh đậm, hoa tím nhỏ, tạo điểm nhấn trang trí.',
                'GIASP'     => '2500000',
            ],
            [
                'MALOAI'    => 2, // Ví dụ: MALOAI=2 là "Cây Xương Rồng"
                'TENSP'     => 'Xương Rồng Trụ Thái',
                'HINHANHSP' => 'images/xuong_rong_tru_thai.jpg',
                'MOTASP'    => 'Xương rồng trụ, chịu hạn tốt, dễ trồng và chăm sóc.',
                'GIASP'     => '50000',
            ],
            [
                'MALOAI'    => 2,
                'TENSP'     => 'Xương Rồng Tai Thỏ',
                'HINHANHSP' => 'images/xuong_rong_tai_tho.jpg',
                'MOTASP'    => 'Xương rồng tai thỏ đáng yêu, phù hợp trang trí bàn làm việc.',
                'GIASP'     => '70000',
            ],
            [
                'MALOAI'    => 3, // Ví dụ: MALOAI=3 là "Cây Thủy Sinh"
                'TENSP'     => 'Trầu Bà Thủy Sinh',
                'HINHANHSP' => 'images/trau_ba_thuy_sinh.jpg',
                'MOTASP'    => 'Cây trầu bà trồng trong nước, dễ sống, mang lại không gian tươi mát.',
                'GIASP'     => '120000',
            ],
        ]);
    }
}
