function detailData(name) {
    location.href = baseUrl + '/detail?status=' + name;
}

function stackHighchart(divId, title, categories, yTitle, series) {
    Highcharts.chart(divId, {
        chart: {
            type: 'column'
        },
        title: {
            text: title
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            min: 0,
            title: {
                text: yTitle
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'percent',
                point: {
                    events: {
                        click: function () {
                            detailData(this.series.name)

                        }
                    }
                }
            }
        },
        series: series
    });
}

function set_grafik(result) {
    stackHighchart('grafik', 'Rekap', result.categories, 'Jumlah', result.series)
}

function get_grafik() {
    var reqData = null;

    ajaxData(urlGrafik, reqData, set_grafik, false, false);
}

$(document).ready(function () {
    $('.select2').select2();

    get_grafik();
});