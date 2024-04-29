<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Carbon\Carbon;

class VisitsController extends Controller
{
    //
    public function visitsChart()
    {
        //DATOS PARA LA GRAFICA DE VIISTAS MENSUALES
        $visitsData = Visit::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as visits')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        //DATOS PARA LA GRAFICA DE VIISTAS ANUALES
        $yearlyVisitsData = Visit::selectRaw('YEAR(created_at) as year, COUNT(*) as visits')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

            
        //DATOS PARA CONTADORES TOTALES Y DIARIOS
        // Obtener el contador de visitas diarias
        $currentDate = Carbon::today()->toDateString();
        $formattedDate = Carbon::today()->format('d-m-Y');

        $dailyVisits = Visit::whereDate('created_at', $currentDate)->count();

        // Obtener el contador de visitas totales
        $totalVisits = Visit::count();
            
        return view('backend.estadisticas', compact('visitsData', 'yearlyVisitsData', 'dailyVisits', 'totalVisits','formattedDate'));
    }
}
