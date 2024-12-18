<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('CHUA', function (Blueprint $table) {
            $table->integer('MAGH')->unsigned();
            $table->integer('MASP')->unsigned();
            $table->integer('SOLUONG')->nullable();

            $table->primary(['MAGH', 'MASP']);

            $table->foreign('MAGH')->references('MAGH')->on('GIOHANG')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('MASP')->references('MASP')->on('SANPHAM')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('CHUA');
    }
};
