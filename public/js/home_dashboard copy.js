$(function () {
    $('#datetimepicker-progress-pekerjaan').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-form-mr-start, #datetimepicker-form-mr-end').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-form-mr1-start, #datetimepicker-form-mr1-end').datetimepicker({
        format: 'YYYY-MM',
    });
    $('#datetimepicker-status-paket-belum-lelang-start, #datetimepicker-status-paket-belum-lelang-end').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-form-mr2-start, #datetimepicker-form-mr2-end').datetimepicker({
        format: 'YYYY-MM',
    });
    $('#datetimepicker-form-mr3-start, #datetimepicker-form-mr1-end').datetimepicker({
        format: 'YYYY-MM',
    });
    $('#datetimepicker-form-mr4-start, #datetimepicker-form-mr1-end').datetimepicker({
        format: 'YYYY-MM',
    });
    $('#datetimepicker-status-penanganan-start,#datetimepicker-status-penanganan-end').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-perizinan-monev-start,#datetimepicker-perizinan-monev-end').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: '2021-11-01'
    });
    $('#datetimepicker-perijinan-start,#datetimepicker-perijinan-end').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: '2021-11-01'
    });
    $('#datetimepicker-pengaduan-start,#datetimepicker-pengaduan-end').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: '2021-11-01'
    });
    $('#datetimepicker-perijinan-tujuan-start, #datetimepicker-perijinan-tujuan-end').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: '2021-11-01'
    });
    $('#datetimepicker-perijinan-batas-waktu-start,#datetimepicker-perijinan-batas-waktu-end').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: '2021-11-01'
    });
    $('#datetimepicker-perijinan-table-start,#datetimepicker-perijinan-table-end').datetimepicker({
        format: 'YYYY-MM-DD',
        minDate: '2021-11-01'
    });
    $('#datetimepicker-pengadaan').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-kemajuan').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-proses-lelang').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-kontrak-hps').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-terkontrak').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-pengadaan-banding1,#datetimepicker-pengadaan-banding2').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    setChartBPL();
    setChartKKN();
})

$('#datetimepicker-progress-pekerjaan').on('dp.change', function () {
    setProgressPekerjaanChart();
})

setProgressPekerjaanChart();
$('#status_progress_pekerjaan').on('change', function () {
    setProgressPekerjaanChart();
})

setProgressFisikChart();
$('#status_progress_pekerjaan').on('change', function () {
    setProgressFisikChart();
})
$('#datetimepicker-form-mr-start,#datetimepicker-form-mr-end').on('dp.change', function () {
    setFormMrChart();
})
$('#datetimepicker-form-mr1-start,#datetimepicker-form-mr1-end').on('dp.change', function () {
    setFormMr1Chart();
})
$('#datetimepicker-form-mr2-start,#datetimepicker-form-mr2-end').on('dp.change', function () {
    setFormMr2Chart();
})
$('#datetimepicker-form-mr3-start,#datetimepicker-form-mr3-end').on('dp.change', function () {
    setFormMr3Chart();
})
$('#datetimepicker-form-mr4-start,#datetimepicker-form-mr4-end').on('dp.change', function () {
    setFormMr4Chart();
})
$('#datetimepicker-perizinan-monev-start,#datetimepicker-perizinan-monev-end').on('dp.change', function () {
    setPerizinanMonevChart();
})

$('#perizinan-monev-upt').on('change', function () {
    setPerizinanMonevChart();
})

$('#datetimepicker-perijinan-batas-waktu-start,#datetimepicker-perijinan-batas-waktu-end').on('dp.change', function () {
    setPerijinanBatasWaktuChart();
})
$('#perijinan-batas-waktu-upt').on('change', function () {
    setPerijinanBatasWaktuChart();
})
$('#datetimepicker-status-penanganan-start,#datetimepicker-status-penanganan-end').on('dp.change', function () {
    setStatusChart();
})
$('#datetimepicker-perijinan-start,#datetimepicker-perijinan-end').on('dp.change', function () {
    setPerijinanChart();
})
$('#perijinan-upt').on('change', function () {
    setPerijinanChart();
})
$('#datetimepicker-pengaduan-start,#datetimepicker-pengaduan-end').on('dp.change', function () {
    setPengaduanChart();
})
$('#pengaduan-upt').on('change', function () {
    setPengaduanChart();
})
$('#datetimepicker-perijinan-tujuan-start, #datetimepicker-perijinan-tujuan-end').on('dp.change', function () {
    setPerijinanTujuanChart();
})
$('#datetimepicker-status-paket-belum-lelang-start, #datetimepicker-status-paket-belum-lelang-end').on('dp.change', function () {
    setStatusPaketBelumLelang();
})
$('#datetimepicker-perijinan-table-start,#datetimepicker-perijinan-table-end').on('dp.change', function () {
    setTablePerijinan();
})
$('#perijinan-table-upt').on('change', function () {
    setTablePerijinan();
})
$('#datetimepicker-pengadaan').on('dp.change', function () {
    setChartPengadaan();
})
$('#datetimepicker-proses-lelang').on('dp.change', function () {
    setChartProsesLelang();
})
// $('#datetimepicker-terkontrak').on('dp.change', function () {
//     setChartTerkontrak();
// })
$('#tgl-terkontrak').on('change', function () {
    setChartTerkontrak();
})
setChartTerkontrak();

$('#datetimepicker-kemajuan').on('dp.change', function () {
    setChartKemajuan();
})

setChartKontrakHPS();
$('#tgl-kontrak-hps').on('change', function () {
    setChartKontrakHPS();
})
// $('#datetimepicker-pengadaan-banding1,#datetimepicker-pengadaan-banding2').on('dp.change', function () {
//     setTablePengadaanBanding();
// })

$("#status-paket-belum-lelang-tgl").on('change', function () {
    setStatusPaketBelumLelang();
});
setStatusPaketBelumLelang();

$('#tgl-pengadaan-banding1,#tgl-pengadaan-banding2').on('change', function () {
    setTablePengadaanBanding();
})
setTablePengadaanBanding();

$('#proses-lelang').on('change', function () {
    setChartProsesLelang();
})
setChartProsesLelang();

