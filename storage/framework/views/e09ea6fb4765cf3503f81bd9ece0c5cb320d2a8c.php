

<?php $__env->startSection('content'); ?>
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        .table-bordered {
            border: 1px solid #524f4f;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border: 1px solid #524f4f;
        }
    </style>
    <input type="hidden" name="mr_id" id="mr_id" value="">
    <input type="hidden" name="level" id="level"
        value="<?php echo e(isset($data->komitmen_mr->level) ? $data->komitmen_mr->level : $data->user->level); ?>">
    <input type="hidden" name="kdsatker" id="kdsatker" value="<?php echo e($data->user->kode); ?>">
    <div class="row">
        <div class="col-md-12">
            <div class="box collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Dokumen</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width: 25%">Nomor Dokumen Risiko</td>
                                    <td><?php echo e(isset($data->komitmen_mr) ? $data->komitmen_mr->mr_nomor : '-'); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tanggal Pembuatan</td>
                                    <td><?php echo e(isset($data->komitmen_mr) ? $data->komitmen_mr->dibuat_pada : '-'); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Dibuat Oleh</td>
                                    <td><?php echo e(isset($data->komitmen_mr) ? $data->komitmen_mr->creator->name : '-'); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tanggal Perubahan Terakhir</td>
                                    <td><?php echo e(isset($data->komitmen_mr) ? $data->komitmen_mr->diubah_pada : '-'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Komitmen Manajemen Risiko</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Nama Pemilik Risiko</td>
                                    <td><?php echo e($data->user->pemilik_resiko); ?></td>
                                </tr>
                                <tr>
                                    <td>NIP Pemilik Risiko</td>
                                    <td><?php echo e($data->user->pemilik_resiko_nip); ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan Pemilik Risiko</td>
                                    <td><?php echo e($data->user->pemilik_resiko_jabatan); ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Pengelola Risiko <?php echo e($data->user->level == 'UPR-T1' ? 1 : ''); ?></td>
                                    <td><?php echo e($data->user->pengelola_resiko); ?></td>
                                </tr>
                                <tr>
                                    <td>NIP Pengelola Risiko <?php echo e($data->user->level == 'UPR-T1' ? 1 : ''); ?></td>
                                    <td><?php echo e($data->user->pengelola_resiko_nip); ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan Pengelola Risiko <?php echo e($data->user->level == 'UPR-T1' ? 1 : ''); ?></td>
                                    <td><?php echo e($data->user->pengelola_resiko_jabatan); ?></td>
                                </tr>
                                <?php if($data->user->level == 'UPR-T1'): ?>
                                    <tr>
                                        <td>Nama Pengelola Risiko 2</td>
                                        <td><?php echo e($data->user->pengelola2_resiko); ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIP Pengelola Risiko 2</td>
                                        <td><?php echo e($data->user->pengelola2_resiko_nip); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan Pengelola Risiko 2</td>
                                        <td><?php echo e($data->user->pengelola2_resiko_jabatan); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>Periode Penerapan Manajemen Risiko</td>
                                    <td><?php echo e(isset($data->komitmen_mr) ? $data->komitmen_mr->mr_periode : '-'); ?></td>
                                </tr>
                                <tr>
                                    &nbsp;
                                </tr>
                                <?php if($data->user->level == 'UPR-T3'): ?>

                                    <tr>
                                        <td>Pembantu Pengelola Risiko</td>
                                        <?php if(isset($data->ppk)): ?>
                                            <td>
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <tr>
                                                        <td><strong> PPK </strong></td>
                                                        <td><strong> Nama </strong></td>
                                                        <td><strong> NIP </strong></td>
                                                    </tr>
                                                    <?php $__currentLoopData = $data->ppk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($ppk->NAMA); ?> &emsp;</td>
                                                            <td><?php echo e($ppk->KETUA); ?> &emsp;</td>
                                                            <td><?php echo e($ppk->NIP); ?> &emsp;</td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </table>
                                            </td>
                                            
                                        <?php else: ?>
                                            <td></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_a" data-toggle="tab">Sasaran</a></li>
                    <li><a href="#tab_b" data-toggle="tab">Daftar Pemangku Kepentingan</a></li>
                    <li><a href="#tab_c" data-toggle="tab" style="display: none">Tujuan Pelaksanaan MR</a></li>
                    <li><a href="#tab_d" data-toggle="tab">Profil Risiko</a></li>
                    <li><a href="#tab_e" data-toggle="tab">Peta Risiko</a></li>
                    <li><a href="#tab_f" data-toggle="tab">Jadwal Pelaksanaan</a></li>
                    <?php if(!in_array($data->user->pengguna_kategori->pengguna_kategori_spesial, ['pengelola', 'operator'])): ?>
                        <li><a href="#tab_g" data-toggle="tab">Kirim Dokumen</a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_a">
                        <?php echo $__env->make('formulir.komitmen-mr.komitmen-mr-sasaran', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane" id="tab_b">
                        <?php echo $__env->make('formulir.komitmen-mr.komitmen-mr-kepentingan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane" id="tab_c" style="display: none">
                        <?php echo $__env->make('formulir.komitmen-mr.komitmen-mr-tujuan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane" id="tab_d">
                        <?php echo $__env->make('formulir.komitmen-mr.komitmen-mr-resiko', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="tab-pane" id="tab_e">
                        <div id="load-peta">

                        </div>
                        
                    </div>
                    <div class="tab-pane" id="tab_f">
                        <div id="load-jadwal">

                        </div>
                        
                    </div>
                    <?php if($data->user->pengguna_kategori->pengguna_kategori_spesial != 'pengelola'): ?>
                        <div class="tab-pane" id="tab_g">
                            <?php echo $__env->make('formulir.komitmen-mr.komitmen-mr-kirim', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-mr" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-mr">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-mr-title">Formulir Komitmen Manajemen Risiko </h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12 form-hide">
                                <label for="mr_nomor">Nomor</label>
                                <input type="text" name="mr_nomor" id="mr_nomor" class="form-control"
                                    value="<?php echo e($data->mr_nomor); ?>" required>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="mr_periode">Periode Penerapan Manajemen Risiko</label>
                                <select name="mr_periode" id="mr_periode" class="form-control select2" required
                                    onChange="update()">
                                    <option value="">- Pilih Periode -</option>
                                    <?php for($i = 2017; $i <= date('Y') + 2; $i++): ?>
                                        <option value="<?php echo e($i); ?>" <?php echo e(date('Y') == $i ? 'selected' : ''); ?>>
                                            <?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <!-- <div class="form-group col-sm-12 form-hide">
                                                                                                                <label for="mr_tanggal">Tanggal Dokumen</label>
                                                                                                                <input type="date" name="mr_tanggal" id="mr_tanggal" class="form-control"
                                                                                                                    value="<?php echo e(date('Y-m-d')); ?>" required>
                                                                                                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo e(route('formulir.index')); ?>" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var urlInsert = '<?php echo e(route($data->page->class . '.store')); ?>';
        var urlUpdate = '<?php echo e(route($data->page->class . '.update')); ?>';
        var mr_id = '<?php echo e(app('request')->input('mr_id')); ?>';
        var urlData = '<?php echo e(route($data->page->class . '.get_data')); ?>';
        var level = '<?php echo e(isset($data->komitmen_mr->level) ? $data->komitmen_mr->level : $data->user->level); ?>';
        var unit = '<?php echo e($data->user->unit); ?>';
        var satker = '<?php echo e($data->user->satker ? $data->user->satker->NAMA : ''); ?>';
    </script>

    <script type="text/javascript">
        function update() {
            var select = document.getElementById('mr_periode');
            var option = select.options[select.selectedIndex];
            const d = new Date();
            let year = String(d.getFullYear());
            const mr_nomor = '<?php echo e($data->mr_nomor); ?>';
            document.getElementById('mr_nomor').value = mr_nomor.replace(year, String(option.value));
        }

        update()
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout_menu_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\github reza\projek-sikimr\resources\views/formulir/komitmen-mr/komitmen-mr-index.blade.php ENDPATH**/ ?>