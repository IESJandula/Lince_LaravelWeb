<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contadores;

class ConfigController extends Controller
{
    //
    //CONFIGURACIÓN DEL CONTADOR
    public function contador(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $contador = Contadores::find(1);
        $contadores = Contadores::all();
        return view('backend.contador', compact('contador', 'contadores'));
    }

    //ACTUALIZAR CONTADOR
    public function updateContador(Request $request, $id)
    {
        //ACTUALIZAMOS EL CONTADOR
        $contador = Contadores::find($id);
        $contador->anio_competicion = $request->anio_competicion;
        $contador->counter = $request->counter;
        $contador->save();

        return redirect('/configuracion/contador');
    }

    //VISTA DE ACERCA DE
    public function acercaDe()
    {
        return view('backend.acercaDe');
    }
}
