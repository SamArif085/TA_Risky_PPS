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
        Schema::create('mata_kuliah_models', function (Blueprint $table) {
            $table->id();
            $table->integer('id_semester')->nullable();
            $table->string('kode')->nullable();
            $table->string('mata_kuliah')->nullable();
            $table->string('teori')->nullable();
            $table->string('praktek')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah_models');
    }
};
