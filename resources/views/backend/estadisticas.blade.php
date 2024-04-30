@extends('comunes.masterBackend')

@section('title', 'Estadísticas')

@section('content')
    <!--Mostrando las graficas mensuales y anuales-->
    <h1 class="p-4">Estadísticas</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mx-3">
                    <div class="card-body">
                        <h2 class="card-title">Visitas mensuales</h2>
                        <canvas id="monthlyVisitsChart" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mx-3">
                    <div class="card-body">
                        <h2 class="card-title">Visitas anuales</h2>
                        <canvas id="yearlyVisitsChart" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card mx-3">
                    <div class="card-body">
                        <h2 class="card-title">Visitas semanales</h2>
                        <h5>Semana del {{ $startOfWeek }} al {{ $endOfWeek }}</h5>
                        <canvas id="weeklyVisitsChart" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mx-3">
                    <div class="card-body pb-0">
                        <h2 class="card-title">Visitas diarias y totales</h2>
                        <h4 class="card-title">Visitas hoy {{ $formattedDate }} :
                            <span class="badge btn-success h3">{{ $dailyVisits }}</span>
                        </h4>
                        <h4 class="card-title">Visitas totales:
                            <span class="badge btn-primary h3">{{ $totalVisits }}</span>
                        </h4>
                    </div>
                </div>
                <div class="card mx-3 my-2">
                    <div class="card-body">
                        <h2 class="card-title">Acciones</h2>
                        <a class="btn btn-primary text-white"><i class="menu-icon fa-solid fa-download"></i>Exportar todos
                            los registros</a>
                        <button class="btn btn-danger" onclick="toggleVentana()"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar todos
                            los registros</button>
                    </div>
                    <div class="card-body border border-danger border-5 p-0 mx-5 my-2 d-none" id="ventanaEliminar">
                        <h3 class="bg-danger text-white p-2 mb-0" style="border: none;">¡Atención!</h3>
                        <p class="mx-3 my-3">Vas a eliminar todos los registros de estadísticas. Es una acción que no se puede deshacer. <br>¿Deséas eliminar todos los registros?</p>
                        <button class="btn btn-success text-white mx-2 my-3" onclick="toggleVentana()"><i
                                class="menu-icon fa-solid fa-right-from-bracket"></i>Cancelar y volver</button>
                        <a class="btn btn-danger text-white mx-3 my-3"><i class="menu-icon fa-solid fa-xmark"></i>Eliminar
                            definitivamente</a>
                    </div>

                </div>
            </div>
        </div>
        @include('comunes.footerBakend')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Funcion para mostrar la ventana de eliminar datos
        function toggleVentana() {
            var ventana = document.getElementById("ventanaEliminar");
            ventana.classList.toggle("d-none"); // Agrega o quita la clase "d-none" para mostrar u ocultar la ventana
        }
        // Función para obtener el nombre del mes a partir de la fecha en formato "YYYY-MM"
        function getMonthNameFromDate(dateString) {
            let [year, month] = dateString.split('-');
            let date = new Date(year, month - 1);
            // Obtener el nombre del mes
            let monthName = date.toLocaleString('default', {
                month: 'long'
            });
            // Convertir la primera letra del mes a mayúscula
            monthName = monthName.charAt(0).toUpperCase() + monthName.slice(1);
            return monthName;
        }

        //PARA CONSTRUIR LA GRAFICA EN 2D
        let ctxMonthly = document.getElementById('monthlyVisitsChart').getContext('2d');
        let ctxYearly = document.getElementById('yearlyVisitsChart').getContext('2d');

        //DATOS DE VISITAS DE LA BASE DE DATOS
        let visitsData = @json($visitsData);
        let yearlyVisitsData = @json($yearlyVisitsData);

        //LISTADO DE MESES
        let months = visitsData.map(data => data.month);

        //LISTADO DE VISITAS
        let visits = visitsData.map(data => data.visits);

        //LISTADO DE AÑOS
        let years = yearlyVisitsData.map(data => data.year);
        let yearlyVisits = yearlyVisitsData.map(data => data.visits);

        /////////////////////////////////////////////////////////////////////////////////////////////////
        //  VISITAS MENSUALES  /////////////////////////////////////////////////////////////////////////
        ///////////////////////////////////////////////////////////////////////////////////////////////

        //Función para obtenerl el nombre del mes
        let monthLabels = months.map(month => getMonthNameFromDate(month));

        //Gráfica
        let monthlyChart = new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: monthLabels, // Utilizamos los nombres de los meses como etiquetas
                datasets: [{
                    label: 'Visitas Mensuales',
                    data: visits,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });

        //VISITAS ANUALES
        let yearlyChart = new Chart(ctxYearly, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [{
                    label: 'Visitas Anuales',
                    data: yearlyVisits,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });

        let ctxWeekly = document.getElementById('weeklyVisitsChart').getContext('2d');

        let weeklyVisitsData = @json($weeklyVisitsData);
        let daysOfWeek = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        let weeklyVisits = weeklyVisitsData.map(data => data.visits);

        //VISITAS SEMANALES
        let weeklyChart = new Chart(ctxWeekly, {
            type: 'bar',
            data: {
                labels: daysOfWeek,
                datasets: [{
                    label: 'Visitas diarias',
                    data: weeklyVisits,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                },
            }
        });
    </script>

@endsection
