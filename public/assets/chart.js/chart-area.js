// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart").getContext("2d");

const CHART_COLORS = {
    red: 'rgb(255, 99, 132)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};

const NAMED_COLORS = [
    CHART_COLORS.red,
    CHART_COLORS.orange,
    CHART_COLORS.yellow,
    CHART_COLORS.green,
    CHART_COLORS.blue,
    CHART_COLORS.purple,
    CHART_COLORS.grey,
];

const DATA_COUNT = 7;
const NUMBER_CFG = {
    count: DATA_COUNT,
    min: -100,
    max: 100
};

const loggedIn = [26, 36, 42, 38, 40, 30, 12, 1, 4, 2, 34, 44];
const available = [1, 4, 2, 34, 44, 34, 44, 33, 24, 25, 28, 25];
const availableForExisting = [16, 13, 1, 4, 2, 34, 44, 25, 33, 40, 33, 45];
const unavailable = [5, 9, 1, 4, 2, 34, 44, 10, 9, 18, 19, 20];
const xData = [13, 1, 4, 2, 34, 44, 14, 15, 16, 17, 18, 19];



console.log("Meu data_chart ", JSON.parse(data_chart));

let myDataSet = [];
const labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
let data;
// {
//   labels: labels,
//   datasets: myDataSet
// };
JSON.parse(data_chart).forEach(element => {
    // console.log(element.name);
    let backG_color = NAMED_COLORS[parseInt(Math.floor(Math.random() * 7))];
    let border_color = NAMED_COLORS[parseInt(Math.floor(Math.random() * 7))];
    let nome_tipo = element.name
    let data_s = {
        label: element.name,
        data: element.all_info,
        borderColor: border_color,
        backgroundColor: backG_color,
        fill: true
    }

    var sum = element.all_info.reduce(function (a, b) {
        return a + b;
    }, 0);
    $('#report_details').append(
        `
    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 0.25rem solid ` + backG_color + ` !important; border-bottom: 0.25rem solid ` + border_color + ` !important;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-tertiary text-uppercase mb-1">
                                                Tipo : ` + nome_tipo + `</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Total : ` + sum + `</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
    `
    );
    myDataSet.push(data_s)


});

$('#report_details').append(
    `
  </div>
  `
);



data = {
    'labels': labels,
    'datasets': myDataSet
}
console.log(JSON.stringify(data));


const actions = [{
        name: 'Stacked: true',
        handler: (chart) => {
            chart.options.scales.y.stacked = true;
            chart.update();
        }
    },
    {
        name: 'Stacked: false (default)',
        handler: (chart) => {
            chart.options.scales.y.stacked = false;
            chart.update();
        }
    },
    {
        name: 'Stacked Single',
        handler: (chart) => {
            chart.options.scales.y.stacked = 'single';
            chart.update();
        }
    },
    {
        name: 'Randomize',
        handler(chart) {
            chart.data.datasets.forEach(dataset => {
                dataset.data = Utils.numbers({
                    count: chart.data.labels.length,
                    min: -100,
                    max: 100
                });
            });
            chart.update();
        }
    },
    {
        name: 'Add Dataset',
        handler(chart) {
            const data = chart.data;
            const dsColor = Utils.namedColor(chart.data.datasets.length);
            const newDataset = {
                label: 'Dataset ' + (data.datasets.length + 1),
                backgroundColor: dsColor,
                borderColor: dsColor,
                fill: true,
                data: Utils.numbers({
                    count: data.labels.length,
                    min: -100,
                    max: 100
                }),
            };
            chart.data.datasets.push(newDataset);
            chart.update();
        }
    },
    {
        name: 'Add Data',
        handler(chart) {
            const data = chart.data;
            if (data.datasets.length > 0) {
                data.labels = Utils.months({
                    count: data.labels.length + 1
                });

                for (let index = 0; index < data.datasets.length; ++index) {
                    data.datasets[index].data.push(Utils.rand(-100, 100));
                }

                chart.update();
            }
        }
    },
    {
        name: 'Remove Dataset',
        handler(chart) {
            chart.data.datasets.pop();
            chart.update();
        }
    },
    {
        name: 'Remove Data',
        handler(chart) {
            chart.data.labels.splice(-1, 1); // remove the label first

            chart.data.datasets.forEach(dataset => {
                dataset.data.pop();
            });

            chart.update();
        }
    }
];

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: (ctx) => 'Chart.js Line Chart - stacked=' + ctx.chart.options.scales.y.stacked
            },
            tooltip: {
                mode: 'index'
            },
        },
        interaction: {
            mode: 'nearest',
            axis: 'x',
            intersect: false
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                stacked: true,
                title: {
                    display: true,
                    text: 'Value'
                }
            }
        },
        legend: {
            display: true
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function (tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
            }
        },
        animation: {
            onComplete: function () {
                console.log();
            }
        }
    }
};


function numbers(config) {
    console.log('CF ', config);
    var cfg = config || {};
    var min = Math.min(cfg) || 100;
    var max = Math.max(cfg) || 100;
    var from = cfg.from || [];
    var count = cfg.length || 8;
    var decimals = cfg.decimals || 8;
    var continuity = cfg.continuity || 1;
    var dfactor = Math.pow(10, decimals) || 0;
    var data = [];

    for (i = 0; i < count; ++i) {
        value = (from[i] || 0) + this.rand(min, max);
        if (this.rand() <= continuity) {
            data.push(Math.round(dfactor * value) / dfactor);
        } else {
            data.push(null);
        }
    }

    return data;
}

var _seed = Date.now();

function srand(seed) {
    _seed = seed;
}

function rand(min, max) {
    min = min || 0;
    max = max || 0;
    _seed = (_seed * 9301 + 49297) % 233280;
    return min + (_seed / 233280) * (max - min);
}



var myLineChart = new Chart(ctx, config);

//Convert rgb to hex

function downloadChart() {
    var a = document.createElement('a');
    a.href = myLineChart.toBase64Image();
    a.download = 'relatório_de_membros.png';

    // Trigger the download
    a.click();
}

$("#baixar_relatorio").on("click", function (e) {
    downloadChart()
});

$(function () {
    $('.select-members').on('click', function (e) {
        var id = $(this).attr('href');
        $.get(
            'members/year/' + id,
            function (result) {
                myLineChart.data.datasets[0].data = result;
                myLineChart.update();
                document.getElementById("year_value").innerHTML = id;
            });
        e.preventDefault();
    });
});
