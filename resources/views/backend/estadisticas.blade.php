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
        <!--Mostrando el número de visitas diarias y totales-->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card mx-3">
                    <div class="card-body">
                        <h3 class="card-title">Visitas hoy {{$formattedDate}} :
                            <span class="badge btn-success h3">{{$dailyVisits}}</span>
                        </h3>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mx-3">
                    <div class="card-body">
                        <h3 class="card-title">Visitas totales:
                            <span class="badge btn-primary h3">{{ $totalVisits }}</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let ctxMonthly = document.getElementById('monthlyVisitsChart').getContext('2d');
        let ctxYearly = document.getElementById('yearlyVisitsChart').getContext('2d');

        let visitsData = @json($visitsData);
        let yearlyVisitsData = @json($yearlyVisitsData);

        let months = visitsData.map(data => data.month);
        let visits = visitsData.map(data => data.visits);
        let years = yearlyVisitsData.map(data => data.year);
        let yearlyVisits = yearlyVisitsData.map(data => data.visits);

        let monthlyChart = new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: months,
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
    </script>
    
@endsection
