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
        Schema::create('maestro_clase', function (Blueprint $table) {
            $table->unsignedBigInteger('maestro_id');
            $table->unsignedBigInteger('clase_id');
            $table->foreign('maestro_id')->references('id')->on('maestros')->onDelete('cascade');
            $table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maestros_clase');
    }
};
