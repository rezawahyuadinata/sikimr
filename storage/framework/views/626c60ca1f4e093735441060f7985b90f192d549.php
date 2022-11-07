

<?php $__env->startSection('content'); ?>
    <?php
        use App\Helpers\AppHelper;
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">
                    <table id="table-data-1" class="display table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" data-orderable="false">#</th>
                                <th rowspan="2" data-orderable="true">Tingkat</th>
                                <th rowspan="2" data-orderable="true">UPR</th>
                                <th rowspan="2" data-orderable="true">Periode</th>
                                <th rowspan="2" data-orderable="true">Verifikasi</th>
                                <th rowspan="2" data-orderable="true">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data->pemantauan_mr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $lv1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($k1 + 1); ?></td>
                                    <td><?php echo e($lv1->level); ?></td>
                                    <td>
                                        <?php if($lv1->satker_nama): ?>
                                            <?php
                                                $Nama = $lv1->satker_nama;
                                            ?>
                                        <?php elseif($lv1->eselon1_nama): ?>
                                            <?php
                                                $Nama = $lv1->eselon1_nama;
                                            ?>
                                        <?php else: ?>
                                            <?php
                                                $Nama = $lv1->eselon2_nama;
                                            ?>
                                        <?php endif; ?>
                                        <?php echo e($Nama); ?>

                                    </td>
                                    <td><?php echo e('Triwulan ' . $lv1->triwulan); ?></td>
                                    <td><?php echo e(AppHelper::status($lv1->verifikasi)); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-xs"
                                            onclick="detailFormulir('<?php echo e($lv1->pemantauan_id); ?>')"><i
                                                class="fa fa-file"></i></button>
                                        <?php if($lv1->verifikasi != 3): ?>
                                            <?php if($lv1->verifikasi == 2 && $data->user->level == 'UPR-T1'): ?>
                                                <button type="button" class="btn btn-info btn-xs"
                                                    onclick="verifikasiFormulir('<?php echo e($lv1->pemantauan_id); ?>')"><i
                                                        class="fa fa-edit"></i></button>
                                            <?php elseif($lv1->verifikasi == 1 && $data->user->level == 'UPR-T2'): ?>
                                                <button type="button" class="btn btn-info btn-xs"
                                                    onclick="verifikasiFormulir('<?php echo e($lv1->pemantauan_id); ?>')"><i
                                                        class="fa fa-edit"></i></button>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if(isset($data->page->fitur->destroy)): ?>
                                                <button type="button" class="btn btn-danger btn-xs"
                                                    onclick="deleteData('<?php echo e($lv1->pemantauan_id); ?>', '<?php echo e(url($data->page->prefix . '/' . $data->page->class . '/' . $lv1->pemantauan_id)); ?>' )"><i
                                                        class="fa fa-times"></i></button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($data->pemantauan_mr) < 1): ?>
                                <tr>
                                    <td colspan="6">Data Kosong</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="row col-lg-12 text-center">
                        <?php echo e($data->pemantauan_mr->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var roleDestroy = <?php echo e(isset($data->page->fitur->destroy) ? 'true' : 'false'); ?>;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout_menu_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\github reza\projek-sikimr\resources\views/formulir/verifikasi-pemantauan/verifikasi-pemantauan-index.blade.php ENDPATH**/ ?>