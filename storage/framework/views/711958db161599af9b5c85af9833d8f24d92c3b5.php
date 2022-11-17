

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="form-group col-sm-2">
            <?php if(isset($data->page->fitur->create)): ?>
                <label>&nbsp;</label>
                <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
                    Tambah
                </button>
            <?php endif; ?>
        </div>
        <div class="form-group col-sm-2">
            <label>&nbsp;</label>
            <!-- <a href="#modal-data-2" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-data-2">Tambah
                                                                                                                        Kategori</a> -->
            <button type="button" class="btn btn-block btn-primary" onclick="tambahDataKategori()">
                Tambah Kategori
            </button>
        </div>
        <div class="col-sm-3">

        </div>
        <div class="col-sm-12">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#berita" data-toggle="tab">Berita</a></li>
                    <li><a href="#kategori" data-toggle="tab">Kategori</a></li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="berita">
                        <div class="box">
                            <div class="box-body">
                                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">#</th>
                                            <th data-orderable="true">Judul Berita</th>
                                            <th data-orderable="true">Deskripsi Berita</th>
                                            <th data-orderable="false"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kategori">
                        <div class="box">
                            <div class="box-body">
                                <table id="table-data-2" class="display table table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">#</th>
                                            <th data-orderable="true">Kategori Berita</th>
                                            <th data-orderable="false"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-data" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-data-title">Form Berita</h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="subject">Kategori Berita</label>
                                <select name="news_category" id="news_category" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    <?php $__currentLoopData = $data->news_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-12 form-hide">
                                <label for="subject">Judul Berita</label>
                                <input class="form-control" name="subject" id="subject"
                                    placeholder="Masukkan Judul Berita"></input>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label">Deskripsi</label>
                                <textarea class="form-control" name="editor" id="editor" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                            <div class="form-group col-lg-6 form-hide">
                                <label for="sampul">Sampul</label>
                                <input type="file" required class="form-control" id="thumbnail" name="thumbnail[]"
                                    value="img.jpg" accept="image/*" multiple />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="sampul">Caption Sampul</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="gambar-tambah">
                                    <div class="form-row tingkatan">
                                        <div>
                                            <label class="text-left" contenteditable="true">Gambar 1: </label>
                                        </div>
                                        <div>
                                            <input class="form-control" type="file" placeholder="Masukkan Gambar">
                                        </div>
                                    </div>
                                    <div class="form-row py-2 tambahan-container">
                                        <div>
                                            <input type="text" class="form-control" placeholder="Caption Gambar">
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                                <button class="btn-default btn add-container pt-2">Add Gambar</button>
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

    <div class="modal fade" id="modal-data-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-data-2">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-data-title">Form Berita Kategori</h3>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="id_kategori" id="id_kategori">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="subject">Kategori Berita</label>
                                <input class="form-control" name="category_name" id="category_name"
                                    placeholder="Masukkan Kategori Berita"></input>
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
        var urlData = '<?php echo e(route($data->page->class . '.read')); ?>';
        var urlData2 = "<?php echo e(url('pengaturan/berita/kategori/read')); ?>";
        var urlInsert = '<?php echo e(route($data->page->class . '.store')); ?>';
        var urlInsert2 = "<?php echo e(url('/pengaturan/berita/kategori')); ?>";
        var urlUpdate = '<?php echo e(route($data->page->class . '.update')); ?>';
        var urlUpdate2 = "<?php echo e(url('/pengaturan/berita/kategori/update')); ?>";
        var roleRead = <?php echo e(isset($data->page->fitur->read) ? 'true' : 'false'); ?>;
        var roleUpdate = <?php echo e(isset($data->page->fitur->update) ? 'true' : 'false'); ?>;
        var roleDestroy = <?php echo e(isset($data->page->fitur->destroy) ? 'true' : 'false'); ?>;
    </script>
    <script>
        let nextLabel = 2
        let nextId = 1
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('add-container')) {
                addApplicant(e)
            } else if (e.target.classList.contains('btn-dependent')) {
                addDependent(e)
            } else if (e.target.classList.contains('remove-applicant')) {
                e.target.closest('.gambar-tambah').remove()
            } else if (e.target.classList.contains('close')) {
                e.target.closest('.tambahan-container').remove()
            }
        })

        function addApplicant(e) {
            let applicant = document.querySelector('.gambar-tambah')
            var clone = applicant.cloneNode(true);
            clone.id = "add-dependent" + nextLabel;
            clone.querySelectorAll('.tambahan-container').forEach((el, i) => {
                if (i !== 0) el.remove()
            })
            applicant.parentElement.insertBefore(clone, e.target);
            var label = clone.querySelector("label");
            label.innerHTML = '<button  class="close remove-applicant">x</button>' + "Gambar " + (nextLabel++);
        }

        // function addDependent(e) {
        //     let dependent = document.querySelector('.tambahan-container')
        //     var clone = dependent.cloneNode(true);
        //     e.target.closest('.gambar-tambah').querySelector('.tingkatan').append(clone);
        //     // var label = clone.querySelector('label');
        //     //  label.innerHTML = '<button id="btn" name="btn" type="button" class="close float-left" style="font-size:12px;" >x</button>';
        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout_menu_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Codes\Programs\Backend\Laravel\projek-sikimr-personal\resources\views/pengaturan/berita/berita-index.blade.php ENDPATH**/ ?>