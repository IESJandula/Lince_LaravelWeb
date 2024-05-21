@extends('comunes.masterBackend')

@section('title', 'Editar Vehículo')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Editar vehículo</h1>
    <div class="card mx-3">
        <div class="card-header d-flex align-items-center justify-content-between">

        </div>
        <div class="card-body">
            <form action="{{ url('actualizar-vehiculo/' . $entrada->id) }}" method="POST">
                @csrf
                <!--SELECCTOR DE IMAGEN-->
                <li class="menu-item active open">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-primary" onclick="mostrarOcultarUbicaciones()">
                                    <i class="menu-icon fa-solid fa-image"></i>
                                    <div data-i18n="Dashboards">Seleccionar Imágen Principal</div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="" id="informacion"></div>
                            </div>
                        </div>
                    </div>
                    <!-- AREA DE INFORMACION DE SI SE HA SELECCIONADO UNA IMAGEN -->
                    <ul class="menu-sub" id="menuUbicaciones" style="display: none;">
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
                                                    onclick="mostrarOcultarUbicacionesCheck()">
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
                        <div class="col-md-6">
                            <label for="nombreVehiculo">Nombre:</label>
                            <input type="text" name="nombreVehiculo" id="titulo" class="form-control" maxlength="100" value="{{$entrada->nombreVehiculo}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="motor">Motor:</label>
                            <input type="text" name="motor" id="motor" class="form-control" maxlength="100" value="{{$entrada->motor}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{$entrada->slug}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-4" id="infoSlug">
                                <div class="alert alert-success" role="alert"> <i class="fa-solid fa-check"></i> Slug generado </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="myeditorinstance" class="form-control" rows="5" maxlength="100" required>{{$entrada->descripcion}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="alimentacionCombustible">Alimentación Combustible:</label>
                            <input type="text" name="alimentacionCombustible" id="alimentacionCombustible" class="form-control" maxlength="100" value="{{$entrada->alimentacionCombustible}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="arranque">Arranque:</label>
                            <input type="text" name="arranque" id="arranque" class="form-control" maxlength="100" value="{{$entrada->arranque}}"required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="masa">Masa:</label>
                            <input type="text" name="masa" id="masa" class="form-control" maxlength="100" value="{{$entrada->masa}}"required>
                        </div>
                        <div class="col-md-6">
                            <label for="longitud">Longitud:</label>
                            <input type="text" name="longitud" id="longitud" class="form-control" maxlength="100" value="{{$entrada->longitud}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="anchura">Anchura:</label>
                            <input type="text" name="anchura" id="anchura" class="form-control" maxlength="100" value="{{$entrada->anchura}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="distanciaEntreRuedas">Distancia entre ruedas:</label>
                            <input type="text" name="distanciaEntreRuedas" id="distanciaEntreRuedas" class="form-control" maxlength="100" value="{{$entrada->distanciaEntreRuedas}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="alturaDesdeSuelo">Altura desde el suelo:</label>
                            <input type="text" name="alturaDesdeSuelo" id="alturaDesdeSuelo" class="form-control" maxlength="100" value="{{$entrada->alturaDesdeSuelo}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="distranciaEntreEjes">Distancia entre ejes:</label>
                            <input type="text" name="distranciaEntreEjes" id="distranciaEntreEjes" class="form-control" maxlength="100" value="{{$entrada->distranciaEntreEjes}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="estructura">Estructura:</label>
                            <input type="text" name="estructura" id="estructura" class="form-control" maxlength="100" value="{{$entrada->estructura}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="carroceria">Carrocería:</label>
                            <input type="text" name="carroceria" id="carroceria" class="form-control" maxlength="100" value="{{$entrada->carroceria}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="superficiesTransparentes">Superficies Transparentes:</label>
                            <input type="text" name="superficiesTransparentes" id="superficiesTransparentes" class="form-control" maxlength="100" value="{{$entrada->superficiesTransparentes}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="transmision">Transmisión:</label>
                            <input type="text" name="transmision" id="transmision" class="form-control" maxlength="100" value="{{$entrada->transmision}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="neumaticos">Neumáticos:</label>
                            <input type="text" name="neumaticos" id="neumaticos" class="form-control" maxlength="100" value="{{$entrada->neumaticos}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="presionNeumaticos">Presión Neumáticos:</label>
                            <input type="text" name="presionNeumaticos" id="presionNeumaticos" class="form-control" maxlength="100" value="{{$entrada->presionNeumaticos}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ruedas">Ruedas:</label>
                            <input type="text" name="ruedas" id="ruedas" class="form-control" maxlength="100" value="{{$entrada->ruedas}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="frenos">Frenos:</label>
                            <input type="text" name="frenos" id="frenos" class="form-control" maxlength="100" value="{{$entrada->frenos}}" required>
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
                            <a href="{{ url('/entradas-vehiculos') }}" class="btn btn-danger"><i
                                    class="menu-icon fa-solid fa-xmark"></i>
                                Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tu código JavaScript -->
    <script src="{{ asset('assets/js/controllerEditVehiculos.js') }}"></script>

@endsection
