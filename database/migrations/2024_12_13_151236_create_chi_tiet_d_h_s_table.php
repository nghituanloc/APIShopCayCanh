<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('CHITIETDH', function (Blueprint $table) {
            $table->increments('MACTDH'); // Khóa chính tự động tăng
            $table->unsignedInteger('MADH'); // Tham chiếu khóa chính của bảng DONHANG
            $table->unsignedInteger('MASP'); // Tham chiếu khóa chính của bảng SANPHAM
            $table->string('TENDANGNHAPKH', 50); // Tham chiếu khóa chính của bảng KHACHHANG
            $table->integer('TONGTIEN')->nullable();
            $table->integer('SOLUONGCTDH')->nullable();

            // Khóa ngoại MADH tham chiếu bảng DONHANG
            $table->foreign('MADH')
                  ->references('MADH')
                  ->on('DONHANG')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            // Khóa ngoại MASP tham chiếu bảng SANPHAM
            $table->foreign('MASP')
                  ->references('MASP')
                  ->on('SANPHAM')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            // Khóa ngoại TENDANGNHAPKH tham chiếu bảng KHACHHANG
            $table->foreign('TENDANGNHAPKH')
                  ->references('TENDANGNHAPKH')
                  ->on('KHACHHANG')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('CHITIETDH');
    }
};
