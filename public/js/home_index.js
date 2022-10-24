function columnHighchart(divId, title, categories, yTitle, series) {
    Highcharts.chart(divId, {
        chart: {
            type: 'column'
        },
        title: {
            text: title
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: yTitle
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: series
    });
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
                stacking: 'percent'
            }
        },
        series: series
    });
}

function set_non_imb(result) {
    columnHighchart('non_imb', 'Suplai Rumah Non IMB', result.province, 'Jumlah', result.data)
}

function get_non_imb() {
    var reqData = {
        filter_year : $('#filter_year').val()
    };

    ajaxData(urlNonImb, reqData, set_non_imb, false, false);
}

function set_imb(result) {
    columnHighchart('imb', 'Suplai Rumah IMB', result.province, 'Jumlah', result.data)
}

function get_imb() {
    var reqData = {
        filter_year : $('#filter_year_imb').val()
    };

    ajaxData(urlImb, reqData, set_imb, false, false);
}

function set_rlth(result) {
    columnHighchart('rlth', 'Rumah Tidak Layak Huni', result.province, 'Jumlah', result.data)
}

function get_rlth() {
    var reqData = {
        filter_year : $('#filter_year_rtlh').val()
    };

    ajaxData(urlRlth, reqData, set_rlth, false, false);
}

function set_backlog(result) {
    columnHighchart('backlog', 'Backlog Kepemilikan Perumahan', result.province, 'Jumlah', result.data)
}

function get_backlog() {
    var reqData = {
        filter_year : $('#filter_year_backlog').val()
    };

    ajaxData(urlBacklog, reqData, set_backlog, false, false);
}

function set_grafik(result) {
    stackHighchart('grafik', 'Grafik Form 1A dan 1B per Provinsi', result.province, 'Jumlah', result.data)
}

function get_grafik() {
    var reqData = {
        filter_year : $('#filter_year').val()
    };

    ajaxData(urlGrafik, reqData, set_grafik, false, false);
}

$(document).ready(function() {
    $('.select2').select2();

    if (roleGrafik === true) {
        get_grafik();
    }

    $('#filter_year').on('change', function() {
        get_grafik();        
    })

    $('#filter_year_backlog').on('change', function() {
        get_backlog();        
    })
    $('#filter_year_rtlh').on('change', function() {
        get_rlth();        
    })

    $('#filter_year_imb').on('change', function() {
        get_imb();        
    })
    

    // $('a[href="#tab-backlog"]').on('click', function() {
        get_backlog();
    // })
    
    // $('a[href="#tab-rlth"]').on('click', function() {
        get_rlth();
    // })
    
    // $('a[href="#tab-imb"]').on('click', function() {
        get_imb();
    // })

    Highcharts.chart('pie-1a', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pendataan Perumahan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ({point.percentage:.1f}) %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Draft',
                y: parseFloat(draft_1a),
                sliced: true,
                selected: true
            }, {
                name: 'Revisi',
                y: parseFloat(revisi_1a),
            }, {
                name: 'Verifikasi',
                y: parseFloat(verifikasi_1a)
            }, {
                name: 'Final',
                y: parseFloat(final_1a)
            }]
        }]
    });

    Highcharts.chart('pie-1b', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pendataan Perumahan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} ({point.percentage:.1f}) %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Draft',
                y: parseFloat(draft_1b),
                sliced: true,
                selected: true
            }, {
                name: 'Revisi',
                y: parseFloat(revisi_1b),
            }, {
                name: 'Verifikasi',
                y: parseFloat(verifikasi_1b)
            }, {
                name: 'Final',
                y: parseFloat(final_1b)
            }]
        }]
    });

    // AREA CHART
    var area = new Morris.Area({
        element: 'revenue-chart',
        resize: true,
        data: [
          {y: '2011 Q1', item1: 2666, item2: 2666},
          {y: '2011 Q2', item1: 2778, item2: 2294},
          {y: '2011 Q3', item1: 4912, item2: 1969},
          {y: '2011 Q4', item1: 3767, item2: 3597},
          {y: '2012 Q1', item1: 6810, item2: 1914},
          {y: '2012 Q2', item1: 5670, item2: 4293},
          {y: '2012 Q3', item1: 4820, item2: 3795},
          {y: '2012 Q4', item1: 15073, item2: 5967},
          {y: '2013 Q1', item1: 10687, item2: 4460},
          {y: '2013 Q2', item1: 8432, item2: 5713}
        ],
        xkey: 'y',
        ykeys: ['item1', 'item2'],
        labels: ['Item 1', 'Item 2'],
        lineColors: ['#a0d0e0', '#3c8dbc'],
        hideHover: 'auto'
      });
  
      // LINE CHART
      var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
          {y: '2011 Q1', item1: 2666},
          {y: '2011 Q2', item1: 2778},
          {y: '2011 Q3', item1: 4912},
          {y: '2011 Q4', item1: 3767},
          {y: '2012 Q1', item1: 6810},
          {y: '2012 Q2', item1: 5670},
          {y: '2012 Q3', item1: 4820},
          {y: '2012 Q4', item1: 15073},
          {y: '2013 Q1', item1: 10687},
          {y: '2013 Q2', item1: 8432}
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });
  
      //DONUT CHART
      var donut = new Morris.Donut({
        element: 'sales-chart',
        resize: true,
        colors: ["#3c8dbc", "#f56954", "#00a65a"],
        data: [
          {label: "Download Sales", value: 12},
          {label: "In-Store Sales", value: 30},
          {label: "Mail-Order Sales", value: 20}
        ],
        hideHover: 'auto'
      });
      //BAR CHART
      var bar = new Morris.Bar({
        element: 'bar-chart',
        resize: true,
        data: [
          {y: '2006', a: 100, b: 90},
          {y: '2007', a: 75, b: 65},
          {y: '2008', a: 50, b: 40},
          {y: '2009', a: 75, b: 65},
          {y: '2010', a: 50, b: 40},
          {y: '2011', a: 75, b: 65},
          {y: '2012', a: 100, b: 90}
        ],
        barColors: ['#00a65a', '#f56954'],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['CPU', 'DISK'],
        hideHover: 'auto'
      });
});