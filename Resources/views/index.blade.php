@extends('factory::layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="5">Comandos Aberto/Andamento</th>
                    </tr>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Data Abertura</th>
                        <th scope="col" class="text-center">Data Fechamento</th>
                        <th scope="col" class="text-right">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">001</td>
                        <td class="align-middle text-center"><span class="badge bg-success">Aberto</span></td>
                        <td class="align-middle text-center">15/01/1988</td>
                        <td class="align-middle text-center">16/01/1988</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('commands.edit', 1) }}" class="btn btn-secondary"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                    </svg>
                                </a>
                                <a href="{{ route('commands.edit', 1) }}" class="btn btn-secondary"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
                                    </svg>
                                </a>
                                <button type="button" class="btn btn-danger"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">001</td>
                        <td class="align-middle text-center"><span class="badge bg-success">Aberto</span></td>
                        <td class="align-middle text-center">15/01/1988</td>
                        <td class="align-middle text-center">16/01/1988</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('commands.edit', 1) }}" class="btn btn-secondary"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                    </svg>
                                </a>
                                <a href="{{ route('commands.edit', 1) }}" class="btn btn-secondary"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
                                    </svg>
                                </a>
                                <button type="button" class="btn btn-danger"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">001</td>
                        <td class="align-middle text-center"><span class="badge bg-success">Aberto</span></td>
                        <td class="align-middle text-center">15/01/1988</td>
                        <td class="align-middle text-center">16/01/1988</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('commands.edit', 1) }}" class="btn btn-secondary"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                    </svg>
                                </a>
                                <a href="{{ route('commands.edit', 1) }}" class="btn btn-secondary"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
                                    </svg>
                                </a>
                                <button type="button" class="btn btn-danger"><svg class="c-icon m-0">
                                        <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="flex-column card-header bg-dark content-center text-white">
                <h1 class="mt-3">COMANDO #555</h1>
                <p>Melhor aproveitamento</p>
            </div>
            <div class="card-body row text-center">
                <div class="col">
                    <div class="text-value-xl">2,34kg</div>
                    <div class="text-uppercase text-muted small">Previsão de Gasto</div>
                </div>
                <div class="c-vr"></div>
                <div class="col">
                    <div class="text-value-xl">1,52kg</div>
                    <div class="text-uppercase text-muted small">Gasto Real</div>
                </div>
                <div class="c-vr"></div>
                <div class="col">
                    <div class="text-value-xl">99%</div>
                    <div class="text-uppercase text-muted small">Aproveitamento</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="flex-column card-header bg-dark content-center text-white">
                <h1 class="mt-3">COMANDO #555</h1>
                <p>Pior aproveitamento</p>
            </div>
            <div class="card-body row text-center">
                <div class="col">
                    <div class="text-value-xl">2,34kg</div>
                    <div class="text-uppercase text-muted small">Previsão de Gasto</div>
                </div>
                <div class="c-vr"></div>
                <div class="col">
                    <div class="text-value-xl">1,52kg</div>
                    <div class="text-uppercase text-muted small">Gasto Real</div>
                </div>
                <div class="c-vr"></div>
                <div class="col">
                    <div class="text-value-xl">99%</div>
                    <div class="text-uppercase text-muted small">Aproveitamento</div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
                <div class="bg-primary bg-primary p-4 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-clipboard"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-primary">456</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Total de comandos</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
                <div class="bg-info p-4 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-balance-scale"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-info">56,4kg</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Previsão de Tecido Gastos</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
                <div class="bg-warning p-4 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-balance-scale"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-warning">63,3kg</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Tecido Gastos Real</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
                <div class="bg-danger p-4 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-chart-line"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-danger">97%</div>
                    <div class="text-muted text-uppercase font-weight-bold small">Aproveitamento</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title mb-0">Gastos de Tecido Previsão x Real</h4>
                    </div>
                    <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                        <div class="btn-group btn-group-toggle mx-3" data-toggle="buttons">
                            <label class="btn btn-outline-secondary">
                                <input id="option1" type="radio" name="options" autocomplete="off"> Diário
                            </label>
                            <label class="btn btn-outline-secondary active">
                                <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Semanal
                            </label>
                            <label class="btn btn-outline-secondary">
                                <input id="option3" type="radio" name="options" autocomplete="off"> Mensal
                            </label>
                        </div>
                    </div>
                </div>
                <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
                    <canvas class="chart" id="main-chart" height="300"></canvas>
                </div>
            </div>
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col-sm-12 col-md mb-sm-2 mb-0">
                        <div class="text-muted">Previsão</div>
                        <div class="progress progress-xs mt-2">
                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md mb-sm-2 mb-0">
                        <div class="text-muted">Real</div>
                        <div class="progress progress-xs mt-2">
                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Utilização de Tecidos
                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"></a></div>
            </div>
            <div class="card-body">
                <div class="c-chart-wrapper">
                    <canvas id="pie1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">Utilização de Variações
                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"></a></div>
            </div>
            <div class="card-body">
                <div class="c-chart-wrapper">
                    <canvas id="pie2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
