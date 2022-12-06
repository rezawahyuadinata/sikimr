<?php $__env->startSection('section'); ?>
    
    <div class="container-fluid">
        <section class="my-5 rounded-2 border-2" style="width:100%; height: auto">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between" style="border-left: 5px solid blue; background">
                    <h3 class="d-inline align-self-center">Berita</h3>
                    <a href="" class="d-inline align-self-center text-danger" style="text-decoration: none;">Lihat
                        Selengkapnya
                    </a>
                </div>
            </div>
            <div class="container py-2">
                <div class="swiper berita-home-Swiper">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $category_berita->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <?php
                                    $thumbnailBerita = explode('|', $item->thumbnail);
                                    $orgDate = $item->created_at;
                                    $newDate = date('d-m-Y', strtotime($orgDate));
                                    $subjectTgl = substr($newDate, 0, 11);
                                ?>
                                <div class="position-relative mb-3">
                                    <a href="<?php echo e(url('/news/' . $item->slug)); ?>">
                                        <img class="img-fluid w-100 zoom-effect"
                                            src="<?php echo e(url('storage/uploads/berita/' . $thumbnailBerita[0])); ?>" alt="">
                                    </a>
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <span class="badge text-bg-primary font-weight-normal p-2 mr-4"
                                                style="text-decoration: none;"><?php echo e(!$item->category ? '-' : $item->name); ?></span>
                                            <span class="text-body text-decoration-none ml-3"><small
                                                    style="color: black; font-weight: 500;"><?php echo e($subjectTgl); ?></small></span>
                                        </div>
                                        <a class="h5 d-block mb-3 text-decoration-none text-secondary text-uppercase text-dark font-weight-bold"
                                            style="--garis-clamp: 2" href="<?php echo e(url('/news/' . $item->slug)); ?>">
                                            <p class="truncate-title-berita"><?php echo e($item->subject); ?></p>
                                        </a>
                                        <div class="truncate-body-berita">
                                            <script>
                                                $("p").replaceWith("<?php echo e($item->description); ?>");
                                            </script>
                                            <span style="--garis-clamp:5"
                                                class="removeParent"><?php echo $item->description; ?></span>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex
                                        justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3">
                                                <a class="text-decoration-none" href="<?php echo e(url('/news/' . $item->slug)); ?>">
                                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                                    Lihat Selengkapnya </a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="container-fluid">
        <section class="my-5 rounded-2 border-2" style="width:100%;">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between" style="border-left: 5px solid blue; background">
                    <h3 class="d-inline align-self-center">Profil KI & MR</h3>
                    <a href="" class="d-inline align-self-center text-danger" style="text-decoration: none;">Lihat
                        Selengkapnya
                    </a>
                </div>
            </div>
            <div class="container py-2">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../../storage/app/public/template/Profil-1.jpg" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-2">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="..." class="img-fluid rounded-start" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="container-fluid">
        <section class="my-5 rounded-2 border-2" style="width:100%; height: auto">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between" style="border-left: 5px solid blue; background">
                    <h3 class="d-inline align-self-center">Dasar Pembentukan Hukum</h3>
                </div>
            </div>
            <div class="container py-2">
                <div class="container bg-secondary" style="height: 100px">

                </div>
            </div>
            <div class="container py-2">
                <div class="row">
                    <div class="col-md-8">
                        <div class="container">
                            
                            <div class="row my-3">
                                <div class="col-md-2 mx-2 bg-secondary" style=" height: 100px;">
                                    <span><i class=""></i></span>
                                </div>
                                <div class="col-md-9 bg-secondary" style=" height: 100px;">
                                    <h4></h4>
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col-md-2 mx-2 bg-secondary" style=" height: 100px;">
                                    <span><i class=""></i></span>
                                </div>
                                <div class="col-md-9 bg-secondary" style=" height: 100px;">
                                    <h4></h4>
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col-md-2 mx-2 bg-secondary" style=" height: 100px;">
                                    <span><i class=""></i></span>
                                </div>
                                <div class="col-md-9 bg-secondary" style=" height: 100px;">
                                    <h4></h4>
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col-md-2 mx-2 bg-secondary" style=" height: 100px;">
                                    <span><i class=""></i></span>
                                </div>
                                <div class="col-md-9 bg-secondary" style=" height: 100px;">
                                    <h4></h4>
                                </div>
                            </div>
                            
                            <div class="row my-3">
                                <div class="col-md-2 mx-2 bg-secondary" style=" height: 100px;">
                                    <span><i class=""></i></span>
                                </div>
                                <div class="col-md-9 bg-secondary" style=" height: 100px;">
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <embed src="file_name.pdf" width="auto" height="200px" />
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="container-fluid">
        <section class="my-5 rounded-2 border-2" style="width:100%;">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between"
                    style="border-left: 5px solid blue; background">
                    <h3 class="d-inline align-self-center">Galeri KI & MR</h3>
                    <a href="" class="d-inline align-self-center text-danger" style="text-decoration: none;">Lihat
                        Selengkapnya
                    </a>
                </div>
            </div>
            <div class="container py-2">
                <div class="row justify-content-center">
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-2 bg-secondary rounded rounded-3 my-3 mx-3" style="height: 200px">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <div class="container-fluid">
        <section class="my-5 rounded-2 border-2" style="width:100%;">
            <div class="container mb-3">
                <div class="d-flex container-fluid justify-content-between"
                    style="border-left: 5px solid blue; background">
                    <h3 class="d-inline align-self-center">FAQ</h3>
                </div>
            </div>
            <div class="container py-2">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accordionMR">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordion-collapseMR" aria-expanded="false"
                                aria-controls="accordion-collapseMR">
                                <strong>Manajemen Risiko</strong>
                            </button>
                        </h2>
                        
                        <div id="accordion-collapseMR" class="accordion-collapse collapse" aria-labelledby="accordionMR"
                            data-bs-parent="#accordionFlushExample">
                            
                            <div class="accordion-body">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelOpen-headingMR1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelOpen-CollapseMR1" aria-expanded="false"
                                                aria-controls="panelOpen-CollapseMR1">
                                                <strong>Apa tujuan penerapan Penilaian Risiko?</strong>
                                            </button>
                                        </h2>
                                        <div id="panelOpen-CollapseMR1" class="accordion-collapse collapse"
                                            aria-labelledby="panelOpen-headingMR1">
                                            <div class="accordion-body">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelOpen-headingMR2">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelOpen-CollapseMR2" aria-expanded="false"
                                                aria-controls="panelOpen-CollapseMR2">
                                                <strong>Apa manfaat dari penerapan Penilaian Risiko?</strong>
                                            </button>
                                        </h2>
                                        <div id="panelOpen-CollapseMR2" class="accordion-collapse collapse"
                                            aria-labelledby="panelOpen-headingMR2">
                                            <div class="accordion-body">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelOpen-headingMR3">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelOpen-CollapseMR3" aria-expanded="false"
                                                aria-controls="panelOpen-CollapseMR3">
                                                <strong>Apa yang dimaksud dengan risiko?</strong>
                                            </button>
                                        </h2>
                                        <div id="panelOpen-CollapseMR3" class="accordion-collapse collapse"
                                            aria-labelledby="panelOpen-headingMR3">
                                            <div class="accordion-body">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelOpen-headingMR4">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelOpen-CollapseMR4" aria-expanded="false"
                                                aria-controls="panelOpen-CollapseMR4">
                                                <strong>Bagaimana cara melakukan Identifikasi Risiko?</strong>
                                            </button>
                                        </h2>
                                        <div id="panelOpen-CollapseMR4" class="accordion-collapse collapse"
                                            aria-labelledby="panelOpen-headingMR4">
                                            <div class="accordion-body">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelOpen-headingMR5">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelOpen-CollapseMR5" aria-expanded="false"
                                                aria-controls="panelOpen-CollapseMR5">
                                                <strong>Apa saja yang menjadi ruang lingkup penilaian
                                                    risiko</strong>
                                            </button>
                                        </h2>
                                        <div id="panelOpen-CollapseMR5" class="accordion-collapse collapse"
                                            aria-labelledby="panelOpen-headingMR4">
                                            <div class="accordion-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accordionSOP">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordion-collapseSOP" aria-expanded="false"
                                aria-controls="accordion-collapseSOP">
                                <strong>SOP</strong>
                            </button>
                        </h2>
                        
                        <div id="accordion-collapseSOP" class="accordion-collapse collapse"
                            aria-labelledby="accordionSOP" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                
                                <div class="accordion-body">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingSOP1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseSOP1" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseSOP1">
                                                    <strong>Apa yang dimaksud dengan SOP ?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseSOP1" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingSOP1">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingSOP2">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseSOP2" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseSOP2">
                                                    <strong>Apa tujuan SOP di bentuk ?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseSOP2" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingSOP2">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingSOP3">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseSOP3" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseSOP3">
                                                    <strong>Mengapa kita membutuhkan SOP ?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseSOP3" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingSOP3">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingSOP4">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseSOP4" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseSOP4">
                                                    <strong>Informasi apa yang di butuhkan dalam pembuatan SOP
                                                        ?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseSOP4" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingSOP4">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingSOP5">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseSOP5" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseSOP5">
                                                    <strong>Siapa yang berhak untuk merancang SOP ?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseSOP5" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingSOP5">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="accordionZI">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#accordion-collapseZI" aria-expanded="false"
                                aria-controls="accordion-collapseZI">
                                <strong>Zona Integritas</strong>
                            </button>
                        </h2>
                        
                        <div id="accordion-collapseZI" class="accordion-collapse collapse" aria-labelledby="accordionZI"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                
                                <div class="accordion-body">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingZI1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseZI1" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseZI1">
                                                    <strong>Apa yang dimaksud Zona Integritas ?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseZI1" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingZI1">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingZI2">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseZI2" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseZI2">
                                                    <strong>Apa tujuan Zona Integritas ?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseZI2" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingZI2">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingZI3">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseZI3" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseZI3">
                                                    <strong>Apa saja yang menjadi area perubahan dalam zona
                                                        integritas?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseZI3" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingZI3">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingZI4">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseZI4" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseZI4">
                                                    <strong>Apa tahapan dari pembangunan Zona integritas?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseZI4" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingZI4">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelOpen-headingZI5">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelOpen-CollapseZI5" aria-expanded="false"
                                                    aria-controls="panelOpen-CollapseZI5">
                                                    <strong>Bagaimana keberhasilan pembangunan Zona integritas
                                                        diukur?</strong>
                                                </button>
                                            </h2>
                                            <div id="panelOpen-CollapseZI5" class="accordion-collapse collapse"
                                                aria-labelledby="panelOpen-headingZI5">
                                                <div class="accordion-body">

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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-js'); ?>
    
    <script>
        /*Komitmen Manajemen Risiko*/
        $('#chartMRkomitmen').html(myChartMRkomitmen());

        function myChartMRkomitmen() {
            let myChart = document.getElementById('chartMRkomitmen').getContext('2d');

            var kom_v = "<?php echo $kom_v; ?>";
            var kom_d = "<?php echo $kom_d; ?>";
            var kom_b = "<?php echo 293 - ($kom_d + $kom_v); ?>";

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

            var t1_v = "<?php echo $t1_v; ?>";
            var t1_d = "<?php echo $t1_d; ?>";
            var t1_b = "<?php echo 293 - ($t1_d + $t1_v); ?>";

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

            var t2_v = "<?php echo $t2_v; ?>";
            var t2_d = "<?php echo $t2_d; ?>";
            var t2_b = "<?php echo 293 - ($t2_d + $t2_v); ?>";

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

            var t3_v = "<?php echo $t3_v; ?>";
            var t3_d = "<?php echo $t3_d; ?>";
            var t3_b = "<?php echo 293 - ($t3_d + $t3_v); ?>";

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

            var t4_v = "<?php echo $t4_v; ?>";
            var t4_d = "<?php echo $t4_d; ?>";
            var t4_b = "<?php echo 293 - ($t4_d + $t4_v); ?>";

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

    
    <script>
        // script chart kumulatif pengadaan barang dan jasa
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
                        data: [kontraktual, 1549, 1549, 1520, 1514, 1444],
                        fill: false,
                        backgroundColor: [
                            'rgb(254, 249, 167)',
                            'rgba(255, 159, 64)',
                            'rgba(255, 205, 86)',
                            'rgba(75, 192, 192)',
                            'rgba(54, 162, 235)',
                            'rgba(153, 102, 255)',
                            'rgba(201, 203, 207)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        datalabels: {
                            color: 'black',
                            align: 'center',
                            font: {
                                weight: 'bold',
                                size: 15,
                            },
                        },
                        title: {
                            display: true,
                            text: 'Kumulatif Pengadaan Barang dan Jasa',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
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
                                color: '#000000'
                            },
                            display: false,
                            position: 'top',
                            align: 'center'
                        },
                    },
                    scales: {
                        x: {
                            display: false,
                            grid: {
                                display: false,
                            },
                            ticks: {
                                color: 'black',
                            }
                        },
                        y: {
                            grid: {
                                display: false,
                            },
                            ticks: {
                                color: 'black',
                                font: {
                                    weight: 'bold',
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
            return chartPBJKumulatifCurrent;
        }

        //script status paket kontraktual pengadaan barang dan jasa
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
                            'rgb(243, 193, 84)',
                            'rgb(255, 255, 0)',
                            'rgb(148, 129, 255)',
                            'rgb(255, 86, 86)',
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Paket Kontraktual PBJ',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
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
                },
                plugins: [ChartDataLabels],
            });
            return chartPBJKontraktualPKT;
            chartPBJKontraktualPKT.render();
        }

        //script kontraktual rupiah
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
                            'rgb(243, 193, 84)',
                            'rgb(255, 255, 0)',
                            'rgb(148, 129, 255)',
                            'rgb(255, 86, 86)',
                        ],
                        hoverOffset: 10
                    }]
                },
                options: {
                    layout: {
                        padding: 20
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Pagu Kontraktual PBJ',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
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
                        autoPadding: true
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
                                color: 'black',
                                font: {
                                    size: 25
                                }
                            },
                            ticks: {
                                color: 'black'
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
                                color: 'black',
                                font: {
                                    size: 25
                                }
                            },
                            ticks: {
                                color: 'black'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#000000',
                                usePointStyle: true
                            },
                            display: true,
                            align: 'start',
                            position: 'chartArea'
                        },
                        datalabels: {
                            color: 'black',
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
                    maintainAspectRatio: false,
                },

            });
            return chartZILineCurrent;
        }
    </script>

    
    <script>
        // script pengaduan tahunan
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
                                color: 'black'
                            }
                        },
                        y: {
                            stacked: true,
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'black'
                            },
                            grace: 4
                        },
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Jumlah Pengaduan Tahunan',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
                        legend: {
                            labels: {
                                color: '#000000',
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
                            color: 'black',
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

        // script pengaduan kategori
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
                        title: {
                            display: true,
                            text: 'Jumlah Pengaduan Kategori',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
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

        // script simpulan telaah
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
                        title: {
                            display: true,
                            text: 'Jumlah Simpulan Telaah',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
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

        // script pengaduan BBWS
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
                        title: {
                            display: true,
                            text: 'Jumlah Pengaduan Per BBWS',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
                        legend: {
                            onClick: (evt, legendItem, legend) => {
                                const index = legend.chart.data.labels.indexOf(legendItem.text);
                                legend.chart.toggleDataVisibility(index);
                                legend.chart.update();
                            },
                            labels: {
                                color: '#000000',
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
                                color: 'black',
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'black',
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

        // script pengaduan dirpembina
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
                        title: {
                            display: true,
                            text: 'Jumlah Pengaduan Per Direktorat',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
                        legend: {
                            onClick: (evt, legendItem, legend) => {
                                const index = legend.chart.data.labels.indexOf(legendItem.text);
                                legend.chart.toggleDataVisibility(index);
                                legend.chart.update();
                            },
                            labels: {
                                color: '#000000',
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
                                color: 'black',
                            }
                        },
                        y: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'black',
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
                        tooltip: {
                            enabled: true
                        },
                    },
                    scales: {
                        x: {
                            stacked: false,
                            grid: {
                                display: true,
                                color: 'black'
                            },
                            title: {
                                display: true,
                                text: 'Tahun',
                                color: 'black',
                                font: {
                                    size: 15
                                }
                            },
                            ticks: {
                                color: 'black'
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
                                color: 'black',
                                font: {
                                    size: 15
                                }
                            },
                            ticks: {
                                color: 'black'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Jumlah SOP Tahunan',
                            font: {
                                weight: 'bold',
                                size: 24,
                            },
                            color: 'black',
                        },
                        legend: {
                            labels: {
                                color: '#000000',
                                usePointStyle: true
                            },
                            display: true,
                            align: 'start',
                            position: 'chartArea'
                        },
                        datalabels: {
                            color: 'black',
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

    
    <script>
        $('#chartPercobaan').html(myChartPercobaan())

        function myChartPercobaan() {
            let myChart = document.getElementById('chartPercobaan').getContext('2d');
            let pieLabelsLine = {
                id = 'pieLabelsLine',
                afterDraw(chart, args, options) {
                    const {
                        ctx,
                        chartArea: {
                            top,
                            bottom,
                            left,
                            right,
                            width,
                            height
                        }
                    } = chart;
                    chart.data.datasets.forEach((dataset, i) => {
                        chart.getDatasetMeta(i).data.forEach((datapoint, index) => {
                            const {
                                x,
                                y
                            } = datapoint.tooltipPosition();
                            console.log(x);
                            const halfwidth = width / 2;
                            const halfheight = height / 2;

                            ctx.beginPath();
                            ctx.moveTo(x, y);
                            ctx.lineTo(x + 15, y + 15);
                            ctx.strokeStyle = dataset.borderColor[index];

                        })
                    })
                }
            }
            let chartPercobaanCurrent = new Chart(myChart, {
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
            return chartPercobaanCurrent;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Home.layouts.layouthome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/Home/pages/home.blade.php ENDPATH**/ ?>