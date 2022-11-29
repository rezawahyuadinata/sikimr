@extends('layouts.layout_menu_all')

@section('content')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        select[readonly].select2-hidden-accessible+.select2-container {
            pointer-events: none;
            touch-action: none;
        }

        select[readonly].select2-hidden-accessible+.select2-container .select2-selection {
            background: #eee;
            box-shadow: none;
        }

        select[readonly].select2-hidden-accessible+.select2-container .select2-selection__arrow,
        select[readonly].select2-hidden-accessible+.select2-container .select2-selection__clear {
            display: none;
        }
    </style>
    <input type="hidden" name="pemantauan_id" id="pemantauan_id" value="">
    <input type="hidden" name="level" id="level" value="{{ $data->user->level }}">
    <div class="row">
        <div class="col-md-12">
            <div class="box collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Dokumen</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width: 100%;" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width: 25%">Nomor Dokumen Pemantauan Inovasi Pengendalian</td>
                                    <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->pemantauan_nomor : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tanggal Dokumen</td>
                                    <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->pemantauan_tanggal : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Triwulan</td>
                                    <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->triwulan : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tahun</td>
                                    <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->tahun : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Nomor Dokumen Komitmen</td>
                                    <td>{{ isset($data->pemantauan_mr->komitmen_mr) ? $data->pemantauan_mr->komitmen_mr->mr_nomor : '-' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_a" data-toggle="tab">PEMANTAUAN INOVASI PENGENDALIAN</a></li>
                    <li><a href="#tab_b" data-toggle="tab">TINJAUAN ATAS RISIKO BARU ATAU MASALAH YANG BELUM
                            TERIDENTIFIKASI</a></li>
                    <li><a href="#tab_c" data-toggle="tab">DAFTAR PEMANTAUAN LEVEL RISIKO</a></li>
                    @if (!in_array($data->user->pengguna_kategori->pengguna_kategori_spesial, ['pengelola', 'operator']))
                        <li><a href="#tab_g" data-toggle="tab">Kirim Dokumen</a></li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_a">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-10">

                                            </div>
                                            <div class="form-group col-sm-2">
                                                {{-- catatan: <button class="btn btn-primary btn-block"
                                                onclick="addDataMr('#modal-pemantauan_detail', '#form-pemantauan_detail')">Tambah</button> --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 table-responsive">
                                                <table id="table-pemantauan_detail"
                                                    class="display table table-bordered table-hover" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th data-orderable="false">No</th>
                                                            <th data-orderable="true">Pernyataan Risiko</th>
                                                            <th data-orderable="true">Penyebab Risiko</th>
                                                            <th data-orderable="true">Respon Risiko</th>
                                                            <th data-orderable="true">Inovasi Pengendalian</th>
                                                            <th data-orderable="true">Penanggung Jawab</th>
                                                            <th data-orderable="true">Indikator (Keluaran)</th>
                                                            <th data-orderable="true">Target Waktu</th>
                                                            <th data-orderable="true">Realisasi Waktu</th>
                                                            <th data-orderable="true">Hasil Pemantauan</th>
                                                            <th data-orderable="true">Hambatan / Kendala</th>
                                                            <th data-orderable="true">File Bukti</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_b">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-10">

                                </div>
                                <div class="form-group col-sm-2">
                                    <button class="btn btn-primary btn-block"
                                        onclick="addData('#modal-tinjauan_detail', '#form-tinjauan_detail')">Tambah</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table id="table-tinjauan_detail" class="display table table-bordered table-hover"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th data-orderable="false">No</th>
                                                <th data-orderable="true">Nama Kejadian</th>
                                                <th data-orderable="true">Pernyataan Risiko</th>
                                                <th data-orderable="true">Penyebab Risiko</th>
                                                <th data-orderable="true">Skor Kemungkinan</th>
                                                <th data-orderable="true">Skor Dampak</th>
                                                <th data-orderable="true">Besaran Risiko</th>
                                                <th data-orderable="true">Level Risiko</th>
                                                <th data-orderable="true">Respon Risiko</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_c">
                        <div class="row">
                            <div class="col-sm-10">

                            </div>
                            <div class="form-group col-sm-2">
                                {{-- catatan: <button class="btn btn-primary btn-block"
                                onclick="addData('#modal-pemantauan_resiko_detail', '#form-pemantauan_resiko_detail')">Tambah</button> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 table-responsive">
                                <table id="table-pemantauan_resiko_detail" class="display table table-bordered table-hover"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" data-orderable="false">No</th>
                                            <th rowspan="2" data-orderable="true">Pernyataan Risiko</th>
                                            <th rowspan="2" data-orderable="true">Kejadian Risiko 1 Tahun</th>
                                            <th colspan="3" class="text-center">Risiko yang Direspon</th>
                                            <th colspan="3" class="text-center">Level Risiko Aktual</th>
                                            <th rowspan="2" data-orderable="true">Selisih Besaran Risiko</th>
                                            <th rowspan="2" data-orderable="true">Rekomendasi</th>
                                            <th rowspan="2"></th>
                                        </tr>
                                        <tr>
                                            <th data-orderable="true">Frekuensi</th>
                                            <th data-orderable="true">Dampak</th>
                                            <th data-orderable="true">Besaran Risiko</th>
                                            <th data-orderable="true">Frekuensi</th>
                                            <th data-orderable="true">Dampak</th>
                                            <th data-orderable="true">Besaran Risiko</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if ($data->user->pengguna_kategori->pengguna_kategori_spesial != 'pengelola')
                        <div class="tab-pane" id="tab_g">
                            <form id="form-submit">
                                <div class="row">
                                    <div class="form-group col-lg-3 form-hide">
                                        <label for="pemantauan_status">Status</label><br>
                                        <div class="radio">
                                            <label for="aktif0">
                                                <input type="radio" name="pemantauan_status" id="aktif0"
                                                    value="0">
                                                Draft
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="aktif1">
                                                <input type="radio" name="pemantauan_status" id="aktif1"
                                                    value="1">
                                                Kirim
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 form-hide">
                                        <label for="">Pemilik dan Pengelola Risiko telah menyusun dan melakukan
                                            reviu dokumen sesuai ketentuan peraturan</label>
                                    </div>
                                    <div class="form-group col-lg-12 form-hide">
                                        Catatan : <label
                                            for="">{{ isset($data->pemantauan_mr->verifikasi_catatan) ? $data->pemantauan_mr->verifikasi_catatan : '-' }}</label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-lg-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-pemantauan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-pemantauan">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-pemantauan-title">Form Pemantauan MR </h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12 form-hide">
                                <label for="pemantauan_nomor">Nomor</label>
                                <input type="text" name="pemantauan_nomor" id="pemantauan_nomor" class="form-control"
                                    value="{{ $data->pemantauan_nomor }}" required>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="mr_id">Pilih Dokumen MR</label>
                                <select name="mr_id" id="mr_id" class="form-control select2" required>
                                    <option value="">- Pilih -</option>
                                    @foreach ($data->komitmen_mr as $item)
                                        <option value="{{ $item->mr_id }}" selected>{{ $item->mr_nomor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="tahun">Periode Penerapan Risiko</label>
                                <select name="tahun" id="tahun" class="form-control select2" required>
                                    <option value="{{ $data->tahun }}">{{ $data->tahun }}</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="triwulan">Triwulan</label>
                                <input type="number" name="triwulan" id="triwulan" class="form-control"
                                    value="{{ $data->triwulan }}" required readonly>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="pemantauan_tanggal">Tanggal Dokumen</label>
                                <input type="date" name="pemantauan_tanggal" id="pemantauan_tanggal"
                                    class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('formulir.index') }}" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($data->pemantauan_mr))
        <div class="modal fade" id="modal-pemantauan_detail" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <form class="form" id="form-pemantauan_detail">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-pemantauan_detail-title">Pemantauan Inovasi Pengendalian
                            </h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="pemantauan_detail_id"
                                    id="pemantauan_detail_id" required>
                                <input type="hidden" class="form-control" name="inovasi_id" id="inovasi_id" required>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="resiko_id">Pernyataan Risiko</label>
                                    <select name="resiko_id" id="resiko_id" class="form-control select2" required
                                        readonly="readonly">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->resiko as $item)
                                            <option value="{{ $item->id }}"
                                                data-resiko_inovasi="{{ $item }}">
                                                {{ $item->resiko_kode . ' - ' . $item->resiko_pernyataan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- catatan: update --}}
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="penyebab_resiko">Penyebab Risiko</label>
                                    <input name="penyebab_resiko" id="penyebab_resiko" class="form-control"
                                        rows="5" readonly>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="respon_risiko">Respon Risiko</label>
                                    <input name="respon_risiko" id="respon_risiko" class="form-control" rows="5"
                                        readonly>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="inovasi_pengendalian">Inovasi Pengendalian</label>
                                    <input name="inovasi_pengendalian" id="inovasi_pengendalian" class="form-control"
                                        rows="5" readonly>
                                </div>
                                {{-- catatan: end update --}}
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_penanggung_jawab">Penanggung Jawab</label>
                                    <textarea name="pemantauan_penanggung_jawab" id="pemantauan_penanggung_jawab" class="form-control" rows="5"
                                        readonly></textarea>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_indikator">Indikator (Keluaran)</label>
                                    <textarea name="pemantauan_indikator" id="pemantauan_indikator" class="form-control" rows="5" readonly></textarea>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_periode">Target Waktu</label>
                                    <input name="pemantauan_periode" id="pemantauan_periode_waktu" class="form-control"
                                        rows="5" readonly>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_periode_realisasi">Realisasi Waktu</label>
                                    <textarea name="pemantauan_periode_realisasi" id="pemantauan_periode_realisasi" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_hasil">Hasil Pemantauan</label>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_hasil[terjadi]">Apakah pernyataan risiko terjadi?</label>
                                    <input type="hidden" name="pemantauan_hasil[pertanyaan_terjadi]"
                                        value="Apakah pernyataan risiko terjadi?">
                                    <div class="radio">
                                        <label for="pemantauan_hasilYa">
                                            <input type="radio" name="pemantauan_hasil[terjadi]"
                                                id="pemantauan_hasilYa" value="Ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="pemantauan_hasilTidak">
                                            <input type="radio" name="pemantauan_hasil[terjadi]"
                                                id="pemantauan_hasilTidak" value="Tidak">
                                            Tidak</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_hasil[penyebab]">Apakah penyebab risiko terjadi?</label>
                                    <input type="hidden" name="pemantauan_hasil[pertanyaan_penyebab]"
                                        value="Apakah penyebab risiko terjadi?">
                                    <div class="radio">
                                        <label for="penyebabYa">
                                            <input type="radio" name="pemantauan_hasil[penyebab]" id="penyebabYa"
                                                value="Ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="penyebabTidak">
                                            <input type="radio" name="pemantauan_hasil[penyebab]" id="penyebabTidak"
                                                value="Tidak">
                                            Tidak</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_hasil[inov]">Apakah inovasi pengendalian dilakukan?</label>
                                    <input type="hidden" name="pemantauan_hasil[pertanyaan_inov]"
                                        value="Apakah inovasi pengendalian dilakukan?">
                                    <div class="radio">
                                        <label for="inovYa">
                                            <input type="radio" name="pemantauan_hasil[inov]" id="inovYa"
                                                value="Ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="inovTidak">
                                            <input type="radio" name="pemantauan_hasil[inov]" id="inovTidak"
                                                value="Tidak">
                                            Tidak</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 bukti">
                                    <label for="pemantauan_inovasi_file">File Bukti</label>
                                    <input type="file" name="pemantauan_inovasi_file" id="pemantauan_inovasi_file"
                                        class="form-control" rows="5" accept="application/pdf">
                                    <span class="text-danger">* tipe file .pdf maksimum file 20Mb</span>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_hasil[memadai]">Apakah inovasi memadai?</label>
                                    <input type="hidden" name="pemantauan_hasil[pertanyaan_memadai]"
                                        value="Apakah inovasi memadai?">
                                    <div class="radio">
                                        <label for="memadaiYa">
                                            <input type="radio" name="pemantauan_hasil[memadai]" id="memadaiYa"
                                                value="Ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="memadaiTidak">
                                            <input type="radio" name="pemantauan_hasil[memadai]" id="memadaiTidak"
                                                value="Tidak">
                                            Tidak</label>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_hasil[respon]"> Apa yang telah dilakukan (diluar rencana inovasi
                                        pengendalian)?</label>
                                    <input type="hidden" name="pemantauan_hasil[pertanyaan_respon]"
                                        value=" Apa yang telah dilakukan (diluar rencana inovasi pengendalian)?">
                                    <textarea name="pemantauan_hasil[respon]" id="pemantauan_hasil_respon" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_hambatan">Hambatan / Kendala</label>
                                    <textarea name="pemantauan_hambatan" id="pemantauan_hambatan" class="form-control" rows="5"></textarea>
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

        <div class="modal fade" id="modal-pemantauan_resiko_detail" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <form class="form" id="form-pemantauan_resiko_detail">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-pemantauan_resiko_detail-title">DAFTAR PEMANTAUAN LEVEL
                                RISIKO
                            </h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="pemantauan_resiko_detail_id"
                                    id="pemantauan_resiko_detail_id" required>

                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_pernyataan">Pernyataan Risiko</label>
                                    <select name="pemantauan_resiko_pernyataan" id="pemantauan_resiko_pernyataan"
                                        class="form-control select2">
                                        <option value="">- Pilih -</option>
                                        @if (isset($data->pernyataan))
                                            @foreach ($data->pernyataan as $item)
                                                <option value="{{ $item->resiko_pernyataan }}"
                                                    data-resiko_kemungkinan="{{ $item->resiko_kemungkinan }}"
                                                    data-resiko_dampak="{{ $item->resiko_dampak }}"
                                                    data-resiko_nilai="{{ $item->resiko_nilai }}">
                                                    {{ $item->resiko_pernyataan }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_jumlah">Kejadian Risiko 1 Tahun </label>
                                    <input type="number" name="pemantauan_resiko_jumlah" id="pemantauan_resiko_jumlah"
                                        class="form-control" required min="0">
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <hr>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="">Risiko yang Direspon</label>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_kemungkinan">Frekuensi</label>
                                    <select name="pemantauan_resiko_kemungkinan" id="pemantauan_resiko_kemungkinan"
                                        class="form-control inovasi select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->kriteria_kemungkinan as $item)
                                            <option value="{{ $item->id_kriteria_kemungkinan }}">
                                                {{ $item->level_kemungkinan .
                                                    '-
                                                                                        Nilai : ' .
                                                    $item->nilai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_dampak">Dampak</label>
                                    <select name="pemantauan_resiko_dampak" id="pemantauan_resiko_dampak"
                                        class="form-control inovasi select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->kriteria_dampak as $item)
                                            <option value="{{ $item->id_kriteria_dampak }}">
                                                {{ $item->dampak . '- Nilai : ' . $item->nilai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_nilai">Besaran Risiko</label>
                                    <input type="text" name="pemantauan_resiko_nilai" id="pemantauan_resiko_nilai"
                                        class="form-control inovasi" readonly>
                                </div>

                                <div class="form-group col-sm-12 form-hide">
                                    <hr>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="">Level Risiko Aktual</label>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_kemungkinan_act">Frekuensi</label>
                                    <select name="pemantauan_resiko_kemungkinan_act"
                                        id="pemantauan_resiko_kemungkinan_act" class="form-control select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->kriteria_kemungkinan as $item)
                                            <option value="{{ $item->id_kriteria_kemungkinan }}">
                                                {{ $item->level_kemungkinan .
                                                    '-
                                                                                        Nilai : ' .
                                                    $item->nilai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_dampak_act">Dampak</label>
                                    <select name="pemantauan_resiko_dampak_act" id="pemantauan_resiko_dampak_act"
                                        class="form-control select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->kriteria_dampak as $item)
                                            <option value="{{ $item->id_kriteria_dampak }}">
                                                {{ $item->dampak . '- Nilai : ' . $item->nilai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_nilai_act">Besaran Risiko</label>
                                    <input type="text" name="pemantauan_resiko_nilai_act"
                                        id="pemantauan_resiko_nilai_act" class="form-control" readonly>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_nilai_capt">Level Risiko </label>
                                    <input type="text" name="pemantauan_resiko_nilai_capt"
                                        id="pemantauan_resiko_nilai_capt" class="form-control" required readonly>
                                </div>

                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_selisih">Selisih Besaran Risiko </label>
                                    <input type="number" name="pemantauan_resiko_selisih" id="pemantauan_resiko_selisih"
                                        class="form-control" required readonly>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="pemantauan_resiko_rekomendasi">Rekomendasi</label>
                                    <textarea name="pemantauan_resiko_rekomendasi" id="pemantauan_resiko_rekomendasi" class="form-control"
                                        rows="5" required></textarea>
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

        <div class="modal fade" id="modal-tinjauan_detail" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <form class="form" id="form-tinjauan_detail">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-tinjauan_detail-title">Tinjauan Atas Risiko Baru atau
                                Masalah yang
                                Belum Teridentifikasi </h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="tinjauan_detail_id"
                                    id="tinjauan_detail_id" required>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_nama">Nama Kejadian</label>
                                    <textarea name="tinjauan_nama" id="tinjauan_nama" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_pernyataan">Pernyataan Risiko</label>
                                    <textarea name="tinjauan_pernyataan" id="tinjauan_pernyataan" class="form-control" rows="5" required></textarea>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_penyebab">Penyebab Risiko</label>
                                    <textarea name="tinjauan_penyebab" id="tinjauan_penyebab" class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_kemungkinan">Skor Kemungkinan</label>
                                    <select name="tinjauan_kemungkinan" id="tinjauan_kemungkinan"
                                        class="form-control inovasi select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->kriteria_kemungkinan as $item)
                                            <option value="{{ $item->id_kriteria_kemungkinan }}">
                                                {{ $item->level_kemungkinan .
                                                    '-
                                                                                        Nilai : ' .
                                                    $item->nilai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_dampak">Skor Dampak</label>
                                    <select name="tinjauan_dampak" id="tinjauan_dampak"
                                        class="form-control inovasi select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->kriteria_dampak as $item)
                                            <option value="{{ $item->id_kriteria_dampak }}">
                                                {{ $item->dampak . '- Nilai : ' . $item->nilai }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_nilai">Besaran Risiko</label>
                                    <input type="text" name="tinjauan_nilai" id="tinjauan_nilai"
                                        class="form-control inovasi" readonly>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_level">Level Risiko</label>
                                    <input type="text" name="tinjauan_level" id="tinjauan_level"
                                        class="form-control inovasi" readonly>
                                </div>
                                {{-- catatan: <div class="form-group col-sm-12 form-hide">
                                <label for="tinjauan_level">Level Risiko</label>
                                <textarea name="tinjauan_level" id="tinjauan_level" class="form-control" rows="5"
                                    required></textarea>
                            </div> --}}
                                <div class="form-group col-sm-12 form-hide">
                                    <label for="tinjauan_respon">Respon Risiko</label>
                                    <select name="tinjauan_respon" id="tinjauan_respon" class="form-control select2">
                                        <option value="">- Pilih -</option>
                                        @foreach ($data->respon as $item)
                                            <option value="{{ $item->id_respon_risiko }}">{{ $item->respon_risiko }}
                                            </option>
                                        @endforeach
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
    @endif
    <script>
        var urlInsert = '{{ route($data->page->class . '.store') }}';
        var urlUpdate = '{{ route($data->page->class . '.update') }}';
        var pemantauan_id = '{{ app('request')->input('pemantauan_id') }}';
        var urlData = '{{ route($data->page->class . '.get_data') }}';
    </script>
@endsection

@push('scripts')
    <script src="{{ asset('/js/formulir/tinjauan-mr/tinjauan-mr-index.js') }}"></script>
    <script src="{{ asset('/js/formulir/pemantauan-resiko/pemantauan-resiko-index.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2-readonly").select2("readonly", true);
            $('a[href="#tab_b"]').on('click', function() {
                table_tinjauan_detail.draw(false)
            })

            $('a[href="#tab_c"]').on('click', function() {
                table_pemantauan_resiko_detail.draw(false)
            })
        })
    </script>
@endpush
