@extends('layouts.admin-template')

@section('content')
    {!! showMessage() !!}

    <style>
        /* 3d column/donut(both) css start */
        #container {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        /* 3d donut chat css start */
        /* #container {
                    height: 400px;
                }

                .highcharts-figure,
                .highcharts-data-table table {
                    min-width: 310px;
                    max-width: 800px;
                    margin: 1em auto;
                }

                .highcharts-data-table table {
                    font-family: Verdana, sans-serif;
                    border-collapse: collapse;
                    border: 1px solid #ebebeb;
                    margin: 10px auto;
                    text-align: center;
                    width: 100%;
                    max-width: 500px;
                }

                .highcharts-data-table caption {
                    padding: 1em 0;
                    font-size: 1.2em;
                    color: #555;
                }

                .highcharts-data-table th {
                    font-weight: 600;
                    padding: 0.5em;
                }

                .highcharts-data-table td,
                .highcharts-data-table th,
                .highcharts-data-table caption {
                    padding: 0.5em;
                }

                .highcharts-data-table thead tr,
                .highcharts-data-table tr:nth-child(even) {
                    background: #f8f8f8;
                }

                .highcharts-data-table tr:hover {
                    background: #f1f7ff;
                } */
    </style>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Welcome to Bio-Apps Admin Panel</h3>
            <div class="heading-elements">
                <a class="" href="{!! URL::to('admin/dashboard') !!}">
                    <img src="{{ URL::asset('assets/admin/images/bio_apps_logo.png') }}" width="" class="logo-custom"
                        style="">
                </a>
            </div>
        </div>

        {{-- <div class="panel-body">
            <h1 class="text-center text-uppercase text-bold"><img
                    src="{{ URL::asset('assets/admin/images/bio_apps_logo.png') }}" width="180px" class=""></h1>


            {{-- <h1 class="text-center text-uppercase text-bold text-info">Welcome to
                {{ config('app.name', 'Heritage College of Education') }}</h1>
            <h3 class="text-center text-uppercase text-bold text-danger">Admin panel</h3> --}}

            {{-- <div class="row">
                <div class="col-md-6">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <canvas style="max-height: 385px" id="myChart1"></canvas>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        Chart designed to show the difference between 0 and null in a 3D column
                        chart. A null point represents missing data, while 0 is a valid value.
                    </p>
                </figure>
            </div>
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container2"></div>
                    <p class="highcharts-description">
                        A variation of a 3D pie chart with an inner radius added.
                        These charts are often referred to as donut charts.
                    </p>
                </figure>
            </div>
        </div>
    @endsection

    @section('footer_script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- <script>
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

    </script> --}}



        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        {{-- 3d donut --}}
        {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script> --}}

        <script>
            Highcharts.chart('container', {
                chart: {
                    type: 'column',
                    options3d: {
                        enabled: true,
                        alpha: 10,
                        beta: 25,
                        depth: 100
                    }
                },
                title: {
                    text: '3D chart with null values'
                },
                subtitle: {
                    text: 'Notice the difference between a 0 value and a null point'
                },
                plotOptions: {
                    column: {
                        depth: 50
                    }
                },
                xAxis: {
                    categories: Highcharts.getOptions().lang.shortMonths,
                    labels: {
                        skew3d: true,
                        style: {
                            fontSize: '16px'
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: null
                    }
                },
                // <--{removing Highcharts.com}-->
                credits: {
                    enabled: false
                },
                // <--{removing Highcharts.com}-->
                series: [{
                    name: 'Sales',
                    data: [30, 80, null, 60, 20, 45, 70, 10, 45, 65, 50, 35]
                }]
            });
            // 3d donut start
            Highcharts.chart('container2', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Contents of Highsoft\'s weekly fruit delivery'
                },
                subtitle: {
                    text: '3D donut in Highcharts'
                },
                plotOptions: {
                    pie: {
                        innerSize: 100,
                        depth: 45
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Delivered amount',
                    data: [
                        ['Bananas', 8],
                        ['Kiwi', 3],
                        ['Mixed nuts', 1],
                        ['Oranges', 6],
                        ['Apples', 8],
                        ['Pears', 4],
                        ['Clementines', 4],
                        ['Reddish (bag)', 1],
                        ['Grapes (bunch)', 1]
                    ]
                }]



            });
        </script>
    @endsection
