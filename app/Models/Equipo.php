<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = "equipo";
    protected $fillable = ['anio','nombre','slug','descripcion','id_imagen'];
}
