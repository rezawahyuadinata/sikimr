<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block" onclick="addData('#modal-tujuan', '#form-tujuan')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-tujuan" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Tujuan Pelaksanaan</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-tujuan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-tujuan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-tujuan-title">Form Tujuan Pelaksanaan </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="tujuan_id" id="tujuan_id" required>
                    <div class="row">
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tujuan_pelaksanaan">Tujuan Pelaksanaan</label>
                            <textarea name="tujuan_pelaksanaan" id="tujuan_pelaksanaan" class="form-control" rows="5" required></textarea>
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