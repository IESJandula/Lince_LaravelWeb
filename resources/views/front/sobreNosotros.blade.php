@extends('comunes.master')

@section('title', 'Sobre Nosotros')

@section('content')
    <style>
        .imagenCabeceraBlog {
            position: relative;
            background-image: url('{{ asset('assets/img/sobre_nosotros.jpg') }}');
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
                <h1 class="text-center p-5 text-white font-weight-bold">Sobre Nosotros</h1>
            </div>
        </div>
    </div>
    <div class="custom-margin mx-auto"> <!-- Agrega la clase mx-auto para centrar horizontalmente -->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- Contenido de la segunda columna -->
                @foreach ($medios as $medio)
                    @if ($ultimoEquipo->id_imagen == $medio->id)
                        <img src="{{ asset('assets/uploads/' . $medio->nombre) }}" class="imagenes img-fluid"
                            alt="{{ $medio->nombre }}" style="max-width: 90%; height: auto;">
                    @endif
                @endforeach
            </div>
            <div class="col-md-5 col-10"> <!-- Quita mx-2 para eliminar el margen -->
                <!-- Contenido de la primera columna -->
                <h1>¿Quienes somos?</h1>
                <p>
                    Bienvenidos a nuestro equipo. Somos un grupo de estudiantes y profesores del I.E.S. "Jándula" de Andújar
                    (Jaén), apasionados por la tecnología.
                </p>
                <p>
                    Nos dedicamos al diseño, construcción y conducción de vehículos ecológicos, participando en
                    competiciones que promueven la innovación y la sostenibilidad. Nuestro objetivo es inspirar a las
                    generaciones futuras a abrazar la tecnología para crear un mundo más limpio y sostenible.
                </p>
            </div>
        </div>
    </div>
    <div class="fondo-gris ">
        <div class="custom-margin mt-5 pb-4">
            <div class="row justify-content-center">
                <!-- Contenido de la primera columna -->
                <h2 class="text-center text-white">Descubre el proyecto Lince</h2>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3 text-center">
                    @foreach ($medios as $medio)
                        @if ($ultimoPiloto->id_imagen == $medio->id)
                            <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                class="imagenes img-fluid igual-tamaño" alt="{{ $medio->nombre }}">
                        @endif
                    @endforeach
                    <div class="mt-3">
                        <a href="{{ url('/conocenos/pilotos') }}" class="boton-negro btn-block">Pilotos</a>
                    </div>
                </div>
                <div class="col-md-3 mb-3 text-center">
                    @foreach ($medios as $medio)
                        @if ($ultimoEquipo->id_imagen == $medio->id)
                            <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                class="imagenes img-fluid igual-tamaño" alt="{{ $medio->nombre }}">
                        @endif
                    @endforeach
                    <div class="mt-3">
                        <a href="{{url('/conocenos/equipos')}}" class="boton-negro btn-block">Equipos</a>
                    </div>
                </div>
                <div class="col-md-3 mb-3 text-center">
                    @foreach ($medios as $medio)
                        @if ($ultimoVehiculo->id_imagen == $medio->id)
                            <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                class="imagenes img-fluid igual-tamaño" alt="{{ $medio->nombre }}">
                        @endif
                    @endforeach
                    <div class="mt-3">
                        <a href="{{ url('vehiculos') }}" class="boton-negro btn-block">Vehículos</a>
                    </div>
                </div>
                <div class="col-md-3 mb-3 text-center">
                    @foreach ($medios as $medio)
                        @if ($ultimaDorsal->id_imagen == $medio->id)
                            <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                class="imagenes img-fluid igual-tamaño" alt="{{ $medio->nombre }}">
                        @endif
                    @endforeach
                    <div class="mt-3">
                        <a href="{{ url('/conocenos/dorsales') }}" class="boton-negro btn-block">Dorsales</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="custom-margin mx-auto"> <!-- Agrega la clase mx-auto para centrar horizontalmente -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-5 col-10"> <!-- Quita mx-2 para eliminar el margen -->
                <!-- Contenido de la primera columna -->
                <h2>Nuestro 15 aniversario</h2>
                <p>
                    ¡Celebremos juntos 15 años de innovación y compromiso con la movilidad sostenible! El Proyecto Lince,
                    una iniciativa educativa nacida en el I.E.S. "Jándula" de Andújar (Jaén), ha marcado una década y media
                    de trabajo arduo, creatividad y pasión por la ingeniería y la ecología.
                </p>
                <p>
                    Desde el diseño y la construcción hasta las pruebas y la conducción, nuestro equipo, compuesto por
                    profesores y alumnos de 1º de Bachillerato de Ciencias y Tecnología, ha sido parte de competiciones de
                    vehículos eficientes de bajo consumo, dejando una huella positiva en la búsqueda de soluciones
                    ecológicas y eficientes para la movilidad del mañana.
                </p>
                <p>
                    En este 15º aniversario, recordamos nuestros logros y miramos hacia el futuro con entusiasmo, sabiendo
                    que cada paso que damos contribuye a un mundo más sostenible y responsable.
                </p>
                <p>
                    ¡Gracias a todos los que han sido parte de esta emocionante travesía!
                </p>
            </div>
            <div class="col-md-5">
                <!-- Contenido video -->
                <iframe width="660" height="415" src="https://www.youtube.com/embed/CL9A61K04T4?si=9mMeOx3DcYPDLVYx"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="row justify-content-center mt-5 mb-5">
            <h2 class="text-center">El proyecto Eco-Jándula</h2>
            <div class="col-md-8 text-center">
                <iframe width="900" height="500" src="https://www.youtube.com/embed/ZW7ptUqvoYE?si=FJfOsWHc_nnAsBnU"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>

    </div>


@endsection
