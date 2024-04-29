<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Vehiculos;
use App\Models\Medios;
use Carbon\Carbon;


class VehiculosController extends Controller
{

    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES FRONT   ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    
    /*///////////////////////////////////////////////////////////////////*/
    /*/////////////////////// FUNCIONES BACKEND ////////////////////////*/
    /*/////////////////////////////////////////////////////////////////*/

    //VER TODOS LOS VEHICULOS EN EL BACKEND
    public function backendVerVehiculos(Request $request)
    {
        $vehiculos = Vehiculos::orderBy('created_at', 'desc')->get();
        return view('backend.vehicles', compact('vehiculos'));
    }

    //VISTA PARA AÑADIR UN NUEVO VEHICULO
    public function newVehiculo(Request $request)
    {
        $medios = Medios::all();
        return view('backend.nuevoVehiculo', compact('medios'));
    }

    //METODO POST PARA AÑADIR UN NUEVO VEHICULO
    public function addNewVehiculo (Request $request)
    {
        //comprobar que los campos no estén vacíos
        $request->validate([
            'nombreVehiculo' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'motor' => 'required',
            'alimentacionCombustible' => 'required',
            'arranque' => 'required',
            'masa' => 'required',
            'longitud' => 'required',
            'anchura' => 'required',
            'distanciaEntreRuedas' => 'required',
            'alturaDesdeSuelo' => 'required',
            'distranciaEntreEjes' => 'required',
            'estructura' => 'required',
            'carroceria' => 'required',
            'superficiesTransparentes' => 'required',
            'transmision' => 'required',
            'neumaticos' => 'required',
            'presionNeumaticos' => 'required',
            'ruedas' => 'required',
            'frenos' => 'required',
            'id_imagen' => 'required',

        ]);
        //obtener la fecha actual
        $fechaActual = Carbon::now()->format('Y-m-d H:i:s');

        $cantidadPublicaciones = Vehiculos::count();
        $siguienteId = $cantidadPublicaciones + 1;
        //crear un nuevo vehiculo
        $vehiculo = new Vehiculos();
        $vehiculo->nombreVehiculo = $request->nombreVehiculo;
        $vehiculo->slug = $request->slug . '-' . $siguienteId;
        $vehiculo->descripcion = $request->descripcion;
        $vehiculo->motor = $request->motor;
        $vehiculo->alimentacionCombustible = $request->alimentacionCombustible;
        $vehiculo->arranque = $request->arranque;
        $vehiculo->masa = $request->masa;
        $vehiculo->longitud = $request->longitud;
        $vehiculo->anchura = $request->anchura;
        $vehiculo->distanciaEntreRuedas = $request->distanciaEntreRuedas;
        $vehiculo->alturaDesdeSuelo = $request->alturaDesdeSuelo;
        $vehiculo->distranciaEntreEjes = $request->distranciaEntreEjes;
        $vehiculo->estructura = $request->estructura;
        $vehiculo->carroceria = $request->carroceria;
        $vehiculo->superficiesTransparentes = $request->superficiesTransparentes;
        $vehiculo->transmision = $request->transmision;
        $vehiculo->neumaticos = $request->neumaticos;
        $vehiculo->presionNeumaticos = $request->presionNeumaticos;
        $vehiculo->ruedas = $request->ruedas;
        $vehiculo->frenos = $request->frenos;
        $vehiculo->id_imagen = $request->id_imagen;
        $vehiculo->created_at = $fechaActual;
        $vehiculo->save();

        //redirigir a la página de vehiculos
        return redirect('entradas-vehiculos')->with('success', '¡Datos guardados correctamente!');
    }
    //VISTA PARA EDITAR UN VEHICULO
    public function editVehiculo(Request $request, $id)
    {
        $medios = Medios::all();
        $entrada = Vehiculos::find($id);
        return view('backend.editVehiculo', compact('medios', 'entrada'));
    }

    //METODO POST PARA ACTUALIZAR UN VEHICULO
    public function updateVehiculo(Request $request, $id)
    {
        //comprobar que los campos no estén vacíos
        $request->validate([
            'nombreVehiculo' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'motor' => 'required',
            'alimentacionCombustible' => 'required',
            'arranque' => 'required',
            'masa' => 'required',
            'longitud' => 'required',
            'anchura' => 'required',
            'distanciaEntreRuedas' => 'required',
            'alturaDesdeSuelo' => 'required',
            'distranciaEntreEjes' => 'required',
            'estructura' => 'required',
            'carroceria' => 'required',
            'superficiesTransparentes' => 'required',
            'transmision' => 'required',
            'neumaticos' => 'required',
            'presionNeumaticos' => 'required',
            'ruedas' => 'required',
            'frenos' => 'required',
            'id_imagen' => 'required',

        ]);

        //actualizar la entrada
        $vehiculo=Vehiculos::find($id);
        $vehiculo->nombreVehiculo = $request->nombreVehiculo;
        $vehiculo->slug = $request->slug;
        $vehiculo->descripcion = $request->descripcion;
        $vehiculo->motor = $request->motor;
        $vehiculo->alimentacionCombustible = $request->alimentacionCombustible;
        $vehiculo->arranque = $request->arranque;
        $vehiculo->masa = $request->masa;
        $vehiculo->longitud = $request->longitud;
        $vehiculo->anchura = $request->anchura;
        $vehiculo->distanciaEntreRuedas = $request->distanciaEntreRuedas;
        $vehiculo->alturaDesdeSuelo = $request->alturaDesdeSuelo;
        $vehiculo->distranciaEntreEjes = $request->distranciaEntreEjes;
        $vehiculo->estructura = $request->estructura;
        $vehiculo->carroceria = $request->carroceria;
        $vehiculo->superficiesTransparentes = $request->superficiesTransparentes;
        $vehiculo->transmision = $request->transmision;
        $vehiculo->neumaticos = $request->neumaticos;
        $vehiculo->presionNeumaticos = $request->presionNeumaticos;
        $vehiculo->ruedas = $request->ruedas;
        $vehiculo->frenos = $request->frenos;
        $vehiculo->id_imagen = $request->id_imagen;

        $vehiculo->save();

        //redirigir a la página de entradas
        return redirect('entradas-vehiculos')->with('success', '¡Datos actualizados correctamente!');
    }

    //METODO PARA BORRAR UN VEHICULO
    public function deleteMedio(Request $request, $id)
    {
        $entrada=Vehiculos::find($id);
        $entrada->delete();
        return redirect('entradas-vehiculos')->with('success', '¡Entrada eliminada correctamente!');
    }
}
