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
        Schema::table('tb_kampus', function (Blueprint $table) {
            $table->foreignId('id_jenis_peserta')->after('name')->constrained('tb_jenis_peserta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_kampus', function (Blueprint $table) {
            $table->dropForeign(['id_jenis_peserta']);
            $table->dropColumn('id_jenis_peserta');
        });
    }
};
