@extends('comunes.masterBackend')

@section('title', 'Dorsales')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Dorsales</h1>
    <div class="card mx-3">
        <div class="card-body">
            <a href="{{ url('nueva-dorsal') }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-plus"></i>Nuevo</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Descripción</th>
                        <th>Fecha de publicación</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dorsales as $post)
                        <tr>
                            <td>{{ $post->anio }}</td>
                            <td>{!! $post->descripcion !!}</td>
                            <td>
                                {{ $post->created_at }}
                            </td>
                            <td>
                                <a href="{{ url('/editar-dorsal/'.$post->id) }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-pen-to-square"></i>Editar</a>
                                <a href="{{ url('/eliminar-dorsal/'.$post->id) }}" class="btn btn-danger"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection