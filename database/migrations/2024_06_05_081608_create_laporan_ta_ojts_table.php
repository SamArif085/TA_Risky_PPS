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
        Schema::create('laporan_ta_ojts', function (Blueprint $table) {
            $table->id();
            $table->integer('angkatan')->nullable();
            $table->integer('kategori')->nullable();
            $table->string('nama')->nullable();
            $table->string('judul')->nullable();
            $table->string('file')->nullable();
            $table->date('tahun')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_ta_ojts');
    }
};
