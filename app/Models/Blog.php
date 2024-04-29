<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blog";
    protected $fillable = ['titulo', 'slug','descripcion','id_imagen','id_imagen_2','id_imagen_3','fecha_publicacion'];

}
