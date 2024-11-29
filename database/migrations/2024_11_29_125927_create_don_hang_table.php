<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id('MA_DH');
            $table->unsignedBigInteger('MA_KH');
            $table->unsignedBigInteger('MA_DG')->nullable();
            $table->date('NGAY_DAT')->nullable();
            $table->date('NGAY_NHAN')->nullable();
            $table->float('TONG_TIEN')->nullable();

            $table->foreign('MA_KH')->references('MA_KH')->on('khach_hang')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('MA_DG')->references('MA_DG')->on('danh_gia_dh')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
