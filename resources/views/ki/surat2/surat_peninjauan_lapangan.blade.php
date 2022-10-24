<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block"
            onclick="addData('#modal-peninjauan_lapangan', '#form-peninjauan_lapangan')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-peninjauan_lapangan" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Waktu Pelaksanaan</th>
                    <th data-orderable="true">Lokasi</th>
                    <th data-orderable="true">Pegawai Ditugaskan</th>
                    <th data-orderable="true">Hasil Peninjauan Lapangan</th>
                    <th data-orderable="true">File Laporan</th>
                    <th data-orderable="true">Foto Laporan</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-peninjauan_lapangan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-peninjauan_lapangan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-peninjauan_lapangan-title">Form Peninjauan Lapangan </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="peninjauan_lapangan_id" required>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="waktu_pelaksanaan">Waktu Pelaksanaan*</label>
                            <input type="datetime-local" class="form-control" name="waktu_pelaksanaan"
                                id="waktu_pelaksanaan">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="lokasi">Lokasi*</label>
                            <input type="text" class="form-control" name="lokasi" id="lokasi"
                                placeholder="Masukkan lokasi">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pegawai_ditugaskan">Pegawai Ditugaskan*</label>
                            <input type="text" class="form-control" name="pegawai_ditugaskan" id="pegawai_ditugaskan"
                                placeholder="Masukkan pegawai">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="hasil_laporan">Hasil Peninjauan Lapangan*</label>
                            <input type="text" class="form-control" name="hasil_laporan" id="hasil_laporan"
                                placeholder="Masukkan laporan">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="file_laporan">File Laporan*</label>
                            <input type="file" class="form-control" name="file_laporan" id="file_laporan"
                                placeholder="Masukkan file">
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label">Foto Laporan (.jpeg / .jpg / .png)*</label>
                            <p style="width:100%; min-height: 200px;" class="img-upload-preview"
                                id="upload-target-laporan"></p>
                            <label class="form-control btn btn-primary" style="color: white !important;">
                                <input class="form-control" type="file" name="image" id="image"
                                    data-target="#upload-target-laporan" style="display: none;"
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