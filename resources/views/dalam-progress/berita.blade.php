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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <title>SI-KIMR</title>
</head>
<style>
    .overlay-carousel {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.6)
    }

    .overlay-jumbroton {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.6);
        background-size: 100% 100%;
    }

    .dropdown-menu li:hover {
        cursor: pointer;
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

    .carousel-multi-item-2 .card img {
        border-radius: 2px;
    }

    .cover {
        padding: 0 1.5rem;
    }

    .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
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
    {{-- <a href="{{ route('home') }}" class="navbar-brand my-0 mr-md-auto">
            <img src="/img/login/logo_sikimr.png" class="img-fluid" alt="Responsive image"
                style="display: block; margin-top: 2px; height: 70px;"></a>

        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark font-weight-bold" style=" text-decoration: none" href="#"
                data-toggle="dropdown">Home</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">herman</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
            </div>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="{{ url('login') }}"
                data-toggle="dropdown">MR</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
            </div>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">KI</a>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">Perizinan</a>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">PBJ</a>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">Pengaduan</a>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">Pemeriksaan</a>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">Kebijakan</a>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">NSPK Kimr</a>
            <a class="p-2 text-dark font-weight-bold" style="text-decoration: none" href="#">Zone Integritas</a>
         </nav> --}}

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
                            <a class="nav-link p-2 text-dark font-weight-bold animate animasi fadeDown"
                                href="/testingindex">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 text-dark font-weight-bold " id="dropdownMRLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MR</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="dropdownMRLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Daftar Formulir MR</a>
                                <a class="dropdown-item" href="/formulir">Daftar Verifikasi Komitmen MR</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 text-dark font-weight-bold " id="dropdownKILink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">KI</a>
                            <div class="dropdown-menu hover dropdown-primary" aria-labelledby="dropdownKILink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Realisasi</a>
                                <a class="dropdown-item" href="/formulir">Rencana</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 text-dark font-weight-bold " id="dropdownPerizinanLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perizinan</a>
                            <div class="dropdown-menu hover dropdown-primary" aria-labelledby="dropdownPerizinanLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Perizinan</a>
                                <a class="dropdown-item" href="/formulir">Permohonan Izin</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 text-dark font-weight-bold " id="dropdownPengaduanLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengaduan</a>
                            <div class="dropdown-menu hover dropdown-primary" aria-labelledby="dropdownPengaduanLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Surat Pengaduan</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 text-dark font-weight-bold " id="dropdownPBJLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PBJ</a>
                            <div class="dropdown-menu hover dropdown-primary" aria-labelledby="dropdownPBJLink">
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Pemantauan Barang dan Jasa</a>
                                <a class="dropdown-item" href="/formulir">Pemanatauan Durasi Pengadaan Barang dan
                                    Jasa</a>
                                <a class="dropdown-item" href="/formulir/komitmen-mr">Pemantauan Nilai Kontrak < 80%
                                        HPS</a>
                                        <a class="dropdown-item" href="/formulir">Kemajuan Tender UPT</a>
                                        <a class="dropdown-item" href="/formulir">Kelengkapan Dokumen Per Paket</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link p-2 text-dark font-weight-bold " id="dropdownPemeriksaanLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pemeriksaan</a>
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
                            <a class="nav-link p-2 text-dark font-weight-bold" href="#">Kebijakan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 text-dark font-weight-bold" href="#">NSPK Kimr</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 text-dark font-weight-bold" href="#">Zona
                                Integritas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2 text-dark font-weight-bold" href="#">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
        {{-- <!-- Jumbotron -->
        <div class="text-center"
            style="background-image: url('http://www.anekabangunan.com/wp-content/uploads/2019/02/bendung.jpg');
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: 100% 100%; padding: 300px;">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal" style="color: white">Peta Risiko T1</h1>
                <p class="lead font-weight-normal" style="color: white"></p>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div> --}}
    </header>

    <main role="main">

        <!-- Jumbotron -->
        <div class="text-center"
            style="background-image: url('http://www.anekabangunan.com/wp-content/uploads/2019/02/bendung.jpg');
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-size: 100% 100%; margin-top: 100px">
            <div class="overlay-jumbroton"></div>
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-4 font-weight-normal" style="color: white">Peta Risiko T1</h1>
                <p class="lead font-weight-normal" style="color: white"></p>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>

        <!--Total Utama-->
        <section class="galery pt-2">
            <div class="container" style="width: 85%">
                <h3 class="mb-5" style="text-align: center">Berita Terkini</h3>
                <div class="row">
                    <div class="col-md-8 blog-main">
                        <div class="blog-post">
                            <h2 class="blog-post-title">Judul Berita</h2>
                            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                            <p>This blog post shows a few different types of content that’s supported and styled with
                                Bootstrap. Basic typography, images, and code are all supported.</p>
                            <hr>
                            <p>Yeah, she dances to her own beat. Oh, no. You could've been the greatest. 'Cause, baby,
                                <a href="#">you're a firework</a>. Maybe a reason why all the doors are closed.
                                Open up your heart and just let it begin. So très chic, yeah, she's a classic.
                            </p>
                            <blockquote>
                                <p>Bikinis, zucchinis, Martinis, no weenies. I know there will be sacrifice but that's
                                    the price. <strong>This is how we do it</strong>. I'm not sticking around to watch
                                    you go down. You think you're so rock and roll, but you're really just a joke. I
                                    know one spark will shock the world, yeah yeah. Can't replace you with a million
                                    rings.</p>
                            </blockquote>
                            <p>Trying to connect the dots, don't know what to tell my boss. Before you met me I was
                                alright but things were kinda heavy. You just gotta ignite the light and let it shine.
                                Glitter all over the room <em>pink flamingos</em> in the pool. </p>
                            <h2>Heading</h2>
                            <p>Suiting up for my crowning battle. If you only knew what the future holds. Bring the beat
                                back. Peach-pink lips, yeah, everybody stares.</p>
                            <h3>Sub-heading</h3>
                            <p>You give a hundred reasons why, and you say you're really gonna try. Straight stuntin'
                                yeah we do it like that. Calling out my name. ‘Cause I, I’m capable of anything.</p>
                            <pre><code>Example code block</code></pre>
                            <p>Before you met me I was alright but things were kinda heavy. You just gotta ignite the
                                light and let it shine.</p>
                            <h3>Sub-heading</h3>
                            <p>You got the finest architecture. Passport stamps, she's cosmopolitan. Fine, fresh,
                                fierce, we got it on lock. Never planned that one day I'd be losing you. She eats your
                                heart out.</p>
                            <ul>
                                <li>Got a motel and built a fort out of sheets.</li>
                                <li>Your kiss is cosmic, every move is magic.</li>
                                <li>Suiting up for my crowning battle.</li>
                            </ul>
                            <p>Takes you miles high, so high, 'cause she’s got that one international smile.</p>
                            <ol>
                                <li>Scared to rock the boat and make a mess.</li>
                                <li>I could have rewrite your addiction.</li>
                                <li>I know you get me so I let my walls come down.</li>
                            </ol>
                            <p>After a hurricane comes a rainbow.</p>
                        </div><!-- /.blog-post -->

                        <div class="blog-post">
                            <h2 class="blog-post-title">Another blog post</h2>
                            <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

                            <p>I am ready for the road less traveled. Already <a href="#">brushing off the
                                    dust</a>. Yeah, you're lucky if you're on her plane. I used to bite my tongue and
                                hold my breath. Uh, She’s a beast. I call her Karma (come back). Black ray-bans, you
                                know she's with the band. I can't sleep let's run away and don't ever look back, don't
                                ever look back.</p>
                            <blockquote>
                                <p>Growing fast into a <strong>bolt of lightning</strong>. Be careful Try not to lead
                                    her on</p>
                            </blockquote>
                            <p>I'm intrigued, for a peek, heard it's fascinating. Oh oh! Wanna be a victim ready for
                                abduction. She's got that international smile, oh yeah, she's got that one international
                                smile. Do you ever feel, feel so paper thin. I’m gon’ put her in a coma. Sun-kissed skin
                                so hot we'll melt your popsicle.</p>
                            <p>This is transcendental, on another level, boy, you're my lucky star.</p>
                        </div><!-- /.blog-post -->

                        <div class="blog-post">
                            <h2 class="blog-post-title">New feature</h2>
                            <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

                            <p>From Tokyo to Mexico, to Rio. Yeah, you take me to utopia. I'm walking on air. We'd make
                                out in your Mustang to Radiohead. I mean the ones, I mean like she's the one. Sun-kissed
                                skin so hot we'll melt your popsicle. Slow cooking pancakes for my boy, still up, still
                                fresh as a Daisy.</p>
                            <ul>
                                <li>I hope you got a healthy appetite.</li>
                                <li>You're never gonna be unsatisfied.</li>
                                <li>Got a motel and built a fort out of sheets.</li>
                            </ul>
                            <p>Don't need apologies. Boy, you're an alien your touch so foreign, it's
                                <em>supernatural</em>, extraterrestrial. Talk about our future like we had a clue. I can
                                feel a phoenix inside of me.
                            </p>
                        </div><!-- /.blog-post -->

                        <nav class="blog-pagination">
                            <a class="btn btn-outline-primary" href="#">Older</a>
                            <a class="btn btn-outline-secondary disabled">Newer</a>
                        </nav>

                    </div><!-- /.blog-main -->

                    <aside class="col-md-4 blog-sidebar rounded">
                        <div class="row sticky-top">
                            <div class=" container-fluid">
                                <div class="p-4 mb-3 bg-light ">
                                    <h4 class="font-italic">About</h4>
                                    <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain.
                                        Why don't
                                        you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we
                                        make angels
                                        cry, raining down on earth from up above.</p>
                                </div>

                                <div class="p-4">
                                    <h4 class="font-italic">Archives</h4>
                                    <ol class="list-unstyled mb-0">
                                        <li><a href="#">March 2014</a></li>
                                        <li><a href="#">February 2014</a></li>
                                        <li><a href="#">January 2014</a></li>
                                        <li><a href="#">December 2013</a></li>
                                        <li><a href="#">November 2013</a></li>
                                        <li><a href="#">October 2013</a></li>
                                        <li><a href="#">September 2013</a></li>
                                        <li><a href="#">August 2013</a></li>
                                        <li><a href="#">July 2013</a></li>
                                        <li><a href="#">June 2013</a></li>
                                        <li><a href="#">May 2013</a></li>
                                        <li><a href="#">April 2013</a></li>
                                    </ol>
                                </div>

                                <div class="p-4">
                                    <h4 class="font-italic">Elsewhere</h4>
                                    <ol class="list-unstyled">
                                        <li><a href="#">GitHub</a></li>
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="#">Facebook</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </aside><!-- /.blog-sidebar -->

                </div>
            </div>
        </section>

        <!-- Footer -->
        <section>
            <footer class="footer-section bg-light p-5 mt-5" id="footer">
                <div class="container-fluid" style="width: 85%">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="footer-left">
                                <h5>About Us</h5>
                                <p class="footer-desc">
                                    A little things can make you happy. <br> <br>
                                    <strong>Address</strong> <br>
                                    Jl. Pattimura No. 20,<br>
                                    Gedung SDA Lantai 3 <br>
                                    Kebayoran Baru - Jakarta Selatan
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="footer-widget">
                                <h5>Get Connected With Us</h5>
                                <ul class="ul-dots">
                                    <li><strong>Telepon</strong></li>
                                    <li>
                                        <a href="tel:021-722-1907"
                                            style="text-decoration: none; color: black">(021)7221907</a>
                                    </li>
                                    <li><strong>Email</strong></li>
                                    {{-- <li>gendhiswedding17@gmail.com</li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="footer-widget-two">
                                <ul class="ul-dots">
                                    <li><strong>WhatsApp</strong></li>
                                    <li>0812 2483 2798</li>
                                    <li><strong>Instagram</strong></li>
                                    <li>
                                        <a href="https://www.instagram.com/syahrul__ap"
                                            style="text-decoration: none; color: black"
                                            target="_blank">@syahrul__ap</a>
                                    </li>
                                </ul>
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
                                    All Rights Reserved | Kementerian PUPR
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script>
        $("#fadein").fadeIn("slow");
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
