<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patrocinadores;
use App\Models\Medios;
use Carbon\Carbon;

class PatrocinadoresController extends Controller
{
    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES FRONT   ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS PATROCINADOR EN LA PAGINA PRINCIPAL
   

    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES BACKEND ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS PATROCINADOR EN EL BACKEND
    public function backendVerPatrocinadores(Request $request)
    {
        $patrocinadores = Patrocinadores::orderBy('created_at', 'desc')->get();
        $medios = Medios::all();

        return view('backend.patrocinadores', compact('patrocinadores', 'medios'));
    }

    //VISTA PARA AÑADIR UNA NUEVO PATROCINADOR
    public function newPatrocinador(Request $request)
    {
        $medios = Medios::all();
        return view('backend.nuevoPatrocinador', compact('medios'));
    }

    //AÑADIR UN NUEVO PATROCINADOR
    public function addNewPatrocinador(Request $request)
    {
        $fechaActual = Carbon::now()->format('Y-m-d H:i:s');

        $patrocinador = new Patrocinadores();
        $patrocinador->nombre_patrocinador = $request->nombre_patrocinador;
        $patrocinador->id_imagen = $request->id_imagen;
        $patrocinador->created_at = $fechaActual;
        $patrocinador->save();

        return redirect('/entradas-patrocinadores');
    }

    //EDITAR UN PATROCINADOR
    public function editPatrocinador(Request $request, $id)
    {
        $patrocinador = Patrocinadores::find($id);
        $medios = Medios::all();

        return view('backend.editPatrocinador', compact('patrocinador', 'medios'));
    }

    //ACTUALIZAR UN PATROCINADOR
    public function updatePatrocinador(Request $request, $id)
    {
        $patrocinador = Patrocinadores::find($id);
        $patrocinador->nombre_patrocinador = $request->nombre_patrocinador;
        $patrocinador->id_imagen = $request->id_imagen;
        $patrocinador->save();

        return redirect('/entradas-patrocinadores');
    }

    //ELIMINAR UN PATROCINADOR
    public function deletePatrocinador(Request $request, $id)
    {
        $patrocinador = Patrocinadores::find($id);
        $patrocinador->delete();

        return redirect('/entradas-patrocinadores');
    }


}
