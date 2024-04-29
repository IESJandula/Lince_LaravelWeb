<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reconocimientos;
use App\Models\Medios;


class ReconocimientosController extends Controller
{
    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES FRONT   ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS RECONOCIMIENTOS EN LA PAGINA PRINCIPAL
   

    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES BACKEND ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS RECONOCIMIENTOS EN EL BACKEND
    public function backendVerReconocimientos(Request $request)
    {
        $reconocimientos = Reconocimientos::all()->reverse();

        return view('backend.reconocimientos', compact('reconocimientos'));
    }

    //NUEVO RECONOCIMIENTO
    public function newReconocimiento()
    {
        $medios = Medios::all()->reverse();
        return view('backend.nuevoReconocimiento', compact('medios'));
    }

    //GUARDAR NUEVO RECONOCIMIENTO
    public function addNewReconocimiento(Request $request)
    {
        //VALIDACIÓN DE CAMP
        $request->validate([
            'nombreReconocimiento' => 'required',
            'fecha' => 'required',
            'id_imagen' => 'required'
        ]);

        $reconocimiento = new Reconocimientos();
        $reconocimiento->nombreReconocimiento = $request->nombreReconocimiento;
        $reconocimiento->fecha = $request->fecha;
        $reconocimiento->id_imagen = $request->id_imagen;
        $reconocimiento->save();

        return redirect('/entradas-reconocimientos');
    }

    //VISTA PARA EDITAR UN RECONOCIMIENTO
    public function editReconocimiento(Request $request)
    {
        $reconocimiento = Reconocimientos::find($request->id);
        $medios = Medios::all()->reverse();
        return view('backend.editarReconocimiento', compact('reconocimiento', 'medios'));
    }

    //ACTUALIZAR RECONOCIMIENTO
    public function updateReconocimiento(Request $request)
    {
        //VALIDACIÓN DE CAMP
        $request->validate([
            'nombreReconocimiento' => 'required',
            'fecha' => 'required',
            'id_imagen' => 'required'
        ]);

        $reconocimiento = Reconocimientos::find($request->id);
        $reconocimiento->nombreReconocimiento = $request->nombreReconocimiento;
        $reconocimiento->fecha = $request->fecha;
        $reconocimiento->id_imagen = $request->id_imagen;
        $reconocimiento->save();

        return redirect('/entradas-reconocimientos');
    }
    
    //ELIMINAR RECONOCIMIENTO
    public function deleteReconocimiento(Request $request)
    {
        $reconocimiento = Reconocimientos::find($request->id);
        $reconocimiento->delete();

        return redirect('/entradas-reconocimientos');
    }
}
