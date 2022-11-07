
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-info z-index-3">
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
</nav>

<nav class="navbar navbar-default sticky-top navbar-light bg-light shadow-md navbar-fixed-top navbar-expand-lg bg-gradient-white z-index-3 py-3 nav-pills nav-fill"
    id="myNavbar">
    <div class="container-fluid">
        <a href="<?php echo e(route('Welcome')); ?>" class="navbar-brand my-0 mr-md-auto">
            <img src="/img/login/logo_sikimr.png" class="navbar-brand img-fluid" alt="Responsive image"
                style="display: block; margin-top: 2px;"></a>
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation1" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-l ms-lg-12 ps-lg-5" id="navigation1">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                <li class="nav-item dropdown dropdown-hover mx-1 ms-lg-6">
                    <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center "
                        href="<?php echo e(route('Welcome')); ?>" style="font-weight: 500; font-size: 16px;">
                        Beranda
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center "
                        href="<?php echo e(Route('Berita')); ?>" style="font-weight: 500; font-size: 16px;">
                        Berita
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1 shift">
                    <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center "
                        href="<?php echo e(Route('Profil')); ?>" style="font-weight: 500; font-size: 16px;">
                        Profile
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1 shift">
                    <a class="nav-link text-dark ps-2 d-flex cursor-pointer align-items-center "
                        href="https://sda.pu.go.id/produk/view_produk/SE_Dirjen_SDA_tentang_Tata_Cara_Pemantauan_RPSDA_WS_Kewenangan_Pusat"
                        target="_blank" style="font-weight: 500; font-size: 16px;">
                        Hukum
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1 shift">
                    <a class="nav-link ps-2 text-dark d-flex cursor-pointer align-items-center "
                        href="<?php echo e(Route('SOP')); ?>" style="font-weight: 500; font-size: 16px;">
                        SOP
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="cursor-pointer btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0"
                        href="<?php echo e(Route('Tutorial')); ?>" style="font-weight: 500; font-size: 16px;">Tutorial</a>
                </li>
                <li class="nav-item dropdown dropdown-hover mx-1">
                    <a class="cursor-pointer btn btn-sm bg-gradient-info mb-0 me-1 mt-2 mt-md-0"
                        href="<?php echo e(url('/login')); ?>" style="font-weight: 500; font-size: 16px;">Aplikasi</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<header>
    <?php if(\Route::currentRouteName() == 'Welcome'): ?>
        <div class="container-fluid justify-content-center " style="white-space: normal; height: 82vh; ">
            <div class="row">
                
                <div class="col-md-8">
                    
                    <div id="div1" class="targetDiv" style="display:block;">
                        <section class="my-4" id="menu1">
                            <div class="container">
                                <div class="page-header rounded min-vh-70">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 my-auto">
                                                <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                                    Laporan Manajemen Risiko <?php echo e(date('Y')); ?>

                                                </h4>
                                                <p class="text-center text-white" style="font-size: 14px"
                                                    id="status_dataMR">
                                                </p>
                                            </div>
                                            <div class="col-12 flexbox">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered dark"
                                                                style="border: .5px solid black">
                                                                <thead>
                                                                    <tr style="border: .5px solid black"
                                                                        class="table-light">
                                                                        <th class="text-dark text-sm-center">Progress
                                                                        </th>
                                                                        <th class="text-dark text-sm-center"
                                                                            colspan="2">
                                                                            Komitmen MR</th>
                                                                        <th class="text-dark text-sm-center"
                                                                            colspan="2">
                                                                            T1</th>
                                                                        <th class="text-dark text-sm-center"
                                                                            colspan="2">
                                                                            T2</th>
                                                                        <th class="text-dark text-sm-center"
                                                                            colspan="2">T3</th>
                                                                        <th class="text-dark text-sm-center"
                                                                            colspan="2">T4</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr style="border: .5px solid black"
                                                                        class="table-danger">
                                                                        <th class="text-dark text-sm-center">Belum</th>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($kom_d + $kom_v); ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($kom_d + $kom_v)) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t1_d + $t1_v); ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t1_d + $t1_v)) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t2_d + $t2_v); ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t2_d + $t2_v)) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t3_d + $t3_v); ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t3_d + $t3_v)) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t4_d + $t4_v); ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t4_d + $t4_v)) / 293) * 100) . '%'; ?></td>
                                                                    </tr>
                                                                    <tr style="border: .5px solid black"
                                                                        class="table-warning">
                                                                        <th class="text-dark text-sm-center">Draft</th>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $kom_d; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($kom_d / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t1_d; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t1_d / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t2_d; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t2_d / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t3_d; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t3_d / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t4_d; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t4_d / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border: .5px solid black"
                                                                        class="table-info">
                                                                        <th class="text-dark text-sm-center">Verifikasi
                                                                        </th>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $kom_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($kom_v / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t1_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t1_v / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t2_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t2_v / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t3_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t3_v / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo $t4_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(($t4_v / 293) * 100) . '%'; ?>

                                                                        </td>
                                                                    </tr>
                                                                    <tr style="border: .5px solid black"
                                                                        class="table-success">
                                                                        <th class="text-dark text-sm-center">Total</th>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($kom_d + $kom_v) + $kom_v + $kom_d; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($kom_d + $kom_v) + $kom_d + $kom_v) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t1_d + $t1_v) + $t1_d + $t1_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t1_d + $t1_v) + $t1_d + $t1_v) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t2_d + $t2_v) + $t2_d + $t2_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t2_d + $t2_v) + $t2_d + $t2_v) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t3_d + $t3_v) + $t3_d + $t3_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t3_d + $t3_v) + $t3_d + $t3_v) / 293) * 100) . '%'; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo 293 - ($t4_d + $t4_v) + $t4_d + $t4_v; ?></td>
                                                                        <td class="text-dark text-sm-center">
                                                                            <?php echo round(((293 - ($t4_d + $t4_v) + $t4_d + $t4_v) / 293) * 100) . '%'; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                    
                    <div id="div2" class="targetDiv" style="display:none;">
                        <section class="my-4" id="menu2">
                            <div class="container">
                                <div class="page-header rounded min-vh-70">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 my-auto">
                                                <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                                    Laporan Pengadaan Barang dan Jasa <?php echo e(date('Y')); ?>

                                                </h4>
                                                <p class="text-center text-white" style="font-size: 14px"
                                                    id="status_dataPBJ">
                                                </p>
                                            </div>
                                            <div class="swiper pengadaanSwiper">
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper">
                                                    
                                                    <div class="swiper-slide">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Status Kumulatif Lelang</h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="chartbox justify-content-center">
                                                                <canvas id="chartPBJKumulatif"
                                                                    class="d-block img-fluid"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="swiper-slide">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Status Kumulatif Kontraktual
                                                                Rupiah
                                                            </h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="chartbox text-center">
                                                                        <canvas id="chartPBJKontraktualRP"
                                                                            class="d-block img-fluid"></canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="container">
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color:rgb(111, 255, 92)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Terkontrak : <?php echo number_format($pag_pbj[0]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(169, 120, 255)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Persiapan Terkontrak :
                                                                                <?php echo number_format($pag_pbj[1]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(255, 255, 0)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Proses Lelang :
                                                                                <?php echo number_format($pag_pbj[2]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(217, 102, 106)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Belum Lelang :
                                                                                <?php echo number_format($pag_pbj[3]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(255, 255, 255)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Gagal Lelang :
                                                                                <?php echo number_format($pag_pbj[4]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="swiper-slide">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Status Kumulatif Kontraktual Paket
                                                            </h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="chartbox text-center">
                                                                        <canvas id="chartPBJKontraktualPKT"
                                                                            class="d-block img-fluid"></canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="container">
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color:rgb(111, 255, 92)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Terkontrak : <?php echo number_format($pak_pbj[0]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(169, 120, 255)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Persiapan Terkontrak :
                                                                                <?php echo number_format($pak_pbj[1]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(255, 255, 0)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Proses Lelang :
                                                                                <?php echo number_format($pak_pbj[2]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(217, 102, 106)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Belum Lelang :
                                                                                <?php echo number_format($pak_pbj[3]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                        <div class="m-4"
                                                                            style=" font-weight: bold; color: rgb(255, 255, 255)">
                                                                            <i class="fa fa-circle mr-5"
                                                                                aria-hidden="true"></i>
                                                                            <span>Gagal Lelang :
                                                                                <?php echo number_format($pak_pbj[4]); ?>

                                                                                
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- If we need navigation buttons -->
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div id="div3" class="targetDiv" style="display:none;">
                        <section class="my-4" id="menu3">
                            <div class="container">
                                <div class="page-header rounded min-vh-70">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 my-auto">
                                                <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                                    Laporan Zona Integritas <?php echo e(date('Y')); ?>

                                                </h4>
                                                <p class="text-center text-white" style="font-size: 14px"
                                                    id="status_dataZI">
                                                </p>
                                            </div>
                                            <div class="col-12 flexbox">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col">
                                                            <canvas id="chartZILine"
                                                                class="d-block img-fluid"></canvas>
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
                    
                    <div id="div4" class="targetDiv" style="display:none;">
                        <section class="my-4" id="menu4">
                            <div class="container">
                                <div class="page-header rounded min-vh-70 max-height-vh-70">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 my-auto">
                                                <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                                    Laporan Zona Pengaduan <?php echo e(date('Y')); ?>

                                                </h4>
                                                <p class="text-center text-white" style="font-size: 14px"
                                                    id="status_dataPeng1">
                                                </p>
                                            </div>
                                            <div class="swiper pengaduanSwiper">
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper">
                                                    
                                                    <div class="swiper-slide justify-content-center">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Jumlah Pengaduan Tahunan</h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="chartbox justify-content-center">
                                                                <canvas id="chartPengaduanTahun"
                                                                    class="d-block img-fluid"
                                                                    style="align-items: center"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="swiper-slide justify-content-center">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Pengaduan Berdasarkan Kategori
                                                            </h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="chartbox text-center">
                                                                        <canvas id="chartPengaduanKategori"
                                                                            class="d-block img-fluid"></canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color: rgb(0, 120, 170);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Korupsi : 24 </span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color: rgb(252, 153, 24);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Kolusi : 11</span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color: rgb(209, 209, 209);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Penyalahgunaan wewenang :
                                                                                    34</span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color: rgb(239, 211, 69);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>KTPP : 21</span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color: rgb(58, 180, 242);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Penyimpangan PBJ : 50</span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color: rgb(133, 200, 138);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Pelaksanaan Pekerjaan : 102</span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color : rgb(255, 180, 242);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Penipuan Kontrak : 9</span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color : rgb(162, 123, 92);">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Lainnya : 40</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="swiper-slide justify-content-center">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Pengaduan Berdasarkan Kategori
                                                            </h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="chartbox text-center">
                                                                        <canvas id="chartPengaduanTelaah"
                                                                            class="d-block img-fluid"></canvas>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color:rgb(0, 120, 170)">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span>Tidak Terbukti : 216</span>
                                                                            </div>
                                                                            <div class="m-2"
                                                                                style=" font-weight: bold; color:rgb(252, 153, 24)">
                                                                                <i class="fa fa-circle mr-5"
                                                                                    aria-hidden="true"></i>
                                                                                <span> Terbukti : 44</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="swiper-slide justify-content-center">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Jumlah Pengaduan Per BBWS/BWS</h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="chartbox justify-content-center">
                                                                <canvas id="chartPengaduanBBWS"
                                                                    class="d-block img-fluid"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="swiper-slide justify-content-center">
                                                        <div class="text-white text-center"
                                                            style=" font-weight: bold">
                                                            <h5 style="color: white">Persentase Pengaduan Per
                                                                Direktorat Pembina</h5>
                                                        </div>
                                                        <div class="container">
                                                            <div class="chartbox justify-content-center">
                                                                <canvas id="chartPengaduanDirPembina"
                                                                    class="d-block img-fluid"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- If we need navigation buttons -->
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div id="div5" class="targetDiv" style="display:none;">
                        <section class="my-4" id="menu5">
                            <div class="container">
                                <div class="page-header rounded min-vh-70">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 my-auto">
                                                <h4 class="text-white m-2 mb-2 fadeIn1 fadeInBottom text-center">
                                                    Laporan SOP <?php echo e(date('Y')); ?>

                                                </h4>
                                                <p class="text-center text-white" style="font-size: 14px"
                                                    id="status_dataSop">
                                                </p>
                                            </div>
                                            <div class="col-md-12 flexbox">
                                                <div class="container">
                                                    <div class="row ">
                                                        <div class="col-md-6">
                                                            <a href="<?php echo e(Route('SOP')); ?>">
                                                                <img class="w-100 h-100 d-block img-fluid"
                                                                    src="<?php echo e(asset('storage/dashboard/Library_SOP.jpeg')); ?>"
                                                                    alt="First slide" style="max-height: 400px">
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <canvas id="chartSOP"
                                                                class="w-100 h-100 d-block img-fluid"></canvas>
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
                    
                    <div class="container">
                        <a class="showSingle btn btn-dark" target="1">Manajemen
                            Risiko</a>
                        <a class="showSingle btn btn-dark" target="2">Pengadaan Barang dan Jasa</a>
                        <a class="showSingle btn btn-dark" target="3">Zona Integritas</a>
                        <a class="showSingle btn btn-dark" target="4">Pengaduan</a>
                        <a class="showSingle btn btn-dark" target="5">SOP</a>
                    </div>
                </div>
                
                <div class="col-md-4">
                    
                    <section>
                        <div class="container">
                            <div class="row my-3">
                                <div class="col-md-6 text-right">
                                    <h2 class="fade-in-left">Berita</h2>
                                </div>
                                <div class="col-md-6 mx-auto text-end">
                                    <a href="<?php echo e(route('Berita')); ?>" class="text-primary icon-move-right">lihat
                                        selengkapnya<i class="fas fa-arrow-right text-sm ms-1"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <?php $__currentLoopData = $news->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6 <?php echo e($key == 0 ? '' : ''); ?>">
                                        <div class="card card-plain">
                                            <?php
                                                $thumbnailBerita = explode('|', $item->thumbnail);
                                            ?>
                                            <div class="card-header p-0 position-relative" data-aos="fade-left">
                                                <div class="geeks">
                                                    <a class="d-block blur-shadow-image"
                                                        href="<?php echo e(url('/news/' . $item->slug)); ?>">
                                                        <img src="<?php echo e(url('storage/uploads/berita/' . $thumbnailBerita[0])); ?>"
                                                            alt="img-blur-shadow" class="  img img-thumbnail"
                                                            loading="lazy"
                                                            style="width: 100%; height: 8vw; object-fit: cover;">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-body px-0" data-aos="fade-left">
                                                <h5 style="min-height: 55px; max-height: 60px; font-size: 15px">
                                                    <a href="<?php echo e(url('/news/' . $item->slug)); ?>"
                                                        class="text-dark font-weight-bold"><?php echo e($item->subject); ?></a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </section>
                    
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 text-right">
                                    <h2 class="fade-in-left">Tutorial</h2>
                                </div>
                                <div class="col-md-6 mx-auto mb-5 text-end">
                                    <a href="<?php echo e(route('Tutorial')); ?>" class="text-primary icon-move-right">lihat
                                        selengkapnya<i class="fas fa-arrow-right text-sm ms-1"></i></a>
                                </div>
                            </div>
                            <div class="swiper tutorialSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe src="https://www.youtube.com/embed/s5FpVxJy7xo" frameborder="0"
                                                class="bd-placeholder-img card-img-top" width="100%"
                                                height="225"></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">
                                                    Pembangunan Zona Integritas pada area Manajemen Perubahan
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe src="https://www.youtube.com/embed/m9dmo13oznc" frameborder="0"
                                                class="bd-placeholder-img card-img-top" width="100%"
                                                height="225"></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">
                                                    Pembangunan Zona Integritas pada area Pelayanan Publik
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe src="https://www.youtube.com/embed/QxHI1Qx_pis" frameborder="0"
                                                class="bd-placeholder-img card-img-top" width="100%"
                                                height="225"></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">
                                                    Pembangunan Zona Integritas pada area Penataan Manajemen SDM
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe class="bd-placeholder-img card-img-top"
                                                src="https://www.youtube.com/embed/AqE2MMjkrE0" frameborder="0"
                                                width="100%" height="225" allowfullscreen></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">Pembangunan Zona
                                                    Integritas Area Penataan
                                                    Tatalaksana</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe class="bd-placeholder-img card-img-top"
                                                src="https://www.youtube.com/embed/znfswNMQJEI" frameborder="0"
                                                width="100%" height="225" allowfullscreen></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">Pembangunan
                                                    Zona Integritas Area Penguatan
                                                    Pengawasan.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe class="bd-placeholder-img card-img-top"
                                                src="https://www.youtube.com/embed/GEOOFKNyF0U" frameborder="0"
                                                width="100%" height="225" allowfullscreen></iframe>

                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">Pembangunan
                                                    Zona Integritas Area Penguatan
                                                    Akuntabilitas Kinerja.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe class="bd-placeholder-img card-img-top"
                                                src="https://www.youtube.com/embed/arOmjd_HJAA" frameborder="0"
                                                width="100%" height="225" allowfullscreen></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">Pengendalian
                                                    Internal dan Manajemen
                                                    Risiko
                                                    di
                                                    Ditjen SDA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe class="bd-placeholder-img card-img-top"
                                                src="https://www.youtube.com/embed/fSKWum8wDSQ" frameborder="0"
                                                width="100%" height="225" allowfullscreen></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">Panduan
                                                    Penggunaan Aplikasi SI KIMR</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm">
                                            <iframe class="bd-placeholder-img card-img-top"
                                                src="https://www.youtube.com/embed/xYCEQf8ettY" frameborder="0"
                                                width="100%" height="225" allowfullscreen></iframe>
                                            <div class="card-body">
                                                <p class="card-text text-dark"
                                                    style="font-size: 16px; font-weight: 400">Pelaporan
                                                    Penerapan Manajemen Risiko</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    <?php endif; ?>
</header>
<?php /**PATH D:\Codes\Programs\github reza\projek-sikimr\resources\views/Home/components/home/head.blade.php ENDPATH**/ ?>