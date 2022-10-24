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
                            <th data-orderable="true">Nama Paket</th>
                            <th data-orderable="true">No / Tanggal Kontrak</th>
                            <th data-orderable="true">Nama Penyedia Jasa</th>
                            <th data-orderable="true">Mulai Masa Kontrak</th>
                            <th data-orderable="true">Akhir Masa Kontrak</th>
                            <th data-orderable="true">Nilai Kontrak</th>
                            <th data-orderable="true">Sumber Dana</th>
                            <th data-orderable="true">Jenis Kontrak</th>
                            <th data-orderable="true">No / Tanggal Addendum Kontrak</th>
                            <th data-orderable="true">Substansi Perubahan Addendum</th>
                            <th data-orderable="true">Substansi Perubahan Addendum Lainnya</th>
                            <th data-orderable="true">Substansi Perubahan Addendum Keterangan</th>
                            <th data-orderable="true">Justifikasi / Analisis Addendum Status</th>
                            <th data-orderable="true">Justifikasi / Analisis Addendum Keterangan</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Pergantian Tenaga Inti</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Progres Rencana (%)</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Progres Realisasi (%)</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Progres Deviasi (%)</th>
                            <th data-orderable="true">Resiko Keterlambatan Program Terkait</th>
                            <th data-orderable="true">Resiko Keterlambatan Anggaran</th>
                            <th data-orderable="true">Resiko Keterlambatan Output</th>
                            <th data-orderable="true">Resiko Keterlambatan Outcome</th>
                            <th data-orderable="true">Resiko Keterlambatan Penerima Manfaat</th>
                            <th data-orderable="true">Status Pengaduan</th>
                            <th data-orderable="true">Jumlah Pengaduan</th>
                            
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
                    <h3 class="modal-title" id="modal-data-title">OP Kontraktual</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kdpaket">Nama Paket</label>
                            <select name="kdpaket" id="kdpaket" class="form-control select2">
                                @foreach ($data->pakets as $paket)
                                    <option value="{{ $paket->kdpaket }}">{{ $paket->nmpaket }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Data Kontrak</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kontrak_no">No dan Tanggal Kontrak</label>
                            <input type="number" class="form-control" name="kontrak_no" id="kontrak_no"
                                placeholder="Masukkan No Kontrak">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kontrak_penyedia_jasa">Nama Penyedia Jasa</label>
                            <input type="number" class="form-control" name="kontrak_penyedia_jasa" id="kontrak_penyedia_jasa"
                                placeholder="Masukkan Nama Penyedia Jasa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kontrak_mulai">Mulai Masa Kontrak</label>
                            <input type="number" class="form-control" name="kontrak_mulai" id="kontrak_mulai"
                                placeholder="Masukkan Mulai Masa Kontrak">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kontrak_selesai">Akhir Masa Kontrak</label>
                            <input type="number" class="form-control" name="kontrak_selesai" id="kontrak_selesai"
                                placeholder="Masukkan Akhir Masa Kontrak">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kontrak_nilai">Nilai Kontrak</label>
                            <input type="number" class="form-control" name="kontrak_nilai" id="kontrak_nilai"
                                placeholder="Masukkan Nilai Kontrak">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kontrak_sumber_dana">Sumber Dana</label>
                            <select name="kontrak_sumber_dana" id="kontrak_sumber_dana" class="form-control select2">
                                <option>APBN</option>
                                <option>SBSN</option>
                                <option>PHLN</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kontrak_jenis">Jenis Kontrak</label>
                            <select name="kontrak_jenis" id="kontrak_jenis" class="form-control select2">
                                <option>SYC</option>
                                <option>MYC</option>
                            </select>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Addendum Kontrak</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="addendum_no">Nomor dan Tanggal Addendum</label>
                            <input type="text" class="form-control" name="addendum_no" id="addendum_no"
                                placeholder="Masukkan Nomor dan Tanggal Addendum">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <div class="row">
                                <div class="form-group col-lg-12 form-hide">
                                    <label for="addendum_perubahan">Substansi Perubahan</label>
                                    <select name="addendum_perubahan[]" id="addendum_perubahan" class="form-control select2 multiple" multiple>
                                        <option>Administratif</option>
                                        <option>Teknis</option>
                                        <option>Nilai Kontrak</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide form-addendum-lainnya">
                            <label for="addendum_perubahan_lainnya">Substansi Perubahan Lainnya</label>
                            <input type="text" class="form-control" name="addendum_perubahan_lainnya" id="addendum_perubahan_lainnya"
                                placeholder="Masukkan Substansi Perubahan Lainnya">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="addendum_perubahan_keterangan">Substansi Perubahan Keterangan</label>
                            <input type="text" class="form-control" name="addendum_perubahan_keterangan" id="addendum_perubahan_keterangan"
                                placeholder="Masukkan Substansi Perubahan Keterangan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="addendum_analisis_status">Justifikasi / Analisis Professional</label>
                            <select name="addendum_analisis_status" id="addendum_analisis_status" class="form-control select2">
                                <option>Ada</option>
                                <option>Tidak Ada</option>
                                <option>Lengkap</option>
                                <option>Terverifikasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="addendum_analisis_keterangan">Keterangan Justifikasi / Analisis Professional</label>
                            <input type="text" class="form-control" name="addendum_analisis_keterangan" id="addendum_analisis_keterangan"
                                placeholder="Masukkan Keterangan Justifikasi / Analisis Professional">
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
                            <label for="monev_pergantian_tenaga_inti">Pergantian Tenaga Inti</label>
                            <select name="monev_pergantian_tenaga_inti" id="monev_pergantian_tenaga_inti" class="form-control select2">
                                <option>Tidak Ada</option>
                                <option>Ada</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_progres_rencana">Progres Rencana (%)</label>
                            <input type="number" class="form-control" name="monev_progres_rencana" id="monev_progres_rencana"
                                placeholder="Masukkan Progres Rencana">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_progres_realisasi">Progres Realisasi (%)</label>
                            <input type="number" class="form-control" name="monev_progres_realisasi" id="monev_progres_realisasi"
                                placeholder="Masukkan Progres Realisasi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_deviasi">Deviasi (%)</label>
                            <input type="number" class="form-control" name="monev_deviasi" id="monev_deviasi"
                                placeholder="Masukkan Deviasi">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Risiko Keterlambatan</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_program_terkait">Program Terkait</label>
                            <input type="text" class="form-control" name="resiko_program_terkait" id="resiko_program_terkait"
                                placeholder="Program Terkait">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_anggaran">Anggaran</label>
                            <input type="text" class="form-control" name="resiko_anggaran" id="resiko_anggaran"
                                placeholder="Anggaran">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_output">Output</label>
                            <input type="text" class="form-control" name="resiko_output" id="resiko_output"
                                placeholder="Output">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_outcome">Outcome</label>
                            <input type="text" class="form-control" name="resiko_outcome" id="resiko_outcome"
                                placeholder="Outcome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_penerima_manfaat">Penerima Manfaat</label>
                            <input type="text" class="form-control" name="resiko_penerima_manfaat" id="resiko_penerima_manfaat"
                                placeholder="Penerima Manfaat">
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
                                placeholder="Masukkan Jumlah">
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