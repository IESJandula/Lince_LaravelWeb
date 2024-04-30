<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Carbon\Carbon;

class VisitsController extends Controller
{
    //
    public function visitsChart()
    {
        // DATOS PARA LA GRÁFICA DE VISITAS MENSUALES
        $visitsData = Visit::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as visits')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // DATOS PARA LA GRÁFICA DE VISITAS ANUALES
        $yearlyVisitsData = Visit::selectRaw('YEAR(created_at) as year, COUNT(*) as visits')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        // DATOS PARA LA GRÁFICA DE VISITAS POR DÍA DE LA SEMANA
        $weeklyVisitsData = Visit::selectRaw("DATE(created_at) as date, DAYNAME(created_at) as day, COUNT(*) as visits")
            ->groupBy('date', 'day')
            ->orderByRaw('FIELD(day, "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo")')
            ->get();

        // DATOS PARA CONTADORES TOTALES Y DIARIOS
        // Obtener el contador de visitas diarias
        $currentDate = Carbon::today()->toDateString();
        $formattedDate = Carbon::today()->format('d-m-Y');
        $dailyVisits = Visit::whereDate('created_at', $currentDate)->count();

        // Obtener el contador de visitas totales
        $totalVisits = Visit::count();

        $startOfWeek = Carbon::now()->startOfWeek()->format('d-m-Y');
        $endOfWeek = Carbon::now()->endOfWeek()->format('d-m-Y');

        return view('backend.estadisticas', compact('visitsData', 'yearlyVisitsData', 'weeklyVisitsData', 'dailyVisits', 'totalVisits', 'formattedDate', 'startOfWeek', 'endOfWeek'));
    }
}
