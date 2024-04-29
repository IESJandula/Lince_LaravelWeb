@extends('comunes.masterBackend')

@section('title', 'Editar usuario')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Editar usuario</h1>
    <div class="card mx-3">
        <div class="card-header d-flex align-items-center justify-content-between">

        </div>
        <div class="card-body">
            <form action="{{ url('/configuracion/actualizar-usuario/'. $administrador->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$administrador->name}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{$administrador->email}}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <h5 class="mt-5"><span class="badge bg-warning">IMPORTANTE</span> Si no desea cambiar la contraseña, deje el campo vacío</h5>
                        <div class="col-md-6">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                </div>
                <!--BOTONES DE ENIVAR Y ELINIMAR-->
                <br>
                <div class="form-group p-4">
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary"><i class="menu-icon fa-solid fa-floppy-disk"></i>
                                Actualizar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ url('/configuracion/usuarios') }}" class="btn btn-danger"><i
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