function setProgressPekerjaanChart() {
    var date = $('#status_progress_pekerjaan').val();
    $.get(CURRENT_URL, {
        date,
        'function': 'chartProgressPekerjaan'
    }, function (res) {
        console.log(res);
        changeViewProgressPekerjaanChart(res);
        changeViewProgressPekerjaanTable(res);
    })
}

// Start Progress Keuangan
const progressPekerjaanChartCtx = document.getElementById('progress-pekerjaan-chart');
var progressPekerjaanChartCurrent;
function changeViewProgressPekerjaanChart(data) {
    if (progressPekerjaanChartCurrent) {
        progressPekerjaanChartCurrent.destroy();
    }
    progressPekerjaanChartCurrent = new Chart(progressPekerjaanChartCtx, {
        type: 'pie',
        data: {
            labels: ['DEV > 10%', '0% < Dev <= 10%', '-10% < Dev <= 0', '-30 < Dev <= -10%', 'Dev <= -30%'],
            datasets: [
                {
                    label: 'Progress Pekerjaan',
                    data: [
                        data.dev1.persentase,
                        data.dev2.persentase,
                        data.dev3.persentase,
                        data.dev4.persentase,
                        data.dev5.persentase
                    ],
                    backgroundColor: [

                        'rgba(0, 204, 0, 1)', //green #00cc00
                        'rgba(102, 102, 255, 1)', //blue #6666ff
                        'rgba(128, 128, 128, 1)', //grey #808080
                        'rgba(204,204,0, 1)', // yellow #cccc00
                        'rgba(255, 102, 102, 1)', //red #ff6666
                    ],
                },
            ]
        },
        plugins: [ChartDataLabels],
        options: {
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),

                }
            },
        },
    });
}

function changeViewProgressPekerjaanTable(data) {
    $($('.data-deviasi-persentase')[0]).text(data.dev1.persentase + '%');
    $($('.data-deviasi-jumlah_satker')[0]).text(data.dev1.jumlah_satker);
    $($('.data-deviasi-persentase')[1]).text(data.dev2.persentase + '%');
    $($('.data-deviasi-jumlah_satker')[1]).text(data.dev2.jumlah_satker);
    $($('.data-deviasi-persentase')[2]).text(data.dev3.persentase + '%');
    $($('.data-deviasi-jumlah_satker')[2]).text(data.dev3.jumlah_satker);
    $($('.data-deviasi-persentase')[3]).text(data.dev4.persentase + '%');
    $($('.data-deviasi-jumlah_satker')[3]).text(data.dev4.jumlah_satker);
    $($('.data-deviasi-persentase')[4]).text(data.dev5.persentase + '%');
    $($('.data-deviasi-jumlah_satker')[4]).text(data.dev5.jumlah_satker);

    $('.data-deviasi-persentase-total').text(data.persentase_total + '%');
    $('.data-deviasi-satker-total').text(data.satker_total);
}

// End Progress Keuangan

// Start Chart Fisik
function setProgressFisikChart() {
    var date = $('#status_progress_fisik').val();
    $.get(CURRENT_URL, {
        date,
        'function': 'chartProgressFisik'
    }, function (res) {
        console.log(res);
        changeViewProgressFisikChart(res);
        changeViewProgressFisikTable(res);
    })
}

const progressFisikChartCtx = document.getElementById('progress-fisik-chart');
var progressFisikChartCurrent;
function changeViewProgressFisikChart(data) {
    if (progressFisikChartCurrent) {
        progressFisikChartCurrent.destroy();
    }
    progressFisikChartCurrent = new Chart(progressFisikChartCtx, {
        type: 'pie',
        data: {
            labels: ['DEV > 10%', '0% < Dev <= 10%', '-10% < Dev <= 0', '-30 < Dev <= -10%', 'Dev <= -30%'],
            datasets: [
                {
                    label: 'Progress Pekerjaan',
                    data: [
                        data.dev1.persentase,
                        data.dev2.persentase,
                        data.dev3.persentase,
                        data.dev4.persentase,
                        data.dev5.persentase
                    ],
                    backgroundColor: [

                        'rgba(0, 204, 0, 1)', //green #00cc00
                        'rgba(102, 102, 255, 1)', //blue #6666ff
                        'rgba(128, 128, 128, 1)', //grey #808080
                        'rgba(204,204,0, 1)', // yellow #cccc00
                        'rgba(255, 102, 102, 1)', //red #ff6666
                    ],
                },
            ]
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),

                }
            },
        },
    });
}

function changeViewProgressFisikTable(data) {
    $($('.data-deviasi-fisik-persentase')[0]).text(data.dev1.persentase + '%');
    $($('.data-deviasi-fisik-jumlah_satker')[0]).text(data.dev1.jumlah_satker);
    $($('.data-deviasi-fisik-persentase')[1]).text(data.dev2.persentase + '%');
    $($('.data-deviasi-fisik-jumlah_satker')[1]).text(data.dev2.jumlah_satker);
    $($('.data-deviasi-fisik-persentase')[2]).text(data.dev3.persentase + '%');
    $($('.data-deviasi-fisik-jumlah_satker')[2]).text(data.dev3.jumlah_satker);
    $($('.data-deviasi-fisik-persentase')[3]).text(data.dev4.persentase + '%');
    $($('.data-deviasi-fisik-jumlah_satker')[3]).text(data.dev4.jumlah_satker);
    $($('.data-deviasi-fisik-persentase')[4]).text(data.dev5.persentase + '%');
    $($('.data-deviasi-fisik-jumlah_satker')[4]).text(data.dev5.jumlah_satker);

    $('.data-deviasi-fisik-persentase-total').text(data.persentase_total + '%');
    $('.data-deviasi-fisik-satker-total').text(data.satker_total);
}
// End Chart Fisik


function setFormMrChart() {
    var date_start = $('#form-mr-start').val();
    var date_end = $('#form-mr-end').val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        'function': 'chartFormMr'
    }, function (res) {
        console.log(res);
        changeViewMrChart(res);
    })
}

