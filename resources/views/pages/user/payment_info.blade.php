@extends('layouts.default')

@section('title', 'Home Page')

@section('content')
	<!-- begin breadcrumb -->
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
                <button class="username-dropdown dropdown-toggle" type="button" data-toggle="dropdown">Isabela Frazão<span class="caret"></span></button>
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
            <div class="welcome-text">Olá, Isabela!</div>
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
                <span class="card-balance">14</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash">
                <i class="card-dash-glyph bi bi-graph-up"></i>
                <span class="card-title">Ticket médio</span><br>
                <div class="clear-both30"></div>
                <span class="card-balance">R$&nbsp;130,50</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash">
                <i class="card-dash-glyph bi bi-sort-up-alt"></i>
                <span class="card-title">Volume transacionado</span><br>
                <div class="clear-both30"></div>
                <span class="card-balance">R$&nbsp;2.314,00</span>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash2">
                <span class="card-title">Índices de conversão</span><br>
                
            </div>
        </div>
        <div class="clear-both20 mobile-show desktop-hide"></div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash2">
                <span class="card-title">Bandeira mais utilizadas</span><br>
                <div class="clear-both10"></div>
                <div class="card-icon">
                    <img src="img/mastercard-logo.png">
                    <span class="text-chart-cards">Mastercard</span>
                    <span class="cards-percent">80%</span>
                </div>
                <div class="card-icon">
                    <img src="img/visa.png">
                    <span class="text-chart-cards">Visa</span>
                    <span class="cards-percent">20%</span>
                </div>
            </div>
        </div>
        <div class="clear-both20 mobile-show desktop-hide"></div>
        <div class="col-sm-12 col-md-4">
            <div class="card-infos-dash2">
                <span class="card-title">Motivos de recusa</span><br>
                <div class="clear-both10"></div>
                <div class="card-icon">
                    <i class="bi bi-building"></i>
                    <span class="text-chart-cards">Emissor</span>
                    <span class="cards-percent">100%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="clear-both20 mobile-show desktop-hide"></div>
    <div class="col-md-3">
        <div class="div-graphic-status smooth-shadow">
            <div class="clear-both10"></div>
            <p class="card-title text-center">Transações por status</p>
            <!--BARRAS CIRCULARES DE PORCENTAGEM DUPLA-->
            
            <div class="double-chart-paid">
                <span class="chart-dot-1"></span><span class="text-chart-info">Paga</span><div class="chart-value">9</div>
            </div>
            <div class="double-chart-refused">
                <span class="chart-dot-2"></span><span class="text-chart-info">Recusada</span><div class="chart-value">3</div>
            </div>
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