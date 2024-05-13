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
        Schema::create('perstasi_models', function (Blueprint $table) {
            $table->id();
            $table->integer('id_master_akademik')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('waktu_perolehan')->nullable();
            $table->string('lokal')->nullable();
            $table->string('nasional')->nullable();
            $table->string('internasional')->nullable();
            $table->string('perstasi_yg_dicapai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perstasi_models');
    }
};
