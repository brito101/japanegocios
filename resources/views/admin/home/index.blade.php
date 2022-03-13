@extends('adminlte::page')
@section('plugins.Chartjs', true)

@section('title', '- Dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Imóveis</span>
                            <span class="info-box-number">{{ $properties->count() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-car"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Automóveis</span>
                            <span class="info-box-number">{{ $automotives->count() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cart-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Produtos</span>
                            <span class="info-box-number">{{ $products->count() }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Status dos Imóveis</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <div class="chartjs-size-monitor" z>
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="properties-chart" style="display: block; width: 489px; height: 200px;"
                                    class="chartjs-render-monitor" width="489" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Status dos Automóveis</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <div class="chartjs-size-monitor" z>
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="automotives-chart" style="display: block; width: 489px; height: 200px;"
                                    class="chartjs-render-monitor" width="489" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Status dos Produtos</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="position-relative mb-4">
                                <div class="chartjs-size-monitor" z>
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="products-chart" style="display: block; width: 489px; height: 200px;"
                                    class="chartjs-render-monitor" width="489" height="200"></canvas>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </section>
@endsection

@section('custom_js')
    <script>
        const properties = document.getElementById('properties-chart');
        const automotives = document.getElementById('automotives-chart');
        const products = document.getElementById('products-chart');

        properties.getContext('2d');
        automotives.getContext('2d');
        products.getContext('2d');

        const propertiesChart = new Chart(properties, {
            type: 'doughnut',
            data: {
                labels: ['Ativos', 'Rascunhos', 'Alugados', 'Vendidos'],
                datasets: [{
                    label: 'Imóveis',
                    data: {!! json_encode($chart->properties) !!},
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                    ],
                }]
            },
            options: {
                responsive: true,

                legend: {
                    position: 'left',
                },
            },
        });

        const automotivesChart = new Chart(automotives, {
            type: 'doughnut',
            data: {
                labels: ['Ativos', 'Rascunhos', 'Vendidos'],
                datasets: [{
                    label: 'Automóveis',
                    data: {!! json_encode($chart->automotives) !!},
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                    ],
                }]
            },
            options: {
                responsive: true,

                legend: {
                    position: 'left',
                },
            },
        });

        const productsChart = new Chart(products, {
            type: 'doughnut',
            data: {
                labels: ['Ativos', 'Rascunhos', 'Esgotados'],
                datasets: [{
                    label: 'Produtos',
                    data: {!! json_encode($chart->products) !!},
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                    ],
                }]
            },
            options: {
                responsive: true,

                legend: {
                    position: 'left',
                },
            },
        });
    </script>
@endsection
