<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKadersTable extends Migration
{
    public function up()
    {
        Schema::create('kaders', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('provinsi_id')->constrained('provinsis')->onDelete('cascade');
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->onDelete('cascade');
            $table->foreignId('kecamatan_id')->constrained('kecamatans')->onDelete('cascade');
            $table->foreignId('kelurahan_id')->constrained('kelurahans')->onDelete('cascade');
            $table->string('tps');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kaders');
    }
}
