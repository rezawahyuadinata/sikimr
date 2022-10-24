<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block"
            onclick="addData('#modal-pembahasan', '#form-pembahasan')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-pembahasan" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="false">Progres Penelaahan</th>
                    <th data-orderable="true">Memo Dinas</th>
                    <th data-orderable="true">Nomor MD</th>
                    <th data-orderable="true">Bentuk Pembahasan</th>
                    <th data-orderable="true">Tanggal</th>
                    <th data-orderable="true">Catatan</th>
                    <th data-orderable="true">File Memo</th>
                    <th data-orderable="true">Dokumentasi</th>
                    <th data-orderable="true">Batas Waktu Pengumpulan Data yang di akhir</th>
                    <th data-orderable="false">Proses</th>
                    <th data-orderable="false">Hambatan</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-pembahasan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-pembahasan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-pembahasan-title">Progres Penelaahan dan Rekomendasi</h3>
                </div>
                <!-- <div class="form-group col-sm-12 form-hide">
                            <label for="status">Progres Penelaahan</label>
                            <select name="status" id="status" class="form-control select2">
                                <option value="0" selected>Pilih</option>
                                <option value="BTL">Belum Tindak Lanjut</option>
                                <option value="Sesuai">Sesuai</option>
                                <option value="TL">Tidak Relevan</option>
                            </select>
                        
                </div> -->
                
                
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="pembahasan_id" required>
                    <div class="row">
                        <div class="form-group col-sm-12 form-hide">
                            <label for="progres_penelaahan">Progres Penelaahan</label>
                            <select name="progres_penelaahan" id="progres_penelaahan" class="form-control select">
                                <option value="Belum Tindak Lanjut"selected>Belum Tindak Lanjut</option>
                                <option value="Sesuai">Sesuai</option>
                                <option value="Tidak Relevan">Tidak Relevan</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="memo_dinas">Memo Dinas*</label>
                            <input type="text" class="form-control" name="memo_dinas" id="memo_dinas"
                                placeholder="Masukkan memo">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="nomor_md">Nomor MD*</label>
                            <input type="text" class="form-control" name="nomor_md" id="nomor_md"
                                placeholder="Masukkan memo">
                        </div>
                        <div class="form-group col-sm-6 form-hide">
                            <label for="bentuk_pembahasan">Bentuk Pembahasan</label>
                            <select name="bentuk_pembahasan" id="bentuk_pembahasan" class="form-control select2">
                                <option value="1" selected>Online</option>
                                <option value="2">Offline</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="tanggal">Tanggal*</label>
                            <input type="datetime-local" class="form-control" name="tanggal" id="tanggal">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="catatan">Catatan*</label>
                            <input type="text" class="form-control" name="catatan" id="catatan"
                                placeholder="Masukkan catatan">
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="file_memo">File Memo*</label>
                            <input type="file" class="form-control" name="file_memo" id="file_memo"
                                placeholder="Masukkan file">
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label">Dokumentasi (.jpeg / .jpg / .png)*</label>
                            <p style="width:100%; min-height: 50px;" class="img-upload-preview" id="upload-target"></p>
                            <label class="form-control btn btn-primary" style="color: white !important;">
                                <input class="form-control" type="file" name="image" id="image"
                                    data-target="#upload-target" style="display: none;"
                                    accept="image/png, image/jpeg, image/jpg">
                                Unggah Foto
                            </label>
                        </div>
                        <div class="form-group col-lg-6 form-hide">
                            <label for="batas_waktu_peninjauan">Batas Waktu Pengumpulan Data yang di akhir*</label>
                            <input type="datetime-local" class="form-control" name="batas_waktu_peninjauan"
                                id="batas_waktu_peninjauan">
                        </div>
                        <div class="form-group col-sm-6 form-hide">
                            <label for="proses">Proses</label>
                            <select name="proses" id="proses" class="form-control select">
                                <option value="" selected>Pilih</option>
                                <option value="Rapat Pembahasan">Rapat Pembahasan</option>
                                <option value="Survei Lapangan">Survei Lapangan</option>
                                <option value="Memo Dinas">Memo Dinas</option>
                                <option value="Menunggu Kelengkapan Data">Menunggu Kelengkapan Data</option>
                                <option value="Penyusunan Penelaahan">Penyusunan Penelaahan</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="hambatan">Hambatan Proses Tindak Lanjut</label>
                            <input type="text" class="form-control" name="hambatan" id="hambatan"
                                placeholder="Masukkan Hambatan">
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