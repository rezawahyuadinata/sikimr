{{-- Contoh Pertama --}}
<!-- <div class="container-fluid">
    <div class="row pt-3 px-2 ">
        {{-- carousel --}}
        <div class="col-md-8">
            <div class="bg-secondary border border-2 rounded-2 ms-auto" style="min-height: 80vh">
                <div class="container-fluid"></div>
            </div>
        </div>
        {{-- Berita --}}
        <div class="col-md-4">
            <div class="mb-2 ms-auto" style="min-height: 60vh">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-3 border border-1 bg-secondary" style="min-height: 80px">
                            <div class="container">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    {{-- card Berita --}}
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

{{-- Contoh Kedua --}}
@if (\Route::currentRouteName() == 'Welcome')
    <div class="container-fluid">
        <div class="row pt-3 px-2">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        {{-- Manajemen Risiko --}}
                        <section id="div1" class="targetDiv" style="display: block;">
                            <div class="container-fluid" style="min-height: 10vh; width: 80%">
                                <h3 class="text-center">Manajemen Risiko {{ date('Y') }}</h3>
                                <h5 class="text-center" style="font-size: 14px" id="status_dataMR"></h5>
                            </div>
                            <div class=" container mt-1" style="width: 100%">
                                <div class="table-responsive" style="height: 60vh;">
                                    <table class="table table-bordered dark"
                                        style="border: 2px solid black; width: 100%; height:55vh">
                                        <thead>
                                            <tr style="border: .5px solid black" class="table-light">
                                                <th class="text-dark text-sm-center align-middle font-table-head"
                                                    style="border: 1px solid black;">
                                                    Progress
                                                </th>
                                                <th class="text-dark text-sm-center align-middle font-table-head"
                                                    colspan="2" style="border: 1px solid black;">
                                                    Komitmen MR</th>
                                                <th class="text-dark text-sm-center align-middle font-table-head"
                                                    colspan="2" style="border: 1px solid black;">
                                                    T1</th>
                                                <th class="text-dark text-sm-center align-middle font-table-head"
                                                    colspan="2" style="border: 1px solid black;">
                                                    T2</th>
                                                <th class="text-dark text-sm-center align-middle font-table-head"
                                                    colspan="2" style="border: 1px solid black;">T3</th>
                                                <th class="text-dark text-sm-center align-middle font-table-head"
                                                    colspan="2" style="border: 1px solid black;">T4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="border: .5px solid black" class="table-danger ">
                                                <th class="text-dark text-sm-center align-middle font-table-head">Belum
                                                </th>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! 293 - ($kom_d + $kom_v) !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(((293 - ($kom_d + $kom_v)) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! 293 - ($t1_d + $t1_v) !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(((293 - ($t1_d + $t1_v)) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! 293 - ($t2_d + $t2_v) !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(((293 - ($t2_d + $t2_v)) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! 293 - ($t3_d + $t3_v) !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(((293 - ($t3_d + $t3_v)) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! 293 - ($t4_d + $t4_v) !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(((293 - ($t4_d + $t4_v)) / 293) * 100) . '%' !!}</td>
                                            </tr>
                                            <tr style="border: .5px solid black" class="table-warning">
                                                <th class="text-dark text-sm-center align-middle font-table-head">Draft
                                                </th>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $kom_d !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($kom_d / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t1_d !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t1_d / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t2_d !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t2_d / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t3_d !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t3_d / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t4_d !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t4_d / 293) * 100) . '%' !!}
                                                </td>
                                            </tr>
                                            <tr style="border: .5px solid black" class="table-info">
                                                <th class="text-dark text-sm-center align-middle font-table-head">
                                                    Verifikasi
                                                </th>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $kom_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($kom_v / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t1_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t1_v / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t2_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t2_v / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t3_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t3_v / 293) * 100) . '%' !!}
                                                </td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! $t4_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table">
                                                    {!! round(($t4_v / 293) * 100) . '%' !!}
                                                </td>
                                            </tr>
                                            <tr style="border: .5px solid black" class="table-success">
                                                <th class="text-dark text-sm-center align-middle font-table-head">Total
                                                </th>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! 293 - ($kom_d + $kom_v) + $kom_v + $kom_d !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! round(((293 - ($kom_d + $kom_v) + $kom_d + $kom_v) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! 293 - ($t1_d + $t1_v) + $t1_d + $t1_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! round(((293 - ($t1_d + $t1_v) + $t1_d + $t1_v) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! 293 - ($t2_d + $t2_v) + $t2_d + $t2_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! round(((293 - ($t2_d + $t2_v) + $t2_d + $t2_v) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! 293 - ($t3_d + $t3_v) + $t3_d + $t3_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! round(((293 - ($t3_d + $t3_v) + $t3_d + $t3_v) / 293) * 100) . '%' !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! 293 - ($t4_d + $t4_v) + $t4_d + $t4_v !!}</td>
                                                <td class="text-dark text-sm-center align-middle font-table"
                                                    style="border: 1px solid black">
                                                    {!! round(((293 - ($t4_d + $t4_v) + $t4_d + $t4_v) / 293) * 100) . '%' !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        {{-- PBJ --}}
                        <section id="div2" class="targetDiv" style="display: none;">
                            <div class="container-fluid" style="min-height: 10vh; width: 80%">
                                <h3 class="text-center">Pengadaan Barang dan Jasa {{ date('Y') }}</h3>
                                <h5 class="text-center" style="font-size: 14px" id="status_dataPBJ"></h5>
                            </div>
                            <div class="container mt-1" style="width: 100%; height: auto">
                                <div class="swiper pbjheader" style="height:60vh;">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="container align-content-start" style="flex: auto;">
                                                <canvas id="chartPBJKumulatif"></canvas>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="row">
                                                <h5 class=" text-center title-chart">Status Paket Kontraktual Pengadaan
                                                    Barang dan Jasa</h5>
                                                <div class="col-8 align-content-center">
                                                    <div class="container p-3"
                                                        style="position: relative; flex: auto;">
                                                        <canvas id="chartPBJKontraktualPKT"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card terkontrak-PKT mb-2"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Terkontrak
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pag_pbj[0]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 persiapan-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Persiapan Terkontrak
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pag_pbj[1]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 proses-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Proses Lelang
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pag_pbj[2]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 belum-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Belum Lelang
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pag_pbj[3]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 gagal-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Gagal Lelang
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pag_pbj[4]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="row">
                                                <h5 class=" text-center title-chart">Status Rupiah Kontraktual
                                                    Pengadaan
                                                    Barang dan Jasa</h5>
                                                <div class="col-8 align-content-center">
                                                    <div class="container p-3"
                                                        style="position: relative; flex: auto;">
                                                        <canvas id="chartPBJKontraktualRP"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card terkontrak-RP mb-2"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Terkontrak (Rp Ribu )
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pak_pbj[0]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 persiapan-RP"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Persiapan Terkontrak (Rp Ribu )
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pak_pbj[1]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 proses-RP"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Proses Lelang (Rp Ribu )
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pak_pbj[2]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 belum-RP" style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Belum Lelang (Rp Ribu )
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pak_pbj[3]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-2 gagal-RP" style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Gagal Lelang (Rp Ribu )
                                                                    </h5>
                                                                    <p class="card-text">
                                                                        {!! number_format($pak_pbj[4]) !!}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </section>
                        {{-- Zoma Integritas --}}
                        <section id="div3" class="targetDiv" style="display: none;">
                            <div class="container-fluid" style="min-height: 10vh; width: 80%">
                                <h3 class="text-center">Zona Integritas {{ date('Y') }}</h3>
                                <h5 class="text-center" style="font-size: 14px" id="status_dataZI"></h5>
                            </div>
                            <div class="container mt-1" style="width: 100%; height: auto">
                                <div class="container align-content-center"
                                    style="height:60vh; max-height: 60vh; flex: auto;">
                                    <canvas id="chartZILine"></canvas>
                                </div>
                            </div>
                        </section>
                        {{-- Pengaduan --}}
                        <section id="div4" class="targetDiv" style="display: none;">
                            <div class="container-fluid" style="min-height: 10vh; width: 80%">
                                <h3 class="text-center">Pengaduan {{ date('Y') }}</h3>
                                <h5 class="text-center" style="font-size: 14px" id="status_dataPeng"></h5>
                            </div>
                            <div class="container mt-1" style="width: 100%; height: auto">
                                <div class="swiper pengaduanheader" style="height:60vh;">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="container align-content-start">
                                                <canvas id="chartPengaduanTahun" width="0" height="0"
                                                    style="display: block; box-sizing: border-box; height: 0px; width: 0px;"></canvas>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="row">
                                                <h5 class=" text-center title-chart">Jumlah Pengaduan Berdasarkan
                                                    Kategori
                                                </h5>
                                                <div class="col-8 align-content-center">
                                                    <div class="container p-3"
                                                        style="position: relative; flex: auto;">
                                                        <canvas id="chartPengaduanKategori"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="card kategori-korupsi mb-3"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Korupsi : 24
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card mb-3 kategori-kolusi persiapan-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Kolusi :11
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card mb-3 kategori-wewenang proses-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Penyalahgunaan Wewenang : 34
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card mb-3 kategori-kt-pp belum-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        KT PP : 21
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card mb-3 kategori-penyimpangan gagal-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Penyimpangan PBJ : 50
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card mb-3 kategori-pelaksanaan gagal-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Pelaksanaan Pekerjaan : 102
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card mb-3 kategori-penipuan gagal-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Penipuan Kontrak : 9
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card mb-3 kategori-lainnya gagal-PKT"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        Lainnya : 40
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="row">
                                                <h5 class=" text-center title-chart">Jumlah Simpulan Telaah</h5>
                                                <div class="col-8 align-content-center">
                                                    <div class="container p-3"
                                                        style="position: relative; flex: auto;">
                                                        <canvas id="chartPengaduanTelaah"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card telaah-terbukti mb-3"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title text-light">
                                                                        Terbukti : 44
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="card mb-3 telaah-tdk-terbukti"
                                                                style="max-width: 18rem;">
                                                                <div class="card-body">
                                                                    <h5 class="card-title text-light">
                                                                        Tidak Terbukti : 216
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="container align-content-start" style="flex: auto;">
                                                <canvas id="chartPengaduanBBWS"></canvas>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="container align-content-start" style="flex: auto;">
                                                <canvas id="chartPengaduanDirPembina"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </section>
                        {{-- SOP --}}
                        <section id="div5" class="targetDiv" style="display: none;">
                            <div class="container-fluid" style="min-height: 10vh; width: 80%">
                                <h3 class="text-center">SOP {{ date('Y') }}</h3>
                                <h5 class="text-center" style="font-size: 14px" id="status_dataPeng1">
                            </div>
                            <div class="container mt-1" style="width: 100%; height: auto">
                                <div class="swiper sopheader" style="height:60vh;">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a href="{{ Route('SOP') }}">
                                                <img class="d-block img-fluid"
                                                    src="{{ asset('storage/dashboard/Library_SOP.jpeg') }}"
                                                    alt="First slide" style="width: 100%; height: 90%">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <canvas id="chartSOP"></canvas>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-12">
                        <div class="container overflow-auto ms-auto d-flex mx-3" style="width: 100%; ">
                            <a target="1"
                                class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                                style="height: 7vh; cursor: pointer; border: 2px solid black"><span>Manajemen
                                    Risiko</span>
                            </a>
                            <a target="2"
                                class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                                style="height: 7vh; cursor: pointer; border: 2px solid black"><span>PBJ</span>
                            </a>
                            <a target="3"
                                class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                                style="height: 7vh; cursor: pointer; border: 2px solid black"><span>Zona
                                    Integritas</span>
                            </a>
                            <a target="4"
                                class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                                style="height: 7vh; cursor: pointer; border: 2px solid black"><span>Pengaduan</span>
                            </a>
                            <a target="5"
                                class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                                style="height: 7vh; cursor: pointer; border: 2px solid black"><span>SOP</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    {{-- Berita Terupdate --}}
                    <div class="col-md-12">
                        <div class="mb-2 ms-auto" style="height: 100%">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 p-2">
                                        <div class="d-flex container-fluid justify-content-between">
                                            <h3 class="d-inline align-self-center">Berita Terbaru</h3>
                                            <a href="" class="text-danger" style="text-decoration: none">
                                                <p class="d-inline align-self-center">Lihat Selengkapnya</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    @foreach ($news->sortByDesc('created_at')->take(2) as $key => $item)
                                        <style>

                                        </style>
                                        <div class="col">
                                            <div class="card border-0 ">
                                                @php
                                                    $thumbnailBerita = explode('|', $item->thumbnail);
                                                @endphp
                                                <a href="{{ url('/news/' . $item->slug) }}">
                                                    <img src="{{ url('storage/uploads/berita/' . $thumbnailBerita[0]) }}"
                                                        class="border-thumbnail card-img-top" alt="...">
                                                </a>
                                                <div class="card-body">
                                                    <a href="{{ url('/news/' . $item->slug) }}">
                                                        <h5 class="card-title">
                                                            <span class="text-dark d-inline-block text-truncate"
                                                                style="max-width: auto;">
                                                                {{ $item->subject }}
                                                            </span>
                                                        </h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Tutorial --}}
                    <div class="col-md-12">
                        <div class=" rounded-2 my-2 ms-auto" style="height: auto">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 p-2">
                                        <div class="d-flex container-fluid justify-content-between">
                                            <h3 class="d-inline align-self-center">Tutorial</h3>
                                            <a href="" class="text-danger" style="text-decoration: none">
                                                <p class="d-inline align-self-center">Lihat Selengkapnya</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper tutorialheader">
                                <div class="swiper-wrapper ">
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/s5FpVxJy7xo" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/m9dmo13oznc" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/QxHI1Qx_pis" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/AqE2MMjkrE0" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/znfswNMQJEI" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/GEOOFKNyF0U" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/arOmjd_HJAA" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/fSKWum8wDSQ" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe class="rounded-3 rounded"
                                                src="https://www.youtube.com/embed/xYCEQf8ettY" frameborder="0"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- contoh Ketiga --}}
{{-- <div class="swiper headerSwiper">
    <div class="swiper-wrapper">
        <style>
            .size-background {
                width: 100%;
                height: 90vh;
            }
        </style>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-1.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-2.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-3.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-4.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-5.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-6.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-7.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-8.jpg" />
        </div>
        <div class="swiper-slide">
            <img class="size-background" src="https://swiperjs.com/demos/images/nature-9.jpg" />
        </div>
    </div>
</div> --}}

{{-- Contoh Keempat --}}
{{-- <div class="container-fluid">
    <div class="row pt-3 px-2 ">
        <div class="col-md-8">
            <div class="bg-secondary border border-2 rounded-2 ms-auto" style="min-height: 80vh">
                <div class="container-fluid"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="container bg-secondary" style="height: 10vh"></div>
            <div class="mb-2 border ms-auto d-inline-flex " style="max-height: 70vh">
                <ul class="list-group overflow-auto ">
                    <li class="list-group-item border-0 ">
                        <a style="cursor: pointer">
                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural lead-in to additional content. This content is a little bit
                                                longer.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border-0 ">
                        <a style="cursor: pointer">
                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural lead-in to additional content. This content is a little bit
                                                longer.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border-0 ">
                        <a style="cursor: pointer">
                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural lead-in to additional content. This content is a little bit
                                                longer.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border-0 ">
                        <a style="cursor: pointer">
                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural lead-in to additional content. This content is a little bit
                                                longer.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border-0 ">
                        <a style="cursor: pointer">
                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural lead-in to additional content. This content is a little bit
                                                longer.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border-0 ">
                        <a style="cursor: pointer">
                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural lead-in to additional content. This content is a little bit
                                                longer.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item border-0 ">
                        <a style="cursor: pointer">
                            <div class="card border-0 mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural lead-in to additional content. This content is a little bit
                                                longer.
                                            </p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
