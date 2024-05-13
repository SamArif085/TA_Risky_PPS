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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis_dosen')->nullable();
            $table->string('nama_dosen')->nullable();
            $table->string('foto_dosen')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('ig')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
