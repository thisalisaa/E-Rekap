<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_add_tps_id_to_users_table.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->unsignedBigInteger('tps_id')->nullable()->after('id');
        $table->foreign('tps_id')->references('id')->on('tps')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['tps_id']);
        $table->dropColumn('tps_id');
    });
}

};
