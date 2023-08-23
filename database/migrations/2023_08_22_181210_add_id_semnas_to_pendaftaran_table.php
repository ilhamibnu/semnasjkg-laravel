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
        Schema::table('tb_pendaftaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_semnas')->after('id');
            $table->foreign('id_semnas')->references('id')->on('tb_semnas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_pendaftaran', function (Blueprint $table) {

            $table->dropForeign(['id_semnas']);
            $table->dropColumn('id_semnas');
        });
    }
};
