@extends('comunes.masterBackend')

@section('title', 'Contador')

@section('content')
    <!--Mostrando la tabla con las entradas que hay-->
    <h1 class="p-4">Contador</h1>
    <div class="card mx-3">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h2 class="p-4"><i class="fa-solid fa-clock"></i> Actualizar fecha del contador</h2>
        </div>
        <div class="card-body">
            <form action="{{ url('actualizar-contador/'.$contador->id) }}" method="POST">
                @csrf
                <!-- Menú 1 //////////////////////////////////////////////////////////////////////////////////////////-->
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="anio_competicion">Año de la competición: </label>
                            <input type="text" name="anio_competicion" id="anio_competicion" class="form-control" value="{{$contador->anio_competicion}}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="counter">Día y fecha de inicio de la competición:</label>
                            <input type="datetime-local" name="counter" id="counter" class="form-control" value="{{ $contador->counter instanceof \DateTime ? $contador->counter->format('Y-m-d\TH:i:s') : date('Y-m-d\TH:i:s', strtotime($contador->counter)) }}" required>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h2>Vista previa:</h2>
                                    @foreach ($contadores as $contador)
                                        <h3 class="text-center">Shell Eco-Marathon {{ $contador->anio_competicion }}</h3>
                                    @endforeach
                                    <!--CAJA DEL CONTADOR-->
                                    <div class="btn-primary h2 text-white p-3 rounded mx-5 text-center" id="countdown">
                
                                    </div>
                                </div>
                            </div>
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
                    </div>
                </div>
                
            </form>
        </div>
        <!--COLUMNA 3 CONTADOR-->
        
    </div>

    <!-- Tu código JavaScript -->
    <script src="{{ asset('assets/js/controllerEditVehiculos.js') }}"></script>
    <script>
        function updateCountdown(counter) {
            let now = new Date().getTime();
            let distance = counter - now;
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(interval);
                document.getElementById("countdown").innerHTML = "The time is now!";
                // Puedes agregar aquí acciones adicionales cuando la fecha límite expire
            }
        }

        let counter = new Date("{{ $contador->counter }}").getTime();
        let interval = setInterval(function() {
            updateCountdown(counter);
        }, 1000);
    </script>

@endsection