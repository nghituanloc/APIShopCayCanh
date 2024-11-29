<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemTable extends Migration
{
    public function up()
    {
        Schema::create('them', function (Blueprint $table) {
            $table->unsignedBigInteger('MA_SP');
            $table->unsignedBigInteger('MA_GH');
            $table->unsignedBigInteger('MA_KH');
            $table->integer('SOLUONG');

            $table->primary(['MA_SP', 'MA_GH', 'MA_KH']);
            $table->foreign('MA_SP')->references('MA_SP')->on('san_pham')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('MA_GH')->references('MA_GH')->on('gio_hang')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('MA_KH')->references('MA_KH')->on('khach_hang')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('them');
    }
}
