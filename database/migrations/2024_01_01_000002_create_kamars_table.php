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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asrama_id')->constrained('asramas')->onDelete('cascade');
            $table->string('nomor_kamar');
            $table->integer('lantai');
            $table->integer('kapasitas');
            $table->string('status')->default('tersedia'); // tersedia / penuh
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
