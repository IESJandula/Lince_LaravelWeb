<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dorsales extends Model
{
    protected $table = "dorsales";
    protected $fillable = ['anio','descripcion','id_imagen'];

}