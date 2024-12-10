<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hasil_pemilu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tps_id')->constrained('tps')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('jumlah_suara');
            $table->string('foto_hasil')->nullable();
            $table->enum('status_verifikasi', ['belum', 'terverifikasi'])->default('belum');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_pemilu');
    }
};
