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
        Schema::create('kalender_akademik', function (Blueprint $table) {
            $table->id();
            $table->integer('id_angkatan')->nullable();
            $table->string('kegiatan')->nullable();
            $table->date('tgl_jadwal_awal')->nullable();
            $table->date('tgl_jadwal_akhir')->nullable();
            $table->string('semester')->nullable();
            $table->string('ganjil_genap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalender_akademik');
    }
};
