@extends('comunes.masterBackend')

@section('title', 'Usuarios')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Usuarios</h1>
    <div class="card mx-3">
        <div class="card-body">
            <a href="{{ url('/configuracion/nuevo-usuario') }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-plus"></i>Nuevo</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administradores as $post)
                        <tr>
                            <td>
                                {{ $post->name }}
                            </td>
                            <td>
                                {{ $post->email }}
                            </td>
                            <td>
                                <a href="{{ url('configuracion/editar-usuario/'.$post->id) }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-pen-to-square"></i>Editar</a>
                                <a href="{{ url('configuracion/eliminar-usuario/'.$post->id) }}" id="eliminarUsuario" class="btn btn-danger"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById("eliminarUsuario").onclick = function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
            
            if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
                window.location.href = event.target.href; // Si el usuario confirma, redirigir para eliminar
            } else {
                // Si el usuario cancela, no hacer nada
            }
        };
    </script>

@endsection
