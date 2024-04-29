<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medios extends Model
{
    protected $table = "medios";
    protected $fillable = ['nombre_medio'];

    public function blog(){

        return $this->belongsTo(Blog::class,'id_imagen');
    }

    public function pilotos(){

        return $this->belongsTo(Pilotos::class,'id_imagen');
    }

    public function equipo(){

        return $this->belongsTo(Equipo::class,'id_imagen');
    }

    public function patrocinadores(){

        return $this->belongsTo(Patrocinadores::class,'id_imagen');
    }

}
