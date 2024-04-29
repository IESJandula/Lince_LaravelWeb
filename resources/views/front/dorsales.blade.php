@extends('comunes.master')

@section('title', 'Dorsales')

@section('content')
    <div class="custom-margin pb-4 mx-auto">
        <h1 class="text-center">Dorsales</h1>
        <!--Tarjetas-->
        <div class="row justify-content-center p-4">
            @foreach ($dorsales->chunk(6) as $chunk)
                <div class="row justify-content-center mb-4">
                    @foreach ($chunk as $dorsal)
                        <div class="col-md-2 col-4 mb-4">
                            <!-- En pantallas grandes y medianas, se mostrará una tarjeta por fila -->
                            <div class="card">
                                @foreach ($medios as $medio)
                                    @if ($dorsal->id_imagen == $medio->id)
                                        <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                            class="card-img-top img-fluid" alt="{{ $medio->nombre }}"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                    @endif
                                @endforeach
                                <div class="card-body">
                                    <h4 class="card-title">Año: {{ $dorsal->anio }}</h4>
                                    <p class="card-text">{!! $dorsal->descripcion !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection
