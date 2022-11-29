@extends('Home.layouts.layouthome')

@section('section')
    <section class="py-7">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Tutorial</h2>
                </div>
            </div>
            {{-- catatan: tab pane --}}
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="nav-wrapper position-sticky end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-simple"
                                    role="tab" aria-controls="profile" aria-selected="true">
                                    File
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple"
                                    role="tab" aria-controls="dashboard" aria-selected="false">
                                    Vidio
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            {{-- catatan: tab pane page --}}
            <div class="row">
                <div class="col-md-12 py-3">
                    <div class="tab-content">
                        {{-- catatan: pdf --}}
                        <div class="tab-pane active justify-content-center" id="profile-tabs-simple">
                            <div class="album py-5">
                                <div class="container">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <object class="bd-placeholder-img card-img-top overflow-hidden"
                                                    data="{{ asset('storage/dashboard/Modul_KI.pdf') }}"
                                                    type="application/pdf" width="100%" height="225"></object>
                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Modul Kepatuhan Intern</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="{{ asset('storage/dashboard/Modul_KI.pdf') }}"
                                                                target="_blank"
                                                                class="btn btn-sm btn-outline-secondary btn-primary mx-1">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                View</a>
                                                            <a href="{{ asset('storage/dashboard/Modul_KI.pdf') }}"
                                                                download="Modul KI"
                                                                class="btn btn-sm btn-outline-secondary btn-info">
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                                Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <object class="bd-placeholder-img card-img-top overflow-hidden"
                                                    data="{{ asset('storage/dashboard/Modul_MR.pdf') }}"
                                                    type="application/pdf" width="100%" height="225"></object>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Modul Manajemen Risiko</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="{{ asset('storage/dashboard/Modul_MR.pdf') }}"
                                                                target="_blank"
                                                                class="btn btn-sm btn-outline-secondary btn-primary mx-1">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                View</a>
                                                            <a href="{{ asset('storage/dashboard/Modul_MR.pdf') }}"
                                                                download="Modul MR"
                                                                class="btn btn-sm btn-outline-secondary btn-info">
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                                Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <object class="bd-placeholder-img card-img-top overflow-hidden"
                                                    data="{{ asset('storage/dashboard/Buku_Saku.pdf') }}"
                                                    type="application/pdf" width="100%" height="225"></object>
                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Buku Saku Penilaian Tingkat Efektivitas
                                                        Penerapan ManaJemen Risiko</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="{{ asset('storage/dashboard/Buku_Saku.pdf') }}"
                                                                target="_blank"
                                                                class="btn btn-sm btn-outline-secondary btn-primary mx-1">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                View</a>
                                                            <a href="{{ asset('storage/dashboard/Buku_Saku.pdf') }}"
                                                                download="Buku Saku Penilaian Tingkat Efektivitas
                                                            Penerapan ManaJemen Risiko"
                                                                class="btn btn-sm btn-outline-secondary btn-info">
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                                Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <object class="bd-placeholder-img card-img-top overflow-hidden"
                                                    data="{{ asset('storage/dashboard/Infografis.pdf') }}"
                                                    type="application/pdf" width="100%" height="225"></object>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Infografis Pedoman Penerapan Manajemen Risiko
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <a href="{{ asset('storage/dashboard/Infografis.pdf') }}"
                                                                target="_blank"
                                                                class="btn btn-sm btn-outline-secondary btn-primary mx-1">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                                View</a>
                                                            <a href="{{ asset('storage/dashboard/Infografis.pdf') }}"
                                                                download="Infografis Pedoman Penerapan Manajemen Risiko"
                                                                class="btn btn-sm btn-outline-secondary btn-info">
                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                                Download</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- catatan: videos --}}
                        <div class="tab-pane justify-content-center" id="dashboard-tabs-simple">
                            <div class="album py-5">
                                <div class="container">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe src="https://www.youtube.com/embed/s5FpVxJy7xo" frameborder="0"
                                                    class="bd-placeholder-img card-img-top" width="100%"
                                                    height="225"></iframe>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        Pembangunan Zona Integritas pada area Manajemen Perubahan
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe src="https://www.youtube.com/embed/m9dmo13oznc" frameborder="0"
                                                    class="bd-placeholder-img card-img-top" width="100%"
                                                    height="225"></iframe>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        Pembangunan Zona Integritas pada area Pelayanan Publik
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe src="https://www.youtube.com/embed/QxHI1Qx_pis" frameborder="0"
                                                    class="bd-placeholder-img card-img-top" width="100%"
                                                    height="225"></iframe>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        Pembangunan Zona Integritas pada area Penataan Manajemen SDM
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe class="bd-placeholder-img card-img-top"
                                                    src="https://www.youtube.com/embed/AqE2MMjkrE0" frameborder="0"
                                                    width="100%" height="225" allowfullscreen></iframe>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text bold">Pembangunan Zona Integritas Area Penataan
                                                        Tatalaksana</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe class="bd-placeholder-img card-img-top"
                                                    src="https://www.youtube.com/embed/znfswNMQJEI" frameborder="0"
                                                    width="100%" height="225" allowfullscreen></iframe>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Pembangunan Zona Integritas Area Penguatan
                                                        Pengawasan.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe class="bd-placeholder-img card-img-top"
                                                    src="https://www.youtube.com/embed/GEOOFKNyF0U" frameborder="0"
                                                    width="100%" height="225" allowfullscreen></iframe>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Pembangunan Zona Integritas Area Penguatan
                                                        Akuntabilitas Kinerja.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe class="bd-placeholder-img card-img-top"
                                                    src="https://www.youtube.com/embed/arOmjd_HJAA" frameborder="0"
                                                    width="100%" height="225" allowfullscreen></iframe>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text bold">Pengendalian Internal dan Manajemen
                                                        Risiko
                                                        di
                                                        Ditjen SDA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe class="bd-placeholder-img card-img-top"
                                                    src="https://www.youtube.com/embed/fSKWum8wDSQ" frameborder="0"
                                                    width="100%" height="225" allowfullscreen></iframe>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Panduan Penggunaan Aplikasi SI KIMR</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <iframe class="bd-placeholder-img card-img-top"
                                                    src="https://www.youtube.com/embed/xYCEQf8ettY" frameborder="0"
                                                    width="100%" height="225" allowfullscreen></iframe>

                                                <div class="card-body" style="wdith:100%; min-height:150px">
                                                    <p class="card-text">Pelaporan Penerapan Manajemen Risiko</p>
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
    </section>
@endsection
@push('script-css')
    <style></style>
@endpush
@push('script-js')
@endpush
