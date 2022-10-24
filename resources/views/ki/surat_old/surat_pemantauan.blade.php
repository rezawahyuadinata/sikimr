<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block"
            onclick="addData('#modal-pemantauan', '#form-pemantauan')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-pemantauan" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Tanggal</th>
                    <th data-orderable="true">Progres</th>
                    <th data-orderable="true">Rekomendasi harus TL</th>
                    <th data-orderable="true">Rekomendasi sudah TL</th>
                    <th data-orderable="true">Tanggal Batas Waktu</th>
                    <th data-orderable="true">Uraian Pemantauan</th>
                    <th data-orderable="true">File Pemantauan</th>
                    <th data-orderable="true">Foto Pemantauan</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-pemantauan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-pemantauan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-pemantauan-title">Form Pemantauan </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="pemantauan_id" required>
                    
                    <div class="row">
                        <div class="form-group col-sm-12 form-hide">
                                <label for="progres">Progres Tindak Lanjut Terlapor</label>
                                <select name="progres" id="progres"
                                    class="form-control select2">
                                    <option value="Belum" selected>Belum</option>
                                    <option value="Sudah">Sudah</option>
                                </select>
                        </div>
                        <!-- rekomendasi ini diambil dari imputan sebelumnya -->
                        <div class="form-group col-lg-6 form-hide">
                            <label for="rekomendasi_harus_tl">Rekomendasi yang harus di tindak lanjut</label>
                            <input type="text" class="form-control" name="rekomendasi_harus_tl" id="rekomendasi_harus_tl" row='4'
                                placeholder="Masukkan key" rows="5" cols="100"></textarea>
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="rekomendasi_sudah_tl">Rekomendasi yang Sudah di tindak lanjut</label>
                            <input type="text" class="form-control" name="rekomendasi_sudah_tl" id="rekomendasi_sudah_tl" row='4'
                                placeholder="Masukkan key" rows="5" cols="100"></textarea>
                        </div>
                        <!-- tanggal otomatis diambil dari sheet sebelumnya -->
                        <div class="form-group col-lg-6 form-hide">
                            <label for="tgl_batas_waktu">Tanggal Batas Waktu Pengumpulan*</label>
                            <input type="datetime-local" class="form-control" name="tgl_batas_waktu" id="tgl_batas_waktu">
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="tanggal">Tanggal Sekarang* </label>
                            <br>
                            <?php echo date("d/m/Y") ;?>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="uraian_pemantauan">Uraian Pemantauan*</label>
                            <textarea type="text" class="form-control" name="uraian_pemantauan" id="uraian_pemantauan"
                                placeholder="Masukkan uraian" rows="5" cols="100"></textarea>
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="file_pemantauan">File Pemantauan*</label>
                            <input type="file" class="form-control" name="file_pemantauan" id="file_pemantauan"
                                placeholder="Masukkan file">
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label">Foto Pemantauan (.jpeg / .jpg / .png)*</label>
                            <p style="width:100%; min-height: 50px;" class="img-upload-preview"
                                id="upload-target-pemantauan"></p>
                            <label class="form-control btn btn-primary" style="color: white !important;">
                                <input class="form-control" type="file" name="image" id="image"
                                    data-target="#upload-target-pemantauan" style="display: none;"
                                    accept="image/png, image/jpeg, image/jpg">
                                Unggah Foto
                            </label>
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