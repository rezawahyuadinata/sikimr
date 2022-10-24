<div class="row">
    <div class="col-sm-10">
<h3><b>2. Daftar Pemangku Kepentingan</b></h3>
    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block"
            onclick="addData('#modal-pemangku_kepentingan', '#form-pemangku_kepentingan')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-pemangku_kepentingan" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false" style="text-align: center;">No</th>
                    <th data-orderable="true" style="text-align: center;">Daftar Pemangku Kepentingan</th>
                    <th data-orderable="true" style="text-align: center;">Keterangan</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-pemangku_kepentingan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-pemangku_kepentingan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-pemangku_kepentingan-title">2. Daftar Pemangku Kepentingan </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="pemangku_kepentingan_id"
                        id="pemangku_kepentingan_id" required>
                    <div class="row">
                        <div class="form-group col-sm-12 form-hide">
                            <label for="pemangku_kepentingan">Pemangku Kepentingan</label>
                            <textarea name="pemangku_kepentingan" id="pemangku_kepentingan" class="form-control"
                                rows="5" required></textarea>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="pemangku_kepentingan_keterangan">Keterangan</label>
                            <textarea name="pemangku_kepentingan_keterangan" id="pemangku_kepentingan_keterangan"
                                class="form-control" rows="5" required></textarea>
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