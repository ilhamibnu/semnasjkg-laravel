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
        Schema::table('tb_lomba', function (Blueprint $table) {
            $table->foreignId('id_semnas')->nullable()->constrained('tb_semnas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_lomba', function (Blueprint $table) {
            $table->dropForeign(['id_semnas']);
            $table->dropColumn('id_semnas');
        });
    }
};
