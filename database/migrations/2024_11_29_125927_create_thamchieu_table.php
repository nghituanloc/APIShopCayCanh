<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThamchieuTable extends Migration
{
    public function up()
    {
        Schema::create('thamchieu', function (Blueprint $table) {
            $table->unsignedBigInteger('MA_DH');
            $table->unsignedBigInteger('MA_SP');

            $table->primary(['MA_DH', 'MA_SP']);
            $table->foreign('MA_DH')->references('MA_DH')->on('don_hang')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('MA_SP')->references('MA_SP')->on('san_pham')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('thamchieu');
    }
}
