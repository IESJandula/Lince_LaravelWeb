<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconocimientos extends Model
{
    protected $table = "reconocimientos";
    protected $fillable = ['nombreReconocimiento', 'fecha','id_imagen'];

}