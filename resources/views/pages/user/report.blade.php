@extends('layouts.default')

@section('title', 'Home Page')

@section('content')

<link  href="{{ asset('assets/css/main/bootstrap-reset.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/base.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/br.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/color.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/effect.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/font.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/index.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/main.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/margin.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/padding.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/reset.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/round.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/bootstrap.min.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/double-navbar.css') }}" rel="stylesheet">
<link  href="{{ asset('assets/css/main/filters.css') }}" rel="stylesheet">	<!-- begin breadcrumb -->
<link  href="{{ asset('assets/css/main/main-view.css') }}" rel="stylesheet">

<script src="{{ asset('assets/js/main/coin.js') }}"></script>
<script src="{{ asset('assets/js/main/functions.js') }}"></script>
<script src="{{ asset('assets/js/main/index.js') }}"></script>
<script src="{{ asset('assets/js/main/validation.js') }}"></script>

<script src="{{ asset('assets/chart.js/Chart.js') }}"></script>
<script src="{{ asset('assets/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/chart.js/Chart.bundle.js') }}"></script>
<script src="{{ asset('assets/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('assets/chart.js/utils.js') }}"></script>
<!-- <script src="{{ asset('assets/chart.js/chart-pie.js') }}"></script> -->
<!-- <script src="{{ asset('assets/chart.js/chart-area.js') }}"></script> -->
<!-- <script src="{{ asset('assets/css/main/functions.js') }}"></script>
<script src="{{ asset('assets/css/main/index.js') }}"></script>
<script src="{{ asset('assets/css/main/validation.js') }}"></script> -->

	
<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
		<li class="breadcrumb-item active"><a href="javascript:;">Data</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!--BARRA SUPERIOR COM NOME DA GUIA--> 
<div class="col-sm-12 col-md-12">
    <div class="page-superior">
        <!--TITULO DA PAGINA-->
        <div class="col-xs-12 col-md-3 page-title pad-0">
            <i class="bi bi-layout-wtf"></i>&nbsp;Resumo
        </div>
        <div class="col-xs-12 col-md-5 pad-0">
            <div class="search-bar">
                <input type="text" class="search-input form-control" placeholder="Pesquisar cliente ou atendimento"/>
                <button class="submit-search" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <div class="col-md-4 pad-0 username-div">
            <div class="dropdown right username">
                <button class="username-dropdown dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></button>
                <ul class="dropdown-menu user-options">
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Configurações</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
            </div>
        </div>
        <div class="clear-both"></div>
    </div>
</div>
<!--FILTRO E BOAS VINDAS TELA INICIAL-->
<div class="col-md-12">
    <div class="welcome-div">
        <div class="col-xs-8 col-md-3 pad-0">
            <div class="welcome-text">Olá, {{ Auth::user()->name }}!</div>
        </div>
        <div class="col-md-5 pad-0 mobile-hide">
            <span class="home-filter">15 dias</span>
            <span class="home-filter active-filter">7 dias</span>
            <span class="home-filter">30 dias</span>
            <span class="home-filter">Hoje</span>
        </div>
        <div class="col-md-3 mobile-hide">
            <form>
                <input class="form-control dash-input" type="date">
            </form>
        </div>
        <div class="col-md-1 pad-0 mobile-hide">
            <button class="swl-btn"><i class="bi bi-funnel"></i>&nbsp;Filtrar</button>
        </div>
        <div class="col-xs-4 col-md-1 pad-0 desktop-hide">
            <button class="swl-btn right"><i class="bi bi-funnel"></i>&nbsp;Filtros</button>
        </div>
        <div class="clear-both"></div>
    </div>
