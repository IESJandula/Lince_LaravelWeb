<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = [
        'nombreVehiculo',
        'slug',
        'descripcion',
        'motor',
        'alimentacionCombustible',
        'arranque',
        'masa',
        'longitud',
        'anchura',
        'distanciaEntreRuedas',
        'alturaDesdeSuelo',
        'distranciaEntreEjes',
        'estructura',
        'carroceria',
        'superficiesTransparentes',
        'transmision',
        'neumaticos',
        'presionNeumaticos',
        'ruedas',
        'frenos',
        'id_imagen',
    ];

    public function imagen()
    {
        return $this->belongsTo(Medios::class, 'id_imagen');
    }
}
