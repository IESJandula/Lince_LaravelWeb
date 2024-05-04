@extends('comunes.master')

@section('title', 'Blog')

@section('content')
    <style>
        .imagenCabeceraBlog {
            position: relative;
            background-image: url('{{ asset('assets/img/equipo_2014.jpg') }}');
            background-size: cover;
            background-position: center;
        }

        .imagenCabeceraBlog::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Color semi-transparente negro */
        }

        .imagenCabeceraBlog .container {
            position: relative;
            /* Asegura que el contenido se posicione correctamente */
            /* Asegura que el contenido esté por encima de la superposición */
        }
    </style>
    <div class="container-fluid p-0">
        <div class="jumbotron jumbotron-fluid imagenCabeceraBlog text-white">
            <div class="container p-5">
                <h1 class="text-center p-5 text-white font-weight-bold">Blog</h1>
            </div>
        </div>
    </div>
    <div class="custom-margin pb-5">
        <h4 class="m-4">{{ $totalBlogs }} publicaciones</h4>
        <!-- Tarjetas -->
        <div class="row p-4">
            @foreach ($blogs as $blog)
                <div class="col-md-3 mt-4">
                    <a href="{{ url('blog/' . $blog->id . '/' . $blog->slug) }}">
                        <div class="card mb-5 h-100"> <!-- Añade la clase h-100 aquí -->
                            @foreach ($medios as $medio)
                                @if ($blog->id_imagen == $medio->id)
                                    <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                        class="card-img-top img-fluid" alt="{{ $medio->nombre }}"
                                        style="width: auto; height: 200px; object-fit: cover;">
                                @endif
                            @endforeach
                            <div class="card-body">
                                <span class="badge rounded-pill bg-custom mb-2">Blog</span>
                                <h4 class="card-title">{{ $blog->titulo }}</h4>
                                @php
                                    $fecha_publicacion = \Carbon\Carbon::createFromFormat(
                                        'Y-m-d',
                                        $blog->fecha_publicacion,
                                    );
                                @endphp
                                <p class="card-text">Fecha de publicación: {{ $fecha_publicacion->format('d-m-Y') }}</p>
                                <!-- Cambio de formato de fecha -->
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection