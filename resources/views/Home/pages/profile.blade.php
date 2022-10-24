@extends('Home.layouts.layouthome')

@section('section')
    <section class="py-3">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Struktur Organisasi</h2>
                </div>
            </div>
            <div class=" row">
                <div class=" col-md-12 mx-auto">
                    <div class="text-white">
                        <img class="card-img" src="{{ asset('storage/dashboard/fotoorganisasi.png') }}" rel="nofollow"
                            alt="Card image">
                    </div>
                </div>
                {{-- <table class=" table table-bordered">
                            <tbody>
                                <tr>
                                    <th rowspan="3">
                                        <span style="writing-mode: vertical-lr;text-orientation: sideways; width: 20%">
                                            Direktorat Jenderal Sumber Daya Air
                                        </span>
                                    </th>
                                    <td>
                                        <span
                                            style="writing-mode: vertical-lr; text-orientation: sideways;">Manajerial</span>
                                    </td>
                                    <td>
                                        <div class="container">
                                            <div id="manajerialOrg"></div>
                                            <div> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit dolore
                                                quidem fugiat facere amet alias, cumque ad temporibus eos nostrum numquam
                                                accusantium, dolorem asperiores ex obcaecati! Eveniet et aliquam quia.</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="writing-mode: vertical-lr; text-orientation: sideways;">utama</span>
                                    </td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span style="writing-mode: vertical-lr; text-orientation: sideways;">Lainnya</span>
                                    </td>

                                </tr>
                                <tr>

                                </tr>
                            </tbody>
                        </table> --}}
            </div>
            <!-- <div class="row">
                                                                                                    <div class="container justify-content-center">
                                                                                                        {{-- <div id="paper-hyperlinks"></div> --}}
                                                                                                    </div>
                                                                                                    {{-- <div id="main"></div> --}}
                                                                                                </div> -->

            {{-- <div class="row">
                <div class="col-lg-9 offset-lg-2 px-3 mb-5">
                    <img src="{{ asset('storage/dashboard/fotoorganisasi.png') }}" alt="img-blur-shadow" width="100%"
                        class="img-fluid shadow border-radius-lg" loading="lazy">
                </div>
                <div class="col-lg-6 px-3">
                    <img src="../template/material-kit-master/assets/img/examples/testimonial-6-2.jpg" alt="img-blur-shadow"
                        width="100%" class="img-fluid shadow border-radius-lg" loading="lazy">
                </div>
                <div class="col-lg-6 px-3">
                    <div class="row">
                        <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5">
                            <h3>Tujuan</h3>
                            <p class="justify pe-5">Tujuan Direktorat Kepatuhan Intern merupakan turunan dari Tujuan
                                Kementerian
                                PUPR
                                dan tujuan Direktorat Jenderal Sumber Daya Air yaitu <strong>Terwujudnya kepatuhan intern
                                    melalui peningkatan pengendalian risiko dan akuntabilitas di lingkungan Dirjen Sumber
                                    Daya Air
                                    Kementerian Pekerjaan Umum dan Perumahan Rakyat untuk mendukung ketersediaan air.
                                </strong></p>
                        </div>
                        <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5">
                            <h3>Sasaran</h3>
                            <p class="pe-5">ketersediaan air melalui
                                Pengelolaan SDA secara Terintegrasi menjadi Ketahanan Sumber Daya Air
                                (Berdasarkan Surat Direktur Sistem dan Prosedur Pendanaan Pembangunan Bappenas
                                Nomor 05109/Dt.8.5/05/2020)</p>
                        </div>

                    </div>{{  }}{{  }}
                </div>
            </div> --}}
        </div>
    </section>

    <section class="py-3">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Tujuan & Sasaran</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5">
                    <h3>Tujuan</h3>
                    <p class="text-dark justify pe-5">Tujuan Direktorat Kepatuhan Intern merupakan turunan dari
                        Tujuan
                        Kementerian
                        PUPR
                        dan tujuan Direktorat Jenderal Sumber Daya Air yaitu Terwujudnya kepatuhan intern
                        melalui peningkatan pengendalian risiko dan akuntabilitas di lingkungan Dirjen Sumber
                        Daya Air
                        Kementerian Pekerjaan Umum dan Perumahan Rakyat untuk mendukung ketersediaan air.
                    </p>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5">
                    <h3>Sasaran</h3>
                    <p class="text-dark pe-5">ketersediaan air melalui
                        Pengelolaan SDA secara Terintegrasi menjadi Ketahanan Sumber Daya Air
                        (Berdasarkan Surat Direktur Sistem dan Prosedur Pendanaan Pembangunan Bappenas
                        Nomor 05109/Dt.8.5/05/2020)</p>
                    <!--<a href="javascript:;" class="text-primary icon-move-right">More about us  <i class="fas fa-arrow-right text-sm ms-1"></i>-->
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Dasar Pembentukan Hukum</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mt-5 mt-lg-0">PEDOMAN PENERAPAN MANAJEMEN RISIKO DI KEMENTERIAN PEKERJAAN
                        UMUM DAN PERUMAHAN RAKYAT</h4>
                    <p class="pe-5">Bahwa untuk melaksanakan manajemen risiko secara komprehensif di
                        Kementerian Pekerjaan Umum dan Perumahan Rakyat serta
                        melaksanakan ketentuan Pasal 13 ayat (1) Peraturan Pemerintah Nomor
                        60 Tahun 2008 tentang Sistem Pengendalian Intern Pemerintah, perlu
                        menetapkan Pedoman Penerapan Manajemen Risiko di Kementerian
                        Pekerjaan Umum dan Perumahan Rakyat.</p>
                </div>
                <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0">
                    <div class=" row">
                        <div class="col-md-12">
                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <a href="{{ asset('/storage/dashboard/PP60Tahun2008_SPIP.pdf') }}" target="_blank"><i
                                            class="fas fa-file opacity-10"></i></a>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">Peraturan Pemerintah Nomor 60 Tahun 2008 tentang Sistem
                                        Pengendalian Intern Pemerintah (Lembaran Negara Republik Indonesia
                                        Tahun 2008 Nomor 127, Tambahan Lembaran Negara Republik
                                        Indonesia Nomor 4890)</p>
                                </div>
                            </div>
                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <a href="{{ asset('/storage/dashboard/Perpres Nomor 18 Tahun 2020.pdf') }}"
                                        target="_blank"><i class="fas fa-file opacity-10"></i></a>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">Peraturan Presiden Nomor 18 tahun 2020 tentang Rencana
                                        Pembangunan Jangka Menengah Nasional Tahun 2020-2024
                                        (Lembaran Negara Republik Indonesia Tahun 2020 Nomor 10)</p>
                                </div>
                            </div>
                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <a href="{{ asset('/storage/dashboard/PermenPUPR20-2018.pdf') }}" target="_blank"><i
                                            class="fas fa-file opacity-10"></i></a>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 20
                                        Tahun 2018 tentang Penyelenggaraan Sistem Pengendalian Intern
                                        Pemerintah di Kementerian Pekerjaan Umum dan Perumahan Rakyat
                                        (Berita Negara Republik Indonesia Tahun 2018 Nomor 1121)
                                    </p>
                                </div>
                            </div>
                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <a href="{{ asset('/storage/dashboard/Permen PUPR Nomor 13 Tahun 2020.pdf') }}"
                                        target="_blank"><i class="fas fa-file opacity-10"></i></a>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 13
                                        Tahun 2020 tentang Organisasi dan Tata Kerja Kementerian Pekerjaan
                                        Umum dan Perumahan Rakyat (Berita Negara Republik Indonesia
                                        Tahun 2020 Nomor 473);
                                    </p>
                                </div>
                            </div>
                            <div class="p-3 info-horizontal">
                                <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                                    <a href="{{ asset('/storage/dashboard/Permen PUPR Nomor 16 Tahun 2020.pdf') }}"
                                        target="_blank"><i class="fas fa-file opacity-10" target="_blank"></i></a>
                                </div>
                                <div class="description ps-3">
                                    <p class="mb-0">Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 16
                                        Tahun 2020 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis
                                        Kementerian Pekerjaan Umum dan Perumahan Rakyat (Berita Negara
                                        Tahun 2020 Nomor 554) sebagaimana telah diubah dengan Peraturan
                                        Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 26 Tahun
                                        2020 tentang Perubahan atas Peraturan Menteri Pekerjaan Umum dan
                                        Perumahan Rakyat Nomor 16 Tahun 2020 tentang Organisasi dan
                                        Tata Kerja Unit Pelaksana Teknis Kementerian Pekerjaan Umum dan
                                        Perumahan Rakyat (Berita Negara Tahun 2020 Nomor 1144);
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- organization chart sop --}}
{{-- @push('script-css')
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jointjs/3.4.4/joint.css" />
        <link rel="stylesheet" href="{{ asset('css/orgchart/css/org-chart.css') }}">
    @endpush
    @push('script-js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jointjs/3.4.4/joint.js"></script>
        <script src="{{ asset('css/orgchart/js/jquery-orgchart.js') }}"></script>
        <script src="{{ asset('css/orgchart/js/jquery-orgchart.min.js') }}"></script>
        <script type="text/javascript">
            var namespace = joint.shapes;

            var graph = new joint.dia.Graph({}, {
                cellNamespace: namespace
            });

            new joint.dia.Paper({
                el: document.getElementById('paper-hyperlinks'),
                model: graph,
                width: 1100,
                height: 800,
                cellViewNamespace: namespace,
                // use a custom element view
                // (to ensure that opening the link is not prevented on touch devices)
                elementView: joint.dia.ElementView.extend({
                    events: {
                        'touchstart a': 'onAnchorTouchStart'
                    },
                    onAnchorTouchStart: function(evt) {
                        evt.stopPropagation();
                    }
                })
            });

            // first element
            // (only the label is a hyperlink)


            // second element
            // (the whole element is a hyperlink)

            joint.shapes.standard.Rectangle.define('examples.DitSSPDA', {
                attrs: {
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    tagName: 'rect',
                    selector: 'body',
                }, {
                    // `link` envelops only `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect = new joint.shapes.examples.DitSSPDA();
            rect.position(75, 250);
            rect.resize(150, 60);
            rect.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Dit SSPSDA',
                }
            });
            rect.addTo(graph);

            joint.shapes.standard.Rectangle.define('examples.DitLapindo', {
                attrs: {
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    // `link` envelops both `body` and `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'rect',
                        selector: 'body'
                    }, {
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect2 = new joint.shapes.examples.DitLapindo();
            rect2.position(75, 350);
            rect2.resize(150, 60);
            rect2.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Pengendalian Lumpur\n Sidoarjo',
                }
            });
            rect2.addTo(graph);

            joint.shapes.standard.Rectangle.define('examples.DitOPSDA', {
                attrs: {
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    tagName: 'rect',
                    selector: 'body',
                }, {
                    // `link` envelops only `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect3 = new joint.shapes.examples.DitOPSDA();
            rect.position(75, 250);
            rect.resize(150, 60);
            rect.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Dit SSPSDA',
                }
            });
            rect3.addTo(graph);

            joint.shapes.standard.Rectangle.define('examples.DitSupan', {
                attrs: {
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    // `link` envelops both `body` and `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'rect',
                        selector: 'body'
                    }, {
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect2 = new joint.shapes.examples.DitSupan();
            rect2.position(75, 350);
            rect2.resize(150, 60);
            rect2.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Pengendalian Lumpur\n Sidoarjo',
                }
            });
            rect2.addTo(graph);


            joint.shapes.standard.Rectangle.define('examples.DitBenda', {
                attrs: {
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    tagName: 'rect',
                    selector: 'body',
                }, {
                    // `link` envelops only `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect = new joint.shapes.examples.DitBenda();
            rect.position(75, 250);
            rect.resize(150, 60);
            rect.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Dit SSPSDA',
                }
            });
            rect.addTo(graph);

            joint.shapes.standard.Rectangle.define('examples.DitAtab', {
                attrs: {
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    // `link` envelops both `body` and `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'rect',
                        selector: 'body'
                    }, {
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect2 = new joint.shapes.examples.DitAtab();
            rect2.position(75, 350);
            rect2.resize(150, 60);
            rect2.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Pengendalian Lumpur\n Sidoarjo',
                }
            });
            rect2.addTo(graph);


            joint.shapes.standard.Rectangle.define('examples.DitIrwa', {
                attrs: {
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    tagName: 'rect',
                    selector: 'body',
                }, {
                    // `link` envelops only `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect = new joint.shapes.examples.DitIrwa();
            rect.position(75, 250);
            rect.resize(150, 60);
            rect.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Dit SSPSDA',
                }
            });
            rect.addTo(graph);

            joint.shapes.standard.Rectangle.define('examples.LayTeknis', {
                attrs: {
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    // `link` envelops both `body` and `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'rect',
                        selector: 'body'
                    }, {
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect2 = new joint.shapes.examples.LayTeknis();
            rect2.position(75, 350);
            rect2.resize(150, 60);
            rect2.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Pengendalian Lumpur\n Sidoarjo',
                }
            });
            rect2.addTo(graph);


            joint.shapes.standard.Rectangle.define('examples.PengembangProfesi', {
                attrs: {
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    tagName: 'rect',
                    selector: 'body',
                }, {
                    // `link` envelops only `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect = new joint.shapes.examples.PengembangProfesi();
            rect.position(75, 250);
            rect.resize(150, 60);
            rect.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Dit SSPSDA',
                }
            });
            rect.addTo(graph);

            joint.shapes.standard.Rectangle.define('examples.PengemRekayasa', {
                attrs: {
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    // `link` envelops both `body` and `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'rect',
                        selector: 'body'
                    }, {
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect2 = new joint.shapes.examples.PengemRekayasa();
            rect2.position(75, 350);
            rect2.resize(150, 60);
            rect2.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Pengendalian Lumpur\n Sidoarjo',
                }
            });
            rect2.addTo(graph);


            joint.shapes.standard.Rectangle.define('examples.PelakBimbingan', {
                attrs: {
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    tagName: 'rect',
                    selector: 'body',
                }, {
                    // `link` envelops only `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect = new joint.shapes.examples.PelakBimbingan();
            rect.position(75, 250);
            rect.resize(150, 60);
            rect.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Dit SSPSDA',
                }
            });
            rect.addTo(graph);

            joint.shapes.standard.Rectangle.define('examples.DitKI', {
                attrs: {
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    // `link` envelops both `body` and `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'rect',
                        selector: 'body'
                    }, {
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect2 = new joint.shapes.examples.DitKI();
            rect2.position(75, 350);
            rect2.resize(150, 60);
            rect2.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Pengendalian Lumpur\n Sidoarjo',
                }
            });
            rect2.addTo(graph);


            joint.shapes.standard.Rectangle.define('examples.Sesdtjen', {
                attrs: {
                    body: {
                        fill: '#ffffff',
                        stroke: '#000000'
                    },
                    link: {
                        xlinkShow: 'new',
                        cursor: 'pointer'
                    },
                    label: {
                        fill: '#000000'
                    }
                }
            }, {
                markup: [{
                    tagName: 'rect',
                    selector: 'body',
                }, {
                    // `link` envelops only `label`
                    tagName: 'a',
                    selector: 'link',
                    children: [{
                        tagName: 'text',
                        selector: 'label'
                    }]
                }]
            });

            var rect = new joint.shapes.examples.Sesdtjen();
            rect.position(75, 250);
            rect.resize(150, 60);
            rect.attr({
                link: {
                    xlinkHref: ''
                },
                label: {
                    text: 'Dit SSPSDA',
                }
            });
            rect.addTo(graph);

            var link = new joint.shapes.standard.Link();
            link.source(rect);
            link.target(rect2);
            link.attr({
                line: {
                    stroke: 'black',
                    strokeWidth: 1,
                    sourceMarker: {
                        'type': 'path',
                        'stroke': 'black',
                        'fill': 'black',
                        'd': 'M 10 -5 0 0 10 5 Z'
                    },
                    targetMarker: {
                        'type': 'path',
                        'stroke': 'black',
                        'fill': 'black',
                        'd': 'M 10 -5 0 0 10 5 Z'
                    }
                }
            });
            link.addTo(graph);
        </script>
        <script>
            $(function() {
                $('#org').orgChart({
                    container: $("#main")
                });
            })
        </script>
    @endpush --}}

{{-- Organization chart --}}
