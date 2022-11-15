
<!-- <div class="container-fluid">
    <div class="row pt-3 px-2 ">
        
        <div class="col-md-8">
            <div class="bg-secondary border border-2 rounded-2 ms-auto" style="min-height: 80vh">
                <div class="container-fluid"></div>
            </div>
        </div>
        
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


<div class="container-fluid">
    <div class="row pt-3 px-2">
        <div class="col-md-8">
            <div class=" ms-auto" style="min-height: 80vh;">
                
                <section id="div1" class="targetDiv" style="display: block">
                    <div class="container-fluid" style="min-height: 10vh; width: 80%">
                        <h3 class="text-center">Manajemen Risiko</h3>
                        <h5 class="text-center" style="font-size: 14px" id="status_dataMR""></h5>
                    </div>
                    <div class="container mt-1" style="width: 100%">
                        <div class="table-responsive">
                            <table class="table table-bordered dark"
                                style="border: 2px solid black; width: 100%; height:60vh">
                                <thead>
                                    <tr style="border: .5px solid black" class="table-light">
                                        <th class="text-dark text-sm-center align-middle font-table-head"
                                            style="border: 1px solid black;">
                                            Progress
                                        </th>
                                        <th class="text-dark text-sm-center align-middle font-table-head" colspan="2"
                                            style="border: 1px solid black;">
                                            Komitmen MR</th>
                                        <th class="text-dark text-sm-center align-middle font-table-head" colspan="2"
                                            style="border: 1px solid black;">
                                            T1</th>
                                        <th class="text-dark text-sm-center align-middle font-table-head" colspan="2"
                                            style="border: 1px solid black;">
                                            T2</th>
                                        <th class="text-dark text-sm-center align-middle font-table-head" colspan="2"
                                            style="border: 1px solid black;">T3</th>
                                        <th class="text-dark text-sm-center align-middle font-table-head" colspan="2"
                                            style="border: 1px solid black;">T4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border: .5px solid black" class="table-danger ">
                                        <th class="text-dark text-sm-center align-middle font-table-head">Belum
                                        </th>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo 293 - ($kom_d + $kom_v); ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(((293 - ($kom_d + $kom_v)) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo 293 - ($t1_d + $t1_v); ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(((293 - ($t1_d + $t1_v)) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo 293 - ($t2_d + $t2_v); ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(((293 - ($t2_d + $t2_v)) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo 293 - ($t3_d + $t3_v); ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(((293 - ($t3_d + $t3_v)) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo 293 - ($t4_d + $t4_v); ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(((293 - ($t4_d + $t4_v)) / 293) * 100) . '%'; ?></td>
                                    </tr>
                                    <tr style="border: .5px solid black" class="table-warning">
                                        <th class="text-dark text-sm-center align-middle font-table-head">Draft
                                        </th>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $kom_d; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($kom_d / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t1_d; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t1_d / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t2_d; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t2_d / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t3_d; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t3_d / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t4_d; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t4_d / 293) * 100) . '%'; ?>

                                        </td>
                                    </tr>
                                    <tr style="border: .5px solid black" class="table-info">
                                        <th class="text-dark text-sm-center align-middle font-table-head">
                                            Verifikasi
                                        </th>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $kom_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($kom_v / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t1_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t1_v / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t2_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t2_v / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t3_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t3_v / 293) * 100) . '%'; ?>

                                        </td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo $t4_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table">
                                            <?php echo round(($t4_v / 293) * 100) . '%'; ?>

                                        </td>
                                    </tr>
                                    <tr style="border: .5px solid black" class="table-success">
                                        <th class="text-dark text-sm-center align-middle font-table-head">Total
                                        </th>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo 293 - ($kom_d + $kom_v) + $kom_v + $kom_d; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo round(((293 - ($kom_d + $kom_v) + $kom_d + $kom_v) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo 293 - ($t1_d + $t1_v) + $t1_d + $t1_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo round(((293 - ($t1_d + $t1_v) + $t1_d + $t1_v) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo 293 - ($t2_d + $t2_v) + $t2_d + $t2_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo round(((293 - ($t2_d + $t2_v) + $t2_d + $t2_v) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo 293 - ($t3_d + $t3_v) + $t3_d + $t3_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo round(((293 - ($t3_d + $t3_v) + $t3_d + $t3_v) / 293) * 100) . '%'; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo 293 - ($t4_d + $t4_v) + $t4_d + $t4_v; ?></td>
                                        <td class="text-dark text-sm-center align-middle font-table"
                                            style="border: 1px solid black">
                                            <?php echo round(((293 - ($t4_d + $t4_v) + $t4_d + $t4_v) / 293) * 100) . '%'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                
                <section id="div2" class="targetDiv" style="display: none">
                    <div class="container-fluid" style="min-height: 10vh; width: 80%">
                        <h3 class="text-center">Pengadaan Barang dan Jasa</h3>
                        <h5 class="text-center" style="font-size: 14px" id="status_dataPBJ"></h5>
                    </div>
                    <div class="container mt-1" style="min-height: 58vh; width: 100%">
                        
                    </div>
                </section>
                
                <section id="div3" class="targetDiv" style="display: none">
                    <div class="container-fluid" style="min-height: 10vh; width: 80%">
                        <h3 class="text-center">Zona Integritas</h3>
                        <h5 class="text-center" style="font-size: 14px" id="status_dataZI"></h5>
                    </div>
                    <div class="container mt-1" style="min-height: 58vh; width: 100%">
                        
                    </div>
                </section>
                
                <section id="div4" class="targetDiv" style="display: none">
                    <div class="container-fluid" style="min-height: 10vh; width: 80%">
                        <h3 class="text-center">Pengaduan</h3>
                        <h5 class="text-center" style="font-size: 14px" id="status_dataPeng"></h5>
                    </div>
                    <div class="container mt-1" style="min-height: 58vh; width: 100%">
                        
                    </div>
                </section>
                
                <section id="div5" class="targetDiv" style="display: none">
                    <div class="container-fluid" style="min-height: 10vh; width: 80%">
                        <h3 class="text-center">SOP</h3>
                        <h5 class="text-center" style="font-size: 14px" id="status_dataPeng1"></h5>
                    </div>
                    <div class="container mt-1" style="min-height: 58vh; width: 100%">
                        
                    </div>
                </section>
                
                <div class="container overflow-auto ms-auto d-flex mx-3" style="width: 100%; ">
                    <a target="1"
                        class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                        style="height: 7vh; cursor: pointer; border: 2px solid black"><span>Manajemen Risiko</span>
                    </a>
                    <a target="2"
                        class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                        style="height: 7vh; cursor: pointer; border: 2px solid black"><span>PBJ</span>
                    </a>
                    <a target="3"
                        class="showSingle container d-flex justify-content-center align-items-center rounded rounded-3 mx-2 text-decoration-none"
                        style="height: 7vh; cursor: pointer; border: 2px solid black"><span>Zona Integritas</span>
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
        <div class="col-md-4">
            
            <div class="mb-2 ms-auto" style="min-height: 40vh">
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
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body" style="max-height: 200px;">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <div class="card">
                                <img src="..." style="min-height: 120px" class="card-img bg-secondary"
                                    alt="...">
                                <div class="card-body" style="max-height: 200px;">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class=" rounded-2 my-2 ms-auto" style="min-height: 36vh">
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
                <div class="swiper tutorialheaderSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="card my-3 d-flex align-items-center text-bg-dark">
                                    <img src="..." style="height: 290px; background-size: contain"
                                        class="card-img" alt="...">
                                    <div class="card-img-overlay align-items-center">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in
                                            to
                                            additional content. This content is a little bit longer.</p>
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





<!-- <div class="container-fluid">
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
</div> -->
<?php /**PATH D:\Codes\Programs\github reza\projek-sikimr\resources\views/Home/components/head.blade.php ENDPATH**/ ?>