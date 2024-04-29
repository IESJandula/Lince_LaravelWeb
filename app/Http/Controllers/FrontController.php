<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Vehiculos;
use App\Models\Medios;
use App\Models\Pilotos;
use App\Models\Equipo;
use App\Models\Patrocinadores;
use App\Models\Blog;
use App\Models\Dorsales;
use App\Models\Contadores;
use App\Models\Visit;


use App\Mail\FormularioEnviado;
use App\Models\Reconocimientos;

use Carbon\Carbon;

class FrontController extends Controller
{
    //PÁGINA DE INICIO
    public function verHome(Request $request)
    {
        //PARTE PARA LAS ESTADISTICAS
        $visitorIp = request()->ip(); // Obtener la IP del visitante
        Visit::create(['visitor_ip' => $visitorIp]); // Registrar la visita

        //PASAMOS LOS DATOS A LA VISTA
        $vehiculos = Vehiculos::all();
        $equios = Equipo::all();
        $ultimoEquipo = Equipo::latest()->first();
        $pilotos = Pilotos::latest()->take(4)->get();
        $patrocinadores = Patrocinadores::all();
        $medios = Medios::all();
        $contadores = Contadores::all();
        $blogs = Blog::latest()->take(3)->get();

        //PASAR ELEMENTOS PARA EL SLIDER
        $ultimoVehiculo = Vehiculos::latest()->first();

        return view('front.inicio', compact('vehiculos', 'medios', 'pilotos', 'equios', 'patrocinadores', 'ultimoEquipo', 'contadores', 'ultimoVehiculo', 'blogs'));
    }

    //PÁGINA DE VEHÍCULOS
    public function verVehiculos(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $vehiculos = Vehiculos::all()->reverse();
        $medios = Medios::all();
        return view('front.vehiculos', compact('vehiculos', 'medios'));
    }

    //PÁGINA DE BLOG
    public function verBlog(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $fecha_actual = Carbon::now();
        $blogs = Blog::whereDate('fecha_publicacion', '<=', $fecha_actual)
            ->orderByDesc('fecha_publicacion')
            ->paginate(8);
        $medios = Medios::all();
        $totalBlogs = Blog::count();
        return view('front.blog', compact('medios', 'blogs', 'totalBlogs'));
    }

    //VER UNA ENTRADA DE BLOG
    public function verPost(Request $request, $id)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $medios = Medios::all();
        $blog = Blog::find($id);
        return view('front.post', compact('medios', 'blog'));
    }

    //PÁGINA DE SOBRE NOSOTROS
    public function verConocenos(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        // Obtener el último equipo
        $ultimoEquipo = Equipo::latest()->first();

        // Obtener el último piloto
        $ultimoPiloto = Pilotos::latest()->first();

        // Obtener la última dorsal registrada
        $ultimaDorsal = Dorsales::latest()->first();

        // Obtener la última dorsal registrada
        $ultimoVehiculo = Vehiculos::latest()->first();

        // Pasar los datos a la vista
        $medios = Medios::all();
        return view('front.sobreNosotros', compact('medios', 'ultimoEquipo', 'ultimoPiloto', 'ultimaDorsal', 'ultimoVehiculo'));
    }

    //PÁGINA DE EQUIPO
    public function verEquipo(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $equipos = Equipo::all()->reverse();
        $medios = Medios::all();
        return view('front.equipos', compact('equipos', 'medios'));
    }

    //PÁGINA DE DORSALES
    public function verDorsales(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $dorsales = Dorsales::all()->reverse();
        $medios = Medios::all();
        return view('front.dorsales', compact('dorsales', 'medios'));
    }

    //PÁGINA DE RECONOCIMIENTOS
    public function verReconocimientos(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $reconocimientos = Reconocimientos::orderBy('id', 'DESC')->paginate(10);
        $medios = Medios::all();
        return view('front.reconocimientos', compact('reconocimientos','medios'));
    }

    //PÁGINA DE PILOTOS
    public function verPilotos(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $pilotos = Pilotos::orderBy('id', 'DESC')->paginate(8);
        $medios = Medios::all();
        return view('front.pilotos', compact('pilotos','medios'));
    }

    //PÁGINA DE CONTACTO
    public function verContacto(Request $request)
    {
        //PASAMOS LOS DATOS A LA VISTA
        $medios = Medios::all();
        return view('front.contacto', compact('medios'));
    }

    //ENVIAR FORMULARIO DE CONTACTO
    public function enviarContacto(Request $request)
    {
        //VALIDAMOS LOS DATOS
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'asunto' => 'required',
            'telefono' => 'required',
            'comentario' => 'required'
        ]);

        //ENVIAMOS EL CORREO

        $datosFormulario = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'telefono' => $request->telefono,
            'comentario' => $request->comentario
        ];

        try {
            // Envío del correo electrónico
            Mail::to('franciscomanuel0052@gmail.com')->send(new FormularioEnviado($datosFormulario));

            // Si se envía correctamente, mostrar mensaje de éxito
            return redirect()->url('contacto')->with('success', 'El formulario se ha enviado correctamente. ¡Gracias!');
        } catch (\Exception $e) {
            // Si ocurre un error, mostrar mensaje de error
            return redirect()->url('contacto')->with('error', 'Ha ocurrido un error al enviar el formulario. Por favor, inténtalo de nuevo.');
        }
    }
}
