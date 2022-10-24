<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block" onclick="addData('#modal-sasaran', '#form-sasaran')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-sasaran" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Sasaran Output</th>
                    <th data-orderable="true">Indikator Sasaran</th>
                    <th data-orderable="true">Kegiatan Utama</th>
                    <th data-orderable="true">Tujuan Kegiatan Utama</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-sasaran" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-sasaran">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-sasaran-title">Form Sasaran </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="paket_sasaran_id" id="paket_sasaran_id" required>
                    <div class="row">
                        <div class="form-group col-sm-12 form-hide">
                            <label for="sasaran_tingkat">Tingkat</label>
                            <select name="sasaran_tingkat" id="sasaran_tingkat" class="form-control select2">
                                <option value="1">UPR-T1</option>
                                <option value="2">UPR-T2</option>
                                <option value="3">UPR-T3</option>
                                <option value="4" selected>UPR-T3</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="sasaran_manual">Sasaran Output</label>
                            <textarea name="sasaran_manual" id="sasaran_manual" class="form-control" rows="5" required>{{ $data->paket_pekerjaan->nmpaket }}</textarea>
                            <input type="hidden" class="form-control" name="sasaran_id" id="sasaran_id" required value="{{ $data->paket_pekerjaan->id }}">
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="indikator_manual">Indikator Sasaran</label>
                            <textarea name="indikator_manual" id="indikator_manual" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="kegiatan_manual">Kegiatan Utama</label>
                            <textarea name="kegiatan_manual" id="kegiatan_manual" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="kegiatan_tujuan">Tujuan Kegiatan Utama</label>
                            <textarea name="kegiatan_tujuan" id="kegiatan_tujuan" class="form-control" rows="5" required></textarea>
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