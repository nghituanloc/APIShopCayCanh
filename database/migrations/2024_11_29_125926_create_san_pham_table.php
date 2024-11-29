<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id('MA_SP');
            $table->unsignedBigInteger('MA_PHAN_LOAI');
            $table->string('TEN_SP', 30)->nullable();
            $table->float('GIA_SP')->nullable();
            $table->integer('SO_LUONG_TON_KHO')->nullable();
            $table->text('MO_TA_SP')->nullable();

            $table->foreign('MA_PHAN_LOAI')->references('MA_PHAN_LOAI')->on('phan_loai_sp')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
