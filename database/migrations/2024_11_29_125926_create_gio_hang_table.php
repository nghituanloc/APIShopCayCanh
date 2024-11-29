<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioHangTable extends Migration
{
    public function up()
    {
        Schema::create('gio_hang', function (Blueprint $table) {
            $table->id('MA_GH');
            $table->string('TENDANGNHAPADMIN', 50);
            $table->integer('SO_LUONG')->nullable();
            $table->float('DON_GIA')->nullable();
            $table->float('TIEN_TAM_TINH')->nullable();

            $table->foreign('TENDANGNHAPADMIN')->references('TENDANGNHAPADMIN')->on('admin')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gio_hang');
    }
}
