@extends('Home.layouts.layouthome')
@section('section')
    <div class="container py-3">
        {{-- Berita --}}
        <section class="my-5 rounded-2 border-2" style="width:100%; height: 40vh">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between">
                    <h3 class="d-inline align-self-center">Berita</h3>
                    <a href="" class="text-danger" style="text-decoration: none">
                        <p class="d-inline align-self-center">Lihat Selengkapnya</p>
                    </a>
                </div>
            </div>
            <div class="container bg-secondary py-2"></div>
        </section>
        {{-- Profile --}}
        <section class="my-5 rounded-2 border-2" style="width:100%; height: 40vh">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between">
                    <h3 class="d-inline align-self-center">Profile</h3>
                    <a href="" class="text-danger" style="text-decoration: none">
                        <p class="d-inline align-self-center">Lihat Selengkapnya</p>
                    </a>
                </div>
            </div>
            <div class="container bg-secondary py-2"></div>
        </section>
        {{-- Dasar Pembentukan Hukum --}}
        <section class="my-5 rounded-2 border-2" style="width:100%; height: 40vh">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between">
                    <h3 class="d-inline align-self-center">Dasar Pembentukan Hukum</h3>
                </div>
            </div>
            <div class="container bg-secondary py-2"></div>
        </section>
        {{-- Faq --}}
        <section class="my-5 rounded-2 border-2" style="width:100%; height: 40vh">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between">
                    <h3 class="d-inline align-self-center">FAQ</h3>
                </div>
            </div>
            <div class="container bg-secondary py-2"></div>
        </section>
    </div>
