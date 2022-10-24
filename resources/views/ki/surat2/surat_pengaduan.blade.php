<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block"
            onclick="addData('#modal-pengaduan', '#form-pengaduan')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-pengaduan" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Jenis Pengaduan</th>
                    <!-- <th data-orderable="true">Unit Kerja</th> -->
                    <th data-orderable="true">UPT - Unit Kerja</th>
                    <th data-orderable="true">Pemilik Risiko Satker</th>
                    <th data-orderable="true">Pemilik Risiko PPK</th>
                    <th data-orderable="true">Kegiatan</th>
                    <th data-orderable="true">Terkait APH</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-pengaduan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-pengaduan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-pengaduan-title">Terlapor </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="pengaduan_id" required>
                    <div class="row">
                        <div class="form-group col-sm-12 form-hide">
                            <label for="jenis_pengaduan">Jenis Pengaduan</label>
                            <select name="jenis_pengaduan" id="jenis_pengaduan" class="form-control select2">
                                <option value="1" selected>Kegiatan</option>
                                <option value="2">Umum</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-12 form-hide">
                            <label for="pemilik_resiko_bws">UPT - Unit Kerja *</label>
                            <input type="text" class="form-control" name="pemilik_resiko_bws" id="pemilik_resiko_bws"
                                placeholder="Masukkan UPT - Unit Kerja">
                        </div>

                    
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pemilik_resiko_satker">SATKER*</label>
                            <select name="pemilik_resiko_satker" id="pemilik_resiko_satker"class="form-control select2">
                                @foreach ($data->satker as $itemS)
                                <option value="{{ $itemS->ID }}">{{ $itemS->ID.' - '.$itemS->NAMA }}</option>
                                @endforeach
                            </select>
                        </div>
                        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#pemilik_resiko_satker').change(function() {
                                var e = document.getElementById("pemilik_resiko_satker");
                                var id_satker = e.value;
                                console.log(id_satker);
                                var id = $(this).val();
                                var url = '{{ route("getsippk", ":id_satker") }}';
                                url = url.replace(':id_satker', id_satker);
                                $("#pemilik_resiko_ppk").empty();
                                $.ajax({
                                    url: url,
                                    type: 'get',
                                    dataType: 'json',
                                    success: function(response) {
                                        
                                        $.each(response, function(i, index) {
                                            var ppk = document.createElement("option");
                                            ppk.text = index.SATKER_ID + " - " + index.KETUA;
                                            ppk.value = index.SATKER_ID + " - " + index.KETUA;
                                            document.getElementById("pemilik_resiko_ppk").options.add(ppk); 
                                        });
                                        // if (response != null) {
                                        //     var isian = response.SATKER_ID + " - " + response.KETUA;
                                        //     $('#pemilik_resiko_ppk').val(isian);
                                        // }
                                        }
                                    });
                                });
                            });
                        </script>
                        <!-- <div class="form-group col-lg-12 form-hide">
                            <label for="pemilik_resiko_ppk">PPK *</label>
                            <input type="text" class="form-control" name="pemilik_resiko_ppk" id="pemilik_resiko_ppk"
                                placeholder="" readonly>
                        </div> -->

                        <!-- <script>
                            $(document).ready(function() {
                                $('#pemilik_resiko_satker').change(function() {
                                    var e = document.getElementById("pemilik_resiko_satker");
                                    var id_satker = e.value;
                                });
                            });
                            <?php   

                                    $datas = DB::table('ppk')->select('NAMA','SATKER_ID')->where('SATKER_ID','<script>document.write(id_satker)</script>')->get(); 
                                
                            ?>
                        </script>

                        <?php echo $datas; ?> -->

                        <div class="form-group col-lg-12 form-hide">
                            <label for="pemilik_resiko_ppk">PPK *</label>
                            <select name="pemilik_resiko_ppk" id="pemilik_resiko_ppk"class="form-control select2">

                            </select>
                        </div>

                        <div class="form-group col-lg-12 form-hide">
                            <label for="kegiatan">Kegiatan*</label>
                            <input type="text" class="form-control" name="kegiatan" id="kegiatan"
                                placeholder="Masukkan kegiatan">
                        </div>
                        
                        <div class="form-group col-sm-12 form-hide">
                            <label for="terkait_aph">Terkait APH</label>
                            <select name="terkait_aph" id="terkait_aph" class="form-control select2">
                                <option value="1" selected>Ya</option>
                                <option value="0">Tidak</option>
                            </select>
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