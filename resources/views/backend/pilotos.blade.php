@extends('comunes.masterBackend')

@section('title', 'Pilotos')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Pilotos</h1>
    <div class="card mx-3">
        <div class="card-body">
            <a href="{{ url('nuevo-piloto') }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-plus"></i>Nueva</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Equipo</th>
                        <th>Fecha de creación</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pilotos as $post)
                        <tr>
                            <td>{{ $post->nombre }}</td>
                            <td>{{ $post->equipo }}</td>
                            <td>
                                {{ $post->created_at }}
                            </td>
                            <td>
                                <a href="{{ url('editar-piloto/'.$post->id) }}" class="btn btn-primary"><i class="menu-icon fa-solid fa-pen-to-square"></i>Editar</a>
                                <a href="{{ url('eliminar-piloto/'.$post->id) }}" class="btn btn-danger"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar</a>
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