const mrChartCtx = document.getElementById('mr-chart');
var mrChart;
function changeViewMrChart(data) {
    if (mrChart) {
        mrChart.destroy();
    }

    var levels = []
    var data_dikirim = [];
    var data_terverifikasi = [];
    var data_tidak_terverifikasi = [];

    $.each(data, function (i, v) {
        levels.push(i);
    });

    $.each(data, function (i, v) {
        data_dikirim.push(v.status_0);
    });

    $.each(data, function (i, v) {
        data_terverifikasi.push(v.status_1);
    });
    $.each(data, function (i, v) {
        data_tidak_terverifikasi.push(v.status_2);
    });

    mrChart = new Chart(mrChartCtx, {
        type: 'bar',
        data: {
            labels: levels,
            datasets: [{
                label: 'Dikirim',
                data: data_dikirim,
                backgroundColor: [
                    'rgba(102, 102, 255, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Terverifikasi',
                data: data_terverifikasi,
                backgroundColor: [
                    'rgba(0, 204, 0, 1)',
                ],
                borderWidth: 1
            },
            {
                label: 'Tidak Terverifikasi',
                data: data_tidak_terverifikasi,
                backgroundColor: [
                    'rgba(255, 102, 102, 1)',
                ],
                borderWidth: 1
            }]
        },
        plugins: [ChartDataLabels],
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                },
            },
            responsive: true,
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),

                }
            },
        },
    });
}

function setFormMr1Chart() {
    var date_start = $('#form-mr1-start').val();
    var date_end = $('#form-mr1-end').val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        'function': 'chartFormMr1'
    }, function (res) {
        console.log(res);
        changeViewMr1Chart(res);
    })
}

const mr1ChartCtx = document.getElementById('mr1-chart');
var mr1Chart;
function changeViewMr1Chart(data) {
    if (mr1Chart) {
        mr1Chart.destroy();
    }

    var datasets = [];
    var c = 0
    $.each(data.datasets, function (i, v) {
        datasets.push({
            label: i,
            data: v,
            backgroundColor: colours[c++]
        });
    })

    mr1Chart = new Chart(mr1ChartCtx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: datasets
        },
        plugins: [ChartDataLabels],
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                },
            },
            responsive: true,
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),

                }
            },
        },
    });
}

function setFormMr2Chart() {
    var date_start = $('#form-mr2-start').val();
    var date_end = $('#form-mr2-end').val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        'function': 'chartFormMr2'
    }, function (res) {
        console.log(res);
        changeViewMr2Chart(res);
    })
}

const mr2ChartCtx = document.getElementById('mr2-chart');
var mr2Chart;
function changeViewMr2Chart(data) {
    if (mr2Chart) {
        mr2Chart.destroy();
    }

    var datasets = [];
    var c = 0;
    $.each(data.datasets, function (i, v) {
        datasets.push({
            label: i,
            data: v,
            backgroundColor: colours[c++]
        });
    })

    mr2Chart = new Chart(mr2ChartCtx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: datasets
        },
        plugins: [ChartDataLabels],
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                },
            },
            responsive: true,
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}

function setFormMr3Chart() {
    var date_start = $('#form-mr3-start').val();
    var date_end = $('#form-mr3-end').val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        'function': 'chartFormMr3'
    }, function (res) {
        console.log(res);
        changeViewMr3Chart(res);
    })
}

const mr3ChartCtx = document.getElementById('mr3-chart');
var mr3Chart;
function changeViewMr3Chart(data) {
    if (mr3Chart) {
        mr3Chart.destroy();
    }

    var datasets = [];
    var c = 0
    $.each(data.datasets, function (i, v) {
        datasets.push({
            label: i,
            data: v,
            backgroundColor: colours[c++]
        });
    })

    mr3Chart = new Chart(mr3ChartCtx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: datasets
        },
        plugins: [ChartDataLabels],
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                },
            },
            responsive: true,
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}

function setFormMr4Chart() {
    var date_start = $('#form-mr4-start').val();
    var date_end = $('#form-mr4-end').val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        'function': 'chartFormMr4'
    }, function (res) {
        console.log(res);
        changeViewMr4Chart(res);
    })
}

const mr4ChartCtx = document.getElementById('mr4-chart');
var mr4Chart;
function changeViewMr4Chart(data) {
    if (mr4Chart) {
        mr4Chart.destroy();
    }

    var datasets = [];
    var c = 0
    $.each(data.datasets, function (i, v) {
        datasets.push({
            label: i,
            data: v,
            backgroundColor: colours[c++]
        });
    })

    mr4Chart = new Chart(mr4ChartCtx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: datasets
        },
        plugins: [ChartDataLabels],
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                },
            },
            responsive: true,
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}

function setStatusChart() {
    var date_start = $('#status-status-penanganan-start').val();
    var date_end = $('#status-status-penanganan-end').val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        'function': 'chartStatus'
    }, function (res) {
        console.log(res);
        changeViewStatusChart(res);
    })
}

var statusChart;
function changeViewStatusChart(data) {
    if (statusChart) {
        statusChart.destroy();
    }

    const statusChartCtx = document.getElementById('status-chart');
    statusChart = new Chart(statusChartCtx, {
        type: 'pie',
        data: {
            labels: ['Selesai', 'Proses', 'Belum TL'],
            datasets: [
                {
                    data: [data.selesai, data.proses, data.belum_tl],
                    backgroundColor: [

                        'rgba(0, 222, 128, 1)',
                        'rgba(240, 240, 51, 1)',
                        'rgba(255, 102, 102, 1)',
                    ],
                },
            ]
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}


function setPerizinanMonevChart() {
    var date_start = $('#perizinan-monev-start').val();
    var date_end = $('#perizinan-monev-end').val();
    var upt = $("#perizinan-monev-upt").val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        upt,
        'function': 'chartPerizinanMonev'
    }, function (res) {
        console.log(res);
        changeViewPerizinanMonevChart(res);
    })
}

var perizinanMonevChart;
function changeViewPerizinanMonevChart(data) {
    if (perizinanMonevChart) {
        perizinanMonevChart.destroy();
    }

    var datasets = [];
    $.each(data.datasets, function (i, v) {
        var dt = [];
        $.each(v.data, function (x, y) {
            dt.push(y);
        });
        datasets.push({
            label: v.label,
            data: dt,
            backgroundColor: colours[i],
            borderWidth: 1
        })
    })
    console.log(data.labels, datasets)

    const perizinanMonevChartCtx = document.getElementById('perizinan-monev-chart');
    perizinanMonevChart = new Chart(perizinanMonevChartCtx, {
        type: 'pie',
        data: {
            labels: data.labels,
            datasets: [
                {
                    label: 'Jumlah Data',
                    data: data.data,
                    backgroundColor: [colours[0], colours[1]],
                    borderWidth: 1
                },
            ],
        },
        plugins: [ChartDataLabels],
        options: {
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),

                }
            },
        },
    });
}

