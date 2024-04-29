@extends('comunes.masterBackend')

@section('title', 'Equipos')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Equipos</h1>
    <div class="card mx-3">
        <div class="card-body">
            <a href="{{ url('nuevo-equipo') }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-plus"></i>Nuevo</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Nombre del equipo</th>
                        <th>Fecha de publicación</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $post)
                        <tr>
                            <td>{{ $post->anio }}</td>
                            <td>
                                {{ $post->nombre }}
                            </td>
                            <td>
                                {{ $post->created_at }}
                            </td>
                            <td>
                                <a href="{{ url('/editar-equipo/'.$post->id) }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-pen-to-square"></i>Editar</a>
                                <a href="{{ url('/eliminar-equipo/'.$post->id) }}" class="btn btn-danger"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
