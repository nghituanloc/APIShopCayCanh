<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanLoaiSpTable extends Migration
{
    public function up()
    {
        Schema::create('phan_loai_sp', function (Blueprint $table) {
            $table->id('MA_PHAN_LOAI');
            $table->string('TEN_PHAN_LOAI', 20)->nullable();
            $table->text('MO_TA_PL')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phan_loai_sp');
    }
}
