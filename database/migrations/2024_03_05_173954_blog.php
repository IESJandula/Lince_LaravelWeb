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
        //
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_imagen');
            $table->unsignedBigInteger('id_imagen_2')->nullable();
            $table->unsignedBigInteger('id_imagen_3')->nullable();
            $table->date('fecha_publicacion');
            $table->timestamps();

            // Definición de la clave foránea
            $table->foreign('id_imagen')->references('id')->on('medios')->onDelete('cascade');
            $table->foreign('id_imagen_2')->references('id')->on('medios')->onDelete('cascade');
            $table->foreign('id_imagen_3')->references('id')->on('medios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('blog');
    }
};
