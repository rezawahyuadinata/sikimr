    

<?php $__env->startSection('content'); ?>
<?php
    use App\Helpers\AppHelper;
?>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header text-center; label label-primary">
                <h4 for=""><?php echo e($data->user->satker ? $data->user->satker->NAMA : '-'); ?></h4>
                <h4 for=""><?php echo e($data->user->level); ?></h4>
            </div>
            <div class="box-body">
                <div class="row col-lg-2">
                    <label for="">Tahun Periode</label>
                </div>
                <div class="row col-lg-1">
                   <select name="year" id="year" class="form-control">
                        <?php for($i = 2021; $i <= date('Y')+1; $i++): ?>
                            <option value="<?php echo e($i); ?>" <?php echo e($data->tahun == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="row col-lg-12">
                    <table id="table-data-1" class="display table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" data-orderable="false">#</th>
                                <th rowspan="2" data-orderable="true">Tingkat</th>
                                <th rowspan="2" data-orderable="true"><center>UPR</center></th>
                                <th rowspan="2" data-orderable="true">Periode</th>
                                <th colspan="3"><center>Komitmen MR</center></th>

                                <th colspan="4"><center>Laporan Penerapan MR</center></th>
                            </tr>
                            <tr>
                                <th data-orderable="true">Status</th>
                                <th data-orderable="true">Catatan Verifikasi</th>
                                <th>Komitmen MR</th>
                                <th>Triwulan 1</th>
                                <th>Triwulan 2</th>
                                <th>Triwulan 3</th>
                                <th>Triwulan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($data->satker_list) < 1): ?>
                                <tr>
                                    <td colspan="11"> Data kosong. </td>
                                </tr>
                            <?php endif; ?>
                            <?php $__currentLoopData = $data->satker_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $lv1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($k1 +1 )); ?></td>
                                    <td><?php echo e($lv1->level); ?></td>
                                    <td><?php echo e($lv1->NAMA); ?></td>
                                    <td><?php echo e($lv1->mr_periode); ?></td>
                                    <td><?php echo e(AppHelper::status($lv1->verifikasi)); ?></td>
                                    <td><?php echo e($lv1->verifikasi_catatan); ?></td>
                                    <td>
                                        <button type="button" data-toggle="tooltip" data-placement="left" title="Lihat" class="btn btn-default btn-xs" onclick="detailFormulir('<?php echo e($lv1->mr_id); ?>')"><i class="fa fa-file"></i></button>
                                        <?php if($lv1->verifikasi == 0): ?>
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info btn-xs" onclick="updateFormulir('<?php echo e($lv1->mr_id); ?>')"><i class="fa fa-edit"></i></button>
                                             <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-xs" onclick="deleteData('<?php echo e($lv1->mr_id); ?>', '<?php echo e(url('formulir/formulir/delete_data/'. $lv1->mr_id)); ?>')"><i class="fa fa-remove"></i></button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($lv1->verifikasi == 3): ?>
                                            <?php if($lv1->triwulan_1 != null): ?>
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('<?php echo e($lv1->triwulan_1->pemantauan_id); ?>')"><i class="fa fa-file"></i></button> <br>
                                                <?php if($lv1->triwulan_1->verifikasi == 0): ?>
                                                    <a href="<?php echo e(url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_1->pemantauan_id)); ?>" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e(AppHelper::status($lv1->triwulan_1->verifikasi)); ?> <br>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=1')); ?>" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(isset($lv1->triwulan_1->verifikasi) && $lv1->triwulan_1->verifikasi == 3): ?>
                                            <?php if($lv1->triwulan_2 != null): ?>
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('<?php echo e($lv1->triwulan_2->pemantauan_id); ?>')"><i class="fa fa-file"></i></button> <br>
                                                <?php if($lv1->triwulan_2->verifikasi == 0): ?>
                                                    <a href="<?php echo e(url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_2->pemantauan_id)); ?>" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e(AppHelper::status($lv1->triwulan_2->verifikasi)); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=2')); ?>" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(isset($lv1->triwulan_2->verifikasi) && $lv1->triwulan_2->verifikasi == 3): ?>
                                            <?php if($lv1->triwulan_3 != null): ?>
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('<?php echo e($lv1->triwulan_3->pemantauan_id); ?>')"><i class="fa fa-file"></i></button> <br>
                                                <?php if($lv1->triwulan_3->verifikasi == 0): ?>
                                                    <a href="<?php echo e(url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_3->pemantauan_id)); ?>" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e(AppHelper::status($lv1->triwulan_3->verifikasi)); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=3')); ?>" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(isset($lv1->triwulan_3->verifikasi) && $lv1->triwulan_3->verifikasi == 3): ?>
                                            <?php if($lv1->triwulan_4 != null): ?>
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('<?php echo e($lv1->triwulan_4->pemantauan_id); ?>')"><i class="fa fa-file"></i></button> <br>
                                                <?php if($lv1->triwulan_4->verifikasi == 0): ?>
                                                    <a href="<?php echo e(url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_4->pemantauan_id)); ?>" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e(AppHelper::status($lv1->triwulan_4->verifikasi)); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=4')); ?>" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php if(isset($lv1->child)): ?>
                                    <?php $__currentLoopData = $lv1->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $lv2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(($k1 +1 ) . '.' . ($k2 +1)); ?></td>
                                            <td><?php echo e($lv2->level); ?></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($lv2->NAMA); ?></td>
                                            <td><?php echo e($lv2->mr_periode); ?></td>
                                            <td><?php echo e(AppHelper::status($lv2->verifikasi)); ?></td>
                                            <td><?php echo e($lv2->verifikasi_catatan); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailFormulir('<?php echo e($lv2->mr_id); ?>')"><i class="fa fa-file"></i></button>
                                            </td>
                                        </tr>
                                        <?php if(isset($lv2->child)): ?>
                                            <?php $__currentLoopData = $lv2->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k3 => $lv3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(($k1 +1 ) . '.' . ($k2 +1). '.' . ($k3 +1)); ?></td>
                                                    <td><?php echo e($lv3->level); ?></td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($lv3->NAMA); ?></td>
                                                    <td><?php echo e($lv3->mr_periode); ?></td>
                                                    <td><?php echo e(AppHelper::status($lv3->verifikasi)); ?></td>
                                                    <td><?php echo e($lv3->verifikasi_catatan); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-default btn-xs" onclick="detailFormulir('<?php echo e($lv3->mr_id); ?>')"><i class="fa fa-file"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var urlData = '<?php echo e(route( $data->page->class . ".read")); ?>';
    var roleDestroy = <?php echo e(isset($data->page->fitur->destroy) ? 'true' : 'false'); ?>;
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout_menu_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\github reza\projek-sikimr\resources\views/formulir/formulir/formulir-index.blade.php ENDPATH**/ ?>