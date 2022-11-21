
<nav class="navbar navbar-expand-sm bg-gradient-navbar-first">
    <div class="container">
        <a class="navbar-brand text-white" style="font-size: 15px" href="https://sda.pu.go.id/" rel="tooltip"
            data-placement="bottom" target="_blank">
            <i class="fa fa-home"></i> PUPR | <span id="time"></span><span id="txt"></span>
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white"><i class="fa fa-phone" aria-hidden="true"></i> (021)7221907</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                        ditki.sda@pu.go.id</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<nav class="navbar navbar-expand-lg sticky-top bg-gradient-navbar-second"
    style="border-bottom: 5px solid rgb(255, 193, 59)">
    <div class="container">
        <a class="navbar-brand " href="#"><img src="/img/login/logo_sikimr.png" alt="Logo" height="50"
                class="img-responsive"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link animasi-bg navbar-font-style" href="<?php echo e(route('Welcome')); ?>">
                        <span class="navbar-menu">
                            Beranda
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animasi-bg navbar-font-style" href="<?php echo e(Route('Berita')); ?>">
                        <span class="navbar-menu">
                            Berita
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animasi-bg navbar-font-style" href="<?php echo e(Route('Profil')); ?>">
                        <span class="navbar-menu">
                            Profile
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animasi-bg navbar-font-style"
                        href="https://sda.pu.go.id/produk/view_produk/SE_Dirjen_SDA_tentang_Tata_Cara_Pemantauan_RPSDA_WS_Kewenangan_Pusat">
                        <span class="navbar-menu">
                            Hukum
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animasi-bg navbar-font-style" href="<?php echo e(Route('SOP')); ?>">
                        <span class="navbar-menu">
                            SOP
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(Route('Tutorial')); ?>"
                            class="btn btn-danger mb-0 me-1 mt-2 mx-2 mt-md-0 p-2 navbar-font-style">
                            Tutorial
                        </a>
                    </div>
                </li>
                <li class=" nav-item">
                    <div class="dropdown-center">
                        <button class="btn btn-primary mb-0 me-1 mt-2 mx-2 mt-md-0 p-2 navbar-font-style" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Aplikasi
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(url('/login')); ?>">Manajemen Risiko</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(url('/login')); ?>">Zona Integritas</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(url('/login')); ?>">Sikon</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(url('/login')); ?>">Pengaduan</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/Home/components/navbar.blade.php ENDPATH**/ ?>