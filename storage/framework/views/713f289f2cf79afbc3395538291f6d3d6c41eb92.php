

<?php $__env->startSection('section'); ?>
    <?php
    setlocale(LC_TIME, 'id');
    ?>
    <section class="py-3" id="berita">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h2>Berita</h2>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-8">
                    <div class="row">
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-sm-3 mx-">
                                <div class="card card-plain">
                                    <div class="card-header p-0 position-relative">
                                        <a class="d-block blur-shadow-image" href="<?php echo e(url('/news/' . $item->slug)); ?>">
                                            <?php
                                                $thumbnailBerita = explode("|", $item->thumbnail);
                                            ?>
                                            <img src="<?php echo e(asset('/storage/uploads/berita/' . $thumbnailBerita[0])); ?>"
                                                alt="img-blur-shadow" class="img img-thumbnail" loading="lazy"
                                                style="width: 100%; height: 15vw; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="card-body px-0">
                                        <h5 style="min-height: 110px">
                                            <a href="<?php echo e(url('/news/' . $item->slug)); ?>"
                                                class="text-dark font-weight-bold"><?php echo e($item->subject); ?></a>
                                        </h5>
                                        <p>
                                            <?php echo substr_replace($item->description, '...', 90); ?>

                                        </p>
                                        <p style="font-size: 12px; font-weight:bold;">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;
                                            <?php echo e($item->created_at->formatLocalized('%d %B %Y, %H:%M:%S')); ?>

                                        </p>
                                        <a href="<?php echo e(url('/news/' . $item->slug)); ?>"
                                            class="text-info text-sm icon-move-right">Read
                                            More
                                            <i class="fas fa-arrow-right text-xs ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($news->links()); ?>

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
                                <?php $__currentLoopData = $latest_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-3 " style="list-style: none;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="post-image">
                                                    <div class="logo img ">
                                                        <a href="<?php echo e(url('/news/' . $new->slug)); ?>">
                                                            <?php
                                                                $thumbnailLastBerita = explode("|", $new->thumbnail);
                                                            ?>
                                                            <img src="<?php echo e(asset('/storage/uploads/berita/' . $thumbnailLastBerita[0])); ?>"
                                                                width="85" height="65" style="object-fit: stretch"
                                                                alt="Semarang Urban Flood Resilience Project, Kerja Sama D2B Ditjen SDA dengan Pemerintah Belanda">
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

<?php echo $__env->make('Home.layouts.layouthome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\sikimr\projek-sikimr\resources\views/Home/pages/berita.blade.php ENDPATH**/ ?>