</div>
<div class="clear-both20"></div>
<!--CARDS TELA RESUMO--> 
<div class="col-md-12 pad-0">
    <div class="col-md-9 pad-0">
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash">
                <i class="card-dash-glyph bi bi-arrow-left-right"></i>
                <span class="card-title">N° de transações</span><br>
                <div class="clear-both30"></div>
                <span class="card-balance">{{ $response }}</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash">
                <i class="card-dash-glyph bi bi-graph-up"></i>
                <span class="card-title">Ticket médio</span><br>
                <div class="clear-both30"></div>
                <span class="card-balance">R$&nbsp;0</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash">
                <i class="card-dash-glyph bi bi-sort-up-alt"></i>
                <span class="card-title">Volume transacionado</span><br>
                <div class="clear-both30"></div>
                <span class="card-balance">R$&nbsp;{{ $total_transacionado }}</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
        <div class="card-infos-dash2">
                <span class="card-title">Intervalo efectivacao</span><br>
                <style>
    #circle1,
    #circle2{
        position: absolute;
    }
    #circle1{
        left: 10%;
    }
    #circle2{
        left: 60%;
    }
    .progress-text{
        width: 70px;
        height: 70px;
        font-weight: 700;
        color: #3498db;
        position: absolute;
        left: 0px;
        text-align: center;
        padding-top: 25px;
    }
    .chart-text,
    .chart-text-2{
        width: 70px;
        height: 70px;
        font-weight: 700;
        color: #6a6a6a;
        position: absolute;
        bottom: -45px;
        text-align: center;
        padding-top: 25px;
    }
    .chart-text{
        left: 0px;
    }
    .chart-text-2{
        left: -8px;
    }
</style>
<div class="clear-both10"></div>
<div id="circle1"><canvas width="70" height="70"></canvas>
    <span id="progress-value-1" class="progress-text">{{$transacao_efectivacao[0]}}%</span>
    <span class="chart-text">Real</span>
</div>

<div id="circle2"><canvas width="70" height="70"></canvas>
    <cavans id="progress-value-2" class="progress-text">{{$transacao_efectivacao[1]}}%</canvas>
    <span class="chart-text-2">S/retentivas</span>
</div>

<script>
    var progress = document.getElementById("progress-value-1").innerText.replace(/\D/g, "");

    $('#circle1').circleProgress({
        value: "0." + progress,
        size: 70,
        startAngle: (-Math.PI / 2),
        thickness: '7',
        fill: {
            color: ["#53c2cc"]
        }
    });
    
    
   //CHART 1 
   var data = {
        datasets: [
            {
                data: [59, 41],
                backgroundColor: [
                    "#3498db",
                    
                ]

            }]
    };

    var promisedDeliveryChart = new Chart(document.getElementById('progress-value-2'), {
        type: 'doughnut',
        data: data,
        options: {
            cutout: 55,
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            }
        }
    });
