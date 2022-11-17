

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="form-group col-sm-2">
        <?php if(isset($data->page->fitur->store)): ?>
            <label>&nbsp;</label>
            <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
                Tambah
            </button>
        <?php endif; ?>
    </div>
    <div class="col-sm-3">
        
    </div>
    <div class="col-sm-12"></div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false">#</th>
                            <th data-orderable="true" data-data="name">Nama</th>

                            <th data-orderable="true" data-data="level">Tingkat</th>
                            <th data-orderable="true" data-data="unit">UNOR / Unit Kerja / UPT</th>
                            <th data-orderable="true" data-data="kedudukan">Kedudukan Dalam Tim UPR</th>
                            <th data-orderable="true">Nama UPR</th>
                            <th data-orderable="true" data-data="jabatan">Jabatan</th>
                            <th data-orderable="true" data-data="username">Username</th>
                            <th data-orderable="true" data-data="active">Status</th>
                            <th data-orderable="false"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-data-title">Form Pengguna</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="control-label">Pengguna Kategori</label>
                            <select name="pengguna_kategori_id" id="pengguna_kategori_id" class="form-control select2">
                                <option value="">- Pilih Pengguna Kategori -</option>
                                <?php $__currentLoopData = $data->pengguna_kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->pengguna_kategori_id); ?>"><?php echo e($item->pengguna_kategori_nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label">Modul</label>
                            <select name="modul" id="modul" class="form-control select2">
                                <option value="">- Pilih -</option>
                                <option value="Manajemen Risiko">Manajemen Risiko</option>
                                <option value="Pengendalian">Pengendalian</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group col-sm-6">
                            <label class="control-label">Tingkat</label>
                            <select name="level" id="level" class="form-control select2">
                                <option value="">- Pilih -</option>
                                <option value="UPR-T1">UPR-T1</option>
                                <option value="UPR-T2">UPR-T2</option>
                                <option value="UPR-T3">UPR-T3</option>
                                <option value="PPK">PPK</option>
                                <option value="UKI">UKI</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6 kelompok">
                            <label class="control-label">Tipe (Unit Kerja/UPT)</label>
                            <select name="unit" id="unit" class="form-control select2">
                                <option value="">- Pilih -</option>
                                <option value="Balai">Balai</option>
                                <option value="Unit Organisasi">Unit Organisasi</option>
                                <option value="Balai Teknik">Balai Teknik</option>
                                <option value="Unit Kerja">Unit Kerja</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-6">
                            <label class="control-label">Kedudukan Dalam Tim UPR</label>
                            <select name="kedudukan" id="kedudukan" class="form-control select2">
                                <option value="">- Pilih -</option>
                                <option value="Pemilik Risiko">Pemilik Risiko</option>
                                <option value="Pengelola Risiko">Pengelola Risiko</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6 ppk">
                            <label class="control-label">Kode PPK</label>
                            <input type="number" name="kode_ppk" id="kode_ppk" class="form-control">
                        </div>
                        <div class="form-group col-sm-12 t1">
                            <label class="control-label">Unit Kerja</label>
                            <select name="eselon1_id" id="eselon1_id" class="form-control select2 unitkerja">
                                <option value="">- Pilih -</option>
                                <?php $__currentLoopData = $data->eselon1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->ID); ?>" data-pejabat="<?php echo e($item->PEJABAT); ?>" data-jabatan="<?php echo e($item->JABATAN); ?>" data-nip="<?php echo e($item->NIP); ?>"><?php echo e($item->NAMA); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 t2">
                            <label class="control-label">Unit Kerja</label>
                            <select name="eselon2_id" id="eselon2_id" class="form-control select2 unitkerja">
                                <option value="">- Pilih -</option>
                                <?php $__currentLoopData = $data->eselon2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->ID); ?>" data-pejabat="<?php echo e($item->PEJABAT); ?>" data-jabatan="<?php echo e($item->JABATAN); ?>" data-nip="<?php echo e($item->NIP); ?>"><?php echo e($item->NAMA); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 satker">
                            <label class="control-label">Satker</label>
                            <select name="satker_id" id="satker_id" class="form-control select2">
                                <option value="">- Pilih Satker -</option>
                                <?php $__currentLoopData = $data->satker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->ID); ?>"><?php echo e($item->NAMA); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label">Jabatan</label>
                            <input id="jabatan" type="text" class="form-control" name="jabatan" value="<?php echo e(old('jabatan')); ?>" required autocomplete="jabatan" autofocus>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-6">
                            <label class="control-label">Nama</label>
                            <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label">NIP</label>
                            <input id="nip" type="text" class="form-control" name="nip" required autocomplete="nip" autofocus>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label">Username</label>
                            <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="username" autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="control-label"><?php echo e(__('Password')); ?></label>
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new-password">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password-confirm" class="control-label"><?php echo e(__('Konfirmasi Password')); ?></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>



<script>
    var urlData = '<?php echo e(route( $data->page->class . ".read")); ?>';
    console.log(urlData);
    var urlInsert = '<?php echo e(route( $data->page->class . ".store")); ?>';
    var urlUpdate = '<?php echo e(route( $data->page->class . ".update")); ?>';
    var urlAccess = '<?php echo e(route( $data->page->class . ".store_kategori")); ?>';
    var roleAccess = <?php echo e(isset($data->page->fitur->hak_akses) ? 'true' : 'false'); ?>;
    var roleRead = <?php echo e(isset($data->page->fitur->read) ? 'true' : 'false'); ?>;
    var roleUpdate = <?php echo e(isset($data->page->fitur->update) ? 'true' : 'false'); ?>;
    var roleDestroy = <?php echo e(isset($data->page->fitur->destroy) ? 'true' : 'false'); ?>;
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout_menu_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/pengaturan/pengguna/pengguna-index.blade.php ENDPATH**/ ?>