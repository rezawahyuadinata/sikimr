<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="template/material-kit-master/assetsimg/apple-icon.png">
    <link rel="icon" type="image/png" href="template/material-kit-master/assetsimg/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>{{ \Route::current()->getName() ?? '' }} | SI-KIMR</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="template/material-kit-master/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="template/material-kit-master/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="template/material-kit-master/assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/panzoom.css">
</head>

<body>
    <nav class="navbar navbar-default sticky-top navbar-light bg-light shadow-lg navbar-fixed-top navbar-expand-lg bg-gradient-white z-index-3 py-3" id="myNavbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand my-0 mr-md-auto">
                <img src="/img/login/logo_sikimr.png" class="img-fluid" alt="Responsive image" style="display: block; margin-top: 2px; height: auto;"></a>
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-auto">
                    <li class="nav-item dropdown dropdown-hover mx-2 ms-lg-6">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages2" data-bs-toggle="dropdown" aria-expanded="false">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                            Produk Hukum
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                            Galeri
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                            FAQ
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="cursor-pointer btn btn-sm  bg-gradient-info mb-0 me-1 mt-2 mt-md-0 id=" dropdownMenuPages2" data-bs-toggle="dropdown" aria-expanded="false"">Aplikasi SI-KIMR</a>
                        <ul class=" dropdown-menu px-2 py-3 " aria-labelledby=" dropdownMenuButton">
                    <li><a class="dropdown-item border-radius-md">Manajemen Risiko</a></li>
                    <li><a class="dropdown-item border-radius-md">Kepatuhan intern</a></li>
                    <li><a class="dropdown-item border-radius-md">Pengaduan Barang dan Jasa</a></li>
                    <li><a class="dropdown-item border-radius-md">Perizinan</a></li>
                    <li><a class="dropdown-item border-radius-md">Pemeriksaan</a></li>
                    <li><a class="dropdown-item border-radius-md">Zona Integritas</a></li>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        {{-- carousel --}}
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-interval="100">
            <div class="carousel-inner mb-4">
                <div class="carousel-item">
                    <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                        <span class="mask bg-gradient-dark opacity-4"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Pricing Plans</h4>
                                    <h1 class="text-white fadeIn2 fadeInBottom">Work with the rockets</h1>
                                    <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Wealth creation is an
                                        evolutionarily recent positive-sum game. Status is an old zero-sum game. Those
                                        attacking wealth creation are often just seeking status.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg');">
                        <span class="mask bg-gradient-dark opacity-4"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Our Team</h4>
                                    <h1 class="text-white fadeIn2 fadeInBottom">Work with the best</h1>
                                    <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Free people make free
                                        choices. Free choices mean you get unequal outcomes. You can have freedom, or
                                        you can have equal outcomes. You can’t have both.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-2-min.jpg');">
                        <span class="mask bg-gradient-dark opacity-4"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Office Places</h4>
                                    <h1 class="text-white fadeIn2 fadeInBottom">Work from home</h1>
                                    <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">You’re spending time to
                                        save money when you should be spending money to save time.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- page header --}}
        <div class="page-header min-vh-100" style="background-image: url(https://images.unsplash.com/photo-1520769945061-0a448c463865?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80&);" loading="lazy">
            <span class="mask bg-gradient-dark opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 d-flex justify-content-center flex-column">
                        <h1 class="text-white mb-4">Material Kit</h1>
                        <p class="text-white opacity-8 lead pe-5 me-5">The time is now for it be okay to be great.
                            People in this world shun people for being nice. </p>
                        <div class="buttons">
                            <button type="button" class="btn btn-white mt-4">Get Started</button>
                            <button type="button" class="btn text-white shadow-none mt-4">Read more</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- {{-- <div class="page-header min-vh-80"
        style="background-image: url('https://images.unsplash.com/photo-1630752708689-02c8636b9141?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2490&q=80')">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="text-center">
                        <h1 class="text-white">Your title here</h1>
                        <h3 class="text-white">Subtitle</h3>
                    </div>
                </div>
            </div>
        </div>
    </div> --}} -->
    <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
        {{-- Berita --}}
        <section class="py-3">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-6 mx-auto">
                        <h2>Berita</h2>
                    </div>
                    <div class="col-md-6 mx-auto text-end">
                        <a href="#">lihat selengkapnya</a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($news->sortByDesc('created_at') as $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative">
                                <a class="d-block blur-shadow-image">
                                    <img src="{{ asset('/storage/uploads/berita/' . $item->image) }}" alt="img-blur-shadow" class="img-fluid img-thumbnail" loading="lazy" style="he">
                                </a>
                            </div>
                            <div class="card-body px-0">
                                <h5>
                                    <a href="javascript:;" class="text-dark font-weight-bold">{{ $item->subject }}</a>
                                </h5>
                                <p>
                                    {!! substr_replace($item->description, ' ...', 90) !!}
                                </p>
                                <a href="javascript:;" class="text-info text-sm icon-move-right">Read More
                                    <i class="fas fa-arrow-right text-xs ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Profile --}}
        <section class="py-3">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-6 mx-auto">
                        <h2>Profil</h2>
                    </div>
                    <div class="col-md-6 mx-auto text-end">
                        <a href="#">lihat selengkapnya</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 px-3">
                        <img src="../template/material-kit-master/assets/img/examples/testimonial-6-2.jpg" alt="img-blur-shadow" width="100%" class="img-fluid shadow border-radius-lg" loading="lazy">
                    </div>
                    <div class="col-lg-6 px-3">
                        <div class="row">
                            <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5">
                                <h3>Visi & Misi</h3>
                                <p class="pe-5">Pain is what we go through as we become older. We get
                                    insulted by
                                    others,
                                    lose trust for those others. We get back stabbed by friends. It becomes
                                    harder for
                                    us to
                                    give others a hand.</p>
                                <a href="javascript:;" class="text-primary icon-move-right">More about us
                                    <i class="fas fa-arrow-right text-sm ms-1"></i>
                                </a>
                            </div>
                            <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5">
                                <h3>Tujuan</h3>
                                <p class="pe-5">Pain is what we go through as we become older. We get
                                    insulted by
                                    others,
                                    lose trust for those others. We get back stabbed by friends. It becomes
                                    harder for
                                    us to
                                    give others a hand.</p>
                                <a href="javascript:;" class="text-primary icon-move-right">More about us
                                    <i class="fas fa-arrow-right text-sm ms-1"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Produk Hukum --}}
        <section class="py-3 pb-5 position-relative mx-n3">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-6 mx-auto">
                        <h2>Landasan Hukum</h2>
                    </div>
                    <div class="col-md-6 mx-auto text-end">
                        <a href="#">lihat selengkapnya</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg" src="../template/material-kit-master/assets/img/team-5.jpg" alt="image">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Emma Roberts</h5>
                                        <h6 class="text-info">UI Designer</h6>
                                        <p class="mb-0">Artist is a term applied to a person who engages in an
                                            activity deemed to be an art.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-lg-4 mt-5">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg" src="../template/material-kit-master/assets/img/bruce-mars.jpg" alt="image">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">William Pearce</h5>
                                        <h6 class="text-info">Boss</h6>
                                        <p class="mb-0">Artist is a term applied to a person who engages in an
                                            activity deemed to be an art.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-4 z-index-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg" src="../template/material-kit-master/assets/img/ivana-squares.jpg" alt="image">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Ivana Flow</h5>
                                        <h6 class="text-info">Athlete</h6>
                                        <p class="mb-0">Artist is a term applied to a person who engages in an
                                            activity deemed to be an art.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-lg-4 mt-5 z-index-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">
                                        <div class="p-3 pe-md-0">
                                            <img class="w-100 border-radius-md shadow-lg" src="../template/material-kit-master/assets/img/ivana-square.jpg" alt="image">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0">Marquez Garcia</h5>
                                        <h6 class="text-info">JS Developer</h6>
                                        <p class="mb-0">Artist is a term applied to a person who engages in an
                                            activity deemed to be an art.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Gallery --}}
        <section class="pt-5">
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-6 mx-auto">
                        <h2>Gallery</h2>
                    </div>
                    <div class="col-md-6 mx-auto text-end">
                        <a href="#">lihat selengkapnya</a>
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach ($galleries->sortByDesc('created_at') as $item)
                    <div class="col-md-4">
                        <div class="card-group">
                            <div class="card" data-animation="true">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <a class="d-block blur-shadow-image" data-fancybox="gallery" style="width: 100%; height: 15vw; object-fit: cover;" data-src="{{ asset('/storage/uploads/gallery/' . $item->url) }}">
                                        <img src="{{ asset('/storage/uploads/gallery/' . $item->url) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" style="width: 100%; height: 15vw; object-fit: cover;">
                                    </a>
                                    <div class="colored-shadow" style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="d-flex mt-n6 mx-auto">
                                        <div class="ms-auto border-0 col-md-12 mx-auto text-center">
                                            <p class="text-dark mt-1">{{ $item->url }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section class="py-3">
            <div class="accordion-1">
                <div class="container">
                    <div class="row my-5">
                        <div class="col-md-6 mx-auto">
                            <h2>Frequently Asked Question</h2>
                        </div>
                        <div class="col-md-6 mx-auto text-end">
                            <a href="#">lihat selengkapnya</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="accordion" id="accordionRental">
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingOne">
                                        <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            How do I order?
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                                        <div class="accordion-body text-sm opacity-8 text-dark">
                                            We’re not always in the position that we want to be at. We’re constantly
                                            growing. We’re constantly making mistakes. We’re constantly trying to
                                            express ourselves and actualize our dreams. If you have the opportunity to
                                            play this game
                                            of life you need to appreciate every moment. A lot of people don’t
                                            appreciate the moment until it’s passed.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            How can i make the payment?
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                                        <div class="accordion-body text-sm opacity-8 text-danger">
                                            It really matters and then like it really doesn’t matter. What matters is
                                            the people who are sparked by it. And the people who are like offended by
                                            it, it doesn’t matter. Because it's about motivating the doers. Because I’m
                                            here to follow my dreams and inspire other people to follow their dreams,
                                            too.
                                            <br>
                                            We’re not always in the position that we want to be at. We’re constantly
                                            growing. We’re constantly making mistakes. We’re constantly trying to
                                            express ourselves and actualize our dreams. If you have the opportunity to
                                            play this game of life you need to appreciate every moment. A lot of people
                                            don’t appreciate the moment until it’s passed.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingThree">
                                        <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How much time does it take to receive the order?
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRental">
                                        <div class="accordion-body text-sm opacity-8 text-danger">
                                            The time is now for it to be okay to be great. People in this world shun
                                            people for being great. For being a bright color. For standing out. But the
                                            time is now to be okay to be the greatest you. Would you believe in what you
                                            believe in, if you were the only one who believed it?
                                            If everything I did failed - which it doesn't, it actually succeeds - just
                                            the fact that I'm willing to fail is an inspiration. People are so scared to
                                            lose that they don't even try. Like, one thing people can't say is that I'm
                                            not trying, and I'm not trying my hardest, and I'm not trying to do the best
                                            way I know how.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingFour">
                                        <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Can I resell the products?
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionRental">
                                        <div class="accordion-body text-sm opacity-8 text-danger">
                                            I always felt like I could do anything. That’s the main thing people are
                                            controlled by! Thoughts- their perception of themselves! They're slowed down
                                            by their perception of themselves. If you're taught you can’t do anything,
                                            you won’t do anything. I was taught I could do everything.
                                            <br><br>
                                            If everything I did failed - which it doesn't, it actually succeeds - just
                                            the fact that I'm willing to fail is an inspiration. People are so scared to
                                            lose that they don't even try. Like, one thing people can't say is that I'm
                                            not trying, and I'm not trying my hardest, and I'm not trying to do the best
                                            way I know how.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="headingFifth">
                                        <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                                            Where do I find the shipping details?
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        </button>
                                    </h5>
                                    <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionRental">
                                        <div class="accordion-body text-sm opacity-8 text-danger">
                                            There’s nothing I really wanted to do in life that I wasn’t able to get good
                                            at. That’s my skill. I’m not really specifically talented at anything except
                                            for the ability to learn. That’s what I do. That’s what I’m here for. Don’t
                                            be afraid to be wrong because you can’t learn anything from a compliment.
                                            I always felt like I could do anything. That’s the main thing people are
                                            controlled by! Thoughts- their perception of themselves! They're slowed down
                                            by their perception of themselves. If you're taught you can’t do anything,
                                            you won’t do anything. I was taught I could do everything.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- footer --}}
    <section>
        <footer class="footer-section bg-light pt-5 mt-5">
            <div class="container">
                <div class=" row">
                    <div class="col-md-3 mb-4 ms-auto">
                        <div>
                            <a href="https://www.creative-tim.com/product/material-kit">
                                <img src="./template/material-kit-master/assets/img/logo-ct-dark.png" class="mb-3 footer-logo" alt="main_logo">
                            </a>
                            <h4 class="font-weight-bolder mb-4">Direktorat Kepatuhan intern</h4>
                            <a class="nav-link" target="_blank">
                                Gedung Ditjen Sumber Daya Air,lantai 3
                                <br>
                                Jalan Pattimura 20, Kebayoran Baru,
                                <br>
                                Jakarta - Indonesia - 12110
                            </a>
                        </div>
                        <div>
                            <ul class="d-flex flex-row ms-n3 nav">
                                <li class="nav-item">
                                    <a class="nav-link pe-1" href="https://www.facebook.com/CreativeTim/" target="_blank">
                                        <i class="fab fa-facebook text-lg opacity-8"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pe-1" href="https://twitter.com/creativetim" target="_blank">
                                        <i class="fab fa-twitter text-lg opacity-8"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pe-1" href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w" target="_blank">
                                        <i class="fab fa-instagram text-lg opacity-8"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-6 mb-4">
                        <div>
                            <h5 class="text-sm">Kontak Kami</h5>
                            <ul class="flex-column ms-n3 nav">
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank">
                                        (021)7221907
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank">
                                        <strong>Email : </strong>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank">
                                        ditki.sda@pu.go.id
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-6 mb-4">
                        <div>
                            <h6 class="text-sm">Resources</h6>
                            <ul class="flex-column ms-n3 nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="https://iradesign.io/" target="_blank">
                                        Illustrations
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.creative-tim.com/bits" target="_blank">
                                        Bits & Snippets
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.creative-tim.com/affiliates/new" target="_blank">
                                        Affiliate Program
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-6 mb-4">
                        <div>
                            <h6 class="text-sm">Help & Support</h6>
                            <ul class="flex-column ms-n3 nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.creative-tim.com/contact-us" target="_blank">
                                        Contact Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.creative-tim.com/knowledge-center" target="_blank">
                                        Knowledge Center
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://services.creative-tim.com/?ref=ct-mk2-footer" target="_blank">
                                        Custom Development
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.creative-tim.com/sponsorships" target="_blank">
                                        Sponsorships
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--<div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
                        <div>
                            <h6 class="text-sm">Legal</h6>
                            <ul class="flex-column ms-n3 nav">
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="https://www.creative-tim.com/knowledge-center/terms-of-service/"
                                        target="_blank">
                                        Terms & Conditions
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="https://www.creative-tim.com/knowledge-center/privacy-policy/"
                                        target="_blank">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://www.creative-tim.com/license" target="_blank">
                                        Licenses (EULA)
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-12">
                        <div class="text-center">
                            <p class="text-dark my-4 text-sm font-weight-normal">
                                Hak Cipta ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Direktorat Kepatuhan Intern <a href="https://sda.pu.go.id/" target="_blank">Direktorat Jendral Sumber Daya Air</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    <!--   Core JS Files   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="template/material-kit-master/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="template/material-kit-master/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="template/material-kit-master/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="template/material-kit-master/assets/js/plugins/countup.min.js"></script>
    <script src="template/material-kit-master/assets/js/plugins/choices.min.js"></script>
    <script src="template/material-kit-master/assets/js/plugins/prism.min.js"></script>
    <script src="template/material-kit-master/assets/js/plugins/highlight.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="template/material-kit-master/assets/js/plugins/rellax.min.js"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="template/material-kit-master/assets/js/plugins/tilt.min.js"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="template/material-kit-master/assets/js/plugins/choices.min.js"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="template/material-kit-master/assets/js/plugins/parallax.min.js"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
    <script src="template/material-kit-master/assetsjs/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <script type="text/javascript">
        if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            };
        }
    </script>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var navbar = document.getElementById("myNavbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
    <script>
        // Customization example
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });
    </script>

</body>


</html>
