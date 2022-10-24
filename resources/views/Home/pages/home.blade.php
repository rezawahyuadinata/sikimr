@extends('Home.layouts.layouthome')

@section('section')
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 text-right aos-item" data-aos="fade-right">
                    <h2 class="fade-in-left">Berita</h2>
                </div>
                <div class="col-md-6 mx-auto text-end aos-item" data-aos="fade-right">
                    <a href="{{ route('Berita') }}"class="text-primary icon-move-right">lihat selengkapnya<i
                            class="fas fa-arrow-right text-sm ms-1"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach ($news->sortByDesc('created_at') as $key => $item)
                    <div class="col-lg-2 col-sm-6 {{ $key == 0 ? '' : '' }}">
                        <div class="card card-plain">
                            @php
                                $thumbnailBerita = explode('|', $item->thumbnail);
                            @endphp
                            <div class="card-header p-0 position-relative aos-item" data-aos="fade-left">
                                <div class="geeks">
                                    <a class="d-block blur-shadow-image" href="{{ url('/news/' . $item->slug) }}">
                                        <img src="{{ url('storage/uploads/berita/' . $thumbnailBerita[0]) }}"
                                            alt="img-blur-shadow" class="  img img-thumbnail" loading="lazy"
                                            style="width: 100%; height: 8vw; object-fit: cover;">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body px-0 aos-item" data-aos="fade-left">
                                <h5 style="min-height: 55px; max-height: 60px; font-size: 15px">
                                    <a href="{{ url('/news/' . $item->slug) }}"
                                        class="text-dark font-weight-bold">{{ $item->subject }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="row">
                <div class="text-center pb-1">
                    <a href="{{ route('Berita') }}"class="overflow text-primary icon-move-right">Berita
                        Selengkapnya<i class="fas fa-arrow-right text-sm ms-1"></i></a>
                </div>
            </div> --}}
        </div>
    </section>
    {{-- Berita --}}
    {{-- <section class="py-3 aos-all" id="berita">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 mx-auto aos-item" data-aos="fade-left">
                    <h2>Berita</h2>
                </div>
                <div class="col-md-6 mx-auto text-end aos-item" data-aos="fade-left">
                    <a href="{{ route('Berita') }}"class="text-primary icon-move-right">lihat selengkapnya<i
                            class="fas fa-arrow-right text-sm ms-1"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach ($news->sortByDesc('created_at') as $item)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative aos-item" data-aos="fade-left">
                                <a class="d-block blur-shadow-image" href="{{ url('/news/' . $item->slug) }}">
                                    <img src="{{ asset('/storage/uploads/berita/' . $item->thumbnail) }}"
                                        alt="img-blur-shadow" class="  img img-thumbnail" loading="lazy"
                                        style="width: 100%; height: 8vw; object-fit: cover;">
                                </a>
                            </div>
                            <div class="card-body px-0 aos-item" data-aos="fade-left">
                                <h5 style="min-height: 65px">
                                    <a href="{{ url('/news/' . $item->slug) }}"
                                        class="text-dark font-weight-bold">{{ $item->subject }}</a>
                                </h5>
                                <p>
                                    {!! substr_replace($item->description, ' ...', 90) !!}
                                </p>
                                <a href="{{ url('/news/' . $item->slug) }}"
                                    class="text-info text-sm icon-move-right">Read
                                    More
                                    <i class="fas fa-arrow-right text-xs ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- Profile --}}
    <section class="py-3 aos-all" id="profile">
        <div class="container">

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil
                    anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-6 mx-auto aos-item" data-aos="fade-right">
                    <h2 class="fade-in-left">Profil</h2>
                </div>
                <div class="col-md-6 mx-auto text-end aos-item" data-aos="fade-right">
                    <a href="{{ route('Profil') }}"class="text-primary icon-move-right">lihat selengkapnya<i
                            class="fas fa-arrow-right text-sm ms-1"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 px-3 aos-item" data-aos="fade-right">
                    <img src="{{ asset('storage/dashboard/fotoorganisasi.png') }}" alt="img-blur-shadow"
                        style="width: 100%;" class="img-fluid" loading="lazy">
                    <!-- <img src="../template/material-kit-master/assets/img/examples/testimonial-6-2.jpg" alt="img-blur-shadow"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                width="100%" class="img-fluid shadow border-radius-lg" loading="lazy"> -->
                </div>
                <div class="col-lg-6 px-3 aos-item" data-aos="fade-right">
                    <div class="row">
                        <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5">
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
                        <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0 mb-5 aos-item" data-aos="fade-right">
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
            </div>
        </div>
    </section>

    {{-- Produk Hukum --}}
    <section class="py-3 aos-all" id="hukum">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 mx-auto aos-item" data-aos="fade-left">
                    <h2>Dasar Pembentukan Hukum</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 aos-item" data-aos="fade-left">
                    <h4 class="mt-5 mt-lg-0">PEDOMAN PENERAPAN MANAJEMEN RISIKO DI KEMENTERIAN PEKERJAAN
                        UMUM DAN PERUMAHAN RAKYAT</h4>
                    <p class="pe-5">Bahwa untuk melaksanakan manajemen risiko secara komprehensif di
                        Kementerian Pekerjaan Umum dan Perumahan Rakyat serta
                        melaksanakan ketentuan Pasal 13 ayat (1) Peraturan Pemerintah Nomor
                        60 Tahun 2008 tentang Sistem Pengendalian Intern Pemerintah, perlu
                        menetapkan Pedoman Penerapan Manajemen Risiko di Kementerian
                        Pekerjaan Umum dan Perumahan Rakyat.</p>
                </div>
                <div class="col-lg-12 mt-lg-0 mt-5 ps-lg-0 ps-0 aos-item" data-aos="fade-left">
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

    {{-- Gallery --}}
    {{-- <section class="pt-5 aos-all" id="galeri">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 mx-auto aos-item"data-aos="fade-right">
                    <h2>Gallery</h2>
                </div>
                <div class="col-md-6 mx-auto text-end">
                    <a href="/gallery" class="text-primary icon-move-right">lihat selengkapnya<i
                            class="fas fa-arrow-right text-sm ms-1"></i></a>
                </div>
            </div>
            <div class="row my-5">
                @foreach ($galleries->sortByDesc('created_at') as $item)
                    <div class="col-md-4 my-5">
                        <div class="card-group popup-gallery">{{  }}{{  }}
                            <div class="card" data-animation="true">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <a class="d-block blur-shadow-image aos-item" data-aos="fade-right"
                                        style="width: 100%; height: 15vw; object-fit: cover;"
                                        data-src="{{ asset('/storage/uploads/gallery/' . $item->file_name) }}">
                                        <img src="{{ asset('/storage/uploads/gallery/' . $item->file_name) }}"
                                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg"
                                            style="width: 100%; height: 15vw; object-fit: cover;">
                                    </a>
                                    <div class="colored-shadow"
                                        style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="d-flex mt-n6 mx-auto">
                                        <div class="ms-auto border-0 col-md-12 mx-auto text-center">
                                            <p class="text-dark mt-1">{{ $item->caption }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- Tutorial --}}
    {{-- <section class="pt-5 aos-all">
        <div class=" container">
            <div class=" row my-5">
                <div class="col-md-6 mx-auto aos-item" data-aos="fade-right">
                    <h2 class="fade-in-left">Tutor Dek</h2>
                </div>
                <div class="col-md-6 mx-auto text-end aos-item" data-aos="fade-right">
                    <a href="{{ route('Tutorial') }}"class="text-primary icon-move-right">lihat selengkapnya<i
                            class="fas fa-arrow-right text-sm ms-1"></i></a>
                </div>
                <div class=" col-md-12">
                    <div class="card-group">
                        <div class="card" data-animation="true">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <a class="d-block blur-shadow-image">
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg"
                                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                                <div class="colored-shadow"
                                    style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="d-flex mt-n6 mx-auto">
                                    <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Refresh">
                                        <i class="material-icons text-lg">refresh</i>
                                    </a>
                                    <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Edit">
                                        <i class="material-icons text-lg">edit</i>
                                    </button>
                                </div>
                                <h5 class="font-weight-normal mt-3">{{  }}
                                    <a href="javascript:;">Cozy 5 Stars Apartment</a>
                                </h5>
                                <p class="mb-0">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to
                                    "Naviglio" where you can enjoy the main night life in Barcelona.
                                </p>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer d-flex">
                                <p class="font-weight-normal my-auto">$899/night</p>
                                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                                <p class="text-sm my-auto"> Barcelona, Spain</p>
                            </div>
                        </div>
                        <div class="card" data-animation="true">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <a class="d-block blur-shadow-image">
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg"
                                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                                <div class="colored-shadow"
                                    style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="d-flex mt-n6{{  mx- }}auto">
                                    <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Refresh">
                                        <i class="material-icons text-lg">refresh</i>
                                    </a>
                                    <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Edit">
                                        <i class="material-icons text-lg">edit</i>
                                    </button>
                                </div>
                                <h5 class="font-weight-normal mt-3">
                                    <a href="javascript:;">Cozy 5 Stars Apartment</a>
                                </h5>
                                <p class="mb-0">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to
                                    "Naviglio" where you can enjoy the main night life in Barcelona.
                                </p>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer d-flex">
                                <p class="font-weight-normal my-auto">$899/night</p>
                                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                                <p class="text-sm my-auto"> Barcelona, Spain</p>
                            </div>
                        </div>
                        <div class="card" data-animation="true">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <a class="d-block blur-shadow-image">
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg"
                                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                                <div class="colored-shadow"
                                    style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="d-flex mt-n6 mx-auto">
                                    <a class="btn btn-link text-primary ms-auto border-0" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Refresh">
                                        <i class="material-icons text-lg">refresh</i>
                                    </a>
                                    <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Edit">
                                        <i class="material-icons text-lg">edit</i>
                                    </button>
                                </div>
                                <h5 class="font-weight-normal mt-3">
                                    <a href="javascript:;">Cozy 5 Stars Apartment</a>
                                </h5>
                                <p class="mb-0">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to
                                    "Naviglio" where you can enjoy the main night life in Barcelona.
                                </p>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer d-flex">
                                <p class="font-weight-normal my-auto">$899/night</p>
                                <i class="material-icons position-relative ms-auto text-lg me-1 my-auto">place</i>
                                <p class="text-sm my-auto"> Barcelona, Spain</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
@push('script-css')
    <style>
        .geeks img {
            width: 100%;
            transition: 0.5s all ease-in-out;
        }

        .geeks:hover img {
            transform: scale(1.1);
        }
    </style>
@endpush
@push('script-js')
    {{-- waktu di atas chart --}}
    <script>
        const toTop = document.querySelector(".to-top");

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > 300) {
                toTop.classList.add("active");
            } else {
                toTop.classList.remove("active");
            }
        })

        var timeDisplay = document.getElementById("time");


        function refreshTime() {
            var dateString = new Date().toLocaleString("id", {
                timeZone: "Asia/Jakarta"
            });
            var formattedString = dateString.replace(/\./g, ':');
            timeDisplay.innerHTML = formattedString;
        }

        setInterval(refreshTime, 1000);

        var today = new Date()
        var hours = today.getHours();

        const options = {
            year: "numeric",
            month: "long",
            day: "numeric"
        };

        const tanggal = today.toLocaleDateString('id-ID', options);

        if (hours >= 16) {
            hours = 16
        } else if (hours >= 12) {
            hours = 12
        } else if (hours >= 8) {
            hours = 8
        }
        // console.log(today)

        // today = formattedString + '?' + hours + ':00:00';

        var tagMR = document.getElementById('status_dataMR')
        var tagPBJ = document.getElementById('status_dataPBJ')
        var tagSIPTL = document.getElementById('status_dataSIPTL')
        var tagZI = document.getElementById('status_dataZI')
        var tagPeng1 = document.getElementById('status_dataPeng1')
        var tagPeng2 = document.getElementById('status_dataPeng2')
        var tagSop = document.getElementById('status_dataSop')

        tagMR.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
        tagPBJ.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
        //tagSIPTL.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
        tagZI.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
        tagPeng1.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
        tagPeng2.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
        tagSop.innerHTML = tanggal + ' ; ' + hours + ':00:00 WIB'
    </script>

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
    {{-- script chart kumulatif pengadaan barang dan jasa --}}
    <script>
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
    </script>
    {{-- script status paket kontraktual pengadaan barang dan jasa --}}
    <script>
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
    </script>
    {{-- script kontraktual rupiah --}}
    <script>
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
    {{-- script pengaduan tahunan --}}
    <script>
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
    </script>
    {{-- script pengaduan kategori --}}
    <script>
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
    </script>
    {{-- script simpulan telaah --}}
    <script>
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
    </script>
    {{-- script pengaduan BBWS --}}
    <script>
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
    </script>
    {{-- script pengaduan dirpembina --}}
    <script>
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

    {{-- script pengaduan sop --}}
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
