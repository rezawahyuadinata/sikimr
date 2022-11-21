

<?php $__env->startSection('section'); ?>
    <?php
        setlocale(LC_TIME, 'id');
        $thumbnailBerita = explode('|', $news->thumbnail);

        // Maximal Gambar yang dapat di berikan proses hanya sampai dengan 5
        $namaBerita = $news->thumbnail;
        $jpg = '.jpg';
        $jpeg = '.jpeg';
        $png = '.png';
        if (strpos($namaBerita, $jpg) == true) {
            // echo 'file ini jpg';
            $namaBerita = explode('jpg|', $news->thumbnail);
        } elseif (strpos($namaBerita, $jpeg) == true) {
            // echo 'file ini jpeg';
            $namaBerita = explode('jpeg|', $news->thumbnail);
        } else {
            // echo 'file ini png';
            $namaBerita = explode('png|', $news->thumbnail);
        }
    ?>
    <section class="py-3" id="berita">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-8 mx-auto">
                    <h2><?php echo e($news->subject); ?></h2>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-4">
                    <div class="card card-plain">
                        <div class="card-header p-0 position-relative">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Kategori : <?php echo e(!$news->category ? '-' : $news->name); ?>

                                        </div>
                                        <div class="col-md-6" style="text-align: end">
                                            <strong>
                                                <?php echo e($news->created_at->formatLocalized('%d %B %Y, %H:%M:%S')); ?>

                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-interval="4500"
                                data-bs-pause="false" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $__currentLoopData = $thumbnailBerita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                                            <a class="d-block blur-shadow-image">
                                                <img style="background-size: contain"
                                                    src="<?php echo e(asset('/storage/uploads/berita/' . $thumbnailBerita[$key])); ?>"
                                                    alt="img-blur-shadow" class="img-fluid img-thumbnail" loading="lazy">
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-interval="4500"
                                data-bs-pause="false" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $__currentLoopData = $namaBerita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                                            <a class="d-block blur-shadow-image">
                                            </a>
                                            <div class="d-block w-100">
                                                <p
                                                    style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; padding-top: .5rem; font-weight: bold; color: black ">
                                                    <?php echo e($namaBerita[$key]); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="card-body p-0 px-1">
                                <p
                                    style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; padding-top: .5rem; font-weight: 400; color: black">
                                    <?php echo $news->description; ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--sidebar -->
                <div class="col-md-4">
                    <div class="position-sticky" style="top: 8rem;">
                        <div class="p-4">
                            <h4 class="fst-italic">Kategori Berita</h4>
                            <ol class="list-unstyled mb-0">
                                <?php $__currentLoopData = $news_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item mb-3" style="border-bottom: 1px solid black">
                                        <a class="nav-link text-dark" href="<?php echo e(url('/news/category/' . $item->slug)); ?>">
                                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;
                                            <?php echo e($item->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>
                        </div>

                        <div class="p-4">
                            <h4 class="fst-italic">Berita Terkini</h4>
                            <ol class="list-unstyled">
                                <?php $__currentLoopData = $berita->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-3 " style="list-style: none;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="post-image">
                                                    <div class="logo img ">
                                                        <a href="<?php echo e(url('/news/' . $new->slug)); ?>">
                                                            <?php
                                                                $thumbnailLastBerita = explode('|', $new->thumbnail);
                                                            ?>
                                                            <img src="<?php echo e(asset('/storage/uploads/berita/' . $thumbnailLastBerita[0])); ?>"
                                                                width="85" height="65" style="object-fit: stretch""
                                                                alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="text-sm">
                                                        <?php echo e($new->created_at->formatLocalized('%d %B %Y')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="post-info"> <a href="<?php echo e(url('/news/' . $new->slug)); ?>">
                                                        <?php echo e($new->subject); ?>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Home.layouts.layouthome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/Home/pages/beritadetail.blade.php ENDPATH**/ ?>