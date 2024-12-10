<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTpsTable extends Migration
{
    public function up()
    {
        Schema::create('tps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota_kabupaten');
            $table->string('provinsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tps');
    }
}
