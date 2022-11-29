<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easyzoom@2.5.3/css/easyzoom.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>SI-KIMR</title>
</head>
<style>
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: fixed;
        margin: 0;
        top: 0;
        left: 0;
        width: 350px;
        height: 180px;
    }

    .overlay {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.6)
    }

    .covercarousel {
        filter: contrast(30%);
    }

    .carousel-caption {
        top: 60%;
        bottom: auto;
    }

    .carousel-item {
        background: rgba(0, 0, 0, 0.35);
    }

    .bordercorner {
        border-radius: 15px;
        background: #73AD21;
        padding: 20px;
        width: 200px;
        height: 150px;
    }

    .bg-main {
        background-image: url('https://statics.indozone.news/content/2022/01/10/YvsjYW5/bendungan-terbesar-di-asia-tenggara-ternyata-ada-di-indonesia11_700.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    @media (min-width: 768px) {
        .carousel-multi-item-2 .col-md-3 {
            float: left;
            width: 25%;
            max-width: 100%;
        }
    }

    .dropdown-menu a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }

    .carousel-multi-item-2 .card img {
        border-radius: 2px;
    }

    #demo {
        height: 100%;
        position: relative;
        overflow: hidden;
    }


    .green {
        background-color: #6fb936;
    }

    .thumb {
        margin-bottom: 30px;
    }

    .page-top {
        margin-top: 85px;
    }

    .fadeDown {
        opacity: 1;
        animation-name: fadeDownOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    @keyframes fadeDownOpacity {
        0% {
            transform: translateY(-20px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    .fadeUp {
        opacity: 1;
        animation-name: fadeUpOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    @keyframes fadeUpOpacity {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }

        100% {
            transform: translateY(0px);
            opacity: 1;
        }
    }

    .fadeLeft {
        opacity: 1;
        animation-name: fadeLeftOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    @keyframes fadeLeftOpacity {
        0% {
            transform: translateX(-20px);
            opacity: 0;
        }

        100% {
            transform: translateX(0px);
            opacity: 1;
        }
    }

    .fadeRight {
        transform: translateX(20px);
        opacity: 0;
        animation-name: fadeRightOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 0.5s;
    }

    .fadeRightOpacity {
        transform: translateX(0px);
        opacity: 1;
    }

    .fadeIn {
        opacity: 1;
        animation-name: fadeInOpacity;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        animation-duration: 1s;
    }

    @keyframes fadeInOpacity {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    img.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
    }


    .transition {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }

    .modal-header {

        border-bottom: none;
    }

    .modal-title {
        color: #000;
    }

    .modal-footer {
        display: none;
    }

    .ul-dots {
        list-style-type: none;
    }

    .reveal {
        position: relative;
        transform: translateY(150px);
        opacity: 0;
        transition: 1s all ease;
    }

    .reveal.active {
        transform: translateY(0);
        opacity: 1;
    }

    .ubh-0 {
        transition: 1s all ease;
    }

    .ubh-1 {
        transition: 1.5s all ease;
    }

    .ubh-2 {
        transition: 2s all ease;
    }

    .ubh-3 {
        transition: 2.5s all ease;
    }

    .ubh-4 {
        transition: 3s all ease;
    }

    .ubh-5 {
        transition: 3.5s all ease;
    }


    .thumbnails {
        overflow: hidden;
        margin: 1em 0;
        padding: 0;
        text-align: center;
    }

    .thumbnails li {
        display: inline-block;
        width: 140px;
        margin: 0 5px;
    }

    .thumbnails img {
        display: block;
        min-width: 100%;
        max-width: 100%;
    }
</style>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <!-- Container wrapper -->
            <div class="container-fluid ">
                <a href="{{ route('home') }}" class="navbar-brand my-0 mr-md-auto">
                    <img src="/img/login/logo_sikimr.png" class="img-fluid" alt="Responsive image"
                        style="display: block; margin-top: 2px; height: 70px;"></a>
                <button class="navbar-toggler btn btn-secondary" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <!-- Left links -->
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link p-2 text-dark font-weight-bold animate fadeIn"
                                href="/testingindex">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 0.7s" id="dropdownMRLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">MR</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMRLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Daftar Formulir MR</a>
                                <a class="dropdown-item" href="/formulir">Daftar Verifikasi Komitmen MR</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 0.9s" id="dropdownKILink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">KI</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownKILink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Realisasi</a>
                                <a class="dropdown-item" href="/formulir">Rencana</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 1.1s" id="dropdownPerizinanLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Perizinan</a>
                            <div class="dropdown-menu hover dropdown-primary" aria-labelledby="dropdownPerizinanLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Perizinan</a>
                                <a class="dropdown-item" href="/formulir">Permohonan Izin</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 1.3s" id="dropdownPengaduanLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Pengaduan</a>
                            <div class="dropdown-menu hover dropdown-primary" aria-labelledby="dropdownPengaduanLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Surat Pengaduan</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 1.5s" id="dropdownPBJLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">PBJ</a>
                            <div class="dropdown-menu hover dropdown-primary" aria-labelledby="dropdownPBJLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Pemantauan Barang dan Jasa</a>
                                <a class="dropdown-item" href="/formulir">Pemanatauan Durasi Pengadaan Barang dan
                                    Jasa</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Pemantauan Nilai Kontrak < 80%
                                        HPS</a> <a class="dropdown-item" href="/formulir">Kemajuan Tender UPT</a>
                                        <a class="dropdown-item" href="/formulir">Kelengkapan Dokumen Per Paket</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 1.7s" id="dropdownPemeriksaanLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Pemeriksaan</a>
                            <div class="dropdown-menu hover dropdown-primary"
                                aria-labelledby="dropdownPemeriksaanLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Pemeriksaan BPK per LHP</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Pemeriksaan BPK per UPT</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Tindak Lanjut Temuan BPK</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Progress Keuangan dan Fisik</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Perencanaan SID</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Pengadaan Tanah</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">OP Kontraktual</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">OP Swaskelola</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">TP OP</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 1.9s" href="#">Produk Hukum</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 2.1s" href="#">NSPK
                                Kimr</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 2.3s" href="#">Zona
                                Integritas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link p-2 text-dark font-weight-bold fadeIn"
                                style="animation-duration: 2.5s" href="#">FAQ</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="mt-lg-5" style="padding-top: 50px">

        <!--Carousel-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" style="width:100%; height:850px"
                        src="{{ asset('storage/dashboard/Perjanjian Kinerja Tahun 2022 (Ditjen SDA)_0001-1.png') }}"
                        alt="First slide">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Perjanjian Kerja T1 Ditjen</h1>
                            {{-- catatan: <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="width:100%; height:850px"
                        src="{{ asset('storage/dashboard/Perjanjian Kinerja Tahun 2022 (Ditjen SDA)_0001-2.png') }}"
                        alt="Second slide">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Sasaran Program T1 Ditjen</h1>
                            {{-- catatan: <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="width:100%; height:850px"
                        src="{{ asset('storage/dashboard/Komitmen dan Profil MR SDA 2022-16.jpg') }}"
                        alt="Third slide">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Profil Risiko T1 Ditjen</h1>
                            {{-- catatan: <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="width:100%; height:850px"
                        src="{{ asset('storage/dashboard/Komitmen dan Profil MR SDA 2022-17.jpg') }}"
                        alt="Fourth slide">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Peta Risiko T1 Ditjen</h1>
                            {{-- catatan: <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                                gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!-- <section class="pt-5">
            <div class="container-fluid" style="width: 85%">
                <h3 class="mb-5" style="text-align: center">Landasan Hukum</h3>
                <div class="row">
                    <div class="justify-content-center col-md-12">
                        <div class="row featurette">
                            <div class="col-md-12 mt-3">
                                <h2 class="featurette-heading" style="text-align: center">Nomor: 04/SE/M/2021
                                    <h2 class="featurette-heading" style="text-align: center">TENTANG</h2>
                                    <h2 class="featurette-heading"style="text-align: center">
                                        PEDOMAN PENERAPAN MANAJEMEN RISIKO
                                    </h2>
                                    <h2 class="featurette-heading"style="text-align: center">
                                        KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT
                                    </h2>
                                    <h4 class="featurette-heading reveal col col-lg-8" style="text-align: center">
                                        A. Umum
                                    </h4>
                                    <p class="text-justify reveal col-md-auto"style="text-align: center">
                                        Bahwa untuk melaksanakan manajemen risiko secara komprehensif di
                                        Kementerian Pekerjaan Umum dan Perumahan Rakyat serta
                                        melaksanakan ketentuan Pasal 13 ayat (1) Peraturan Pemerintah Nomor
                                        60 Tahun 2008 tentang Sistem Pengendalian Intern Pemerintah,
                                        perlu menetapkan Pedoman Penerapan Manajemen Risiko di Kementerian
                                        Pekerjaan Umum dan Perumahan Rakyat.

                                        <a href="https://jdih.pu.go.id/internal/assets/plugins/pdfjs/web/viewer.html?file=https://jdih.pu.go.id/internal/assets/assets/produk/SEMenteriPUPR/2021/02/SEMenteriPUPR04-2021.pdf "
                                            class="btn btn-primary" style="text-decoration: none; "
                                            target="_blank">Baca Selengkapnya >></a>
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>-->

        <!--pengetahuan ki dan mr-->
        <section class="pt-5">
            <div class="container-fluid" style="width: 85%">
                <h3 class="mb-5" style="text-align: center">Pengetahuan KI dan MR</h3>
                <div class="row featurette">
                    <div class="col-md-6">
                        <div class="row featurette">
                            <div class="col-md-12 mt-3">
                                <h2 class="featurette-heading reveal">Kepatuhan Intern</h2>
                                <div class=" box-header Reveal">
                                    <h4 class="featurette-heading reveal">Tugas :</h4>
                                </div>
                                <div class=" box-body Reveal">
                                    <p class="lead text-justify reveal">
                                        Direktorat Kepatuhan Intern memiliki tugas melaksanakan penyusunan
                                        kebijakan teknis kerangka kerja, pembinaan, pengendalian, pemantauan, evaluasi
                                        dan
                                        pelaporan kepatuhan intern dan manajemen risiko di Direktorat Jenderal Sumber
                                        Daya
                                        Air.
                                    </p>
                                    <p class="lead">
                                    <h4 class="featurette-heading reveal">Fungsi :</h4>
                                    </hr>
                                    </p>
                                    <p class="lead text-justify reveal">
                                        Sesuai dengan Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor Tahun
                                        Pasal dalam melaksanakan tugas sebagaimana dimaksud, Direktorat Kepatuhan Intern
                                        menyelenggarakan fungsi:
                                    </p>
                                    <p class="lead text-justify reveal">
                                        -Penyusunan kebijakan teknis dan kerangka kerja kepatuhan intern serta manajemen
                                        risiko di Direktorat Jenderal Sumber Daya Air
                                    </p>
                                    <p class="lead text-justify reveal">
                                        -Pelaksanaan pembinaan teknis kepatuhan intern dan manajemen risiko di
                                        Direktorat
                                        Jenderal Sumber Daya Air
                                    </p>
                                    <p class="lead text-justify reveal">
                                        -Pelaksanaan pengendalian kepatuhan intern dan manajemen risiko terkait
                                        kecurangan
                                        dan proses bisnis dalam pencapaian target program dan
                                        kegiatan di Direktorat Jenderal Sumber Daya Air
                                    </p>
                                    <p class="lead text-justify reveal">
                                        -Pemantauan, evaluasi dan pelaporan penerapan kepatuhan intern dan manajemen
                                        risiko
                                        di Direktorat Jenderal Sumber Daya Air
                                    </p>
                                    <p class="lead text-justify reveal">
                                        -Pelaksanaan urusan tata usaha di lingkungan direktorat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="row featurette">
                            <div class="col-md-12 mt-3">
                                <h2 class="featurette-heading reveal">Manajemen Risiko</h2>
                                <div class=" box-header reveal">
                                    <h4 class="featurette-heading">Tugas :</h4>
                                </div>
                                <div class=" box-body justify reveal">
                                    <p class="lead">Suatu proses mengidentifikasi, menilai, mengelola, dan
                                        mengendalikan peristiwa atau situasi potensial untuk memberikan keyakinan
                                        memadai
                                        tentang pencapaian tujuan organisasi
                                    </p>
                                    <h4 class="featurette-heading">Video Pendukung :</h4>
                                    <div class=" col-md-12 thumb reveal ubh-0">
                                        <div class=" video-container">
                                            <iframe class="embed-responsive-item"
                                                src="{{ asset('storage/dashboard/Pengenalan-MR.mp4') }}"
                                                allowfullscreen></iframe>
                                        </div>
                                        {{-- catatan: <img src="{{ asset('storage/dashboard/Pengenalan-MR.mp4') }}"
                                            class="zoom img-fluid " alt=""> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!--Total Utama-->
        <section class="galery pt-5">
            <div class="container-fluid" style="width: 85%">
                <h3 class="mb-5" style="text-align: center">Tampilan</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-0">
                        <a href="{{ asset('storage/dashboard/inkedprogres tampilan.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/inkedprogres tampilan.jpg') }}"
                                class="zoom img-fluid " alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Manajemen Risiko</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-1">
                        <a href="{{ asset('storage/dashboard/inkedprogres tampilan.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/inkedprogres tampilan.jpg') }}"
                                class="zoom img-fluid" alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Kepatuhan Intern</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-2">
                        <a href="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="zoom img-fluid "
                                alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Perizinan</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-0">
                        <a href="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="zoom img-fluid "
                                alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Pengadaan Barang dan Jasa</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-1">
                        <a href="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="zoom img-fluid "
                                alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Pengaduan</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-2">
                        <a href="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="zoom img-fluid "
                                alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Pemeriksaan</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-0">
                        <a href="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="zoom img-fluid "
                                alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Kebijakan</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-1">
                        <a href="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="zoom img-fluid "
                                alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">NSPK Kimr</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-6 thumb reveal ubh-2">
                        <a href="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="fancybox"
                            style="text-decoration: none" rel="ligthbox1">
                            <img src="{{ asset('storage/dashboard/workinprogres.jpg') }}" class="zoom img-fluid "
                                alt="">
                            <div class=" jumbotron-fluid">
                                <h3 style="color: #000; font-size: 32px;">Zona Integritas</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--Berita Terkini-->
        <!-- <section class="berita pt-5">
            <div class=" container-fluid" style="width: 85%">
                <h3 class="mb-5" style="text-align: center"><span class=" bold">Berita</span> Terkini</h3>
                <div class="row">
                    <div class="col-lg-4 animate animasi fadeDown">
                        <img style="border-bottom-right-radius: 50px" class="reveal ubh-0"
                            src="{{ asset('storage/dashboard/Perjanjian Kinerja Tahun 2022 (Ditjen SDA)_0001-1.png') }}"
                            alt="Generic placeholder image" width="90%" height="140px">
                        <div class=" row">
                            <div class=" col-md-12 pt-2 reveal ubh-1">
                                <h2>Judul Berita</h2>
                            </div>
                            <div class=" col-md-12 reveal ubh-1" style="height: 200px">
                                <p class="text-justify">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio repellendus
                                    accusamus
                                    aliquam maiores hic similique voluptates reprehenderit. Dolores esse cum et
                                    libero
                                    tempora
                                    cupiditate saepe hic, impedit exercitationem quaerat! Id!
                                </p>
                            </div>
                            <div class=" col-md-12 reveal ubh-1">
                                <p><a class="   btn btn-primary" style="text-decoration: none" href="#"
                                        role="button">Cek
                                        berita
                                        selengkapnya &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img style="border-bottom-right-radius: 50px" class="reveal ubh-1"
                            src="https://asset.kompas.com/crops/3hqL7cGjQ0PxhVtIZ36kXu30UAc=/0x0:1000x667/750x500/data/photo/2019/01/23/3671701645.jpg"
                            alt="Generic placeholder image" width="90%" height="140px">
                        <div class="row">
                            <div class="col-md-12 pt-2 reveal ubh-1">
                                <h2>Judul Berita</h2>
                            </div>
                            <div class="col-md-12 reveal ubh-1" style="height: 200px">
                                <p class="text-justify">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad suscipit reiciendis
                                    harum
                                    dolore
                                    voluptate nemo at eaque corporis et nesci Lorem ipsum dolor sit amet consectetur
                                    adipisicing
                                    elit. Quae, excepturi, quam aut in doloribus dolore nisi incidunt earum fugit
                                    temporibus,
                                    veniam harum vitae consequatur laborum nemo? Amet cum illum praesentium!
                                </p>
                            </div>
                            <div class="col-md-12 reveal ubh-1">
                                <p><a class="btn btn-primary" style="text-decoration: none" href="#"
                                        role="button">Cek
                                        berita
                                        selengkapnya &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <img style="border-bottom-right-radius: 50px" class="reveal ubh-2"
                            src="https://asset.kompas.com/crops/3hqL7cGjQ0PxhVtIZ36kXu30UAc=/0x0:1000x667/750x500/data/photo/2019/01/23/3671701645.jpg"
                            alt="Generic placeholder image" width="90%" height="140px">
                        <div class="row">
                            <div class="col-md-12 pt-2 reveal ubh-1">
                                <h2>Judul Berita</h2>
                            </div>
                            <div class="col-md-12 reveal ubh-1" style="height: 200px">
                                <p class="text-justify">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad suscipit reiciendis
                                    harum
                                    dolore
                                    voluptate nemo at eaque corporis et nesci Lorem ipsum dolor sit amet consectetur
                                    adipisicing
                                    elit. Quae, excepturi, quam aut in doloribus dolore nisi incidunt earum fugit
                                    temporibus,
                                    veniam harum vitae consequatur laborum nemo? Amet cum illum praesentium!
                                </p>
                            </div>
                            <div class="col-md-12 reveal ubh-1">
                                <p><a class="btn btn-primary" style="text-decoration: none" href="#"
                                        role="button">Cek
                                        berita
                                        selengkapnya &raquo;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->


        <!--Galeri -->
        <section class="galery pt-5">
            <div class="container-fluid" style="width: 85%">
                <h3 class="mb-5" style="text-align: center">Galeri</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-0">
                        <a href="{{ asset('storage/dashboard/galeri_1.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_1.jpg') }}" class="zoom img-fluid "
                                alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-1">
                        <a href="{{ asset('storage/dashboard/galeri_2.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_2.jpg') }}" class="zoom img-fluid"
                                alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-2">
                        <a href="{{ asset('storage/dashboard/galeri_3.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_3.jpg') }}" class="zoom img-fluid "
                                alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-3">
                        <a href="{{ asset('storage/dashboard/galeri_4.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_4.jpg') }}" class="zoom img-fluid "
                                alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-0">
                        <a href="{{ asset('storage/dashboard/galeri_5.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_5.jpg') }}" class="zoom img-fluid "
                                alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-1">
                        <a href="{{ asset('storage/dashboard/galeri_5.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_5.jpg') }}" class="zoom img-fluid "
                                alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-2">
                        <a href="{{ asset('storage/dashboard/galeri_7.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_7.jpg') }}" class="zoom img-fluid "
                                alt="">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb reveal ubh-3">
                        <a href="{{ asset('storage/dashboard/galeri_6.jpg') }}" class="fancybox" rel="ligthbox">
                            <img src="{{ asset('storage/dashboard/galeri_6.jpg') }}" class="zoom img-fluid "
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--Kebijakan Umum-->

        <!-- Footer -->
        <section>
            <footer class="footer-section bg-light p-5 mt-5" id="footer">
                <div class="container">
                    <div class="row">
                        <div class=" col-md-4 sm-4">
                            <div class=" footer-left">
                                <div class=" header">
                                </div>
                                <h5>Alamat</h5>
                                <hr>
                                <p class="footer-desc">

                                    Jl. Pattimura No. 20,<br>
                                    Gedung SDA Lantai 3 <br>
                                    Kebayoran Baru - Jakarta Selatan
                                </p>
                                </p>
                            </div>
                        </div>
                        <div class=" col-md-4 sm-4">
                            <div class=" header">
                                <h5>Kontak Kepatuhan Intern Dirjen SDA</h5>
                            </div>
                            <hr>
                            <p class="footer-desc">
                            <p><strong>Telepon</strong></p>
                            <p>
                                <a href="tel:021-722-1907"
                                    style="text-decoration: none; color: black">(021)7221907</a>
                            </p>
                            <p><strong>Email</strong></p>
                            <p>ditki.sda@pu.go.id</p>
                            </p>
                        </div>
                        <div class=" col-md-4 sm-4">
                            <div class=" header">
                                <h5>Sosial Media</h5>
                            </div>
                            <hr>
                            <p class="footer-desc">

                            <p><strong>Instagram</strong></p>
                            <p>
                                <a href="https://www.instagram.com/ditki.sda"
                                    style="text-decoration: none; color: black" target="_blank">ditki.sda</a>
                            </p>
                            </p>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
                <div class="copyright-reserved">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-auto">
                                <div class="copyright-text">
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    All Rights Reserved | Direktorat Kepatuhan Intern Direktorat Jendral Sumber Daya Air
                                    Kementerian PUPR
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/easyzoom@2.5.3/src/easyzoom.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });


        });
    </script>
    <script>
        function fadein() {
            var fadeins = document
        }
    </script>
    <script>
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);
    </script>
    <script>
        // function onHover1() {
        //     document.getElementById("mainimage").src =
        //         "{{ asset('storage/dashboard/Perjanjian Kinerja Tahun 2022 (Ditjen SDA)_0001-1.png') }}";
        //     document.getElementById("activeImg1").style.border = "2px solid violet";
        // }

        // function offHover1() {
        //     document.getElementById("mainimage").src =
        //         "{{ asset('storage/dashboard/Perjanjian Kinerja Tahun 2022 (Ditjen SDA)_0001-1.png') }}";

        //     document.getElementById("activeImg1").style.border = "";
        // }

        // function onHover2() {
        //     document.getElementById("mainimage").src =
        //         "{{ asset('storage/dashboard/Perjanjian Kinerja Tahun 2022 (Ditjen SDA)_0001-2.png') }}";
        //     document.getElementById("activeImg2").style.border = "2px solid violet";
        // }

        // function offHover2() {
        //     document.getElementById("mainimage").src =
        //         "{{ asset('storage/dashboard/Perjanjian Kinerja Tahun 2022 (Ditjen SDA)_0001-2.png') }}";

        //     document.getElementById("activeImg2").style.border = "";
        // }

        var $easyzoom = $(".easyzoom").easyZoom();

        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->

</body>

</html>

</html>
