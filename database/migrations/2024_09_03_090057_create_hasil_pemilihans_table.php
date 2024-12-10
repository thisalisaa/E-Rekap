<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPemilihansTable extends Migration
{
    public function up()
    {
        Schema::create('hasil_pemilihans', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->foreignId('saksi_id')->constrained('saksis')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('hasil_pemilihans');
    }
}