</script>            </div>
        </div>
        <div class="clear-both20 mobile-show desktop-hide"></div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash2">
                <span class="card-title">Bandeira mais utilizadas</span><br>
                <div class="clear-both10"></div>
                <div class="card-icon">
                    <!-- <img src="assets/img/mastercard-logo.png"> -->

                    <span class="text-chart-cards">{{$bancos_mais_usados[0]}}</span>&nbsp&nbsp 
                    <span class="cards-percent">{{$bancos_mais_usados[1]}}%</span>
                
                </div>
                
                <div class="card-icon">
                    <!-- <img src="assets/img/visa.png"> -->
                    <span class="text-chart-cards">{{$bancos_menos_usados[0]}}</span>&nbsp&nbsp 
                    <span class="cards-percent">{{$bancos_menos_usados[1]}}%</span>
                    </div>
                
            </div>
        </div>
        <div class="clear-both20 mobile-show desktop-hide"></div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash2">
                <span class="card-title">Transaçoes de recusadas</span><br>
                <div class="clear-both10"></div>
                <div class="card-icon">
                    <i class="bi bi-building"></i>
                    <span class="text-chart-cards">Volume</span>
                    <span class="cards-percent">{{$numero_de_recusas}}%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="clear-both20 mobile-show desktop-hide"></div>
    <div class="col-md-3">
        <div class="div-graphic-status smooth-shadow" style="height: 298px; width: 100%;">
            <div class="clear-both10"></div>
            <p class="card-title text-center">Transações por status</p>
            <!--BARRAS CIRCULARES DE PORCENTAGEM DUPLA-->
            <div class="relative">
            <canvas id="myPieChart" width="150" height="150" style="display: block !important; box-sizing: border-box; height: 150px; width: 150px;"></canvas>
            </div>
            
            <script type="text/javascript">
        var labelss = <?php echo json_encode($labels); ?>;
        var dado = <?php echo json_encode($dado); ?>;
        console.log(labelss);
        console.log(dado);
        var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: labelss,
        datasets: [{
            data: dado,
            backgroundColor: ['#1cc88a', '#e74a3b', '#f6c23e'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: true
        },
        cutoutPercentage: 50,
    },
});
    </script>
        @foreach ($labels as $label)
            <div class="double-chart">
            
                <span class="chart-dot-1"></span><span class="text-chart-info">{{$label}}</span>
            
            @endforeach
            @foreach ($dado as $dad)
            <div class="chart-value">{{$dad}}</div>
            </div>
            @endforeach
            
        </div>
        <div class="clear-both"></div>
    </div>
</div>
<div class="clear-both20 mobile-hide desktop-show"></div>
<div class="clear-both20 mobile-show desktop-hide"></div>
<div class="col-md-12 pad-0">
    <div class="col-md-6">
        <div class="bkg-graphics-cards">
            <p class="text-center card-title">Quantidade de parcelas no cartão de crédito</p>
            <canvas id="graphic-chart-1"></canvas>
            <p class="text-center blue-font">Parcelas</p>
            <script>
//                CONFIGURAÇÃO DE CHART BARS
                var ctx = document.getElementById('graphic-chart-1').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['1x', '2x', '3x', '4x', '5x', '6x', '7x', '8x', '9x', '10x', '11x', '12x'],
                        datasets: [{
                                label: 'Quantidade de parcelas no cartão de crédito',
                                data: [12, 19, 3, 5, 2, 3, 5, 9, 4, 1, 2, 21],
                                backgroundColor: [
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',

                                ],
                                borderColor: [
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',
                                    '#4fbfc9',

                                ],
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                               display: 0
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    <div class="clear-both20 mobile-show desktop-hide"></div>
    <div class="col-md-6">
        <div class="bkg-graphics-cards">
            <p class="text-center card-title">Volume por dia da semana</p>
            <canvas id="graphic-chart-2"></canvas>
            <p class="text-center blue-font">Dias da semana</p>
            <script>
//                CONFIGURAÇÃO DE CHART LINE
                var ctx = document.getElementById('graphic-chart-2').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                        datasets: [{
                                label: 'Volume por dia da semana',
                                data: [12, 19, 3, 5, 2, 3, 5, 9, 4, 1, 2, 21],
                                backgroundColor: [
                                    '#4fbfc9'

                                ],
                                borderColor: [
                                    '#4fbfc9'

                                ],
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                               display: 0
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    <div class="clear-both10"></div>
</div>
	<!-- end panel -->
    @endsection

    @section('stylesheet')
<link  href="{{ asset('/assets/css/main/bootstrap-reset.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/base.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/br.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/color.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/effect.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/font.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/index.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/main.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/margin.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/padding.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/reset.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/round.css') }}" rel="stylesheet">
<link  href="{{ asset('/assets/css/main/bootstrap.min.css') }}" rel="stylesheet">

@endsection



@section('script')



<script src="{{ asset('assets/js/main/coin.js') }}"></script>
<script src="{{ asset('assets/js/main/functions.js') }}"></script>
<script src="{{ asset('assets/js/main/index.js') }}"></script>
<script src="{{ asset('assets/js/main/validation.js') }}"></script>  

@endsection

