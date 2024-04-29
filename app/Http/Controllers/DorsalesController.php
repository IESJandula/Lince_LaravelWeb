<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dorsales;
use App\Models\Medios;
use Carbon\Carbon;

class DorsalesController extends Controller
{
    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES FRONT   ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODAS LAS DORSALES EN LA PAGINA PRINCIPAL
   

    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES BACKEND ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODAS LAS DORSALES EN EL BACKEND
    public function backendVerDorsales(Request $request)
    {
        $dorsales = Dorsales::orderBy('created_at', 'desc')->get();
        $medios = Medios::all();

        return view('backend.dorsales', compact('dorsales', 'medios'));
    }

    //VISTA PARA AÑADIR UNA NUEVA DORSAL
    public function newDorsal(Request $request)
    {
        $medios = Medios::all();
        return view('backend.nuevoDorsal', compact('medios'));
    }

    //METODO POST PARA AÑADIR UNA NUEVA DORSAL
    public function addNewDorsal(Request $request)
    {
        //comprobar que los campos no estén vacíos
        $request->validate([
            'anio' => 'required',
            'descripcion' =>  'required',
            'id_imagen' => 'required'
        ]);

        $fechaActual = Carbon::now()->format('Y-m-d H:i:s');
        //crear una nueva dorsal
        $dorsal = new Dorsales;
        $dorsal->anio = $request->anio;
        $dorsal->descripcion = $request->descripcion;
        $dorsal->id_imagen = $request->id_imagen;
        $dorsal->created_at = $fechaActual;
        $dorsal->save();

        return redirect('/entradas-dorsales');
    }

    //VISTA PARA EDITAR UNA DORSAL
    public function editDorsal(Request $request, $id)
    {
        $dorsal = Dorsales::find($id);
        $medios = Medios::all();
        return view('backend.editDorsal', compact('dorsal', 'medios'));
    }

    //METODO POST PARA ACTUALIZAR UNA DORSAL
    public function updateDorsal(Request $request, $id)
    {
        //comprobar que los campos no estén vacíos
        $request->validate([
            'anio' => 'required',
            'descripcion' =>  'required',
            'id_imagen' => 'required'
        ]);

        $fechaActual = Carbon::now()->format('Y-m-d H:i:s');
        //actualizar la dorsal
        $dorsal = Dorsales::find($id);
        $dorsal->anio = $request->anio;
        $dorsal->descripcion = $request->descripcion;
        $dorsal->id_imagen = $request->id_imagen;
        $dorsal->updated_at = $fechaActual;
        $dorsal->save();

        return redirect('/entradas-dorsales');
    }

    //METODO PARA ELIMINAR UNA DORSAL
    public function deleteDorsal(Request $request, $id)
    {
        $dorsal = Dorsales::find($id);
        $dorsal->delete();

        return redirect('/entradas-dorsales');
    }
}
