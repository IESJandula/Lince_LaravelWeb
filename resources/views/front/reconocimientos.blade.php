@extends('comunes.master')

@section('title', 'Reconocimientos')

@section('content')
    <div class="custom-margin pb-5">
        <h1 class="text-center">Reconocimientos</h1>
        <!--Tarjetas-->
        <div class="row justify-content-center p-4">
            @foreach ($reconocimientos as $reconocimiento)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        @foreach ($medios as $medio)
                            @if ($reconocimiento->id_imagen == $medio->id)
                                <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                    class="card-img-top img-fluid" alt="{{ $medio->nombre }}"
                                    style="width: 100%; height: 300px; object-fit: cover;">
                            @endif
                        @endforeach
                        <div class="card-body">
                            <h4 class="card-title">{{ $reconocimiento->nombreReconocimiento }}</h4>
                            <p>Fecha: {{ $reconocimiento->fecha }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Mostrar enlaces de paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $reconocimientos->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
