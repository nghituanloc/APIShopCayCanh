<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('SANPHAM', function (Blueprint $table) {
            $table->increments('MASP');
            $table->integer('MALOAI')->unsigned();
            $table->string('TENSP', 255)->nullable();
            $table->string('HINHANHSP', 255)->nullable();
            $table->text('MOTASP')->nullable();
            $table->string('GIASP', 255)->nullable();

            $table->foreign('MALOAI')->references('MALOAI')->on('LOAISP')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('SANPHAM');
    }
};
