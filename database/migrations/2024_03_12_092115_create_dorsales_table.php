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
        Schema::create('dorsales', function (Blueprint $table) {
            $table->id();
            $table->string('anio', 100);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_imagen');
            $table->timestamps();

            $table->foreign('id_imagen')->references('id')->on('medios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dorsales');
    }
};
