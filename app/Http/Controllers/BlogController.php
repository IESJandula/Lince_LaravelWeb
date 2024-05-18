<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Medios;

class BlogController extends Controller
{
    //VER TODOS LOS POSTS DEL BLOG EN EL BACKEND
    public function backendVerPosts(Request $request)
    {
        $entradas = Blog::orderBy('fecha_publicacion', 'desc')->get();//ordenadas por fecha de publicación
        return view('backend.blog', compact('entradas'));

    }
    //VISTA PARA AÑADIR UNA NUEVA ENTRADA DE BLOG
    public function newEntrada(Request $request)
    {
        $medios = Medios::all()->reverse();

        return view('backend.nuevoBlog', compact('medios'));
    }
    //METODO POST PARA AÑADIR UNA NUEVA ENTRADA DE BLOG
    public function addNewPost(Request $request){
        //comprobar que los campos no estén vacíos
        $request->validate([
            'titulo' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'id_imagen' => 'required',
            'id_imagen_2' => 'nullable',
            'id_imagen_3' => 'nullable',
            'fecha_publicacion' => 'required'
        ]);

        $cantidadPublicaciones = Blog::count();
        $siguienteId = $cantidadPublicaciones + 1;
        //crear una nueva entrada
        $entrada=new Blog();
        $entrada->titulo=$request->titulo;
        $entrada->slug = $siguienteId.'-'.$request->slug;
        $entrada->descripcion=$request->descripcion;
        $entrada->id_imagen=$request->id_imagen;
        $entrada->id_imagen_2=$request->id_imagen_2;
        $entrada->id_imagen_3=$request->id_imagen_3;
        $entrada->fecha_publicacion=$request->fecha_publicacion;
        $entrada->save();

        //redirigir a la página de entradas
        return redirect('entradas')->with('success', '¡Datos guardados correctamente!');
    }

    //VISTA PARA EDITAR UNA ENTRADA DE BLOG
    public function editMedio(Request $request, $id)
    {
        $medios = Medios::all()->reverse();
        $entrada = Blog::find($id);
        return view('backend.editBlog', compact('medios', 'entrada'));
    }

    //METODO POST PARA ACTUALIZAR UNA ENTRADA DE BLOG
    public function updateMedio(Request $request, $id)
    {
        //comprobar que los campos no estén vacíos
        $request->validate([
            'titulo' => 'required',
            'slug' => 'required',
            'descripcion' => 'required',
            'id_imagen' => 'required',
            'id_imagen_2' => 'nullable',
            'id_imagen_3' => 'nullable',
            'fecha_publicacion' => 'required'
        ]);

        //actualizar la entrada
        $entrada=Blog::find($id);
        $entrada->titulo=$request->titulo;
        $entrada->slug = $request->slug;
        $entrada->descripcion=$request->descripcion;
        $entrada->id_imagen=$request->id_imagen;
        $entrada->id_imagen_2=$request->id_imagen_2;
        $entrada->id_imagen_3=$request->id_imagen_3;
        $entrada->fecha_publicacion=$request->fecha_publicacion;
        $entrada->save();

        //redirigir a la página de entradas
        return redirect('entradas')->with('success', '¡Datos actualizados correctamente!');
    }

    //METODO PARA BORRAR UNA ENTRADA DE BLOG
    public function deleteMedio(Request $request, $id)
    {
        $entrada=Blog::find($id);
        $entrada->delete();
        return redirect('entradas')->with('success', '¡Entrada eliminada correctamente!');
    }
}
