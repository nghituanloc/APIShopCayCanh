<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('DANHGIA', function (Blueprint $table) {
            $table->increments('MADG'); // Khóa chính tự động tăng
            $table->string('TENDANGNHAPKH', 50); // Khóa ngoại tham chiếu KHACHHANG
            $table->integer('MASP')->unsigned(); // Khóa ngoại tham chiếu SANPHAM
            $table->string('NOIDUNGDG', 255)->nullable();
            $table->integer('SAO')->nullable();

            // Thiết lập khóa ngoại TENDANGNHAPKH tham chiếu bảng KHACHHANG
            $table->foreign('TENDANGNHAPKH')
                  ->references('TENDANGNHAPKH')
                  ->on('KHACHHANG')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            // Thiết lập khóa ngoại MASP tham chiếu bảng SANPHAM
            $table->foreign('MASP')
                  ->references('MASP')
                  ->on('SANPHAM')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('DANHGIA');
    }
};
