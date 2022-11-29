@extends('layouts.layout_menu_all')

@section('content')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
    <input type="hidden" name="pemantauan_resiko_id" id="pemantauan_resiko_id" value="">
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
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width: 25%">Nomor Dokumen Tinjauan Atas Risiko Baru atau Masalah yang Belum
                                        Teridentifikasi</td>
                                    <td>{{ isset($data->pemantauan_resiko) ? $data->pemantauan_resiko->pemantauan_resiko_nomor : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tanggal Dokumen</td>
                                    <td>{{ isset($data->pemantauan_resiko) ? $data->pemantauan_resiko->pemantauan_resiko_tanggal : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Nomor Dokumen Komitmen</td>
                                    <td>{{ isset($data->pemantauan_resiko->komitmen_mr) ? $data->pemantauan_resiko->komitmen_mr->mr_nomor : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tanggal Dokumen Komitmen</td>
                                    <td>{{ isset($data->pemantauan_resiko->komitmen_mr) ? $data->pemantauan_resiko->komitmen_mr->mr_tanggal : '-' }}
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
            <div class="box">
                {{-- catatan: <div class="box-header with-border">
                <h3 class="box-title">Inovasi Pengendalian</h3>
            </div> --}}
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-10">

                        </div>
                        <div class="form-group col-sm-2">
                            <button class="btn btn-primary btn-block"
                                onclick="addData('#modal-pemantauan_resiko_detail', '#form-pemantauan_resiko_detail')">Tambah</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <table id="table-pemantauan_resiko_detail" class="display table table-bordered table-hover"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th rowspan="2" data-orderable="false">No</th>
                                        <th rowspan="2" data-orderable="false">Tahun</th>
                                        <th rowspan="2" data-orderable="false">Triwulan</th>
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-pemantauan_resiko" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-pemantauan_resiko">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-pemantauan_resiko-title">Form Pemantauan MR </h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12 form-hide">
                                <label for="pemantauan_resiko_nomor">Nomor</label>
                                <input type="text" name="pemantauan_resiko_nomor" id="pemantauan_resiko_nomor"
                                    class="form-control" value="{{ $data->pemantauan_resiko_nomor }}" required>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="mr_id">Pilih Dokumen MR</label>
                                <select name="mr_id" id="mr_id" class="form-control select2" required>
                                    <option value="">- Pilih -</option>
                                    @foreach ($data->komitmen_mr as $item)
                                        <option value="{{ $item->mr_id }}">{{ $item->mr_nomor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="pemantauan_resiko_periode">Periode Penerapan Risiko</label>
                                <select name="pemantauan_resiko_periode" id="pemantauan_resiko_periode"
                                    class="form-control select2" required>
                                    <option value="">- Pilih Periode -</option>
                                    @for ($i = 2017; $i <= date('Y') + 2; $i++)
                                        <option value="{{ $i }}"
                                            {{ date('Y') == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="pemantauan_resiko_tanggal">Tanggal Dokumen</label>
                                <input type="date" name="pemantauan_resiko_tanggal" id="pemantauan_resiko_tanggal"
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

    @if (isset($data->pemantauan_resiko))
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
                                    <label for="">Periode Laporan</label>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <hr>
                                </div>
                                <div class="form-group col-sm-2 form-hide">
                                    Tahun
                                    <select name="pemantauan_resiko_tahun" id="pemantauan_resiko_tahun"
                                        class="form-control inovasi select2">
                                        <option value="">- Pilih -</option>
                                        @for ($i = 2017; $i <= date('Y') + 2; $i++)
                                            <option value="{{ $i }}"
                                                {{ date('Y') == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-sm-2 form-hide">
                                    Triwulan
                                    <select name="pemantauan_resiko_triwulan" id="pemantauan_resiko_triwulan"
                                        class="form-control inovasi select2">
                                        <option value="">- Pilih -</option>
                                        <option value="1">Triwulan I</option>
                                        <option value="2">Triwulan II</option>
                                        <option value="3">Triwulan III</option>
                                        <option value="4">Triwulan IV</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 form-hide">
                                    <hr>
                                </div>

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
                                    <input type="text" name="pemantauan_resiko_jumlah" id="pemantauan_resiko_jumlah"
                                        class="form-control separator" required>
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
    @endif
    <script>
        var urlInsert = '{{ route($data->page->class . '.store') }}';
        var urlUpdate = '{{ route($data->page->class . '.update') }}';
        var pemantauan_resiko_id = '{{ app('request')->input('pemantauan_resiko_id') }}';
        var urlData = '{{ route($data->page->class . '.get_data') }}';
    </script>
@endsection
