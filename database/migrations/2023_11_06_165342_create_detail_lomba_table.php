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
        Schema::create('tb_detail_lomba', function (Blueprint $table) {
            $table->id();
            $table->string('link_pengumpulan');
            $table->string('link_pengumpulan_ktm');
            $table->string('status_unduh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_detail_lomba');
    }
};
