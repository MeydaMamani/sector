@extends('layouts.base')

@section('content')
    <div class="content-wrapper" id="appDash">
        <section class="content">
            <div class="container-fluid">
                <div class="page-wrapper"><br>
                    <div class="col-md-12">
                        <h3 class="mb-3 text-center" style="color: #656565;">AVANCE PROGRAMA JUNTOS</h3>
                        <!-- avance mensual niños -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="small-box text-white" style="background: linear-gradient(to right, #FF60A2, #DA4885);">
                                            <div class="inner">
                                                <h3>258</h3>
                                                <p class="m-0">Total Niños </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="small-box text-white" style="background: linear-gradient(to right, #63AFFF, #4182C7);">
                                            <div class="inner">
                                                <h3>90</h3>
                                                <p class="m-0">Niños Cumplen Paquete</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-ios-pulse-strong"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Avance Juntos - Niños Menores de 1 Año</h3>
                                    </div>
                                    <div style="height: 310px; padding: 1px;" class="chartLine"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="small-box text-white" style="background: linear-gradient(to right,#49DDC0, #21B497);">
                                            <div class="inner">
                                                <h3>180</h3>
                                                <p class="m-0">Total Padrón</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-social-snapchat-outline"></i>
                                            </div>
                                            {{-- <a href="#" class="small-box-footer">Más Info... <i class="fas fa-arrow-circle-right"></i></a> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="small-box text-white" style="background: linear-gradient(45deg,#F5C877,#EBA33D);">
                                            <div class="inner">
                                                <h3>168</h3>
                                                <p class="m-0">Niños No Cumplen Paquete</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-ios-medkit-outline"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Avance Juntos - Gestantes</h3>
                                    </div>
                                    <div style="height: 310px; padding: 1px;" class="chartLineGest"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="./plugin/chartist-js/jquery.sparkline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0-rc.1/chartjs-plugin-datalabels.min.js" integrity="sha512-+UYTD5L/bU1sgAfWA0ELK5RlQ811q8wZIocqI7+K0Lhh8yVdIoAMEs96wJAIbgFvzynPm36ZCXtkydxu1cs27w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    var options3 = {
        responsive: true,
        maintainAspectRatio: false,
        // indexAxis: 'y',
        plugins: {
            legend: {
                display: true
            },
            datalabels: {
                formatter: (value, ctx) => {
                    let percentage = value + "%";
                    return percentage;
                },
                color: 'black',
                anchor: 'end',
                align: 'top',
                offset: 2,
                font: {
                    size: 10,
                    weight: '#656565'
                },
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
            }
        },
        transitions: {
        show: {
            animations: {
            x: {
                from: 0
            },
            y: {
                from: 0
            }
            }
        },
        hide: {
            animations: {
            x: {
                to: 0
            },
            y: {
                to: 0
            }
            }
        }
    }

    }
    var datosprematuro = {
                    label: 'CRED RN',
                    data: [70,72,63,46],
                    backgroundColor: ['#f2367591'],
                    borderColor: ['#f2367591'],
                    fill: false,
                    tension: 0.1
    };
    var datosneonatal = {
                    label: 'CRED Mensual',
                    data: [58,76,75,75],
                    backgroundColor: ['#ffb22bc2'],
                    borderColor: ['#ffb22bc2'],
                    fill: false,
                    tension: 0.1
    };
    var datos4m = {
                    label: 'Suplementación',
                    data: [70.18, 69.29, 75.08, 74.12],
                    backgroundColor: ['#0d6efda6'],
                    borderColor: ['#0d6efda6'],
                    fill: false,
                    tension: 0.1
    };
    var datosopor = {
                    label: 'Vacuna',
                    data: [68,81,81,81],
                    backgroundColor: ['rgba(55, 222, 197, 0.49)'],
                    borderColor: ['rgba(55, 222, 197, 0.49)'],
                    fill: false,
                    tension: 0.1
    };
    var datoscred = {
                    label: 'Paquete',
                    data: [27, 27,27,27],
                    backgroundColor: ['rgba(183, 86, 240, 0.41)'],
                    borderColor: ['rgba(183, 86, 240, 0.41)'],
                    fill: false,
                    tension: 0.1
    };

    var datosbateria = {
                    label: 'Batería',
                    data: [83,100, 97,88,95],
                    backgroundColor: ['#f2367591'],
                    borderColor: ['#f2367591'],
                    fill: false,
                    tension: 0.1
    };
    var datossospecha = {
                    label: 'APN',
                    data: [50,79,94,83,87],
                    backgroundColor: ['#ffb22bc2'],
                    borderColor: ['#ffb22bc2'],
                    fill: false,
                    tension: 0.1
    };
    var datosinicio = {
                    label: 'Suplementación',
                    data: [67,79,97,83,82],
                    backgroundColor: ['#0d6efda6'],
                    borderColor: ['#0d6efda6'],
                    fill: false,
                    tension: 0.1
    };
    var datosnuevas = {
                    label: 'Paquete',
                    data: [10, 39.2,43.4,42.2,100],
                    backgroundColor: ['rgba(55, 222, 197, 0.49)'],
                    borderColor: ['rgba(55, 222, 197, 0.49)'],
                    fill: false,
                    tension: 0.1
    };

    var datosnuevas2 = {
                    label: 'Paquete',
                    data: [50, 69,73,68,75],
                    backgroundColor: ['rgba(55, 222, 197, 0.49)'],
                    borderColor: ['rgba(55, 222, 197, 0.49)'],
                    fill: false,
                    tension: 0.1
    };

    //Lineamensualniño
    $('#myChartjn').remove();
                $('.chartLine').append("<canvas id='myChartjn'></canvas>");
                canvas = document.getElementById("myChartjn");
                ctx = canvas.getContext("2d");

                var ctx_province = document.getElementById("myChartjn").getContext("2d");
                var myChartProvince = new Chart(ctx_province, {
                    type: "line",
                    data: {
                        labels: ['Octubre','Noviembre','Diciembre', 'Enero', 'Febrero'],
                        datasets: [ datosnuevas ]
                    },
                    
                    plugins: [ChartDataLabels],
                    options: options3,
                    
    });

    //Lineamensualgestante
    $('#myChartjg').remove();
                $('.chartLineGest').append("<canvas id='myChartjg'></canvas>");
                canvas = document.getElementById("myChartjg");
                ctx = canvas.getContext("2d");

                var ctx_province = document.getElementById("myChartjg").getContext("2d");
                var myChartProvince = new Chart(ctx_province, {
                    type: "line",
                    data: {
                        labels: ['Octubre','Noviembre','Diciembre','Enero', 'Febrero'],
                        datasets: [ datosnuevas2]
                    },
                    plugins: [ChartDataLabels],
                    options: options3,
    });

    //Lineamensualniño
    $('#myChartcn').remove();
                $('.chartLine2').append("<canvas id='myChartcn'></canvas>");
                canvas = document.getElementById("myChartcn");
                ctx = canvas.getContext("2d");

                var ctx_province = document.getElementById("myChartcn").getContext("2d");
                var myChartProvince = new Chart(ctx_province, {
                    type: "line",
                    data: {
                        labels: ['Setiembre', 'Octubre','Noviembre','Diciembre'],
                        datasets: [ datosprematuro, datosneonatal, datos4m, datosopor,datoscred]
                    },
                    plugins: [ChartDataLabels],
                    options: options3,
    });

    //Lineamensualgestante
    $('#myChartcg').remove();
                $('.chartLineGest2').append("<canvas id='myChartcg'></canvas>");
                canvas = document.getElementById("myChartcg");
                ctx = canvas.getContext("2d");

                var ctx_province = document.getElementById("myChartcg").getContext("2d");
                var myChartProvince = new Chart(ctx_province, {
                    type: "line",
                    data: {
                        labels: ['Agosto','Setiembre', 'Octubre','Noviembre','Diciembre'],
                        datasets: [ datosbateria, datossospecha, datosinicio, datosnuevas]
                    },
                    plugins: [ChartDataLabels],
                    options: options3,
    });

</script>
<script src="./js/records_menu.js"></script>
<script src="./plugin/chartist-js/jquery.sparkline.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0-rc.1/chartjs-plugin-datalabels.min.js" integrity="sha512-+UYTD5L/bU1sgAfWA0ELK5RlQ811q8wZIocqI7+K0Lhh8yVdIoAMEs96wJAIbgFvzynPm36ZCXtkydxu1cs27w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/tablero/tableroFed.js"></script>
@endsection