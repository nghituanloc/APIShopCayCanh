<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachHangTable extends Migration
{
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id('MA_KH');
            $table->string('TEN_DANG_NHAP', 30)->nullable();
            $table->string('MAT_KHAU', 255)->nullable();
            $table->string('TEN_KH', 100)->nullable();
            $table->text('DIA_CHI_KH')->nullable();
            $table->char('SDT_KH', 10)->nullable();
            $table->string('EMAIL_KH', 50)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('khach_hang');
    }
}
