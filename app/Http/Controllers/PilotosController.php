<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilotos;
use App\Models\Medios;
use Carbon\Carbon;

class PilotosController extends Controller
{
    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES FRONT   ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS PILOTOS EN LA PAGINA PRINCIPAL
   

    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES BACKEND ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS PILOTOS EN EL BACKEND
    public function backendVerPilotos(Request $request)
    {
        $pilotos = Pilotos::orderBy('created_at', 'desc')->get();
        $medios = Medios::all();

        return view('backend.pilotos', compact('pilotos', 'medios'));
    }

    //NUEVO PILOTO
    public function newPiloto()
    {
        $medios = Medios::all()->reverse();
        return view('backend.nuevoPiloto', compact('medios'));
    }

    //INSERTAR NUEVO PILOTO
    public function addNewPiloto(Request $request)
    {
        //VALIDACIÓN DE CAMP
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'equipo' => 'required',
            'id_imagen' => 'required'
        ]);

        $cantidadPublicaciones = Pilotos::count();
        $siguienteId = $cantidadPublicaciones + 1;

        $fechaActual = Carbon::now()->format('Y-m-d H:i:s');

        $piloto = new Pilotos();
        $piloto->nombre = $request->nombre;
        $piloto->slug = $siguienteId."-".$request->slug;
        $piloto->descripcion = $request->descripcion;
        $piloto->equipo = $request->equipo;
        $piloto->id_imagen = $request->id_imagen;
        $piloto->created_at = $fechaActual;
        $piloto->save();


        return redirect()->route('backendPilotos.show');
    }

    //EDITAR PILOTO
    public function editPiloto(Request $request, $id)
    {
        $piloto = Pilotos::find($id);
        $medios = Medios::all()->reverse();
        return view('backend.editPiloto', compact('piloto', 'medios'));
    }

    //ACTUALIZAR PILOTO
    public function updatePiloto(Request $request, $id)
    {
        //VALIDACIÓN DE CAMPOS
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'equipo' => 'required',
            'id_imagen' => 'required'
        ]);

        $piloto = Pilotos::find($id);
        $piloto->nombre = $request->nombre;
        $piloto->slug = $request->slug;
        $piloto->descripcion = $request->descripcion;
        $piloto->equipo = $request->equipo;
        $piloto->id_imagen = $request->id_imagen;
        $piloto->save();

        return redirect()->route('backendPilotos.show');
    }

    //ELIMINAR PILOTO
    public function deletePiloto(Request $request, $id)
    {
        $piloto = Pilotos::find($id);
        $piloto->delete();

        return redirect()->route('backendPilotos.show');
    }

   
}
