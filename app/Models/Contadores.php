<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contadores extends Model
{
    protected $table = "contadores";
    protected $fillable = ['anio_competicion', 'counter'];

}