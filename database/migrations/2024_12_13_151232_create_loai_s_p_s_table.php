<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('LOAISP', function (Blueprint $table) {
            $table->increments('MALOAI');
            $table->string('TENLOAI', 255)->nullable();
            $table->text('MOTALOAI')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('LOAISP');
    }
};
