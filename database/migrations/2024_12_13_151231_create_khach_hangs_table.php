<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('KHACHHANG', function (Blueprint $table) {
            $table->string('TENDANGNHAPKH', 50)->primary();
            $table->string('MATKHAUKH', 255)->nullable();
            $table->string('HOTENKH', 50)->nullable();
            $table->string('SDTKH', 10)->nullable();
            $table->string('EMAIL', 50)->nullable();
            $table->string('DIACHI', 255)->nullable();
            $table->string('ANHDAIDIENKH', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('KHACHHANG');
    }
};
