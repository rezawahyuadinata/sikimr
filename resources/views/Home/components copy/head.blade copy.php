{{-- catatan: Navbar waktu --}}
{{-- catatan: Revisian --}}
{{-- catatan: <nav class="py-2 bg-gradient-info border-bottom navbar-expand-sm">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="https://pu.go.id/" class="nav-link link-light px-2 active" aria-current="page">
                    <i class="fa fa-home"></i> PUPR | <span id="time"></span><span id="txt"></span>
                </a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">
                    <i class="fa fa-phone" aria-hidden="true"></i> (021)7221907
                </a></li>
            <li class="nav-item"><a href="#" class="nav-link link-light px-2">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    ditki.sda@pu.go.id
                </a></li>
        </ul>
    </div>
</nav> --}}

{{-- catatan: rancangan pertama --}}
{{-- catatan: <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-info z-index-3">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="https://pu.go.id/" rel="tooltip" data-placement="bottom" target="_blank">
            <i class="fa fa-home"></i> PUPR | <span id="time"></span><span id="txt"></span>
        </a>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto fade-in-left">
                <li class="nav-item dropdown dropdown-hover mx-1 ms-lg-6">
                    <a class="nav-link text-white" target="_blank">
                        <i class="fa fa-phone" aria-hidden="true"></i> (021)7221907
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1 ms-lg-6">
                    <a class="nav-link text-white" target="_blank">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        ditki.sda@pu.go.id
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

{{-- catatan: Navbar --}}
{{-- catatan: Revisian --}}
{{-- catatan: <nav class="navbar sticky-top py-4 navbar-expand-lg bg-light" aria-label="Eleventh navbar example">
    <div class="container d-flex flex-wrap justify-content-start">

        <a href="{{ route('Welcome') }}" class="img mb-3 mb-sm-0">
            <img src="/img/login/logo_sikimr.png" class="bi me-2" width="auto" height=50" alt="Responsive image"
                style="display: block; margin-top: 2px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-sm-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="selected-navbar mx-1 nav-link" href="{{ route('Welcome') }}"><span
                            class="font-navbar-utama">Beranda</span></a>
                </li>
                <li class="nav-item">
                    <a class="selected-navbar mx-1 nav-link" href="{{ Route('Berita') }}"><span
                            class="font-navbar-utama">Berita</span></a>
                </li>
                <li class="nav-item">
                    <a class="selected-navbar mx-1 nav-link" href="{{ Route('Berita') }}"><span
                            class="font-navbar-utama">Profile</span></a>
                </li>
                <li class="nav-item">
                    <a class="selected-navbar mx-1 nav-link"
                        href="https://sda.pu.go.id/produk/view_produk/SE_Dirjen_SDA_tentang_Tata_Cara_Pemantauan_RPSDA_WS_Kewenangan_Pusat"><span
                            class="font-navbar-utama">Hukum</span></a>
                </li>
                <li class="nav-item">
                    <a class="selected-navbar mx-1 nav-link" href="{{ Route('SOP') }}"><span
                            class="font-navbar-utama">SOP</span></a>
                </li>
                <li class="nav-item">
                    <a class="selected-navbar mx-1 nav-link" href="{{ Route('Tutorial') }}"><span
                            class="font-navbar-utama">Tutorial</span></a>
                </li>
                <li class="nav-item">
                    <a class="selected-navbar mx-1 nav-link" href="{{ url('/login') }}"><span
                            class="font-navbar-utama">Aplikasi</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}

{{-- catatan: rancangan pertama --}}
{{-- catatan: <nav class="navbar navbar-default sticky-top navbar-light bg-light shadow-md navbar-fixed-top navbar-expand-lg bg-gradient-white z-index-3 py-3 nav-pills nav-fill"
    id="myNavbar">
    <div class="container-fluid">
        <a href="{{ route('Welcome') }}" class="navbar-brand my-0 mr-md-auto">
<img src="/img/login/logo_sikimr.png" class="navbar-brand img-fluid" alt="Responsive image"
    style="display: block; margin-top: 2px;"></a>
</a>
<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation1"
    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
    </span>
</button>
<div class="collapse navbar-collapse w-100 pt-3 pb-2 py-l ms-lg-12 ps-lg-5" id="navigation1">
    <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item dropdown dropdown-hover mx-1 ms-lg-6">
            <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center " href="{{ route('Welcome') }}">
                Beranda
            </a>
        </li>
        <li class="nav-item dropdown dropdown-hover mx-1">
            <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center " href="{{ Route('Berita') }}">
                Berita
            </a>
        </li>
        <li class="nav-item dropdown dropdown-hover mx-1 shift">
            <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center " href="{{ Route('Profil') }}">
                Profile
            </a>
        </li>
        <li class="nav-item dropdown dropdown-hover mx-1 shift">
            <a class="nav-link text-dark ps-2 d-flex cursor-pointer align-items-center "
                href="https://sda.pu.go.id/produk/view_produk/SE_Dirjen_SDA_tentang_Tata_Cara_Pemantauan_RPSDA_WS_Kewenangan_Pusat"
                target="_blank">
                Hukum
            </a>
        </li>
        <li class="nav-item dropdown dropdown-hover mx-1 shift">
            <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center " href="{{ Route('SOP') }}">
                SOP
            </a>
        </li>
        <li class="nav-item dropdown dropdown-hover mx-1">
            <a class="cursor-pointer btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0"
                href="{{ Route('Tutorial') }}">Tutorial</a>
        </li>
        <li class="nav-item dropdown dropdown-hover mx-1">
            <a class="cursor-pointer btn btn-sm bg-gradient-info mb-0 me-1 mt-2 mt-md-0"
                href="{{ url('/login') }}">Aplikasi</a>
        </li>
    </ul>
</div>
</div>
</nav> --}}

{{-- catatan: Header --}}
<!-- <header>
    {{-- catatan: navbar waktu --}}
    <nav class="py-2 bg-gradient-info border-bottom navbar-expand-sm">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="https://pu.go.id/" class="nav-link link-light px-2 active"
                        aria-current="page">
                        <i class="fa fa-home"></i> PUPR | <span id="time"></span><span id="txt"></span>
                    </a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link link-light px-2">
                        <i class="fa fa-phone" aria-hidden="true"></i> (021)7221907
                    </a></li>
                <li class="nav-item"><a href="#" class="nav-link link-light px-2">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        ditki.sda@pu.go.id
                    </a></li>
            </ul>
        </div>
    </nav>
    {{-- catatan: navbar menu --}}
    <nav class="navbar sticky-top py-4 navbar-expand-lg bg-light" aria-label="Eleventh navbar example">
        <div class="container d-flex flex-wrap justify-content-start">

            <a href="{{ route('Welcome') }}" class="img mb-3 mb-sm-0">
                <img src="/img/login/logo_sikimr.png" class="bi me-2" width="auto" height=50" alt="Responsive image"
                    style="display: block; margin-top: 2px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-sm-end" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="selected-navbar mx-1 nav-link" href="{{ route('Welcome') }}"><span
                                class="font-navbar-utama">Beranda</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="selected-navbar mx-1 nav-link" href="{{ Route('Berita') }}"><span
                                class="font-navbar-utama">Berita</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="selected-navbar mx-1 nav-link" href="{{ Route('Profil') }}"><span
                                class="font-navbar-utama">Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="selected-navbar mx-1 nav-link"
                            href="https://sda.pu.go.id/produk/view_produk/SE_Dirjen_SDA_tentang_Tata_Cara_Pemantauan_RPSDA_WS_Kewenangan_Pusat"><span
                                class="font-navbar-utama">Hukum</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="selected-navbar mx-1 nav-link" href="{{ Route('SOP') }}"><span
                                class="font-navbar-utama">SOP</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="selected-navbar mx-1 nav-link" href="{{ Route('Tutorial') }}"><span
                                class="font-navbar-utama">Tutorial</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="selected-navbar mx-1 nav-link" href="{{ url('/login') }}"><span
                                class="font-navbar-utama">Aplikasi</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @if (\Route::currentRouteName() == 'Welcome')
{{-- catatan: carousel perbaikan dari pertama --}}
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"
                    data-bs-interval="100000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        {{-- catatan: Manajemen Risiko --}}
                        <div class="carouselMR">
                            <div class="carousel-item active">
                                <div class="page-header min-vh-100"
                                    style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')"
                                    loading="lazy">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="container min-height-400">
                                        <h3 class="text-white text-center mb-4">Komitmen MR</h3>
                                        <div class="row chartbox">
                                            <div class="col-lg col-sm-4 col-xs-12 d-flex justify-content-center ">
                                                <canvas id="chartMRkomitmen" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg col-sm-4 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartMRtriwulan1" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg col-sm-4 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartMRtriwulan2" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg col-sm-4 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartMRtriwulan3" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg col-sm-4 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartMRtriwulan4" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Pengaduan Barang Dan Jasa --}}
                        <div class="carouselPBJ">
                            <div class="carousel-item">
                                <div class="page-header min-vh-100"
                                    style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')"
                                    loading="lazy">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="container">
                                        <h3 class="text-white text-center mb-4">Pengadaan Barang dan Jasa</h3>
                                        <div class="row chartbox">
                                            <div class="col-lg-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPBJKumulatif" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPBJKontraktualPKT" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPBJKontraktualRP" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Zona Integritas --}}
                        <div class="carouselZI">
                            <div class="carousel-item">
                                <div class="page-header min-vh-100"
                                    style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')"
                                    loading="lazy">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="container">
                                        <h3 class="text-white text-center mb-4">Zona Integritas</h3>
                                        <div class="row chartbox">
                                            <div class="col d-flex justify-content-center">
                                                <canvas id="chartZILine" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Pengaduan 1 --}}
                        <div class="carouselPeng1">
                            <div class="carousel-item">
                                <div class="page-header min-vh-100"
                                    style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')"
                                    loading="lazy">
                                    <span class="mask bg-gradient-dark opacity-5"></span>
                                    <div class="container">
                                        <h3 class="text-white text-center mb-4">Pengaduan</h3>
                                        <div class="row chartbox">
                                            <div class="col-lg-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPengaduanTahun" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPengaduanKategori" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPengaduanTelaah" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Pengaduan 2 --}}
                        <div class="carouselPeng1">
                            <div class="carousel-item">
                                <div class="page-header min-vh-100"
                                    style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')"
                                    loading="lazy">
                                    <span class="mask bg-gradient-dark opacity-5"></span>
                                    <div class="container">
                                        <h3 class="text-white text-center mb-4">Pengaduan</h3>
                                        <div class="row chartbox">
                                            <div class="col-lg-6 col-sm-6 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPengaduanBBWS" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartPengaduanDirPembina" width="auto" height="100%"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: SOP --}}
                        <div class="carouselSOP">
                            <div class="carousel-item">
                                <div class="page-header min-vh-100"
                                    style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')"
                                    loading="lazy">
                                    <span class="mask bg-gradient-dark opacity-5"></span>
                                    <div class="container">
                                        <h1 class="text-white text-center mb-4">SOP</h1>
                                        <div class="row chartbox">
                                            <div class="col-lg-6 col-sm-6 col-xs-12 d-flex justify-content-center">
                                                <a href="{{ Route('SOP') }}">
                                                    <img class="w-100 h-100 d-block img-fluid"
                                                        src="{{ asset('storage/dashboard/Library_SOP.jpeg') }}"
                                                        alt="First slide" width="auto" height="100%">
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-xs-12 d-flex justify-content-center">
                                                <canvas id="chartSOP" width="auto" height="100%"
                                                    class=" d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- catatan: carousel pertama --}}
        <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="100000">
            <div class="carousel-inner mb-4">

                {{-- catatan: Manajemen Risiko --}}
                {{-- catatan: <div class="carousel-item carousel-mr active">
                    <div class="page-header "
                        style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 my-auto">
                                    <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                        Laporan Manajemen Risiko
                                    </h4>
                                    <p class="text-center text-white" style="font-size: 14px" id="status_dataMR">
                                    </p>
                                </div>
                                <div class="col-12 flexbox">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Komitmen MR
                                                </div>
                                                <a href="#">
                                                    <canvas id="chartMRkomitmen" class="d-block img-fluid"></canvas>
                                                </a>
                                                <div class="m-2 warnaterverif" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Verifikasi : {!! $kom_v !!}</span>
                                                </div>
                                                <div class="m-2 warnadraft" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Draft : {!! $kom_d !!}</span>
                                                </div>
                                                <div class="m-2 warnabelum" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum : {!! 293 - ($kom_d + $kom_v) !!}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Triwulan 1
                                                </div>
                                                <a href="#">
                                                    <canvas id="chartMRtriwulan1" class="d-block img-fluid"></canvas>
                                                </a>
                                                <div class="m-2 warnaterverif" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Verifikasi : {!! $t1_v !!}</span>
                                                </div>
                                                <div class="m-2 warnadraft" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Draft : {!! $t1_d !!}</span>
                                                </div>
                                                <div class="m-2 warnabelum" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum : {!! 293 - ($t1_d + $t1_v) !!}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Triwulan 2
                                                </div>
                                                <a href="#">
                                                    <canvas id="chartMRtriwulan2" class="d-block img-fluid"></canvas>
                                                </a>
                                                <div class="m-2 warnaterverif" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Verifikasi : {!! $t2_v !!}</span>
                                                </div>
                                                <div class="m-2 warnadraft" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Draft : {!! $t2_d !!}</span>
                                                </div>
                                                <div class="m-2 warnabelum" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum : {!! 293 - ($t2_d + $t2_v) !!}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Triwulan 3
                                                </div>
                                                <a href="#">
                                                    <canvas id="chartMRtriwulan3" class="d-block img-fluid"></canvas>
                                                </a>
                                                <div class="m-2 warnaterverif" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Verifikasi : {!! $t3_v !!}</span>
                                                </div>
                                                <div class="m-2 warnadraft" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Draft : {!! $t3_d !!}</span>
                                                </div>
                                                <div class="m-2 warnabelum" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum : {!! 293 - ($t3_d + $t3_v) !!}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Triwulan 4
                                                </div>
                                                <a href="#">
                                                    <canvas id="chartMRtriwulan4" class="d-block img-fluid"></canvas>
                                                </a>
                                                <div class="m-2 warnaterverif" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Verifikasi : {!! $t4_v !!}</span>
                                                </div>
                                                <div class="m-2 warnadraft" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Draft : {!! $t4_d !!}</span>
                                                </div>
                                                <div class="m-2 warnabelum" style=" font-weight: bold">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum : {!! 293 - ($t4_d + $t4_v) !!} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- catatan: Laporan Pengadaan Barang dan Jasa --}}
                <div class="carousel-item carouselPBJ">
                    <div class="page-header min-vh-75"
                        style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 my-auto">
                                    <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                        Laporan Pengadaan Barang dan Jasa
                                    </h4>
                                    <p class="text-center text-white" style="font-size: 14px" id="status_dataPBJ">
                                    </p>
                                </div>
                                <div class="col-sm-12 flexbox">
                                    <div class="container">
                                        <div class="row ">
                                            <div class="col-4">
                                                <div class="text-white text-center" style=" font-weight: bold">
                                                    <h5 style="color: white">Kumulatif Lelang</h5>
                                                </div>
                                                <canvas id="chartPBJKumulatif" class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col-8">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white;">Kumulatif Paket
                                                                Kontraktual
                                                                (PKT)
                                                            </h5>
                                                            <p>Total Paket : {!! array_sum($pak_pbj) !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Kumulatif Pagu
                                                                Kontraktual
                                                                (Rp.Ribu)
                                                            </h5>
                                                            <p>Total Pagu : {!! number_format(array_sum($pag_pbj)) !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <canvas id="chartPBJKontraktualPKT"
                                                            class="d-block img-fluid"></canvas>
                                                    </div>
                                                    <div class="col">
                                                        <canvas id="chartPBJKontraktualRP"
                                                            class="d-block img-fluid"></canvas>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="m-2 "
                                                            style=" font-weight: bold; color:rgb(5, 100, 252)">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Terkontrak : <br>
                                                                Paket :{!! number_format($pak_pbj[0]) !!}
                                                                <br>
                                                                Pagu :{!! number_format($pag_pbj[0]) !!}
                                                            </span>
                                                        </div>
                                                        <div class="m-2 "
                                                            style=" font-weight: bold; color: rgb(169, 120, 255)">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Persiapan Terkontrak : <br>
                                                                Paket :{!! number_format($pak_pbj[1]) !!}
                                                                <br>
                                                                Pagu :{!! number_format($pag_pbj[1]) !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="m-2 "
                                                            style=" font-weight: bold; color: rgb(255, 255, 0)">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Proses Lelang : <br>
                                                                Paket :{!! number_format($pak_pbj[2]) !!}
                                                                <br>
                                                                Pagu :{!! number_format($pag_pbj[2]) !!}
                                                            </span>
                                                        </div>
                                                        <div class="m-2 "
                                                            style=" font-weight: bold; color: rgb(217, 102, 106)">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Belum Lelang : <br>
                                                                Paket :{!! number_format($pak_pbj[3]) !!}
                                                                <br>
                                                                Pagu :{!! number_format($pag_pbj[3]) !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color: rgb(102, 97, 97)">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Gagal Lelang : <br>
                                                                Paket :{!! number_format($pak_pbj[4]) !!}
                                                                <br>
                                                                Pagu :{!! number_format($pag_pbj[4]) !!}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- catatan: Laporan SIPTL --}}
                <div class="carousel-item">
                    <div class="page-header min-vh-75"
                        style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')">
                        <span class="mask
                        bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 my-auto">
                                    <h4 class="text-white text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                        Laporan SIPTL
                                    </h4>
                                    <p class="text-center text-white" style="font-size: 14px" id="status_dataSIPTL">
                                    </p>
                                </div>
                                <div class="col-md-12 flexbox">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    <h5 style="color:white"> Temuan Total</h5>
                                                    <p>Total : 2.659</p>
                                                </div>
                                                <canvas id="chartSIPTLTemuanTotal" class="d-block img-fluid"></canvas>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(45, 178, 19)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Memadai &#40; SS + TD &#41; :
                                                        {{ $siptl[0]->rekomendasi }} </span>
                                                </div>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(250, 63, 25)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum Memadai : {{ $siptl[1]->rekomendasi }}
                                                    </span>
                                                </div>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(37, 128, 246)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum Tindak Lanjut :
                                                        {{ $siptl[2]->rekomendasi }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    <h5 style="color:white"> Temuan Itjen</h5>
                                                    <p>Total : 560</p>
                                                </div>
                                                <canvas id="chartSIPTLTemuanItjen" class="d-block img-fluid"></canvas>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(37, 128, 246)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Sudah Tindak Lanjut : 122</span>
                                                </div>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(246, 159, 27)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Sisa : 438</span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    <h5 style="color:white">Rekomendasi Temuan Itjen
                                                    </h5>
                                                    <p>Total : 973</p>
                                                </div>
                                                <canvas id="chartSIPTLRekomTemuanItjen"
                                                    class="d-block img-fluid"></canvas>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(37, 128, 246)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Sudah Tindak Lanjut : 249</span>
                                                </div>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(246, 159, 27)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Sisa : 724</span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    <h5 style="color:white"> Temuan Itjen Rupiah</h5>
                                                    <p>Total : 22,7 M</p>
                                                </div>
                                                <canvas id="chartSIPTLTemuanItjenRP"
                                                    class="d-block img-fluid"></canvas>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(37, 128, 246)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Sudah Tindak Lanjut :
                                                        Rp.3.637.666.473,3</span>
                                                </div>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color: rgb(246, 159, 27)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Sisa : <br> Rp.19.095.204.654,71</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- catatan: Laporan Zona Integritas --}}
                <div class="carousel-item carouselZI">
                    <div class="page-header min-vh-75"
                        style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 my-auto">
                                    <h4 class="text-white m-2 my-2 fadeIn1 fadeInBottom text-center">
                                        Laporan Zona Integritas
                                    </h4>
                                    <p class="text-center text-white" style="font-size: 14px" id="status_dataZI">
                                    </p>
                                </div>
                                <div class="col-sm-12 flexbox">
                                    <canvas id="chartZILine" width="auto" height="100%"
                                        class="d-block img-fluid"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- catatan: Laporan Pengaduan --}}
                <div class="carousel-item carouselPeng1">
                    <div class="page-header min-vh-75"
                        style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 my-auto border-radius-xl">
                                    <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                        Laporan Pengaduan
                                    </h4>
                                    <p class="text-center text-white" style="font-size: 14px" id="status_dataPeng1">
                                    </p>
                                </div>
                                <div class="col-md-12 flexbox">
                                    <div class="container-fluid">
                                        <div class=" row ">
                                            <div class="col">
                                                <div class="text-white text-center mt-2 ,,"
                                                    style=" font-weight: bold">
                                                    Jumlah Pengaduan Tahunan
                                                </div>
                                                <canvas id="chartPengaduanTahun" class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class=" col">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Pengaduan Berdasarkan Kategori
                                                </div>
                                                <canvas id="chartPengaduanKategori"
                                                    class="d-block img-fluid"></canvas>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color: rgb(0, 120, 170);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Korupsi : 23 </span>
                                                        </div>
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color: rgb(252, 153, 24);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Kolusi : 9</span>
                                                        </div>
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color: rgb(209, 209, 209);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Penyalahgunaan wewenang : 33</span>
                                                        </div>
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color: rgb(239, 211, 69);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>KTPP : 19</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color: rgb(58, 180, 242);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Penyimpangan PBJ : 48</span>
                                                        </div>
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color: rgb(133, 200, 138);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Pelaksanaan Pekerjaan : 97</span>
                                                        </div>
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color : rgb(255, 180, 242);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Penipuan Kontrak : 8</span>
                                                        </div>
                                                        <div class="m-2"
                                                            style=" font-weight: bold; color : rgb(162, 123, 92);">
                                                            <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                            <span>Lainnya : 28</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Simpulan Hasil Telaah
                                                </div>
                                                <canvas id="chartPengaduanTelaah" class="d-block img-fluid"></canvas>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color:rgb(0, 120, 170)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Tidak Terbukti : 42</span>
                                                </div>
                                                <div class="m-2"
                                                    style=" font-weight: bold; color:rgb(252, 153, 24)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span> Terbukti : 189</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- catatan: Laporan Pengaduan 2 --}}
                <div class="carousel-item carouselPeng2">
                    <div class="page-header min-vh-75"
                        style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 my-auto border-radius-xl">
                                    <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                        Laporan Pengaduan
                                    </h4>
                                    <p class="text-center text-white" style="font-size: 14px" id="status_dataPeng2">
                                    </p>
                                </div>
                                <div class="col-md-12 flexbox">
                                    <div class=" container">
                                        <div class="d-flex row">
                                            <div class="col chartbox">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Jumlah Pengaduan Per BBWS/BWS
                                                </div>
                                                <canvas id="chartPengaduanBBWS" class="d-block img-fluid"></canvas>
                                            </div>
                                            <div class="col chartbox">
                                                <div class="text-white text-center mt-2" style=" font-weight: bold">
                                                    Persentase Pengaduan Per Direktorat Pembina
                                                </div>
                                                <canvas id="chartPengaduanDirPembina"
                                                    class="d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- catatan: SOP --}}
                <div class="carousel-item carouselSOP">
                    <div class="page-header min-vh-75"
                        style="background-image: url('{{ asset('/storage/dashboard/latar_carousel.png') }}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 my-auto border-radius-xl">
                                    <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                        Library SOP Ditjen SDA
                                    </h4>
                                    <p class="text-center text-white" style="font-size: 14px" id="status_dataSop">
                                    </p>
                                </div>
                                <div class="col-md-12 my-auto flexbox">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ Route('SOP') }}">
                                                    <img class="w-100 h-100 d-block img-fluid"
                                                        src="{{ asset('storage/dashboard/Library_SOP.jpeg') }}"
                                                        alt="First slide" style="max-height: 400px">
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <canvas id="chartSOP" class="w-100 h-100 d-block img-fluid"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- catatan: ganti slide --}}
                <div class="min-vh-70 position-absolute w-100 top-0">
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon position-absolute bottom-50"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon position-absolute bottom-50"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
@endif
</header> -->
