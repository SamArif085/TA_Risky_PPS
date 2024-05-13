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
        Schema::create('jurnal_models', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis_jurnal')->nullable();
            $table->integer('id_dosen')->nullable();
            $table->string('judul_jurnal')->nullable();
            $table->string('link_jurnal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_models');
    }
};
