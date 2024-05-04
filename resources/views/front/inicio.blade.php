@extends('comunes.master')

@section('title', 'Home')

@section('content')
    @include('layouts.slider')
    <div class="custom-margin mx-auto"> <!-- Agrega la clase mx-auto para centrar horizontalmente -->
        <div class="row justify-content-center">
            <div class="col-md-5 col-10"> <!-- Quita mx-2 para eliminar el margen -->
                <!-- Contenido de la primera columna -->
                <h1>¡Bienvenidos al Proyecto Lince!</h1>
                <h4>¿Quienes somos? </h4>
                <p>
                    Desarrollamos un proyecto educativo consistente en el diseño, construcción, pruebas y
                    conducción de vehículos ecológicos con los que participamos en competiciones de vehículos eficientes de
                    bajo consumo. El equipo está formado por profesores y alumnos de 1º de Bachillerato de Ciencias y
                    Tecnología del I.E.S. "Jándula" de Andújar (Jaén) que cursan la asignatura Tecnología Industrial.
                </p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="justify-content-left align-items-center">
                            @foreach ($contadores as $contador)
                                <h3 class="text-center">Shell Eco-Marathon {{ $contador->anio_competicion }}</h3>
                            @endforeach
                            <!--CAJA DEL CONTADOR-->
                            <div class="btn-primary h2 text-white p-md-3 mx-5 rounded text-center" id="countdown">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-10">

                <!-- Contenido de la segunda columna -->
                @foreach ($medios as $medio)
                    @if ($ultimoEquipo->id_imagen == $medio->id)
                        <img src="{{ asset('assets/uploads/' . $medio->nombre) }}" class="imagenes img-fluid"
                            alt="{{ $medio->nombre }}" style="max-width: 90%; height: auto;">
                    @endif
                @endforeach
            </div>
        </div>
        <br>
        <!--SECCION DE VEHICULOS-->
        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-10">
                <!-- Contenido de la primera columna -->
                <h2 class="text-center">Todos nuestros vehículos</h2>
                <div class="row justify-content-center">
                    @foreach ($vehiculos as $vehiculo)
                        <div class="col-md-2 col-4 mb-4">
                            <div class="card" style="width: auto; height: 200px;">
                                <!-- Cambia los valores de width y height según sea necesario -->
                                @foreach ($medios as $medio)
                                    @if ($vehiculo->id_imagen == $medio->id)
                                        <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                            class="card-img-top card-img-bottom img-fluid" alt="{{ $medio->nombre }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @endif
                                @endforeach
                            </div>
                            <h5 class="text-center mt-2">{{ $vehiculo->nombreVehiculo }}</h5>
                        </div>
                    @endforeach
                </div>
                <div class="row text-center">
                    <div class="col-md-6 mx-auto mb-3">
                        <!-- Puedes ajustar el tamaño del contenedor según tus necesidades -->
                        <a href="{{ url('vehiculos') }}" class="boton-blanco-inicio mt-4">Vehículos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--SECCION DE EN DIRECTO-->
    <div class="fondo-gris pb-4">
        <div class="custom-margin">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Contenido de la primera columna -->
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/img/sobre_nosotros.jpg') }}" class="imagenes img-fluid"
                                alt="arriba" style="width: 100%; height: 300px; object-fit: cover;">
                        </div>
                        <div class="col-md-2 d-none d-md-block">
                            <img src="{{ asset('assets/img/circuito-londres-2017.jpg') }}" class="imagenes img-fluid"
                                alt="abajo" style="width: 100%; height: 300px; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-white">Eco-Jándula Team en directo</h2>
                            <p class="text-white">
                                Sumérgete en la emocionante competición de la Shell Eco-Marathon Europe
                                {{ $contador->anio_competicion }} con nuestra plataforma de
                                telemetría en línea. Sigue minuto a minuto la competición, interactúa con otros
                                entusiastas y comparte la emoción de la carrera más ecológica del mundo.</p>
                            <p class="text-white">Únete ahora y vive la innovación verde al máximo. Descubre cómo nuestro
                                equipo
                                trabaja incansablemente para optimizar la eficiencia de nuestro vehículo y competir por la
                                gloria
                                en esta carrera hacia un futuro más sostenible. ¡Acompáñanos en esta emocionante travesía!
                            </p>
                            <div class="mt-5">
                                <!-- Puedes ajustar el tamaño del contenedor según tus necesidades -->
                                <a href="{{ url('https://gallant-elgamal.5-250-184-231.plesk.page/') }}"
                                    class="boton-negro btn-block" target="_blank"><i
                                        class="fa-solid fa-circle text-danger"></i> En directo </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--SECCION DE BLOG-->
    <div class="row justify-content-center mb-3">
        <div class="custom-margin">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Contenido de la primera columna -->
                    <h2 class="text-center">Últimas publicaciones</h2>
                    <div class="row p-4 justify-content-center">
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
                                            <p class="card-text">Fecha de publicación:
                                                {{ $fecha_publicacion->format('d-m-Y') }}</p>
                                            <!-- Cambio de formato de fecha -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-6 mx-auto mb-3">
                        <!-- Puedes ajustar el tamaño del contenedor según tus necesidades -->
                        <a href="{{ url('blog') }}" class="boton-blanco-inicio mt-4">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--SECCION DE PILOTOS-->
    <div class="fondo-gris pb-4">
        <div class="custom-margin mb-3">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Contenido de la primera columna -->
                    <h2 class="text-center text-white">Todos nuestros pilotos</h2>
                    <div class="row justify-content-center">
                        @foreach ($pilotos as $piloto)
                            <div class="col-md-2 col-4 mb-4">
                                <div class="card">
                                    @foreach ($medios as $medio)
                                        @if ($piloto->id_imagen == $medio->id)
                                            <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                                class="card-img-top card-img-bottom" alt="{{ $medio->nombre }}"
                                                style="width: auto; height: 200px; object-fit: cover;">
                                        @endif
                                    @endforeach
                                </div>
                                <h5 class="text-center mt-1 text-white">{{ $piloto->nombre }}</h5>
                            </div>
                        @endforeach
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6 mx-auto">
                            <!-- Puedes ajustar el tamaño del contenedor según tus necesidades -->
                            <a href="{{ url('pilotos') }}" class="boton-negro btn-block">Pilotos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--SECCION DE PATROCINADORES-->
    <div class="row justify-content-center">
        <div class="custom-margin">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Contenido de la primera columna -->
                    <h2 class="text-center">Patrocinadores</h2>
                    <div class="row justify-content-center"> <!-- Alineación horizontal al centro -->
                        @foreach ($patrocinadores as $patrocinador)
                            <div class="col-md-2 col-4 mb-4">
                                <div class="card">
                                    @foreach ($medios as $medio)
                                        @if ($patrocinador->id_imagen == $medio->id)
                                            <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                                class="card-img-top card-img-bottom" alt="{{ $medio->nombre }}"
                                                style="width: auto; 180px: auto; object-fit: cover; max-height: 180px;">
                                        @endif
                                    @endforeach
                                </div>
                                <h5 class="text-center">{{ $patrocinador->nombre }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--CONTADOR-->
    <script>
        function updateCountdown(counter) {
            let now = new Date().getTime();
            let distance = counter - now;
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = "Faltan " + days + " días";

            if (distance < 0) {
                clearInterval(interval);
                document.getElementById("countdown").innerHTML = "The time is now!";
                // Puedes agregar aquí acciones adicionales cuando la fecha límite expire
            }
        }

        let counter = new Date("{{ $contador->counter }}").getTime();
        let interval = setInterval(function() {
            updateCountdown(counter);
        }, 1000);
    </script>

@endsection
