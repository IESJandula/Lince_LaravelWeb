@extends('comunes.masterBackend')

@section('title', 'Acerca de')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Acerca de</h1>
    <div class="card mx-3">
        <div class="card-body">
            <h2>Información del proyecto</h2>
            <h2 class="badge bg-primary">Desarrollador</h2>
            <ul>
                <a href="{{url('https://github.com/francis65000')}}" target="_blank">Francisco Manuel Gutiérrez Carmona <i class="fa-solid fa-arrow-up-right-from-square"></i></a> 
            </ul>
            <h2 class="badge bg-primary">Versión actual</h2>
            <ul>
                <h6>@include('comunes.version')</h6>
            </ul>
            <h2 class="badge bg-primary">Desarrollado con</h2>
            <ul class="list-unstyled d-flex justify-content-left text-center">
                <li class="mx-4">
                    <i class="fa-brands fa-html5 h1"></i><p>HTML5</p>
                </li>
                <li class="mx-4">
                    <i class="fa-brands fa-css3-alt h1"></i><p>CSS 3</p>
                </li>
                <li class="mx-4">
                    <i class="fa-brands fa-php h1"></i><p>PHP 8</p>
                </li>
                <li class="mx-4">
                    <i class="fa-brands fa-laravel h1"></i><p>Laravel 10</p>
                </li>
                <li class="mx-4">
                    <i class="fa-brands fa-bootstrap h1"></i><p>Bootstrap 5</p>
                </li>
                <li class="mx-4">
                    <i class="fa-brands fa-js h1"></i><p>Javascript</p>
                </li>
            </ul>
        </div>
    </div>


@endsection
