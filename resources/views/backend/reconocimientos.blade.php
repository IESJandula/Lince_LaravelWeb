@extends('comunes.masterBackend')

@section('title', 'Reconocimientos')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Reconocimientos</h1>
    <div class="card mx-3">
        <div class="card-body">
            <a href="{{ url('nuevo-reconocimiento') }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-plus"></i>Nueva</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reconocimientos as $post)
                        <tr>
                            <td class="maximoColumna">{{ $post->nombreReconocimiento }}</td>
                            <td>
                                {{ $post->fecha }}
                            </td>
                            <td>
                                <a href="{{ url('editar-reconocimiento/'.$post->id) }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-pen-to-square"></i>Editar</a>
                                <a href="{{ url('eliminar-reconocimiento/'.$post->id) }}" class="btn btn-danger"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mx-3">
        @include('comunes.footerBakend')
    </div>
@endsection
