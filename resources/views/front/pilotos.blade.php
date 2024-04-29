@extends('comunes.master')

@section('title', 'Pilotos')

@section('content')
    <div class="custom-margin pb-5">
        <h1 class="text-center">Pilotos</h1>
        <!--Tarjetas-->
        <div class="row justify-content-center p-4">
            @foreach ($pilotos as $piloto)
                <div class="col-md-3 col-6 mb-4">
                    <div class="card">
                        @foreach ($medios as $medio)
                            @if ($piloto->id_imagen == $medio->id)
                                <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                    class="card-img-top img-fluid" alt="{{ $medio->nombre }}"
                                    style="width: 100%; height: 300px; object-fit: cover;">
                            @endif
                        @endforeach
                        <div class="card-body">
                            <h4 class="card-title">{{ $piloto->nombre }}</h4>
                            <p>Año: {{ $piloto->equipo }}</p>
                            <p>{!! $piloto->descripcion !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Mostrar enlaces de paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $pilotos->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
