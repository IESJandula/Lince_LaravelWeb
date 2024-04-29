<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UsuariosController extends Controller
{
    //LISTAR USUARIOS
    public function listarAdministradores(){
        $administradores = User::all();
        return view('backend.usuarios', compact('administradores'));
    }
    //VISTA NUEVO USUARIO
    public function nuevoAdministradores(){
        return view('backend.nuevoUsuario');
    }
    //AGREGAR NUEVO USUARIO
    public function agregarAdministrador(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'password' => 'required|string|min:6',
        ], [
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, utiliza otro.',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        
        return redirect()->route('usuarios.show')->with('success', 'Administrador agregado exitosamente');
    }

    //VISTA EDITAR USUARIO
    public function editarAdministrador($id){
        $administrador = User::find($id);

        return view('backend.editUsuario', compact('administrador'));
    }

    //ACTUALIZAR USUARIO
    public function actualizarAdministrador(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],
            'password' => 'nullable|string|min:6',
        ], [
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, utiliza otro.',
        ]);

        $administrador = User::find($id);
        $administrador->name = $request->input('name');
        $administrador->email = $request->input('email');
        if($request->input('password')){
            $administrador->password = bcrypt($request->input('password'));
        }
        $administrador->save();

        return redirect()->route('usuarios.show')->with('success', 'Administrador actualizado exitosamente');
    }

    //ELIMINAR USUARIO
    public function eliminarAdministrador($id){
        $administrador = User::find($id);
        $administrador->delete();
        return redirect()->route('usuarios.show')->with('success', 'Administrador eliminado exitosamente');
    }
}

