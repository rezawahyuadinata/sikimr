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
                            <th data-orderable="true">SID Tahun</th>
                            <th data-orderable="true">SID Pemrakarsa</th>
                            <th data-orderable="true">SID Nilai EE</th>
                            <th data-orderable="true">SID Lingkup Pekerjaan</th>
                            <th data-orderable="true">SID Outcome</th>
                            <th data-orderable="true">Desain Tahun</th>
                            <th data-orderable="true">Desain Pemrakarsa</th>
                            <th data-orderable="true">Desain Nilai EE</th>
                            <th data-orderable="true">Desain Lingkup Kerja</th>
                            <th data-orderable="true">Desain Outcome</th>
                            <th data-orderable="true">Dokumen Lingkungan Tahun</th>
                            <th data-orderable="true">Dokumen Lingkungan Pemrakarsa</th>
                            <th data-orderable="true">Dokumen Lingkungan No Ijin</th>
                            <th data-orderable="true">Dokumen Lingkungan Masa Laku</th>
                            <th data-orderable="true">Dokumentasi Larap Tahun</th>
                            <th data-orderable="true">Dokumentasi Larap Pemrakarsa</th>
                            <th data-orderable="true">Dokumentasi Larap Objek Larap</th>
                            <th data-orderable="true">Sertifikasi Desain</th>
                            <th data-orderable="true">Sertifikasi Pengisian No/Tanggal</th>
                            <th data-orderable="true">Sertifikasi Pengisian Catatan Penting</th>
                            <th data-orderable="true">Sertifikasi OP</th>
                            <th data-orderable="true">Persiapan OP</th>
                            <th data-orderable="true">Pola Rencana No/Tgl/Perihal</th>
                            <th data-orderable="true">Pola Rencana Program</th>
                            <th data-orderable="true">Pola Rencana Tindak Lanjut</th>
                            <th data-orderable="true">Pola Rencana Keterkaitan dengan Program Lain</th>
                            <th data-orderable="true">Pola Pengelolaan SDA No/Tgl/Perihal</th>
                            <th data-orderable="true">Pola Pengelolaan SDA Program</th>
                            <th data-orderable="true">Pola Pengelolaan SDA Tindak Lanjut</th>
                            <th data-orderable="true">Pola Pengelolaan SDA Keterkaitan dengan Program Lain</th>
                            <th data-orderable="true">Rencana Pengelolaan SDA No/Tgl/Perihal</th>
                            <th data-orderable="true">Rencana Pengelolaan SDA Program</th>
                            <th data-orderable="true">Rencana Pengelolaan SDA Tindak Lanjut</th>
                            <th data-orderable="true">Rencana Pengelolaan SDA Keterkaitan dengan Program Lain</th>
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
                    <h3 class="modal-title" id="modal-data-title">Form SID</h3>
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
                            <h3 class="text-bold">SID</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sid_tahun">Tahun</label>
                            <input type="number" class="form-control" name="sid_tahun" id="sid_tahun"
                                placeholder="Masukkan Tahun SID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sid_pemrakarsa">Oleh/Pemrakarsa</label>
                            <input type="text" class="form-control" name="sid_pemrakarsa" id="sid_pemrakarsa" placeholder="Masukkan nama pemrakarsa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sid_ee">Nilai EE</label>
                            <input type="number" class="form-control" name="sid_ee" id="sid_ee"
                                placeholder="Masukkan Tahun SID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sid_lingkup_pekerjaan">Lingkup Pekerjaan</label>
                            <input type="text" class="form-control" name="sid_lingkup_pekerjaan" id="sid_lingkup_pekerjaan" placeholder="Masukkan Lingkup Pekerjaan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sid_outcome">Outcome</label>
                            <input type="text" class="form-control" name="sid_outcome" id="sid_outcome" placeholder="Masukkan Outcome">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Desain</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="desain_tahun">Tahun</label>
                            <input type="number" class="form-control" name="desain_tahun" id="desain_tahun" placeholder="Masukkan Tahun">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="desain_pemrakarsa">Oleh/Pemrakarsa</label>
                            <input type="text" class="form-control" name="desain_pemrakarsa" id="desain_pemrakarsa" placeholder="Masukkan nama Pemrakarsa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="desain_ee">Nilai EE</label>
                            <input type="number" class="form-control" name="desain_ee" id="desain_ee" placeholder="Masukkan Nilai EE">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="desain_lingkup_kerja">Lingkup Kerja</label>
                            <input type="text" class="form-control" name="desain_lingkup_kerja" id="desain_lingkup_kerja" placeholder="Masukkan Lingkup Kerja">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="desain_outcome">Outcome</label>
                            <input type="text" class="form-control" name="desain_outcome" id="desain_outcome" placeholder="Masukkan Outcome">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Dokumen Lingkungan</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="lingkungan_tahun">Tahun</label>
                            <input type="number" class="form-control" name="lingkungan_tahun" id="lingkungan_tahun" placeholder="Masukkan Tahun">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="lingkungan_pemrakarsa">Oleh/Pemrakarsa</label>
                            <input type="text" class="form-control" name="lingkungan_pemrakarsa" id="lingkungan_pemrakarsa" placeholder="Masukkan nama Pemrakarsa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="lingkungan_no_ijin">No Ijin</label>
                            <input type="number" class="form-control" name="lingkungan_no_ijin" id="lingkungan_no_ijin" placeholder="Masukkan No Ijin">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="lingkungan_masa_laku">Masa Laku</label>
                            <input type="text" class="form-control" name="lingkungan_masa_laku" id="lingkungan_masa_laku" placeholder="Masukkan Masa Laku">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Dokumen LARAP</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="larap_tahun">Tahun</label>
                            <input type="number" class="form-control" name="larap_tahun" id="larap_tahun" placeholder="Masukkan Tahun">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="larap_pemrakarsa">Oleh/Pemrakarsa</label>
                            <input type="text" class="form-control" name="larap_pemrakarsa" id="larap_pemrakarsa" placeholder="Masukkan nama Pemrakarsa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="larap_objek">Objek</label>
                            <input type="text" class="form-control" name="larap_objek" id="larap_objek" placeholder="Masukkan Objek">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Sertifikasi Desain</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table-sertifikasi-desain" style="width:100%">
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="addDataDesign()"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="sertifikasi_desain_no">No/Tanggal</label>
                                            <input type="text" class="form-control sertifikasi_desain_no" name="sertifikasi_desain_no[]" id="sertifikasi_desain_no" placeholder="Masukkan No Sertifikasi Desain">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="sertifikasi_desain_lingkup_pekerjaan">Lingkup Pekerjaan</label>
                                            <select name="sertifikasi_desain_lingkup_pekerjaan[]" id="sertifikasi_desain_lingkup_pekerjaan" class="form-control select2 sertifikasi_desain_lingkup_pekerjaan">
                                                <option>Tidak Ada</option>
                                                <option>Ada</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="sertifikasi_desain_catatan_penting">Catatan Penting</label>
                                            <input type="text" class="form-control sertifikasi_desain_catatan_penting" name="sertifikasi_desain_catatan_penting[]" id="sertifikasi_desain_catatan_penting" placeholder="Masukkan Catatan Penting">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDataDesign(this)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Sertifikasi Pengisian</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sertifikasi_pengisian_no">No/Tanggal</label>
                            <input type="text" class="form-control sertifikasi_pengisian_no" name="sertifikasi_pengisian_no" id="sertifikasi_pengisian_no" placeholder="Masukkan No Sertifikasi Pengisian">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sertifikasi_pengisian_catatan">Catatan Penting</label>
                            <input type="text" class="form-control sertifikasi_pengisian_catatan" name="sertifikasi_pengisian_catatan" id="sertifikasi_pengisian_catatan" placeholder="Masukkan Catatan Penting">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Sertifikasi OP</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table-sertifikasi-op" style="width:100%">
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="addDataSOP()"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="sertifikasi_op_no">No/Tanggal</label>
                                            <input type="text" class="form-control sertifikasi_op_no" name="sertifikasi_op_no[]" id="sertifikasi_op_no" placeholder="Masukkan No Sertifikasi Desain">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="sertifikasi_op_catatan">Catatan Penting</label>
                                            <input type="text" class="form-control sertifikasi_op_catatan" name="sertifikasi_op_catatan[]" id="sertifikasi_op_catatan" placeholder="Masukkan Catatan Penting">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDataSOP(this)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Persiapan OP</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table-sertifikasi-pop" style="width:100%">
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="addDataPOP()"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="persiapan_op_pop">POP</label>
                                            <select name="persiapan_op_pop[]" id="persiapan_op_pop" class="form-control select2">
                                                <option>Tidak Ada</option>
                                                <option>Ada</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="persiapan_op_catatan">Catatan Penting</label>
                                            <input type="text" class="form-control persiapan_op_catatan" name="persiapan_op_catatan[]" id="persiapan_op_catatan" placeholder="Masukkan Catatan Penting">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDataPOP(this)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Pola Rencana</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rencana_no">No/Tanggal/Perihal</label>
                            <input type="text" class="form-control" name="rencana_no" id="rencana_no" placeholder="Masukkan No Pola Rencana">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rencana_program">Program</label>
                            <select name="rencana_program" id="rencana_program" class="form-control select2">
                                <option>Tidak Sesuai</option>
                                <option>Sesuai</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide form-rencana-tindak-lanjut">
                            <label for="rencana_tindak_lanjut">Tindak Lanjut</label>
                            <input type="text" class="form-control" name="rencana_tindak_lanjut" id="rencana_tindak_lanjut" placeholder="Masukkan Tindak Lanjut">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rencana_keterkaitan">Keterkaitan dengan Program Lain</label>
                            <input type="text" class="form-control" name="rencana_keterkaitan" id="rencana_keterkaitan" placeholder="Masukkan Keterkaitan dengan program lain">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Pola Pengelolaan SDA</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pola_pengelolaan_sda_no">No/Tanggal/Perihal</label>
                            <input type="text" class="form-control" name="pola_pengelolaan_sda_no" id="pola_pengelolaan_sda_no" placeholder="Masukkan No Pola Pengelolaan SDA">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pola_pengelolaan_sda_program">Program</label>
                            <select name="pola_pengelolaan_sda_program" id="pola_pengelolaan_sda_program" class="form-control select2">
                                <option>Tidak Sesuai</option>
                                <option>Sesuai</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide form-pola_pengelolaan_sda_tindak_lanjut">
                            <label for="pola_pengelolaan_sda_tindak_lanjut">Tindak Lanjut</label>
                            <input type="text" class="form-control" name="pola_pengelolaan_sda_tindak_lanjut" id="pola_pengelolaan_sda_tindak_lanjut" placeholder="Masukkan Tindak Lanjut">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="pola_pengelolaan_sda_keterkaitan">Keterkaitan dengan Program Lain</label>
                            <input type="text" class="form-control" name="pola_pengelolaan_sda_keterkaitan" id="pola_pengelolaan_sda_keterkaitan" placeholder="Masukkan Keterkaitan dengan program lain">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Rencana Pengelolaan SDA</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rencana_pengelolaan_sda_no">No/Tanggal/Perihal</label>
                            <input type="text" class="form-control" name="rencana_pengelolaan_sda_no" id="rencana_pengelolaan_sda_no" placeholder="Masukkan No Rencana Pengelolaan SDA">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rencana_pengelolaan_sda_program">Program</label>
                            <select name="rencana_pengelolaan_sda_program" id="rencana_pengelolaan_sda_program" class="form-control select2">
                                <option>Tidak Sesuai</option>
                                <option>Sesuai</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide form-rencana_pengelolaan_sda_tindak_lanjut">
                            <label for="rencana_pengelolaan_sda_tindak_lanjut">Tindak Lanjut</label>
                            <input type="text" class="form-control" name="rencana_pengelolaan_sda_tindak_lanjut" id="rencana_pengelolaan_sda_tindak_lanjut" placeholder="Masukkan Tindak Lanjut">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="rencana_pengelolaan_sda_keterkaitan">Keterkaitan dengan Program Lain</label>
                            <input type="text" class="form-control" name="rencana_pengelolaan_sda_keterkaitan" id="rencana_pengelolaan_sda_keterkaitan" placeholder="Masukkan Keterkaitan dengan program lain">
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