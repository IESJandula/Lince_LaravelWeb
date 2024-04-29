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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreVehiculo', 100);
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->string('motor', 100);
            $table->string('alimentacionCombustible', 100);
            $table->string('arranque', 100);
            $table->string('masa', 100);
            $table->string('longitud', 100);
            $table->string('anchura', 100);
            $table->string('distanciaEntreRuedas', 100);
            $table->string('alturaDesdeSuelo', 100);
            $table->string('distranciaEntreEjes', 100);
            $table->string('estructura', 100);
            $table->string('carroceria', 100);
            $table->string('superficiesTransparentes', 100);
            $table->string('transmision', 200);
            $table->string('neumaticos', 100);
            $table->string('presionNeumaticos', 100);
            $table->string('ruedas', 100);
            $table->string('frenos', 100);
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
        //
        Schema::dropIfExists('vehiculos');
    }
};
