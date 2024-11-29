<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhGiaDhTable extends Migration
{
    public function up()
    {
        Schema::create('danh_gia_dh', function (Blueprint $table) {
            $table->id('MA_DG');
            $table->unsignedBigInteger('MA_DH');
            $table->text('NOI_DUNG_DG')->nullable();
            $table->integer('THANG_DIEM')->nullable();
            $table->date('NGAY_DG')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('danh_gia_dh');
    }
}
