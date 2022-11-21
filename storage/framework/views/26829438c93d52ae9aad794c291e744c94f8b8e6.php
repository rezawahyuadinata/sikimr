

<?php $__env->startSection('section'); ?>
    <section class="py-7">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 text-center mx-auto">
                    <h1>Library SOP Ditjen SDA</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="nav-wrapper position-sticky end-0">
                        <ul class="nav nav-pills nav-pills-rose flex-column nav-fill p-1" role="tablist">
                            <?php $__currentLoopData = $sopCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item" style="text-align: start">
                                    <a class="nav-link <?php echo e($key == 0 ? 'active' : ''); ?>" data-bs-toggle="tab"
                                        href="#tabs-<?php echo e($item->id); ?>" role="tab" aria-controls="profile"
                                        aria-selected="true">
                                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;<?php echo e($item->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content">
                        <?php $__currentLoopData = $sopCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane <?php echo e($key == 0 ? 'active' : ''); ?> in" id="tabs-<?php echo e($item->id); ?>">
                                <div class="album">
                                    <div class="container">
                                        <div class="table-responsive">
                                            <table id="table-sop-<?php echo e($key); ?>" class="table table-hover"
                                                style="border: 10px">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Nama SOP
                                                        </th>
                                                        <th>
                                                            Aksi
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $sop->where('status', '3')->where('category', $item->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td style="min-width: 500px; max-width: 500px;">
                                                                <span style=" white-space: normal;">
                                                                    SOP - <?php echo e($items->name); ?>

                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <div class="btn-group">
                                                                        <a href="<?php echo e(asset('storage/uploads/sop/' . $items->file_name)); ?>"
                                                                            target="_blank"
                                                                            class="btn btn-sm btn-outline-secondary">View</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-css'); ?>
    <style>
        .dataTables_filter input {
            border: 1px solid black;
            color: black;
            font-weight: 200;
        }

        .dataTables_filter:hover input {
            border: 1px solid black
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-js'); ?>
    <script>
        $(document).ready(function() {
            const sopCat = <?php echo $sopCat; ?>


            sopCat.forEach((element, index) => {
                $('#table-sop-' + index).DataTable({
                    pageLength: 5,
                    lengthChange: false,
                    scrollx: true,
                    info: false,
                    columnDefs: [{
                        targets: [1],
                        orderable: false
                    }],
                    language: {
                        paginate: {
                            next: '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
                            previous: '<i class="fa fa-arrow-left" aria-hidden="true"></i>'
                        }
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Home.layouts.layouthome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/Home/pages/sop.blade.php ENDPATH**/ ?>