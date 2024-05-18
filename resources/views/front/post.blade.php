@extends('comunes.master')

@section('title', $blog->titulo)

@section('content')
    <div class="custom-margin mx-auto pb-5">
        <!-- Tarjeta -->
        <div class="row justify-content-center p-4">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="card-title">{{ $blog->titulo }}</h1>
                                <span class="badge rounded-pill bg-custom mb-2">Blog</span>
                                <br>
                                <p class="card-text">{!! $blog->descripcion !!}</p>
                            </div>
                            <div class="col-md-5">
                                @foreach ($medios as $medio)
                                    @if ($blog->id_imagen == $medio->id)
                                        <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                            class="card-img-top card-img-bottom img-fluid" alt="{{ $medio->nombre }}"
                                            style="width: 100%; object-fit: cover;">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!--GALERIA DE IMAGENES-->
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($medios as $medio)
                                    @if ($blog->id_imagen_2 == $medio->id)
                                        <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                            class="card-img-top card-img-bottom img-fluid" alt="{{ $medio->nombre }}"
                                            style="width: 100%; height: 400px; object-fit: cover;">
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                @foreach ($medios as $medio)
                                    @if ($blog->id_imagen_3 == $medio->id)
                                        <img src="{{ asset('assets/uploads/' . $medio->nombre) }}"
                                            class="card-img-top card-img-bottom img-fluid" alt="{{ $medio->nombre }}"
                                            style="width: 100%; height: 400px; object-fit: cover;">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="row text-left">
                            <div class="col-md-12 mx-auto mb-3">
                                <!-- Puedes ajustar el tamaño del contenedor según tus necesidades -->
                                <a href="{{ url('blog') }}" class="boton-blanco-inicio mt-4"><i class="menu-icon fa-solid fa-arrow-left"></i> Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
