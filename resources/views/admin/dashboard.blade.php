@extends('layouts.admin-template')

@section('content')
    {!! showMessage() !!}

    <style>
        /* 3d column/donut(both) css start */
        #container-bar {
            height: 400px;
        }

        #container-pai {
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

        <div class="row">
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container-bar"></div>
                    {{-- <p class="highcharts-description"> --}}
                    {{-- Chart designed to show the difference between 0 and null in a 3D column --}}
                    {{-- chart. A null point represents missing data, while 0 is a valid value. --}}
                    {{-- </p> --}}
                </figure>
            </div>
            <div class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="container-pai"></div>
                    {{-- <p class="highcharts-description"> --}}
                    {{-- A variation of a 3D pie chart with an inner radius added. --}}
                    {{-- These charts are often referred to as donut charts. --}}
                    {{-- </p> --}}
                </figure>
            </div>
        </div>

    </div>
@endsection

@section('footer_script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            initBarChart();
            initPaiChart();
        });

        function initBarChart() {
            Highcharts.chart('container-bar', {
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
        }

        function initPaiChart() {
            Highcharts.chart('container-pai', {
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
        }
    </script>
@endsection
