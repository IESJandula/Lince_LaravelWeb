<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Medios;
use Carbon\Carbon;

class EquiposController extends Controller
{
    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES FRONT   ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS EQUIPO EN LA PAGINA PRINCIPAL
    public function verEquipos(Request $request)
    {
        $equipos = Equipo::all();
        $medios = Medios::all();
        return view('front.inicio', compact('equipos','medios'));
    }

    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES BACKEND ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS EQUIPO EN EL BACKEND
    public function backendVerEquipos(Request $request)
    {
        $equipos = Equipo::orderBy('created_at', 'desc')->get();
        return view('backend.equipos', compact('equipos'));
    }

    //VISTA PARA AÑADIR UN NUEVO EQUIPO
    public function newEquipo(Request $request)
    {
        $medios = Medios::all();
        return view('backend.nuevoEquipo', compact('medios'));
    }

    //METODO POST PARA AÑADIR UN NUEVO EQUIPO
    public function addNewEquipo (Request $request)
    {
        //comprobar que los campos no estén vacíos
        $request->validate([
            'nombre' => 'required',
            'anio' =>  'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'id_imagen' => 'required'
        ]);

        $fechaActual = Carbon::now()->format('Y-m-d H:i:s');

        $cantidadPublicaciones = Equipo::count();
        $siguienteId = $cantidadPublicaciones + 1;
        //crear un nuevo vehiculo
        $equipo = new Equipo;
        $equipo->nombre = $request->nombre;
        $equipo->slug = $siguienteId. '-' . $request->slug;
        $equipo->anio = $request->anio;
        $equipo->descripcion = $request->descripcion;
        $equipo->id_imagen = $request->id_imagen;
        $equipo->created_at = $fechaActual;

        $equipo->save();

        return redirect('/entradas-equipos');
    }

    //VISTA PARA EDITAR UN EQUIPO
    public function editEquipo(Request $request, $id)
    {
        $equipo = Equipo::find($id);
        $medios = Medios::all();
        return view('backend.editEquipos', compact('equipo','medios'));
    }

    //METODO POST PARA ACTUALIZAR UN EQUIPO
    public function updateEquipo(Request $request, $id)
    {
        //comprobar que los campos no estén vacíos
        $request->validate([
            'nombre' => 'required',
            'anio' =>  'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'id_imagen' => 'required'
        ]);

        $equipo = Equipo::find($id);
        $equipo->nombre = $request->nombre;
        $equipo->slug = $request->slug;
        $equipo->anio = $request->anio;
        $equipo->descripcion = $request->descripcion;
        $equipo->id_imagen = $request->id_imagen;

        $equipo->save();

        return redirect('/entradas-equipos');
    }

    //METODO DELETE PARA ELIMINAR UN EQUIPO
    public function deleteEquipo(Request $request, $id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();
        return redirect('/entradas-equipos');
    }
}
