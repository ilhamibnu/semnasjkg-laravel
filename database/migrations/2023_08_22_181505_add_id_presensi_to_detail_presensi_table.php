<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tb_detail_presensi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_presensi')->after('id');
            $table->foreign('id_presensi')->references('id')->on('tb_presensi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_detail_presensi', function (Blueprint $table) {
            $table->dropForeign(['id_presensi']);
            $table->dropColumn('id_presensi');
        });
    }
};
