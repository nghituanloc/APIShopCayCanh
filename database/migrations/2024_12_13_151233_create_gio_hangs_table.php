<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('GIOHANG', function (Blueprint $table) {
            $table->increments('MAGH');
            $table->string('TENDANGNHAPKH', 50);
            $table->integer('TAMTINH')->nullable();

            $table->foreign('TENDANGNHAPKH')->references('TENDANGNHAPKH')->on('KHACHHANG')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('GIOHANG');
    }
};
