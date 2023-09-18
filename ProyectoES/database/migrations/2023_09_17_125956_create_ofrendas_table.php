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
        Schema::create('ofrendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clases_id');
            $table->foreign('clases_id')->references('id')->on('clases')->onDelete('cascade');
            $table->decimal('monto',9,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofrendas');
    }
};
