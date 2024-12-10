<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaksiTable extends Migration
{
    public function up()
    {
        Schema::create('saksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('no_hp');
            $table->enum('jenis_pemeriksa', ['pps', 'saksi', 'panwas']);
            $table->enum('jenis_saksi', ['saksi_pemilihan_presiden', 'saksi_pemilihan_dpr', 'saksi_pemilihan_prd_provinsi', 'dps']);
            $table->string('nama_pasang_kandidat');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('saksis');
    }
}
