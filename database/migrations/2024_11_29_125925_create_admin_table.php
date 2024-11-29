<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->string('TENDANGNHAPADMIN', 50)->primary();
            $table->string('MATKHAUADMIN', 255)->nullable();
            $table->string('HOTENADMIN', 100)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
