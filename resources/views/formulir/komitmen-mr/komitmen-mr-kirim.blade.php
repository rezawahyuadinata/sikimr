<form id="form-submit">
    <div class="row">
        <div class="form-group col-lg-3 form-hide">
            <label for="mr_status">Status</label><br>
            <div class="radio">
                <label for="aktif0">
                    <input type="radio" name="mr_status" id="aktif0" value="0">
                    Draft
                </label>
            </div>
            <div class="radio">
                <label for="aktif1">
                    <input type="radio" name="mr_status" id="aktif1" value="1">
                    Kirim
                </label>
                <label id="notif-kirim" class="text-warning" style="display: none;">Tidak dapat mengirim dokumen, lengkapi isian.</label>
            </div>
        </div>
        <div class="form-group col-lg-12 form-hide">
            <label for="">Pemilik dan Pengelola Risiko telah menyusun dan melakukan reviu dokumen sesuai ketentuan peraturan</label>
        </div>
        <div class="form-group col-lg-12 form-hide">
            Catatan : <label for="">{{ isset($data->komitmen_mr->verifikasi_catatan) ? $data->komitmen_mr->verifikasi_catatan : '-' }}</label>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-lg-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>