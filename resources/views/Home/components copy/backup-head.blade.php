{{-- catatan: Navbar waktu --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-info z-index-3">
    <div class="container">
        <a class="navbar-brand text-white" href="https://pu.go.id/" rel="tooltip" data-placement="bottom" target="_blank">
            <i class="fa fa-home"></i> PUPR | <span id="time"></span><span id="txt"></span>
        </a>
        <a href="https://www.creative-tim.com/product/material-design-system-pro#pricingCard"
            class="btn btn-sm  bg-gradient-primary  btn-round mb-0 ms-auto d-lg-none d-block">Buy Now</a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
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
</nav>
{{-- catatan: Navbar --}}
<nav class="navbar navbar-default sticky-top navbar-light bg-light shadow-md navbar-fixed-top navbar-expand-lg bg-gradient-white z-index-3 py-3 nav-pills nav-fill"
    id="myNavbar">
    <div class="container-lg    ">
        <a href="{{ route('Welcome') }}" class="navbar-brand my-0 mr-md-auto">
            <img src="/img/login/logo_sikimr.png" class="img-fluid img-responsive " alt="Responsive image"
                style="display: block; margin-top: 2px; height: auto;" height="36"></a>
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5 shift" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                <li class="nav-item dropdown dropdown-hover mx-1 ms-lg-6">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="{{ route('Welcome') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="{{ Route('Berita') }}">
                        Berita
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="{{ Route('Profil') }}">
                        Profile
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="cursor-pointer nav-link ps-2 d-flex cursor-pointer align-items-center="dropdownMenuPages2"
                        data-bs-toggle="dropdown" aria-expanded="false">Produk</a>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                        <li><a href="{{ Route('Hukum') }}" class="dropdown-item text-dark">Hukum</a></li>
                        <li><a href="{{ Route('SOP') }}" class="dropdown-item text-dark">SOP</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="{{ Route('Hukum') }}">
                        LAPOR
                    </a>
                </li>
                <!-- <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="{{ route('Galeri') }}">
                        Galeri
                    </a>
                </li> -->
                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="cursor-pointer btn btn-sm  bg-gradient-primary mb-0 me-1 mt-2 mt-md-0"
                        href="{{ Route('Tutorial') }}">Tutorial</a>
                    <!-- <ul class="dropdown-menu px-2 py-3  " aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item border-radius-md">Kepatuhan intern</a></li>
                        <li><a class="dropdown-item border-radius-md">Manajemen Risiko</a></li>
                    </ul> -->
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="cursor-pointer btn btn-sm bg-gradient-info mb-0 me-1 mt-2 mt-md-0 id="dropdownMenuPages2"
                        data-bs-toggle="dropdown" aria-expanded="false">Aplikasi</a>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                        <li><a href="{{ url('/login') }}" class="dropdown-item text-dark">Manajemen
                                Risiko</a></li>
                        <li><a class="dropdown-item text-dark">Kepatuhan intern</a></li>
                        <li><a class="dropdown-item text-dark">Pengaduan Barang dan Jasa</a></li>
                        <li><a class="dropdown-item text-dark">Perizinan</a></li>
                        <li><a class="dropdown-item text-dark">Pemeriksaan</a></li>
                        <li><a class="dropdown-item text-dark">Zona Integritas</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- catatan: Header --}}
<header>
    @if (\Route::currentRouteName() == 'Welcome')
        {{-- catatan: carousel --}}
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner mb-4">
                        {{-- catatan: Manajemen Risiko --}}
                        <div class="carousel-item active">
                            <div class="page-header min-vh-35 m-3 border-radius-xl"
                                style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 my-auto border-radius-xl">
                                            <h4 class="text-white mb-2 fadeIn1 fadeInBottom text-center">
                                                Laporan Manajemen Risiko
                                            </h4>
                                            {{-- catatan: <h1 class="text-white fadeIn2 fadeInBottom"></h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom"></p> --}}
                                            {{-- catatan: <a href="#"
                                                class="btn btn-outline-info hover:bg-gradient-info w-auto me-2 mb-0">
                                                <h6 class="text-white">Baca Selengkapnya</h6>
                                            </a> --}}
                                        </div>
                                        <div class="col-md-2 offset-1">
                                            <a href="#">
                                                <canvas id="chartMRkomitmen"></canvas>
                                            </a>
                                            <div class="text-center mt-2" style="color: violet; font-weight: bold">
                                                Komitmen MR
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <canvas id="chartMRtriwulan1"></canvas>
                                            </a>
                                            <div class="text-center mt-2" style="color: violet; font-weight: bold">
                                                Triwulan 1
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <canvas id="chartMRtriwulan2"></canvas>
                                            </a>
                                            <div class="text-center mt-2" style="color: violet; font-weight: bold">
                                                Triwulan 2
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <canvas id="chartMRtriwulan3"></canvas>
                                            </a>
                                            <div class="text-center mt-2" style="color: violet; font-weight: bold">
                                                Triwulan 3
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#">
                                                <canvas id="chartMRtriwulan4"></canvas>
                                            </a>
                                            <div class="text-center mt-2" style="color: violet; font-weight: bold">
                                                Triwulan 4
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <ul style="display: inline-block">
                                                <li
                                                    style="display: inline-block; margin: 10px 20px 0 0; color: rgb(54, 162, 235)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Verifikasi</span>
                                                </li>
                                                <li
                                                    style="display: inline-block; margin: 10px 20px 0 0; color: rgb(255, 205, 86)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Draft</span>
                                                </li>
                                                <li
                                                    style="display: inline-block; margin: 10px 20px 0 0; color: rgb(255, 99, 132)">
                                                    <i class="fa fa-circle mr-5" aria-hidden="true"></i>
                                                    <span>Belum</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Laporan Pengadaan Barang dan Jasa --}}
                        <div class="carousel-item">
                            <div class="page-header min-vh-35 m-3 border-radius-xl"
                                style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto border-radius-xl">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Laporan Pengadaan Barang
                                                dan Jasa
                                            </h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom"></h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom"></p>
                                            <a href="#"
                                                class="btn btn-outline-info hover:bg-gradient-info w-auto me-2 mb-0">
                                                <h6 class=" text-white">Baca Selengkapnya</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Laporan SIPTL --}}
                        <div class="carousel-item">
                            <div class="page-header min-vh-35 m-3 border-radius-xl"
                                style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto border-radius-xl">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Laporan SIPTL
                                            </h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom"></h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom"></p>
                                            <a href="#"
                                                class="btn btn-outline-info hover:bg-gradient-info w-auto me-2 mb-0">
                                                <h6 class=" text-white">Baca Selengkapnya</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Laporan Zona Integritas --}}
                        <div class="carousel-item">
                            <div class="page-header min-vh-35 m-3 border-radius-xl"
                                style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto border-radius-xl">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Laporan Zona Integritas
                                            </h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom"></h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom"></p>
                                            <a href="#"
                                                class="btn btn-outline-info hover:bg-gradient-info w-auto me-2 mb-0">
                                                <h6 class=" text-white">Baca Selengkapnya</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: Laporan Tender --}}
                        <div class="carousel-item">
                            <div class="page-header min-vh-35 m-3 border-radius-xl"
                                style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto border-radius-xl">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Laporan Tender
                                            </h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom"></h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom"></p>
                                            <a href="#"
                                                class="btn btn-outline-info hover:bg-gradient-info w-auto me-2 mb-0">
                                                <h6 class=" text-white">Baca Selengkapnya</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: SOP --}}
                        <div class="carousel-item">
                            <div class="page-header min-vh-35 m-3 border-radius-xl"
                                style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto border-radius-xl">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">SOP
                                            </h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom"></h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom"></p>
                                            <a href="#"
                                                class="btn btn-outline-info hover:bg-gradient-info w-auto me-2 mb-0">
                                                <h6 class=" text-white">Baca Selengkapnya</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="min-vh-35 position-absolute w-100 top-0">
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
        </div>
    @endif
</header>
