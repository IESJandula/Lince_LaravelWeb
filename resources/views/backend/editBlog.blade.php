@extends('comunes.masterBackend')

@section('title', 'Editando Entrada')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Editando entrada</h1>
    <div class="card mx-3">
        <div class="card-header d-flex align-items-center justify-content-between">

        </div>
        <div class="card-body">
            <form action="{{ url('actualizar-entrada/' . $entrada->id) }}" method="POST">
                @csrf
                <!-- Menú 1 //////////////////////////////////////////////////////////////////////////////////////////-->
                <li class="menu-item active open">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="alert alert-warning fs-6"><i class="fa-solid fa-circle-info"></i> Debe de volver a seleccionar las imágenes</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-primary" onclick="mostrarOcultarMenu('menuUbicaciones1')">
                                    <i class="menu-icon fa-solid fa-image"></i>
                                    <div data-i18n="Dashboards">Seleccionar Imágen Principal</div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="" id="informacion1"></div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-start">
                                <p>*Obligatoria</p>
                            </div>
                        </div>
                    </div>
                    <!-- AREA DE INFORMACION DE SI SE HA SELECCIONADO UNA IMAGEN -->
                    <ul class="menu-sub" id="menuUbicaciones1" style="display: none;">
                        <li class="menu-item">
                            <div data-i18n="CRM">
                                <div class="row mt-4">
                                    @foreach ($medios as $index => $imagen)
                                        @if ($index % 8 == 0 && $index != 0)
                                </div>
                                <div class="row mt-4">
                                    @endif
                                    <div class="col-md-1">
                                        <div class="card">
                                            <img src="{{ asset('assets/uploads/' . $imagen->nombre) }}"
                                                class="imagenesBlog rounded" alt="{{ $imagen->nombre }}">
                                            <div class="m-2 text-center">
                                                <input type="radio" class="opciones1" name="id_imagen"
                                                    id="{{ $imagen->id }}" value="{{ $imagen->id }}" required
                                                    onclick="mostrarOcultarUbicacionesCheck('1')">
                                                {{ $imagen->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Menú 2 /////////////////////////////////////////////////////////////////////////////////////-->
                <li class="menu-item active open">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-primary" onclick="mostrarOcultarMenu('menuUbicaciones2')">
                                    <i class="menu-icon fa-solid fa-image"></i>
                                    <div data-i18n="Dashboards">Seleccionar 2º Imágen</div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="" id="informacion2"></div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-start">
                                <p>Opcional</p>
                            </div>
                        </div>
                    </div>
                    <!-- AREA DE INFORMACION DE SI SE HA SELECCIONADO UNA IMAGEN -->
                    <ul class="menu-sub" id="menuUbicaciones2" style="display: none;">
                        <li class="menu-item">
                            <div data-i18n="CRM">
                                <div class="row mt-4">
                                    @foreach ($medios as $index => $imagen)
                                        @if ($index % 8 == 0 && $index != 0)
                                </div>
                                <div class="row mt-4">
                                    @endif
                                    <div class="col-md-1">
                                        <div class="card">
                                            <img src="{{ asset('assets/uploads/' . $imagen->nombre) }}"
                                                class="imagenesBlog rounded" alt="{{ $imagen->nombre }}">
                                            <div class="m-2 text-center">
                                                <input type="radio" class="opciones2" name="id_imagen_2"
                                                    id="{{ $imagen->id }}" value="{{ $imagen->id }}"
                                                    onclick="mostrarOcultarUbicacionesCheck('2')">
                                                {{ $imagen->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Menú 3 ///////////////////////////////////////////////////////////////////////////////////////-->
                <li class="menu-item active open">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-primary" onclick="mostrarOcultarMenu('menuUbicaciones3')">
                                    <i class="menu-icon fa-solid fa-image"></i>
                                    <div data-i18n="Dashboards">Seleccionar 3º Imágen</div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="" id="informacion3"></div>
                            </div>
                            <div class="col-md-3 d-flex align-items-center justify-content-start">
                                <p>Opcional</p>
                            </div>
                        </div>
                    </div>
                    <!-- AREA DE INFORMACION DE SI SE HA SELECCIONADO UNA IMAGEN -->
                    <ul class="menu-sub" id="menuUbicaciones3" style="display: none;">
                        <li class="menu-item">
                            <div data-i18n="CRM">
                                <div class="row mt-4">
                                    @foreach ($medios as $index => $imagen)
                                        @if ($index % 8 == 0 && $index != 0)
                                </div>
                                <div class="row mt-4">
                                    @endif
                                    <div class="col-md-1">
                                        <div class="card">
                                            <img src="{{ asset('assets/uploads/' . $imagen->nombre) }}"
                                                class="imagenesBlog rounded" alt="{{ $imagen->nombre }}">
                                            <div class="m-2 text-center">
                                                <input type="radio" class="opciones3" name="id_imagen_3"
                                                    id="{{ $imagen->id }}" value="{{ $imagen->id }}"
                                                    onclick="mostrarOcultarUbicacionesCheck('3')">
                                                {{ $imagen->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control"
                                value="{{ $entrada->titulo }}" required>
                        </div>
                        <div class="col-md-2">
                            <label for="fecha_publicacion">Fecha de publicación:</label>
                            <input type="date" name="fecha_publicacion" id="fecha_publicacion" class="form-control"
                                value="{{ $entrada->fecha_publicacion }}">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                value="{{ $entrada->slug }}" readonly>
                        </div>
                        <!--<div class="col-md-2">
                            <button type="button" id="generarSlug" class="btn btn-primary mt-4"><i
                                    class="menu-icon fa-solid fa-rotate"></i>Generar</button>
                        </div>-->
                        <div class="col-md-2">
                            <div class="mt-4" id="infoSlug">
                                <div class="alert alert-success" role="alert"> <i class="fa-solid fa-check"></i> Slug generado </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="myeditorinstance" class="form-control" rows="14">{{ $entrada->descripcion }}</textarea>
                        </div>
                    </div>
                </div>
                <!--BOTONES DE ENIVAR Y ELINIMAR-->
                <br>
                <div class="form-group p-4">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="menu-icon fa-solid fa-floppy-disk"></i>
                                Actualizar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ url('/entradas') }}" class="btn btn-danger"><i
                                    class="menu-icon fa-solid fa-xmark"></i>
                                Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/controllerEditBlog.js') }}"></script>

@endsection