function setPerijinanChart() {
    var date_start = $('#perijinan-start').val();
    var date_end = $('#perijinan-end').val();
    var upt = $('#perijinan-upt').val();

    $.get(CURRENT_URL, {
        date_start,
        date_end,
        upt,
        'function': 'chartPerijinan'
    }, function (res) {
        console.log(res);
        changeViewPerijinanChart(res);
    })
}

var perijinanChart;
function changeViewPerijinanChart(data) {
    if (perijinanChart) {
        perijinanChart.destroy();
    }

    var datasets = [];
    $.each(data.datasets, function (i, v) {
        var dt = [];
        $.each(v.data, function (x, y) {
            dt.push(y);
        });
        datasets.push({
            label: v.label,
            data: dt,
            backgroundColor: colours[i],
            borderWidth: 1
        })
    })

    var labels = [];
    $.each(data.labels, function (i, v) {
        labels.push(v);
    })
    console.log(data.labels, datasets)

    const perijinanChartCtx = document.getElementById('perijinan-chart');
    perijinanChart = new Chart(perijinanChartCtx, {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: {
            labels,
            datasets: datasets,
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                    title: {
                        display: true,
                        text: 'Pemohon'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'UPT'
                    }
                },
            },
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),

                }
            },
        }
    });
}

// chart pengaduan

function setPengaduanChart() {
    var date_start = $('#pengaduan-start').val();
    var date_end = $('#ppengaduan-end').val();
    var upt = $('#pengaduan-upt').val();

    $.get(CURRENT_URL, {
        date_start,
        date_end,
        upt,
        'function': 'chartPengaduan'
    }, function (res) {
        console.log(res);
        changeViewPengaduanChart(res);
    })
}

var pengaduanChart;
function changeViewPengaduanChart(data) {
    if (pengaduanChart) {
        pengaduanChart.destroy();
    }

    var datasets = [];
    $.each(data.datasets, function (i, v) {
        var dt = [];
        $.each(v.data, function (x, y) {
            dt.push(y);
        });
        datasets.push({
            label: v.label,
            data: dt,
            backgroundColor: colours[i],
            borderWidth: 1
        })
    })

    var labels = [];
    $.each(data.labels, function (i, v) {
        labels.push(v);
    })
    console.log(data.labels, datasets)

    const pengaduanChartCtx = document.getElementById('pengaduan-chart');
    pengaduanChart = new Chart(pengaduanChartCtx, {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: {
            labels,
            datasets: datasets,
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                    title: {
                        display: true,
                        text: 'Pemohon'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'UPT'
                    }
                },
            },
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),

                }
            },
        }
    });
}

// end chart pengaduan ----------------------------------------------------------------//


function setPerijinanTujuanChart() {
    var date_start = $('#perijinan-tujuan-start').val();
    var date_end = $('#perijinan-tujuan-end').val();
    $.get(CURRENT_URL, {
        date_start,
        date_end,
        'function': 'chartPerijinanTujuan'
    }, function (res) {
        console.log(res);
        changeViewPerijinanTujuanChart(res);
    })
}

var perijinanChartTujuan;
function changeViewPerijinanTujuanChart(data) {
    if (perijinanChartTujuan) {
        perijinanChartTujuan.destroy();
    }
    perijinanChartTujuanColour = [];
    $.each(data.labels, function (i, v) {
        perijinanChartTujuanColour.push(colours[i]);
    })

    const perijinanChartTujuanCtx = document.getElementById('perijinan-tujuan-chart');
    var myColors = [];
    $.each(data.labels, function (i, v) {
        myColors.push("rgba(" + Math.floor(Math.random() * 255) + ", " + Math.floor(Math.random() * 255) + ", " + Math.floor(Math.random() * 255) + ")");
    })
    perijinanChartTujuan = new Chart(perijinanChartTujuanCtx, {
        type: 'doughnut',
        data: {
            labels: data.labels,
            datasets: [
                {
                    label: 'Jumlah Data',
                    data: data.data,
                    backgroundColor: myColors,
                    borderWidth: 1
                },
            ]
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}



function setPerijinanBatasWaktuChart() {
    var date_start = $('#perijinan-batas-waktu-start').val();
    var date_end = $('#perijinan-batas-waktu-end').val();
    var upt = $('#perijinan-batas-waktu-upt').val();

    $.get(CURRENT_URL, {
        date_start,
        date_end,
        upt,
        'function': 'chartPerijinanBatasWaktu'
    }, function (res) {
        console.log(res);
        changeViewPerijinanBatasWaktuChart(res);
    })
}

var perijinanBatasWaktuChart;
function changeViewPerijinanBatasWaktuChart(data) {
    if (perijinanBatasWaktuChart) {
        perijinanBatasWaktuChart.destroy();
    }
    perijinanBatasWaktuChartColour = [];
    $.each(data.labels, function (i, v) {
        perijinanBatasWaktuChartColour.push(colours[i]);
    })

    const perijinanBatasWaktuChartCtx = document.getElementById('perijinan-batas-waktu-chart');
    perijinanBatasWaktuChart = new Chart(perijinanBatasWaktuChartCtx, {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [
                // {
                //     label: 'Verifikasi',
                //     data: data.data.verifikasi,
                //     backgroundColor: colours[0],
                //     borderWidth: 1
                // },
                {
                    label: 'Perizinan',
                    data: data.data.sk,
                    backgroundColor: colours[1],
                    borderWidth: 1
                },
            ]
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Perizinan'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Status'
                    }
                },
            },
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),
                }
            },
        }
    });
}

