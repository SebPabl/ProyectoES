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
        Schema::create('estudiante_clase', function (Blueprint $table) {
            $table->unsignedBigInteger('estudiantes_id');
            $table->foreign('estudiantes_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->unsignedBigInteger('clases_id');
            $table->foreign('clases_id')->references('id')->on('clases')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_clase');
    }
};
