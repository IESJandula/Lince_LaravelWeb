@extends('comunes.master')

@section('title', 'Vehículos')

@section('content')
<div class="custom-margin mx-auto pb-5">
    <h1 class="text-center">Vehículos</h1>
    <!--Tarjetas-->
    <div class="row justify-content-center p-4">
        @foreach ($vehiculos->chunk(3) as $chunk)
            <div class="row mb-4 justify-content-center">
                @foreach ($chunk as $vehiculo)
                    <div class="col-md-4">
                        <div class="card mb-5">
                            @foreach ($medios as $medio)
                                @if ($vehiculo->id_imagen == $medio->id)
                                    <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                        class="card-img-top img-fluid" alt="{{ $medio->nombre }}"
                                        style="width: 100%; height: 300px; object-fit: cover;">
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h2 class="card-title">{{ $vehiculo->nombreVehiculo }}</h2>
                                <p class="card-text">{!! $vehiculo->descripcion !!}</p>
                                <br>
                                <p class="card-text"><b>Motor: </b>{{$vehiculo->motor}}</p>
                                <p class="card-text"><b>Alimentación Combustible: </b>{{$vehiculo->alimentacionCombustible}}</p>
                                <p class="card-text"><b>Arranque: </b>{{$vehiculo->arranque}}</p>
                                <p class="card-text"><b>Masa: </b>{{$vehiculo->masa}}</p>
                                <p class="card-text"><b>Longitud: </b>{{$vehiculo->longitud}}</p>
                                <p class="card-text"><b>Anchura: </b>{{$vehiculo->anchura}}</p>
                                <p class="card-text"><b>Distancia entre ruedas: </b>{{$vehiculo->distanciaEntreRuedas}}</p>
                                <p class="card-text"><b>Altura desde el suelo: </b>{{$vehiculo->alturaDesdeSuelo}}</p>
                                <p class="card-text"><b>Distancia entre ejes: </b>{{$vehiculo->distranciaEntreEjes}}</p>
                                <p class="card-text"><b>Estructura: </b>{{$vehiculo->estructura}}</p>
                                <p class="card-text"><b>Carrocería: </b>{{$vehiculo->carroceria}}</p>
                                <p class="card-text"><b>Transmisión: </b>{{$vehiculo->transmision}}</p>
                                <p class="card-text"><b>Neumáticos: </b>{{$vehiculo->neumaticos}}</p>
                                <p class="card-text"><b>Presión neumáticos: </b>{{$vehiculo->presionNeumaticos}}</p>
                                <p class="card-text"><b>Ruedas: </b>{{$vehiculo->ruedas}}</p>
                                <p class="card-text"><b>Frenos: </b>{{$vehiculo->frenos}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>


@endsection