function setTablePerijinan() {
    var colDef = [
        { data: 'nomor_registrasi', render: renderNumRow },
        { data: 'nomor_registrasi' },
        { data: 'nama_perusahaan' },
        { data: 'nama_balai' },
        { data: 'sumber_air' },
        // { data: 'VERIFIKASI' },
        { data: 'SK_MENTERI' },
    ];
    var reqData = {
        date_start: $('#perijinan-table-start').val(),
        date_end: $('#perijinan-table-end').val(),
        upt: $('#perijinan-table-upt').val(),
    };

    var reqOrder = null;

    tableData = setDataTable('#table-perijinan', urlData, colDef, reqData, reqOrder, null, null, false);
}

function setChartBPL() {
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_material);
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("bpl", am4charts.PieChart);
        chart.startAngle = 160;
        chart.endAngle = 380;

        // Let's cut a hole in our Pie chart the size of 40% the radius
        chart.innerRadius = am4core.percent(40);

        // Add data
        chart.data = [{
            "label": "Belum Tidak Lanjut",
            "litres": 501.9,
            "bottles": 1500
        }, {
            "label": "Proses",
            "litres": 30.9,
            "bottles": 990
        }, {
            "label": "Selesai",
            "litres": 39,
            "bottles": 990
        }];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "label";
        pieSeries.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
        pieSeries.slices.template.strokeWidth = 1;
        pieSeries.slices.template.strokeOpacity = 1;

        // Disabling labels and ticks on inner circle
        pieSeries.labels.template.disabled = true;
        pieSeries.ticks.template.disabled = true;

        // Disable sliding out of slices
        pieSeries.slices.template.states.getKey("hover").properties.shiftRadius = 0;
        pieSeries.slices.template.states.getKey("hover").properties.scale = 1;
        pieSeries.radius = am4core.percent(40);
        pieSeries.innerRadius = am4core.percent(30);

        var cs = pieSeries.colors;
        cs.list = [am4core.color(new am4core.ColorSet().getIndex(0))];

        cs.stepOptions = {
            lightness: -0.05,
            hue: 0
        };
        cs.wrap = false;


        // Add second series
        var pieSeries2 = chart.series.push(new am4charts.PieSeries());
        pieSeries2.dataFields.value = "bottles";
        pieSeries2.dataFields.category = "label";
        pieSeries2.slices.template.stroke = new am4core.InterfaceColorSet().getFor("background");
        pieSeries2.slices.template.strokeWidth = 1;
        pieSeries2.slices.template.strokeOpacity = 1;
        pieSeries2.slices.template.states.getKey("hover").properties.shiftRadius = 0.05;
        pieSeries2.slices.template.states.getKey("hover").properties.scale = 1;

        pieSeries2.labels.template.disabled = true;
        pieSeries2.ticks.template.disabled = true;


        var label = chart.seriesContainer.createChild(am4core.Label);
        label.textAlign = "middle";
        label.horizontalCenter = "middle";
        label.verticalCenter = "middle";
        label.adapter.add("text", function (text, target) {
            return "[font-size:18px]JUMLAH[/]\n[bold font-size:30px]" + pieSeries.dataItem.values.value.sum + "[/]";
        })

    }); // end am4core.ready()
}

function setChartKKN() {
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_material);
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("kkn", am4charts.PieChart);

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "label";

        // Let's cut a hole in our Pie chart the size of 30% the radius
        chart.innerRadius = am4core.percent(30);

        // Put a thick white border around each Slice
        pieSeries.slices.template.stroke = am4core.color("#fff");
        pieSeries.slices.template.strokeWidth = 2;
        pieSeries.slices.template.strokeOpacity = 1;
        pieSeries.slices.template
            // change the cursor on hover to make it apparent the object can be interacted with
            .cursorOverStyle = [
                {
                    "property": "cursor",
                    "value": "pointer"
                }
            ];

        pieSeries.alignLabels = false;
        pieSeries.labels.template.bent = false;
        pieSeries.labels.template.radius = 3;
        pieSeries.labels.template.padding(0, 0, 0, 0);

        pieSeries.ticks.template.disabled = true;

        // Create a base filter effect (as if it's not there) for the hover to return to
        var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
        shadow.opacity = 0;

        // Create hover state
        var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

        // Slightly shift the shadow and make it more prominent on hover
        var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
        hoverShadow.opacity = 0.7;
        hoverShadow.blur = 5;

        // Add a legend
        chart.legend = new am4charts.Legend();

        chart.data = [{
            "label": "Korupsi",
            "litres": 501.9
        }, {
            "label": "Kolusi",
            "litres": 165.8
        }, {
            "label": "Persekongkolan",
            "litres": 165.8
        }, {
            "label": "Penyalahgunaan Wewenang",
            "litres": 165.8
        }, {
            "label": "Ketidaktaatan Pekerjaan",
            "litres": 165.8
        }, {
            "label": "Penipuan Kontrak",
            "litres": 165.8
        }, {
            "label": "Nepotisme",
            "litres": 139.9
        }];

    }); // end am4core.ready()
}

function setChartPengadaan() {
    var date = $('#pengadaan').val();
    $.get(CURRENT_URL, {
        date,
        'function': 'chartPengadaan'
    }, function (res) {
        console.log(res);
        changeViewPengadaan(res);
    })
}

var historyChart;
function changeViewPengadaan(data) {
    if (historyChart) {
        historyChart.destroy();
    }

    var table = "";
    table += "<tr>";
    table += "<th>Paket/Bulan</th>";
    $.each(data.categories, function (i, v) {
        table += "<th class='text-center'>" + v + "</th>"
    })
    table += "</tr>";
    console.log(data.series);
    $.each(data.series, function (i, v) {
        var text_white = "";
        if (i != 2) {
            text_white = "text-white"
        }
        table += "<tr style='background-color: " + colours[i] + "' class='text-center'>";
        table += "<td class='text-center'>" + v.name + "</td>"
        $.each(v.data, function (x, y) {
            table += "<td class='text-bold " + text_white + "'>" + y + "</td>"
        })
        table += "</tr>";
    })
    $('#table-pengadaan').html(table);

    const historyChartCtx = document.getElementById('history-chart');
    datasets = [];
    $.each(data.series, function (i, v) {
        datasets[i] = {
            label: v.name,
            data: v.data,
            backgroundColor: colours[i]
        }
    });

    historyChart = new Chart(historyChartCtx, {
        type: 'bar',
        data: {
            labels: data.categories,
            datasets: datasets
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    anchor: 'end', // remove this line to get label in middle of the bar
                    align: 'end',
                    formatter: (val) => (`${val}`),
                }
            },
            scales: {
                y: {
                    stacked: true,
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true,
                    },
                },
                x: {
                    stacked: true
                },
            },
        },
    });
}

