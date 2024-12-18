<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('DONHANG', function (Blueprint $table) {
            $table->increments('MADH');
            $table->date('NGAYDAT')->nullable();
            $table->string('DIACHIGIAOHANG', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('DONHANG');
    }
};
