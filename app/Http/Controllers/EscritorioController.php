<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Equipo;
use App\Models\Contadores;
use App\Models\Visit;
use Carbon\Carbon;

class EscritorioController extends Controller
{
    
    //MOSTRAR EL ESCRITORIO DEL BACKEND
    public function homeBackend(){

        $ultimas_entradas = Blog::orderBy('fecha_publicacion', 'desc')->take(3)->get();
        $ultimos_equipos = Equipo::orderBy('created_at', 'desc')->take(3)->get();
        $contadores = Contadores::all();

        // Obtener el contador de visitas diarias
        $currentDate = Carbon::today()->toDateString();
        $formattedDate = Carbon::today()->format('d-m-Y');

        $dailyVisits = Visit::whereDate('created_at', $currentDate)->count();

        return view('backend.home', compact('ultimas_entradas', 'ultimos_equipos', 'contadores','dailyVisits','formattedDate'));
    }
}
