@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
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
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false">#</th>
                            <th data-orderable="true">PPK</th>
                            <th data-orderable="true">Satuan Kerja</th>
                            <th data-orderable="true">Balai</th>
                            <th data-orderable="true">Alokasi Dana</th>
                            <th data-orderable="true">Sumber Dana</th>
                            <th data-orderable="true">Jumlah Paket Kegiatan</th>
                            <th data-orderable="true">Jumah KAK Delegasi</th>
                            <th data-orderable="true">Jumlah TP OP Non Fisik</th>
                            <th data-orderable="true">Dana TP OP Non Fisik</th>
                            <th data-orderable="true">Jumlah TP OP Fisik</th>
                            <th data-orderable="true">Dana TP OP Fisik</th>
                            <th data-orderable="true">Jumlah Kegiatan Irisan Non Fisik</th>
                            <th data-orderable="true">Dana Kegiatan Irisan Non Fisik</th>
                            <th data-orderable="true">Jumlah Kegiatan Irisian Fisik</th>
                            <th data-orderable="true">Dana Kegiatan Irisian Fisik</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Fisik Progress Rencana</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Fisik Progress Realisasi</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Fisik Deviasi</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Rencana Keuangan</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Realisasi Keuangan</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Deviasi Keuangan</th>
                            <th data-orderable="true">Resiko Keterlambatan Program Terkait</th>
                            <th data-orderable="true">Resiko Keterlambatan Anggaran</th>
                            <th data-orderable="true">Resiko Keterlambatan Output</th>
                            <th data-orderable="true">Resiko Keterlambatan Outcome</th>
                            <th data-orderable="true">Resiko Keterlambatan Penerima Manfaat</th>
                            <th data-orderable="true">Pengaduan Status</th>
                            <th data-orderable="true">Pengaduan Jumlah</th>
                            <th data-orderable="true">Laporan Pelaksanaan Proses</th>
                            <th data-orderable="true">Laporan Pelaksanaan Selesai</th>
                            <th data-orderable="true">Laporan Pelaksanaan Deliver ke Balai</th>
                            
                            <th data-orderable="false"></th>
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
                    <h3 class="modal-title" id="modal-data-title">TP OP</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Unit Kerja</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="ppk">PPK</label>
                            <input type="text" class="form-control" name="ppk" id="ppk"
                                placeholder="Masukkan PPK">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="satuan_kerja">Satuan Kerja</label>
                            <input type="text" class="form-control" name="satuan_kerja" id="satuan_kerja"
                                placeholder="Masukkan Satuan Kerja">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="balai">Balai</label>
                            <input type="text" class="form-control" name="balai" id="balai"
                                placeholder="Masukkan Balai">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="alokasi_dana">Alokasi Dana</label>
                            <input type="number" class="form-control" name="alokasi_dana" id="alokasi_dana"
                                placeholder="Masukkan Alokasi Dana">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sumber_dana">Sumber Dana</label>
                            <select name="sumber_dana" id="sumber_dana" class="form-control select2">
                                <option>APBN</option>
                                <option>SBSN</option>
                                <option>PHLN</option>
                            </select>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Paket Kegiatan</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="jumlah_paket_kegiatan">Jumlah Paket Kegiatan</label>
                            <input type="number" class="form-control" name="jumlah_paket_kegiatan" id="jumlah_paket_kegiatan"
                                placeholder="Masukkan Nomor dan Tanggal Addendum">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="jumlah_kak_delegasi">Jumlah KAK yang didelegasi</label>
                            <input type="number" class="form-control" name="jumlah_kak_delegasi" id="jumlah_kak_delegasi"
                                placeholder="Masukkan Jumlah KAK yang didelegasi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tp_op_non_fisik_jumlah">Jumlah Paket TP OP Non Fisik</label>
                            <input type="number" class="form-control" name="tp_op_non_fisik_jumlah" id="tp_op_non_fisik_jumlah"
                                placeholder="Masukkan Jumlah Paket TP OP Non Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tp_op_non_fisik_dana">Jumlah Dana TP OP Non Fisik</label>
                            <input type="number" class="form-control" name="tp_op_non_fisik_dana" id="tp_op_non_fisik_dana"
                                placeholder="Masukkan Jumlah Dana TP OP Non Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tp_op_fisik_jumlah">Jumlah Paket TP OP Fisik</label>
                            <input type="number" class="form-control" name="tp_op_fisik_jumlah" id="tp_op_fisik_jumlah"
                                placeholder="Masukkan Jumlah Paket TP OP Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tp_op_fisik_dana">Jumlah Dana TP OP Fisik</label>
                            <input type="number" class="form-control" name="tp_op_fisik_dana" id="tp_op_fisik_dana"
                                placeholder="Masukkan Jumlah Dana TP OP Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kegiatan_irisan_non_fisik_jumlah">Jumlah Paket Kegiatan yang beriirisan dengan TP-OP Non Fisik</label>
                            <input type="number" class="form-control" name="kegiatan_irisan_non_fisik_jumlah" id="kegiatan_irisan_non_fisik_jumlah"
                                placeholder="Masukkan Jumlah Paket Kegiatan yang beriirisan dengan TP-OP Non Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kegiatan_irisan_non_fisik_dana">Jumlah Dana Kegiatan yang beriirisan dengan TP-OP Non Fisik</label>
                            <input type="number" class="form-control" name="kegiatan_irisan_non_fisik_dana" id="kegiatan_irisan_non_fisik_dana"
                                placeholder="Masukkan Jumlah Dana Kegiatan yang beriirisan dengan TP-OP Non Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kegiatan_irisan_fisik_jumlah">Jumlah Paket Kegiatan yang beriirisan dengan TP-OP Fisik</label>
                            <input type="number" class="form-control" name="kegiatan_irisan_fisik_jumlah" id="kegiatan_irisan_fisik_jumlah"
                                placeholder="Masukkan Jumlah Paket Kegiatan yang beriirisan dengan TP-OP Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kegiatan_irisan_fisik_dana">Jumlah Dana Kegiatan yang beriirisan dengan TP-OP Fisik</label>
                            <input type="number" class="form-control" name="kegiatan_irisan_fisik_dana" id="kegiatan_irisan_fisik_dana"
                                placeholder="Masukkan Jumlah Dana Kegiatan yang beriirisan dengan TP-OP Fisik">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Monitoring dan Evalusasi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_fisik_progres_rencana">Progres Rencana Fisik</label>
                            <input type="number" class="form-control" name="monev_fisik_progres_rencana" id="monev_fisik_progres_rencana"
                                placeholder="Masukkan Progres Rencana Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_fisik_progres_realisasi">Progres Realisasi Fisik</label>
                            <input type="number" class="form-control" name="monev_fisik_progres_realisasi" id="monev_fisik_progres_realisasi"
                                placeholder="Masukkan Progres Realisasi Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_fisik_progres_deviasi">Deviasi Fisik</label>
                            <input type="number" class="form-control" name="monev_fisik_progres_deviasi" id="monev_fisik_progres_deviasi"
                                placeholder="Masukkan Deviasi Fisik">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_keuangan_rencana">Progres Rencana Keuangan</label>
                            <input type="number" class="form-control" name="monev_keuangan_rencana" id="monev_keuangan_rencana"
                                placeholder="Masukkan Progres Rencana Keuangan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_keuangan_realisasi">Progres Realisasi Keuangan</label>
                            <input type="number" class="form-control" name="monev_keuangan_realisasi" id="monev_keuangan_realisasi"
                                placeholder="Masukkan Progres Realisasi Keuangan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_keuangan_deviasi">Deviasi Keuangan</label>
                            <input type="number" class="form-control" name="monev_keuangan_deviasi" id="monev_keuangan_deviasi"
                                placeholder="Masukkan Deviasi Keuangan">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Resiko Keterlambatan</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_program_terkait">Program Terkait</label>
                            <input type="text" class="form-control" name="resiko_program_terkait" id="resiko_program_terkait"
                                placeholder="Masukkan Program Terkait">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_anggaran">Anggaran</label>
                            <input type="text" class="form-control" name="resiko_anggaran" id="resiko_anggaran"
                                placeholder="Masukkan Anggaran">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_output">Output</label>
                            <input type="text" class="form-control" name="resiko_output" id="resiko_output"
                                placeholder="Masukkan Output">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_outcome">Outcome</label>
                            <input type="text" class="form-control" name="resiko_outcome" id="resiko_outcome"
                                placeholder="Masukkan Outcome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_penerima_manfaat">Penerima Manfaat</label>
                            <input type="text" class="form-control" name="resiko_penerima_manfaat" id="resiko_penerima_manfaat"
                                placeholder="Masukkan Penerima Manfaat">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Pengaduan</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pengaduan_status">Status Pengaduan</label>
                            <select name="pengaduan_status" id="pengaduan_status" class="form-control select2">
                                <option>Tidak Ada</option>
                                <option>Ada</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pengaduan_jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="pengaduan_jumlah" id="pengaduan_jumlah"
                                placeholder="Masukkan Deviasi">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Laporan Pelaksanaan TP OP</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="laporan_pelaksanaan_proses">Proses</label>
                            <input type="text" class="form-control" name="laporan_pelaksanaan_proses" id="laporan_pelaksanaan_proses"
                                placeholder="Masukkan Proses">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="laporan_pelaksanaan_selesai">Selesai</label>
                            <input type="number" class="form-control" name="laporan_pelaksanaan_selesai" id="laporan_pelaksanaan_selesai"
                                placeholder="Masukkan Deviasi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="laporan_pelaksanaan_deliver">Deliver</label>
                            <input type="number" class="form-control" name="laporan_pelaksanaan_deliver" id="laporan_pelaksanaan_deliver"
                                placeholder="Masukkan Deviasi">
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

<script>
    var urlData = '{{ route( $data->page->class . ".read") }}';
    var urlInsert = '{{ route( $data->page->class . ".store") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update") }}';
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
</script>
@endsection