@endsection
@push('script-css')
@endpush
@push('script-js')
    {{-- script chart manajemen risiko --}}
    <script>
        /*Komitmen Manajemen Risiko*/
        $('#chartMRkomitmen').html(myChartMRkomitmen());

        function myChartMRkomitmen() {
            let myChart = document.getElementById('chartMRkomitmen').getContext('2d');

            var kom_v = "{!! $kom_v !!}";
            var kom_d = "{!! $kom_d !!}";
            var kom_b = "{!! 293 - ($kom_d + $kom_v) !!}";

            let chartMRCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Verifikasi',
                        'Draft',
                        'belum'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [kom_v, kom_d, kom_b],
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(255, 99, 132)'
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            align: 'start',
                            position: 'bottom'
                        },
                        datalabels: {
                            color: 'rgb(0, 0, 0)',
                            align: 'center',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 1,
                },
                plugins: [ChartDataLabels],
            });

            function toggleData(value) {
                const visibilityData = myChart.isDatasetVisible(value);
                if (visibilityData === true) {
                    myChart.hide(value);
                }
                if (visibilityData === false) {
                    myChart.show(value);
                }
            }

            return chartMRCurrent;
        }

        /*Komitmen Triwulan 1*/
        $('#chartMRtriwulan1').html(myChartMRtriwulan1())

        function myChartMRtriwulan1() {
            let myChart = document.getElementById('chartMRtriwulan1').getContext('2d');

            var t1_v = "{!! $t1_v !!}";
            var t1_d = "{!! $t1_d !!}";
            var t1_b = "{!! 293 - ($t1_d + $t1_v) !!}";

            let chartMRCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Verifikasi',
                        'Draft',
                        'belum'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [t1_v, t1_d, t1_b],
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(255, 99, 132)'
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            align: 'start',
                            position: 'bottom'
                        },
                        datalabels: {
                            color: 'rgb(0, 0, 0)',
                            align: 'center',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 1,
                },
                plugins: [ChartDataLabels],
            });
            return chartMRCurrent;
        }

        /*Komitmen Triwulan 2*/
        $('#chartMRtriwulan2').html(myChartMRtriwulan2())

        function myChartMRtriwulan2() {
            let myChart = document.getElementById('chartMRtriwulan2').getContext('2d');

            var t2_v = "{!! $t2_v !!}";
            var t2_d = "{!! $t2_d !!}";
            var t2_b = "{!! 293 - ($t2_d + $t2_v) !!}";

            let chartMRCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Verifikasi',
                        'Draft',
                        'belum'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [t2_v, t2_d, t2_b],
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(255, 99, 132)'
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            align: 'start',
                            position: 'bottom'
                        },
                        datalabels: {
                            color: 'rgb(0, 0, 0)',
                            align: 'center',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 1,
                },
                plugins: [ChartDataLabels],
            });
            return chartMRCurrent;

        }

        /*Komitmen Triwulan 3*/
        $('#chartMRtriwulan3').html(myChartMRtriwulan3())

        function myChartMRtriwulan3() {
            let myChart = document.getElementById('chartMRtriwulan3').getContext('2d');

            var t3_v = "{!! $t3_v !!}";
            var t3_d = "{!! $t3_d !!}";
            var t3_b = "{!! 293 - ($t3_d + $t3_v) !!}";

            let chartMRCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Verifikasi',
                        'Draft',
                        'belum'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [t3_v, t3_d, t3_b],
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(255, 99, 132)'
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            align: 'start',
                            position: 'bottom'
                        },
                        datalabels: {
                            color: 'rgb(0, 0, 0)',
                            align: 'center',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 1,
                },
                plugins: [ChartDataLabels],
            });
            return chartMRCurrent;

        }

        /*Komitmen Triwulan 4*/
        $('#chartMRtriwulan4').html(myChartMRtriwulan4())

        function myChartMRtriwulan4() {
            let myChart = document.getElementById('chartMRtriwulan4').getContext('2d');

            var t4_v = "{!! $t4_v !!}";
            var t4_d = "{!! $t4_d !!}";
            var t4_b = "{!! 293 - ($t4_d + $t4_v) !!}";

            let chartMRCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Verifikasi',
                        'Draft',
                        'belum'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [t4_v, t4_d, t4_b],
                        backgroundColor: [
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(255, 99, 132)'
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            align: 'start',
                            position: 'bottom'
                        },
                        datalabels: {
                            color: 'rgb(0, 0, 0)',
                            align: 'right',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 1,
                },
                plugins: [ChartDataLabels],
            });
            return chartMRCurrent;
        }
    </script>

    {{-- script PBJ --}}
    <script>
        // script chart kumulatif pengadaan barang dan jasa
        $('#chartPBJKumulatif').html(myChartPBJKumulatif())

        function myChartPBJKumulatif() {
            let myChart = document.getElementById('chartPBJKumulatif').getContext('2d');

            const kontraktual = JSON.parse("<?php echo json_encode($pak_pbj); ?>").reduce((a, b) => a + b, 0);
            let chartPBJKumulatifCurrent = new Chart(myChart, {
                type: 'bar',
                data: {
                    labels: [
                        'Total Kontraktual',
                        'Terverifikasi Unor',
                        'Tayang Sirup',
                        'Sudah Diusulkan',
                        'Sudah Pengunguman',
                        'Penetapan Pemenang'
                    ],
                    datasets: [{
                        axis: 'y',
                        // label: '',
                        data: [kontraktual, 1564, 1564, 1545, 1539, 1472],
                        fill: false,
                        backgroundColor: [
                            'rgb(6, 174, 213)',
                            'rgba(8, 103, 136)',
                            'rgba(240, 200, 8)',
                            'rgba(255, 241, 208)',
                            'rgba(221, 28, 26)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)'
                        ],
                        borderColor: [
                            'rgb(6, 174, 213)',
                            'rgba(8, 103, 136)',
                            'rgba(240, 200, 8)',
                            'rgba(255, 241, 208)',
                            'rgba(221, 28, 26)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    // layout: {
                    //     padding: 20
                    // },
                    plugins: {
                        datalabels: {
                            color: 'black',
                            align: 'center',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                        },
                        legend: {
                            onClick: (evt, legendItem, legend) => {
                                const index = legend.chart.data.labels.indexOf(legendItem.text);
                                legend.chart.toggleDataVisibility(index);
                                legend.chart.update();
                            },
                            labels: {
                                color: '#ffffff',
                                generateLabels: (chart) => {
                                    let visibility = [];
                                    for (let i = 0; i < chart.data.labels.length; i++) {
                                        if (chart.getDataVisibility(i)) {
                                            visibility.push(false)
                                        } else {
                                            visibility.push(true)
                                        }
                                    };
                                    return chart.data.labels.map(
                                        (label, index, ) => ({
                                            text: `${label}`,
                                            strokeStyle: chart.data.datasets[0].borderColor[index],
                                            fillStyle: chart.data.datasets[0].borderColor[index],
                                            hidden: visibility[index]
                                        })
                                    )
                                }
                            },
                            font: {
                                weight: 'bold',
                                size: 15,
                                color: '#ffffff'
                            },
                            display: false,
                            position: 'bottom',
                            align: 'start'
                        },
                    },
                    scales: {
                        x: {
                            display: false,
                            ticks: {
                                color: 'white',
                            }
                        },
                        y: {
                            ticks: {
                                color: 'white',
                                font: {
                                    size: 15
                                }
                            }
                        }
                    },
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    // aspectRatio: 1.2,
                },
                plugins: [ChartDataLabels],
            });
            return chartPBJKumulatifCurrent;
            chartPBJKumulatifCurrent.render();
        }

        //script status paket kontraktual pengadaan barang dan jasa
        $('#chartPBJKontraktualPKT').html(myChartPBJKontraktualPKT())

        function myChartPBJKontraktualPKT() {
            let myChart = document.getElementById('chartPBJKontraktualPKT').getContext('2d');

            const pak_pbj = JSON.parse("<?php echo json_encode($pak_pbj); ?>");
            let chartPBJKontraktualPKT = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Terkontrak',
                        'Persiapan Terkontrak',
                        'Proses Lelang',
                        'Belum Lelang',
                        'Gagal Lelang'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: pak_pbj,
                        backgroundColor: [
                            'rgb(111, 255, 92)',
                            'rgb(169, 120, 255)',
                            'rgb(255, 255, 0)',
                            'rgb(217, 102, 106)',
                            'rgb(255, 255, 255)',
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            font: {
                                weight: 'bold',
                                size: 15,
                                color: '#ffffff'
                            },
                            display: false,
                            position: 'bottom',
                            align: 'start'
                        },
                        datalabels: {
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            align: 'center',
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    // aspectRatio: 1.5,
                },
                plugins: [ChartDataLabels],
            });
            return chartPBJKontraktualPKT;
            chartPBJKontraktualPKT.render();
        }

        //script kontraktual rupiah
        $('#chartPBJKontraktualRP').html(myChartPBJKontraktualRP())

        function myChartPBJKontraktualRP() {
            let myChart = document.getElementById('chartPBJKontraktualRP').getContext('2d');
            const pag_pbj = JSON.parse("<?php echo json_encode($pag_pbj); ?>");
            let chartPBJKontraktualRPCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Terkontrak',
                        'Persiapan Terkontrak',
                        'Proses Lelang',
                        'Belum Lelang',
                        'Gagal Lelang'
                    ],
                    datasets: [{
                        data: pag_pbj,
                        label: 'My First Dataset',
                        backgroundColor: [
                            'rgb(111, 255, 92)',
                            'rgb(169, 120, 255)',
                            'rgb(255, 255, 0)',
                            'rgb(217, 102, 106)',
                            'rgb(255, 255, 255)',
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            position: 'bottom',
                            align: 'start'
                        },
                        datalabels: {
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            align: 'center',
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;

                                function totalSum(total, datapoint) {
                                    return total + datapoint;
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    // aspectRatio: 1.5,
                },
                plugins: [ChartDataLabels],
            });
            return chartPBJKontraktualRPCurrent;
            chartPBJKontraktualRPCurrent.render();
        }
    </script>

    {{-- script zona integritas --}}
    <script>
        $('#chartZILine').html(myChartZILine())

        function myChartZILine() {
            let myChart = document.getElementById('chartZILine').getContext('2d');
            let chartZILineCurrent = new Chart(myChart, {
                type: 'line',
                data: {
                    labels: [
                        '2016',
                        '2017',
                        '2018',
                        '2019',
                        '2020',
                        '2021',
                        '2022'
                    ],
                    datasets: [{
                            label: 'Pencanangan ZI per Tahun',
                            backgroundColor: 'rgb(153, 0, 0)',
                            borderColor: 'rgb(153, 0, 0)',
                            tension: 0.2,
                            data: [2, 0, 0, 0, 0, 2, 19],
                        },
                        {
                            label: 'Pembangunan ZI',
                            backgroundColor: 'rgb(255, 91, 0)',
                            borderColor: 'rgb(255, 91, 0)',
                            tension: 0.2,
                            data: [2, 2, 2, 2, 2, 4, 23],
                        },
                        {
                            label: 'Lolos TPU',
                            backgroundColor: 'rgb(212, 217, 37)',
                            borderColor: 'rgb(212, 217, 37)',
                            tension: 0.2,
                            data: [2, 2, 2, 2, 2, 4, 4],
                        },
                        {
                            label: 'Lolos TPI',
                            backgroundColor: 'rgb(255, 238, 99)',
                            borderColor: 'rgb(255, 238, 99)',
                            tension: 0.2,
                            data: [2, 2, 2, 0, 2, 4, 2],
                        },
                        {
                            label: 'Meraih Predikat',
                            backgroundColor: 'rgb(255, 231, 191)',
                            borderColor: 'rgb(255, 231, 191)',
                            tension: 0.2,
                            data: [0, 0, 0, 0, 0, 0, 0],
                        },
                    ]
                },
                options: {
                    layout: {
                        padding: 60
                    },
                    interaction: {
                        mode: 'nearest',
                        axis: 'x',
                        intersect: false
                    },
                    plugins: {
                        title: {
                            display: false,
                            // text: 'Chart.js Bar Chart - Stacked'
                        },
                        tooltip: {
                            enabled: true
                        },
                    },
                    scales: {
                        x: {
                            stacked: false,
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Tahun',
                                color: 'white',
                                font: {
                                    size: 25
                                }
                            },
                            ticks: {
                                color: 'white'
                            }
                        },
                        y: {
                            stacked: false,
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Balai',
                                color: 'white',
                                font: {
                                    size: 25
                                }
                            },
                            ticks: {
                                color: 'white'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff',
                                usePointStyle: true
                            },
                            display: true,
                            align: 'start',
                            position: 'chartArea'
                        },
                        datalabels: {
                            color: 'white',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            anchor: 'end',
                            align: 'top',
                            formatter: (value, context) => {
                                const datasetArray = [];
                                context.chart.data.datasets.forEach((dataset) => {
                                    if (dataset.data[context.dataIndex] != undefined) {
                                        datasetArray.push(dataset.data[context.dataIndex]);
                                    }
                                });

                                function totalSum(total, datapoint) {
                                    return total + datapoint;
                                }
                                let sum = datasetArray.reduce(totalSum, 0);

                                if (context.datasetIndex === datasetArray.length - 1) {
                                    return sum;
                                } else {
                                    return '';
                                }
                            }
                        }
                    },
                    responsive: true,
                },

            });
            return chartZILineCurrent;
        }
    </script>

    {{-- script Pengaduan --}}
    <script>
        // script pengaduan tahunan
        $('#chartPengaduanTahun').html(myChartPengaduanTahun())

        function myChartPengaduanTahun() {
            let myChart = document.getElementById('chartPengaduanTahun').getContext('2d');

            let chartPengaduanTahunCurrent = new Chart(myChart, {
                type: 'bar',
                data: {
                    labels: [
                        'Tahun 2020',
                        'Tahun 2021',
                        'Tahun 2022',
                    ],
                    datasets: [{
                        label: 'Selesai Telaah',
                        data: [91, 99, 75],
                        backgroundColor: [
                            'rgb(58, 180, 242)',
                            'rgb(58, 180, 242)',
                            'rgb(58, 180, 242)',
                        ],
                        borderColor: [
                            'rgb(58, 180, 242)',
                            'rgb(58, 180, 242)',
                            'rgb(58, 180, 242)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Prosses Telaah',
                        data: [0, 10, 18],
                        backgroundColor: [
                            'rgb(254, 177, 57)',
                            'rgb(254, 177, 57)',
                            'rgb(254, 177, 57)',
                        ],
                        borderColor: [
                            'rgb(254, 177, 57)',
                            'rgb(254, 177, 57)',
                            'rgb(254, 177, 57)',
                        ],
                        borderWidth: 1
                    }, {
                        label: 'Belum Telaah',
                        data: [0, 0, 2],
                        backgroundColor: [
                            'rgb(235, 71, 71)',
                            'rgb(235, 71, 71)',
                            'rgb(235, 71, 71)',
                        ],
                        borderColor: [
                            'rgb(235, 71, 71)',
                            'rgb(235, 71, 71)',
                            'rgb(235, 71, 71)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    layout: {
                        autoPadding: true
                    },
                    plugins: {
                        title: {
                            display: false,
                            // text: 'Chart.js Bar Chart - Stacked'
                        },
                        tooltip: {
                            enabled: true
                        },
                    },
                    scales: {
                        x: {
                            stacked: true,
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'white'
                            }
                        },
                        y: {
                            stacked: true,
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'white'
                            },
                            grace: 4
                        },
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff',
                                usePointStyle: false
                            },
                            font: {
                                weight: 'bold',
                                size: 18,
                            },
                            display: true,
                            align: 'start',
                            position: 'right'
                        },
                        datalabels: {
                            color: 'white',
                            font: {
                                weight: 'bold',
                                size: 18,
                            },
                            anchor: 'end',
                            align: 'top',
                            formatter: (value, context) => {
                                const datasetArray = [];
                                context.chart.data.datasets.forEach((dataset) => {
                                    if (dataset.data[context.dataIndex] != undefined) {
                                        datasetArray.push(dataset.data[context.dataIndex]);
                                    }
                                });

                                function totalSum(total, datapoint) {
                                    return total + datapoint;
                                }
                                let sum = datasetArray.reduce(totalSum, 0);

                                if (context.datasetIndex === datasetArray.length - 1) {
                                    return sum;
                                } else {
                                    return '';
                                }
                            }
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                },
                plugins: [ChartDataLabels],
            });
            return chartPengaduanTahunCurrent;
        }

        // script pengaduan kategori
        $('#chartPengaduanKategori').html(myChartPengaduanKategori())

        function myChartPengaduanKategori() {
            let myChart = document.getElementById('chartPengaduanKategori').getContext('2d');
            let chartPengaduanKategoriCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Korupsi',
                        'Kolusi',
                        'Penyalahgunaan Wewenang',
                        'KT PP',
                        'Penyimpangan PBJ',
                        'Pelaksanaan Pekerjaan',
                        'Penipuan Kontrak',
                        'Lainnya'
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [24, 11, 34, 21, 50, 102, 9, 40],
                        backgroundColor: [
                            'rgb(0, 120, 170)',
                            'rgb(252, 153, 24)',
                            'rgb(209, 209, 209)',
                            'rgb(239, 211, 69)',
                            'rgb(58, 180, 242)',
                            'rgb(133, 200, 138)',
                            'rgb(255, 180, 242)',
                            'rgb(162, 123, 92)'
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        autoPadding: true
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            position: 'bottom',
                            align: 'start'
                        },
                        datalabels: {
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                },
                plugins: [ChartDataLabels],
            });
            return chartPengaduanKategoriCurrent;
        }

        // script simpulan telaah
        $('#chartPengaduanTelaah').html(myChartPengaduanTelaah())

        function myChartPengaduanTelaah() {
            let myChart = document.getElementById('chartPengaduanTelaah').getContext('2d');
            let chartPengaduanTelaahCurrent = new Chart(myChart, {
                type: 'pie',
                data: {
                    labels: [
                        'Terbukti',
                        'Tidak Terbukti',
                    ],
                    datasets: [{
                        label: 'My First Dataset',
                        data: [44, 216],
                        backgroundColor: [
                            'rgb(252, 153, 24)',
                            'rgb(0, 120, 170)',
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        autoPadding: true
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff'
                            },
                            display: false,
                            position: 'bottom',
                        },
                        datalabels: {
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                            formatter: (value, context) => {
                                let datapoints = context.chart.data.datasets[0].data;
                                //console.log(value)
                                //console.log(context.chart.data.datasets[0].data)
                                function totalSum(total, datapoint) {
                                    var angkatotal = parseInt(total);
                                    var angkadatapoint = parseInt(datapoint);

                                    return angkatotal + angkadatapoint;
                                    //console.log(total)
                                    //console.log(datapoint)
                                }
                                let totalvalue = datapoints.reduce(totalSum, 0);
                                let percentageValue = (value / totalvalue * 100).toFixed(1);
                                let totalPercentage = parseInt(percentageValue);
                                //console.log(percentageValue)
                                if (totalPercentage === 0) {
                                    return ' ';
                                } else {
                                    return `${percentageValue}%`;
                                }
                            }
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                },
                plugins: [ChartDataLabels],
            });
            return chartPengaduanTelaahCurrent;
        }

        // script pengaduan BBWS
        $('#chartPengaduanBBWS').html(mychartPengaduanBBWS())

        function mychartPengaduanBBWS() {
            let myChart = document.getElementById('chartPengaduanBBWS').getContext('2d');

            let chartPengaduanBBWS = new Chart(myChart, {
                type: 'bar',
                data: {
                    labels: [
                        'BWS Sumatera II',
                        'BBWS Cimanuk Cisanggarung',
                        'BBWS Brantas',
                        'BWS Sumatera V',
                        'BBWS Ciliwung Cisadane',
                        'BBWS Citanduy',
                        'BBWS Bengawan Solo',
                        'BBWS Pemali Juana',
                        'BBWS Sumatera VIII',
                        'BBWS Cidanau Ciujung Cidurian',
                    ],
                    datasets: [{
                        axis: 'y',
                        label: 'Pengaduan Balai',
                        data: [26, 19, 19, 16, 16, 14, 14, 13, 12, 12],
                        fill: false,
                        backgroundColor: [
                            'rgba(255, 159, 64)',
                            'rgba(255, 99, 132)',
                            'rgba(75, 192, 192)',
                            'rgba(255, 205, 86)',
                            'rgba(54, 162, 235)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)',
                            'rgba(255, 99, 132)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(75, 192, 192)'
                        ],
                        borderColor: [
                            'rgba(255, 159, 64)',
                            'rgba(255, 99, 132)',
                            'rgba(75, 192, 192)',
                            'rgba(255, 205, 86)',
                            'rgba(54, 162, 235)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)',
                            'rgba(255, 99, 132)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(75, 192, 192)'
                        ],
                        borderWidth: 1
                    }, ]
                },
                options: {
                    layout: {
                        padding: 10
                    },
                    plugins: {
                        legend: {
                            onClick: (evt, legendItem, legend) => {
                                const index = legend.chart.data.labels.indexOf(legendItem.text);
                                legend.chart.toggleDataVisibility(index);
                                legend.chart.update();
                            },
                            labels: {
                                color: '#ffffff',
                                generateLabels: (chart) => {
                                    let visibility = [];
                                    for (let i = 0; i < chart.data.labels.length; i++) {
                                        if (chart.getDataVisibility(i)) {
                                            visibility.push(false)
                                        } else {
                                            visibility.push(true)
                                        }
                                    };
                                    return chart.data.labels.map(
                                        (label, index) => ({
                                            text: label,
                                            strokeStyle: chart.data.datasets[0].borderColor[index],
                                            fillStyle: chart.data.datasets[0].borderColor[index],
                                            hidden: visibility[index]
                                        })
                                    )
                                }
                            },
                            display: false,
                            position: 'bottom',
                            align: 'start'
                        },
                        datalabels: {
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                        },
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                display: false,
                                color: 'white',
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'white',
                                font: {
                                    size: 15
                                }
                            }
                        }
                    },
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                },
                plugins: [ChartDataLabels],
            });
            return chartPengaduanBBWS;
        }

        // script pengaduan dirpembina
        $('#chartPengaduanDirPembina').html(mychartPengaduanDirPembina())

        function mychartPengaduanDirPembina() {
            let myChart = document.getElementById('chartPengaduanDirPembina').getContext('2d');

            let chartPengaduanBBWS = new Chart(myChart, {
                type: 'bar',
                data: {
                    labels: [
                        'Sesditjen',
                        'Sungai dan Pantai',
                        'Irigasi dan Rawa',
                        'Bendungan dan Danau',
                        'Air Tanah dan Air Baku',
                        'Bina Operasi dan Pemeliharaan',
                        'SSPDA',
                        'Bina Teknik',
                        'Lain-Lain'
                    ],
                    datasets: [{
                        axis: 'y',
                        label: 'Pengaduan Direktorat',
                        data: [14, 72, 92, 45, 18, 37, 2, 2, 8],
                        fill: false,
                        backgroundColor: [
                            'rgba(255, 99, 132)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(54, 162, 235)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)',
                            'rgba(255, 99, 132)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(54, 162, 235)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)',
                            'rgba(255, 99, 132)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)'
                        ],
                        borderWidth: 1
                    }, ]
                },
                options: {
                    layout: {
                        padding: 10
                    },
                    plugins: {
                        legend: {
                            onClick: (evt, legendItem, legend) => {
                                const index = legend.chart.data.labels.indexOf(legendItem.text);
                                legend.chart.toggleDataVisibility(index);
                                legend.chart.update();
                            },
                            labels: {
                                color: '#fffff',
                                generateLabels: (chart) => {
                                    let visibility = [];
                                    for (let i = 0; i < chart.data.labels.length; i++) {
                                        if (chart.getDataVisibility(i)) {
                                            visibility.push(false)
                                        } else {
                                            visibility.push(true)
                                        }
                                    };
                                    return chart.data.labels.map(
                                        (label, index) => ({
                                            text: label,
                                            strokeStyle: chart.data.datasets[0].borderColor[index],
                                            fillStyle: chart.data.datasets[0].borderColor[index],
                                            hidden: visibility[index]
                                        })
                                    )
                                }
                            },
                            display: false,
                            position: 'bottom',
                            align: 'start'
                        },
                        datalabels: {
                            color: 'black',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                        },
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                display: false,
                                color: 'white',
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'white',
                                font: {
                                    size: 15
                                }
                            }
                        }
                    },
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                },
                plugins: [ChartDataLabels],
            });
            return chartPengaduanBBWS;
        }
    </script>

    {{-- sop --}}
    <script>
        $('#chartSOP').html(myChartSOP())

        function myChartSOP() {
            let myChart = document.getElementById('chartSOP').getContext('2d');

            let chartSOPCurrent = new Chart(myChart, {
                type: 'bar',
                data: {
                    labels: [
                        '2020',
                        '2021',
                        '2022',
                    ],
                    datasets: [{
                        label: 'Baru',
                        data: [0, 63, 14],
                        backgroundColor: [
                            'rgb(184, 17, 120)',
                            'rgb(184, 17, 120)',
                            'rgb(184, 17, 120)',
                            'rgb(184, 17, 120)'

                        ],

                    }, {
                        label: 'Hapus',
                        data: [0, 2, 0],
                        backgroundColor: [
                            'rgb(251, 147, 0)',
                            'rgb(251, 147, 0)',
                            'rgb(251, 147, 0)',
                            'rgb(251, 147, 0)',
                        ],

                    }, {
                        label: 'Revisi',
                        data: [0, 0, 8],
                        backgroundColor: [
                            'rgb(255, 92, 88)',
                            'rgb(255, 92, 88)',
                            'rgb(255, 92, 88)'
                        ],
                    }, {
                        label: 'Disahkan',
                        data: [78, 139, 0],
                        backgroundColor: [
                            'rgb(22, 245, 200)',
                            'rgb(22, 245, 200)',
                            'rgb(22, 245, 200)'

                        ],
                    }, ]
                },
                options: {
                    layout: {
                        padding: 0,
                    },
                    plugins: {
                        title: {
                            display: false,
                            // text: 'Chart.js Bar Chart - Stacked'
                        },
                        tooltip: {
                            enabled: true
                        },
                    },
                    scales: {
                        x: {
                            stacked: false,
                            grid: {
                                display: true,
                                color: 'white'
                            },
                            title: {
                                display: true,
                                text: 'Tahun',
                                color: 'white',
                                font: {
                                    size: 15
                                }
                            },
                            ticks: {
                                color: 'white'
                            }
                        },
                        y: {
                            stacked: false,
                            grid: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'Jumlah',
                                color: 'white',
                                font: {
                                    size: 15
                                }
                            },
                            ticks: {
                                color: 'white'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ffffff',
                                usePointStyle: true
                            },
                            display: true,
                            align: 'start',
                            position: 'chartArea'
                        },
                        datalabels: {
                            color: 'white',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                        },
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                },
                plugins: [ChartDataLabels],
            });
            return chartSOPCurrent;
        }
    </script>
@endpush
