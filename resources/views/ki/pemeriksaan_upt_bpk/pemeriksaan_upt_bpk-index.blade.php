@extends('layouts.layout_menu_all')

@section('content')
{{-- <div class="row">
    <div class="form-group col-sm-2">
        @isset($data->page->fitur->create)
        <label>&nbsp;</label>
        <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
            Tambah
        </button>
        @endisset
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-12"></div>
</div> --}}
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false"  rowspan="3">#</th>
                            {{-- <th data-orderable="true" rowspan="3">Tanggal</th> --}}
                            {{-- <th data-orderable="true" rowspan="3">Unor</th> --}}
                            <th data-orderable="true" rowspan="3">Unit Kerja</th>
                            {{-- <th data-orderable="true" rowspan="3">Tahun</th>
                            <th data-orderable="true" rowspan="3">Jenis LHP</th> --}}
                            <th data-orderable="false" colspan="2" rowspan="2">Rekomendasi</th>
                            <th data-orderable="false" colspan="8" class="text-center">Status Tindak Lanjut Rekomendasi Hasil Pemeriksaan BPK RI</th>
                            {{-- <th data-orderable="true" rowspan="3">Deskripsi Tindak Lanjut</th> --}}

                        </tr>
                        <tr>
                            <th data-orderable="false" colspan="2">Sesuai</th>
                            <th data-orderable="false" colspan="2">Belum Sesuai</th>
                            <th data-orderable="false" colspan="2">Belum Ditindaklanjuti</th>
                            <th data-orderable="false" colspan="2">Tidak Dapat Ditindaklanjuti</th>
                        </tr>
                        <tr>
                            <th data-orderable="true">Jumlah Rekomendasi</th>
                            <th data-orderable="true">Nilai Rekomendasi (Rp)</th>
                            <th data-orderable="true">Jumlah Rekomendasi</th>
                            <th data-orderable="true">Nilai Rekomendasi (Rp)</th>
                            <th data-orderable="true">Jumlah Rekomendasi</th>
                            <th data-orderable="true">Nilai Rekomendasi (Rp)</th>
                            <th data-orderable="true">Jumlah Rekomendasi</th>
                            <th data-orderable="true">Nilai Rekomendasi (Rp)</th>
                            <th data-orderable="true">Jumlah Rekomendasi</th>
                            <th data-orderable="true">Nilai Rekomendasi (Rp)</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-data-title">Pemeriksaan BPK</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    {{-- <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="unor">UNOR</label>
                            <input type="text" class="form-control" name="unor" id="unor" placeholder="Masukkan UNOR">
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="nomor_lhp_bpk">Nomor LHP BPK</label>
                            <input type="text" class="form-control" name="nomor_lhp_bpk" id="nomor_lhp_bpk" placeholder="Masukkan Nomor LHP BPK">
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun">
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="jenis_lhp">Jenis LHP</label>
                            <input type="number" class="form-control" name="jenis_lhp" id="jenis_lhp" placeholder="Masukkan Jenis LHP">
                        </div>
                    </div> --}}

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Rekomendasi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rekomendasi_jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="rekomendasi_jumlah" id="rekomendasi_jumlah" placeholder="Masukkan Jumlah">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rekomendasi_nilai">Nilai</label>
                            <input type="number" class="form-control" name="rekomendasi_nilai" id="rekomendasi_nilai" placeholder="Masukkan Nilai">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Status Tindak Lanjut Rekomendasi Sesuai</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_sesuai_rekomendasi_jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="tindak_lanjut_sesuai_rekomendasi_jumlah" id="tindak_lanjut_sesuai_rekomendasi_jumlah" placeholder="Masukkan Jumlah">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_sesuai_rekomendasi_nilai">Nilai</label>
                            <input type="number" class="form-control" name="tindak_lanjut_sesuai_rekomendasi_nilai" id="tindak_lanjut_sesuai_rekomendasi_nilai" placeholder="Masukkan Nilai">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Status Tindak Lanjut Rekomendasi Belum Sesuai</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_belum_sesuai_rekomendasi_jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="tindak_lanjut_belum_sesuai_rekomendasi_jumlah" id="tindak_lanjut_belum_sesuai_rekomendasi_jumlah" placeholder="Masukkan Jumlah">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_belum_sesuai_rekomendasi_nilai">Nilai</label>
                            <input type="number" class="form-control" name="tindak_lanjut_belum_sesuai_rekomendasi_nilai" id="tindak_lanjut_belum_sesuai_rekomendasi_nilai" placeholder="Masukkan Nilai">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Status Tindak Lanjut Rekomendasi Belum Ditindaklanjuti</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah" id="tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah" placeholder="Masukkan Jumlah">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai">Nilai</label>
                            <input type="number" class="form-control" name="tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai" id="tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai" placeholder="Nilai">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Status Tindak Lanjut Rekomendasi Tidak Dapat Ditindaklanjuti</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah" id="tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah" placeholder="Masukkan Jumlah">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai">Nilai</label>
                            <input type="number" class="form-control" name="tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai" id="tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai" placeholder="Masukkan Nilai">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="deskripsi_tindak_lanjut">Deskripsi Tindak Lanjut</label>
                            <input type="text" class="form-control" name="deskripsi_tindak_lanjut" id="deskripsi_tindak_lanjut" placeholder="Masukkan Deskripsi">
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default d-none" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var urlData = '{{ route( $data->page->class . ".read") }}';
    var urlInsert = '{{ route( $data->page->class . ".store") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update") }}';
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
</script>
@endsection