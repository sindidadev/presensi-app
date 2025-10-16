<?php namespace Sindida\Pegawai\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class CreatePegawaisTable extends Migration
{
    public function up()
    {
        Schema::create('pegawai', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
