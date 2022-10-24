<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block" onclick="addData('#modal-telaahan', '#form-telaahan')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-telaahan" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Nomor</th>
                    <th data-orderable="true">Tanggal</th>
                    <th data-orderable="true">Distribusi</th>
                    <th data-orderable="true">Indikasi Penyimpanan</th>
                    <th data-orderable="true">Rekomendasi</th>
                    <th data-orderable="true">Key Telaahan</th>
                    <th data-orderable="true">File Telaahan</th>
                    <th data-orderable="true">Foto Telaahan</th>
                    <th data-orderable="true">Batas Waktu Pemantauan</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-telaahan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-telaahan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-telaahan-title">Form Telaahan </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="telaahan_id" required>
                    <div class="row">
                        <div class="form-group col-lg-6 form-hide">
                            <label for="nomor">Nomor Nota Dinas*</label>
                            <input type="text" class="form-control" name="nomor" id="nomor"
                                placeholder="Masukkan nomor">
                        </div>
                        <div class="form-group col-lg-3 form-hide">
                            <label for="tanggal">Tanggal*</label>
                            <input type="datetime-local" class="form-control" name="tanggal" id="tanggal_telaahan">
                        </div>
                        <div class="form-group col-sm-3 form-hide">
                            <label for="distribusi">Distribusi</label>
                            <select name="distribusi" id="distribusi" class="form-control select2">
                                <option value="1" selected>Sudah</option>
                                <option value="0">Belum</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="indikasi_penyimpangan">Indikasi Penyimpangan</label>
                            <select name="indikasi_penyimpangan" id="indikasi_penyimpangan"
                                class="form-control select2">
                                <option value="1" selected>Iya</option>
                                <option value="0">Tidak Ada</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rekomendasi">Rekomendasi*</label>
                            <input type="text" class="form-control" name="rekomendasi" id="rekomendasi"
                                placeholder="Masukkan rekomendasi">
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="key_telaahan">Jumlah rekomendasi*</label>
                            <input type="text" class="form-control" name="key_telaahan" id="key_telaahan"
                                placeholder="Masukkan key">
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="key_telaahan">Rekomendasi yang harus di tindak lanjut</label>
                            <input type="text" class="form-control" name="key_telaahan" id="key_telaahan" row='4'
                                placeholder="Masukkan key">
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="key_telaahan">Potensi UGR (Rp.)</label>
                            <input type="text" class="form-control" name="key_telaahan" id="key_telaahan"
                                placeholder="Masukkan key">
                        </div>
                        
                        <div class="form-group col-lg-12 form-hide">
                            <label for="key_telaahan">Kesimpulan*</label>
                            <input type="text" class="form-control" name="key_telaahan" id="key_telaahan"
                                placeholder="Masukkan key">
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="file_telaahan">File Telaahan*</label>
                            <input type="file" class="form-control" name="file_telaahan" id="file_telaahan"
                                placeholder="Masukkan file">
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label">Foto Telaahan (.jpeg / .jpg / .png)*</label>
                            <p style="width:100%; min-height: 50px;" class="img-upload-preview"
                                id="upload-target-telaahan"></p>
                            <label class="form-control btn btn-primary" style="color: white !important;">
                                <input class="form-control" type="file" name="image" id="image"
                                    data-target="#upload-target-telaahan" style="display: none;"
                                    accept="image/png, image/jpeg, image/jpg">
                                Unggah Foto
                            </label>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="batas_waktu_pemantauan">Batas Waktu Pemantauan*</label>
                            <input type="datetime-local" class="form-control" name="batas_waktu_pemantauan"
                                id="batas_waktu_pemantauan">
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