/* eslint-disable object-shorthand */

/* global Chart, coreui, coreui.Utils.getStyle, coreui.Utils.hexToRgba */

/**
 * --------------------------------------------------------------------------
 * CoreUI Boostrap Admin Template (v3.2.0): main.js
 * Licensed under MIT (https://coreui.io/license)
 * --------------------------------------------------------------------------
 */

/* eslint-disable no-magic-numbers */
// Disable the on-canvas tooltip
Chart.defaults.global.pointHitDetectionRadius = 1;
Chart.defaults.global.tooltips.enabled = false;
Chart.defaults.global.tooltips.mode = 'index';
Chart.defaults.global.tooltips.position = 'nearest';
Chart.defaults.global.tooltips.custom = coreui.ChartJS.customTooltips;
Chart.defaults.global.defaultFontColor = '#646470';
Chart.defaults.global.responsiveAnimationDuration = 1;
document.body.addEventListener('classtoggle', function (event) {
  if (event.detail.className === 'c-dark-theme') {
    if (document.body.classList.contains('c-dark-theme')) {
      Chart.defaults.global.defaultFontColor = '#fff';
    } else {
      Chart.defaults.global.defaultFontColor = '#646470';
    }


    mainChart.update();
  }
}); // eslint-disable-next-line no-unused-vars


var mainChart = new Chart(document.getElementById('main-chart'), {
  type: 'line',
  data: {
    labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S', 'M', 'T', 'W', 'T', 'F', 'S', 'S', 'M', 'T', 'W', 'T', 'F', 'S', 'S', 'M', 'T', 'W', 'T', 'F', 'S', 'S'],
    datasets: [{
      label: 'My First dataset',
      backgroundColor: coreui.Utils.hexToRgba(coreui.Utils.getStyle('--info'), 10),
      borderColor: coreui.Utils.getStyle('--info'),
      pointHoverBackgroundColor: '#fff',
      borderWidth: 2,
      data: [165, 180, 70, 69, 77, 57, 125, 165, 172, 91, 173, 138, 155, 89, 50, 161, 65, 163, 160, 103, 114, 185, 125, 196, 183, 64, 137, 95, 112, 175]
    }, {
      label: 'My Second dataset',
      backgroundColor: 'transparent',
      borderColor: coreui.Utils.getStyle('--success'),
      pointHoverBackgroundColor: '#fff',
      borderWidth: 2,
      data: [92, 97, 80, 100, 86, 97, 83, 98, 87, 98, 93, 83, 87, 98, 96, 84, 91, 97, 88, 86, 94, 86, 95, 91, 98, 91, 92, 80, 83, 82]
    }, {
      label: 'My Third dataset',
      backgroundColor: 'transparent',
      borderColor: coreui.Utils.getStyle('--danger'),
      pointHoverBackgroundColor: '#fff',
      borderWidth: 1,
      borderDash: [8, 5],
      data: [65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65]
    }]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          drawOnChartArea: false
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
          maxTicksLimit: 5,
          stepSize: Math.ceil(250 / 5),
          max: 250
        }
      }]
    },
    elements: {
      point: {
        radius: 0,
        hitRadius: 10,
        hoverRadius: 4,
        hoverBorderWidth: 3
      }
    }
  }
});

data = {
    datasets: [{
        data: [10, 20, 30]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Red',
        'Yellow',
        'Blue'
    ]
};

var ctx = document.getElementById('pie1');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {}
});
var ctx = document.getElementById('pie2');
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {}
});
//# sourceMappingURL=main.js.map

    </script>

@endpush 