function setChartKemajuan() {
    var date = $('#kemajuan').val();
    $.get(CURRENT_URL, {
        date,
        'function': 'chartKemajuan'
    }, function (res) {
        console.log(res);
        changeViewKemajuan(res);
    })
}

var kemajuanChart;
function changeViewKemajuan(data) {
    if (kemajuanChart) {
        kemajuanChart.destroy();
    }

    var table = "";
    table += "<tr>";
    table += "<th>Paket/Bulan</th>";
    $.each(data.categories, function (i, v) {
        table += "<th class='text-center'>" + v + "</th>"
    })
    table += "</tr>";
    console.log(data.series);
    $.each(data.series, function (i, v) {
        var text_white = "";
        if (i != 2) {
            text_white = "text-white"
        }
        table += "<tr style='background-color: " + colours[i] + "' class='text-center'>";
        table += "<td class='text-center'>" + v.name + "</td>"
        $.each(v.data, function (x, y) {
            table += "<td class='text-bold " + text_white + "'>" + y + "%</td>"
        })
        table += "</tr>";
    })
    $('#table-kemajuan').html(table);

    const kemajuanChartCtx = document.getElementById('kemajuan-chart');
    datasets = [];
    $.each(data.series, function (i, v) {
        datasets[i] = {
            label: v.name,
            data: v.data,
            borderColor: colours[i]
        }
    });

    kemajuanChart = new Chart(kemajuanChartCtx, {
        type: 'line',
        data: {
            labels: data.categories,
            datasets: datasets
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}

function setTablePengadaanBanding() {
    var date1 = $('#tgl-pengadaan-banding1').val();
    var date2 = $('#tgl-pengadaan-banding2').val();
    $.get(CURRENT_URL, {
        date1,
        date2,
        'function': 'tablePengadaanBanding'
    }, function (res) {
        console.log(res);
        changeViewPengadaanBanding(res);
    })
}

function changeViewPengadaanBanding(data) {
    var table = "";
    var kontraktual_status = 0;
    var terkontrak_status = 0;
    var persiapan_status = 0;
    var proses_status = 0;
    var belum_status = 0;
    var gagal_status = 0;
    $.each(data, function (i, v) {
        table += "<tr class='text-right text-bold'>";
        table += "<td class='text-left'>" + v.tanggal + "</td>";
        table += "<td>" + formatCurrency(v.kontraktual.pkt) + "</td>";
        table += "<td>" + formatCurrency(v.kontraktual.pagu_dipa) + "</td>";
        table += "<td>" + formatCurrency(v.terkontrak.pkt) + "</td>";
        table += "<td>" + formatCurrency(v.terkontrak.pagu_dipa) + "</td>";
        table += "<td>" + formatCurrency(v.persiapan_terkontrak.pkt) + "</td>";
        table += "<td>" + formatCurrency(v.persiapan_terkontrak.pagu_dipa) + "</td>";
        table += "<td>" + formatCurrency(v.proses_lelang.pkt) + "</td>";
        table += "<td>" + formatCurrency(v.proses_lelang.pagu_dipa) + "</td>";
        table += "<td>" + formatCurrency(v.belum_lelang.pkt) + "</td>";
        table += "<td>" + formatCurrency(v.belum_lelang.pagu_dipa) + "</td>";
        table += "<td>" + formatCurrency(v.gagal_lelang.pkt) + "</td>";
        table += "<td>" + formatCurrency(v.gagal_lelang.pagu_dipa) + "</td>";
        table += "</tr>";
    });

    var status_kontraktual = data[1].kontraktual.pkt - data[0].kontraktual.pkt;
    var status_terkontrak = data[1].terkontrak.pkt - data[0].terkontrak.pkt;
    var status_persiapan_terkontrak = data[1].persiapan_terkontrak.pkt - data[0].persiapan_terkontrak.pkt;
    var status_proses_lelang = data[1].proses_lelang.pkt - data[0].proses_lelang.pkt;
    var status_belum_lelang = data[1].belum_lelang.pkt - data[0].belum_lelang.pkt;
    var status_gagal_lelang = data[1].gagal_lelang.pkt - data[0].gagal_lelang.pkt;
    table += "<tr class='text-right text-bold'>";
    table += "<td></td>";
    table += "<td>" + (status_kontraktual > 0 ? "+" : "") + formatCurrency(status_kontraktual) + "</td>"
    table += "<td class='text-center'>" + (status_kontraktual > 0 ? "Naik" : (status_kontraktual < 0 ? "Turun" : "Tetap")) + "</td>";
    table += "<td>" + (status_terkontrak > 0 ? "+" : "") + formatCurrency(status_terkontrak) + "</td>"
    table += "<td class='text-center'>" + (status_terkontrak > 0 ? "Naik" : (status_terkontrak < 0 ? "Turun" : "Tetap")) + "</td>";
    table += "<td>" + (status_persiapan_terkontrak > 0 ? "+" : "") + formatCurrency(status_persiapan_terkontrak) + "</td>"
    table += "<td class='text-center'>" + (status_persiapan_terkontrak > 0 ? "Naik" : (status_persiapan_terkontrak < 0 ? "Turun" : "Tetap")) + "</td>";
    table += "<td>" + (status_proses_lelang > 0 ? "+" : "") + formatCurrency(status_proses_lelang) + "</td>"
    table += "<td class='text-center'>" + (status_proses_lelang > 0 ? "Naik" : (status_proses_lelang < 0 ? "Turun" : "Tetap")) + "</td>";
    table += "<td>" + (status_belum_lelang > 0 ? "+" : "") + formatCurrency(status_belum_lelang) + "</td>"
    table += "<td class='text-center'>" + (status_belum_lelang > 0 ? "Naik" : (status_belum_lelang < 0 ? "Turun" : "Tetap")) + "</td>";
    table += "<td>" + (status_gagal_lelang > 0 ? "+" : "") + formatCurrency(status_gagal_lelang) + "</td>"
    table += "<td class='text-center'>" + (status_gagal_lelang > 0 ? "Naik" : (status_gagal_lelang < 0 ? "Turun" : "Tetap")) + "</td>";
    table += "</tr>";

    $('#table-pengadaan-banding>tbody').html(table);
}

function setChartProsesLelang() {
    var date = $('#proses-lelang').val();
    $.get(CURRENT_URL, {
        date,
        'function': 'chartProsesLelang'
    }, function (res) {
        console.log(res);
        changeViewProsesLelang(res);
    })
}

var prosesLelangChart;
function changeViewProsesLelang(data) {
    if (prosesLelangChart) {
        prosesLelangChart.destroy();
    }

    $('#proses-lelang-persen02').text((data.proses_lelang02.persen ?? 0).toString().replace('.', ',') + "%")
    $('#proses-lelang-jumlah02').text((data.proses_lelang02.jumlah ?? 0))
    $('#proses-lelang-persen23').text((data.proses_lelang23.persen ?? 0).toString().replace('.', ',') + "%")
    $('#proses-lelang-jumlah23').text((data.proses_lelang23.jumlah ?? 0))
    $('#proses-lelang-persen34').text((data.proses_lelang34.persen ?? 0).toString().replace('.', ',') + "%")
    $('#proses-lelang-jumlah34').text((data.proses_lelang34.jumlah ?? 0))
    $('#proses-lelang-persen4').text((data.proses_lelang4.persen ?? 0).toString().replace('.', ',') + "%")
    $('#proses-lelang-jumlah4').text((data.proses_lelang4.jumlah ?? 0))

    $('#proses-lelang-total-paket-lelang').text(data.total)
    $('#proses-lelang-persen-paket-persentase').text((data.persentase ?? 0).toString().replace('.', ',') + "%")

    const prosesLelangChartCtx = document.getElementById('proses-lelang-chart');
    prosesLelangChart = new Chart(prosesLelangChartCtx, {
        type: 'pie',
        data: {
            labels: ["0-60 Hari", '61-90 Hari', '91-120 Hari', '>120 Hari'],
            datasets: [{
                label: "Proses Lelang",
                data: [data.proses_lelang02.persen, data.proses_lelang23.persen, data.proses_lelang34.persen, data.proses_lelang4.persen],
                backgroundColor: [
                    'rgba(224, 224, 224)',
                    'rgba(255, 255, 0)',
                    'rgba(255, 153, 51)',
                    'rgba(255, 51, 51)',
                ]
            }]
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}

function setChartTerkontrak() {
    var date = $('#tgl-terkontrak').val();
    $.get(CURRENT_URL, {
        date,
        'function': 'chartTerkontrak'
    }, function (res) {
        console.log(res);
        changeViewTerkontrak(res);
    })
}

var terkontrakChart;
function changeViewTerkontrak(data) {
    if (terkontrakChart) {
        terkontrakChart.destroy();
    }

    $('#terkontrak-persen02').text((data.terkontrak02.persen ?? 0).toString().replace('.', ',') + "%")
    $('#terkontrak-jumlah02').text((data.terkontrak02.jumlah ?? 0))
    $('#terkontrak-persen23').text((data.terkontrak23.persen ?? 0).toString().replace('.', ',') + "%")
    $('#terkontrak-jumlah23').text((data.terkontrak23.jumlah ?? 0))
    $('#terkontrak-persen34').text((data.terkontrak34.persen ?? 0).toString().replace('.', ',') + "%")
    $('#terkontrak-jumlah34').text((data.terkontrak34.jumlah ?? 0))
    $('#terkontrak-persen4').text((data.terkontrak4.persen ?? 0).toString().replace('.', ',') + "%")
    $('#terkontrak-jumlah4').text((data.terkontrak4.jumlah ?? 0))

    $('#terkontrak-total-paket-lelang').text(data.total)
    $('#terkontrak-persen-paket-persentase').text((data.persentase ?? 0).toString().replace('.', ',') + "%")

    const terkontrakChartCtx = document.getElementById('terkontrak-chart');
    terkontrakChart = new Chart(terkontrakChartCtx, {
        type: 'pie',
        data: {
            labels: ["0-60 Hari", '61-90 Hari', '91-120 Hari', '>120 Hari'],
            datasets: [{
                label: "Proses Lelang",
                data: [data.terkontrak02.persen, data.terkontrak23.persen, data.terkontrak34.persen, data.terkontrak4.persen],
                backgroundColor: [
                    'rgba(224, 224, 224)',
                    'rgba(255, 255, 0)',
                    'rgba(255, 153, 51)',
                    'rgba(255, 51, 51)',
                ]
            }]
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}

function setChartKontrakHPS() {
    var date = $('#tgl-kontrak-hps').val();
    $.get(CURRENT_URL, {
        date,
        'function': 'chartKontrakHPS'
    }, function (res) {
        console.log(res);
        changeViewKontrakHPS(res);
    })
}

var kontrakHPSChart;
function changeViewKontrakHPS(data) {
    if (kontrakHPSChart) {
        kontrakHPSChart.destroy();
    }

    $('#kontrak-hps-au60').text((data.kontrak_hps60.pengadaan ?? 0));
    $('#kontrak-hps-au6070').text((data.kontrak_hps6070.pengadaan ?? 0));
    $('#kontrak-hps-au7080').text((data.kontrak_hps7080.pengadaan ?? 0));
    $('#kontrak-hps-pengadaan60').text((data.kontrak_hps60.pengadaan ?? 0));
    $('#kontrak-hps-pengadaan6070').text((data.kontrak_hps6070.pengadaan ?? 0));
    $('#kontrak-hps-pengadaan7080').text((data.kontrak_hps7080.pengadaan ?? 0));
    $('#kontrak-hps-konstruksi60').text((data.kontrak_hps60.konstruksi ?? 0));
    $('#kontrak-hps-konstruksi6070').text((data.kontrak_hps6070.konstruksi ?? 0));
    $('#kontrak-hps-konstruksi7080').text((data.kontrak_hps7080.konstruksi ?? 0));
    $('#kontrak-hps-konsultansi-bu60').text((data.kontrak_hps60.konsultansi_bu ?? 0));
    $('#kontrak-hps-konsultansi-bu6070').text((data.kontrak_hps6070.konsultansi_bu ?? 0));
    $('#kontrak-hps-konsultansi-bu7080').text((data.kontrak_hps7080.konsultansi_bu ?? 0));
    $('#kontrak-hps-konsultansi-orang60').text((data.kontrak_hps60.konsultansi_orang ?? 0));
    $('#kontrak-hps-konsultansi-orang6070').text((data.kontrak_hps6070.konsultansi_orang ?? 0));
    $('#kontrak-hps-konsultansi-orang7080').text((data.kontrak_hps7080.konsultansi_orang ?? 0));
    $('#kontrak-hps-lainnya60').text((data.kontrak_hps60.lainnya ?? 0));
    $('#kontrak-hps-lainnya6070').text((data.kontrak_hps6070.lainnya ?? 0));
    $('#kontrak-hps-lainnya7080').text((data.kontrak_hps7080.lainnya ?? 0));
    $('#kontrak-hps-cadangan60').text((data.kontrak_hps60.cadangan ?? 0));
    $('#kontrak-hps-cadangan6070').text((data.kontrak_hps6070.cadangan ?? 0));
    $('#kontrak-hps-cadangan7080').text((data.kontrak_hps7080.cadangan ?? 0));
    $('#kontrak-hps-jumlah60').text((data.kontrak_hps60.jumlah ?? 0));
    $('#kontrak-hps-jumlah6070').text((data.kontrak_hps6070.jumlah ?? 0));
    $('#kontrak-hps-jumlah7080').text((data.kontrak_hps7080.jumlah ?? 0));
    $('#kontrak-hps-persentase60').text((data.kontrak_hps60.persentase ?? 0).toString().replace('.', ',') + "%");
    $('#kontrak-hps-persentase6070').text((data.kontrak_hps6070.persentase ?? 0).toString().replace('.', ',') + "%");
    $('#kontrak-hps-persentase7080').text((data.kontrak_hps7080.persentase ?? 0).toString().replace('.', ',') + "%");

    $('#kontrak-hps-au-total').text(data.total.pengadaan)
    $('#kontrak-hps-pengadaan-total').text(data.total.pengadaan)
    $('#kontrak-hps-konstruksi-total').text(data.total.konstruksi)
    $('#kontrak-hps-konsultansi-bu-total').text(data.total.konsultansi_bu)
    $('#kontrak-hps-konsultansi-orang-total').text(data.total.konsultansi_orang)
    $('#kontrak-hps-lainnya-total').text(data.total.lainnya)
    $('#kontrak-hps-cadangan-total').text(data.total.cadangan)
    $('#kontrak-hps-jumlah-total').text(data.total.jumlah)
    $('#kontrak-hps-persentase-total').text(data.total.persentase.toString().replace('.', ',') + "%")

    const kontrakHPSChartCtx = document.getElementById('kontrak-hps-chart');
    kontrakHPSChart = new Chart(kontrakHPSChartCtx, {
        type: 'pie',
        data: {
            labels: ["< 60%", '>= 60% dan < 70%', '>= 70% dan < 80%'],
            datasets: [{
                label: "HPS",
                data: [data.kontrak_hps60.jumlah, data.kontrak_hps6070.jumlah, data.kontrak_hps7080.jumlah,],
                backgroundColor: [
                    'rgba(224, 224, 224)',
                    'rgba(255, 255, 0)',
                    'rgba(255, 153, 51)',
                ]
            }]
        },
        plugins: [ChartDataLabels],
        options: {
            responsive: true,
            plugins: {
                datalabels: {
                    formatter: (val) => (`${val}`),
                }
            },
        },
    });
}

function setStatusPaketBelumLelang() {
    var date = $('#status-paket-belum-lelang-tgl').val();
    // var date_start = $('#status-paket-belum-lelang-start').val();
    // var date_end = $('#status-paket-belum-lelang-end').val();
    $.get(CURRENT_URL, {
        date,
        // date_start,
        // date_end,
        'function': 'chartStatusPaketBelumLelang'
    }, function (res) {
        console.log(res);
        changeViewStatusPaketBelumLelang(res);
    })
}

function changeViewStatusPaketBelumLelang(data) {
    $('#spbl-total-paket').text(data.total_paket);
    $('#spbl-total-myc').text(data.total_myc);
    $('#spbl-myc-phln').text(data.total_myc_phln);
    $('#spbl-myc-rmp').text(data.total_myc_rmp);
    $('#spbl-total-syc').text(data.total_syc);
    $('#spbl-syc-phln').text(data.total_syc_phln);
    $('#spbl-syc-rmp').text(data.total_syc_rmp);

    var tbody = "";
    var kategori;
    $.each(data.table, function (i, v) {
        switch (v.kdkategori) {
            case '1':
                kategori = "Barang";
                break;
            case '2':
                kategori = "Pekerjaan Konstruksi";
                break;
            case '3':
                kategori = "jasa konsultansi (badan usaha)";
                break;
            case '4':
                kategori = "Jasa Konsultansi (orang)";
                break;
            case '5':
                kategori = "Jasa Lainnya";
                break;
            case '6':
                kategori = "Cadangan";
                break;

            default:
                kategori = "AU";
                break;
        }
        tbody += `
        <tr>
            <td text-left>${kategori}</td>
            <td>${v.jumlah_paket}</td>
            <td class="text-right">${formatCurrency(v.pg)}</td>
            <td>${v.syc}</td>
            <td>${v.myc}</td>
        </tr>
        `;
    });
    $('.table-spbl tbody').html(tbody);

    $('#table-spbl-total-paket').text(data.total_paket);
    $("#table-spbl-total-pagu").text(formatCurrency(data.total_pagu));
    $("#table-spbl-total-syc").text(data.total_syc);
    $("#table-spbl-total-myc").text(data.total_myc);
}