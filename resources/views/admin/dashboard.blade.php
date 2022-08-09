@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Dashboard</h3>
            <div class="heading-elements"></div>
        </div>
        <div class="panel-body">
            <h1 class="text-center text-uppercase text-bold"><img src="{{ URL::asset('assets/admin/images/bio_apps_logo.png') }}" width="300" class="img-circle"></h1>
            <h1 class="text-center text-uppercase text-bold text-info">Welcome to {{ config('app.name', 'Heritage College of Education') }}</h1>
            <h3 class="text-center text-uppercase text-bold text-danger">Admin panel</h3>

            <div class="row">
                <div class="col-md-6">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <canvas style="max-height: 385px" id="myChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $( document ).ready(function() {
            const labels = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
            ];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Sales Bar Chart',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );


            const data1 = {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            const config1 = {
                type: 'doughnut',
                data: data1,
                height: 385
            };

            const myChart1 = new Chart(
                document.getElementById('myChart1'),
                config1
            );
        });

    </script>
@endsection
