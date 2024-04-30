@extends('comunes.masterBackend')

@section('title', 'Medios')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Medios</h1>
    <div class="card mx-3">
        <div class="card-body">
            <form action="{{ url('addMedios') }}" method="post" enctype="multipart/form-data" class="row g-3">
                @csrf
                <h2><i class="fa-solid fa-arrow-up-from-bracket"></i> Subir medio</h2>
                <!-- Primera columna -->
                <div class="col-md-6">
                    <label for="image" class="form-label">Seleccionar archivo (Tamaño máximo 1GB)</label>
                    <input type="file" name="image" class="form-control" accept="image/jpeg, image/png, image/jpg, image/gif" required>
                    <label for="image" class="form-label">Formatos aceptados: jpeg, jpg, png, gif</label>
                </div>
                <!-- Segunda columna -->
                <div class="col-md-6">
                    <label for="descripcion" class="form-label">Descripción (Opcional)</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripción" maxlength="50">
                </div>
                <!-- Botón de envío -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary m-3"><i class="menu-icon fa-solid fa-plus"></i> Subir archivos</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="card mx-3 mb-3">
        <div class="card-body">
            <table class="table table-striped">
                <h2><i class="fa-solid fa-image"></i> Biblioteca de medios</h2>
                <tbody>
                    @foreach ($medios as $index => $imagen)
                        @if ($index % 6 == 0)
                            </div><div class="row mt-4">
                        @endif
                        <div class="col-md-2">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/' . $imagen->nombre) }}" class="imagenesMedios rounded" alt="{{ $imagen->nombre }}">

                                <div class="m-2 text-center">
                                    <form action="{{ route('medios.delete', ['id' => $imagen->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <p>{{$imagen->nombre}}</p>
                                        <button class="btn btn-danger" type="submit"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mx-3">
        @include('comunes.footerBakend')
    </div>
@endsection
