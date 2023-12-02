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
        Schema::create('tb_lomba', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link_sertifikat');
            $table->string('status');
            $table->string('status_pengumpulan');
            $table->string('status_pengumpulan_ktm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_lomba');
    }
};
