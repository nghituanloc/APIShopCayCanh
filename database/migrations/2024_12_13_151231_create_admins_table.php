<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ADMIN', function (Blueprint $table) {
            $table->string('TENDANGNHAPADMIN', 50)->primary();
            $table->string('MATKHAUADMIN', 255)->nullable();
            $table->string('HOTENADMIN', 50)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ADMIN');
    }
};
