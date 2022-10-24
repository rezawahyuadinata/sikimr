@extends('layouts.layout_menu_all')

@section('content')
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }
</style>
<input type="hidden" name="tinjauan_id" id="tinjauan_id" value="">
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
                                <td>{{ isset($data->tinjauan_mr) ? $data->tinjauan_mr->tinjauan_nomor : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%">Tanggal Dokumen</td>
                                <td>{{ isset($data->tinjauan_mr) ? $data->tinjauan_mr->tinjauan_tanggal : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%">Nomor Dokumen Komitmen</td>
                                <td>{{ isset($data->tinjauan_mr->komitmen_mr) ?
                                    $data->tinjauan_mr->komitmen_mr->mr_nomor : '-' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%">Tanggal Dokumen Komitmen</td>
                                <td>{{ isset($data->tinjauan_mr->komitmen_mr) ?
                                    $data->tinjauan_mr->komitmen_mr->mr_tanggal : '-' }}</td>
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
            {{-- <div class="box-header with-border">
                <h3 class="box-title">Inovasi Pengendalian</h3>
            </div> --}}
            <!-- /.box-header -->
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
                        <table id="table-tinjauan_detail" class="display table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th data-orderable="false">No</th>
                                    <th data-orderable="true">Tahun</th>
                                    <th data-orderable="true">Triwulan</th>
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
    </div>
</div>

<div class="modal fade" id="modal-tinjauan" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-tinjauan">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-tinjauan-title">Form Pemantauan MR </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_nomor">Nomor</label>
                            <input type="text" name="tinjauan_nomor" id="tinjauan_nomor" class="form-control"
                                value="{{ $data->tinjauan_nomor }}" required>
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
                            <label for="tinjauan_periode">Periode Penerapan Risiko</label>
                            <select name="tinjauan_periode" id="tinjauan_periode" class="form-control select2" required>
                                <option value="">- Pilih Periode -</option>
                                @for ($i = 2017; $i <= date('Y') + 2; $i++) <option value="{{ $i }}" {{ date('Y')==$i
                                    ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_tanggal">Tanggal Dokumen</label>
                            <input type="date" name="tinjauan_tanggal" id="tinjauan_tanggal" class="form-control"
                                value="{{ date('Y-m-d') }}" required>
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

@if (isset($data->tinjauan_mr))
<div class="modal fade" id="modal-tinjauan_detail" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-tinjauan_detail">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-tinjauan_detail-title">Tinjauan Atas Risiko Baru atau Masalah yang
                        Belum Teridentifikasi </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="tinjauan_detail_id" id="tinjauan_detail_id"
                            required>

                        <div class="form-group col-sm-12 form-hide">
                            <label for="">Periode Laporan</label>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <hr>
                        </div>
                        <div class="form-group col-sm-2 form-hide">
                            Tahun
                            <select name="tinjauan_tahun" id="tinjauan_tahun" class="form-control inovasi select2">
                                <option value="">- Pilih -</option>
                                @for ($i = 2017; $i <= date('Y') + 2; $i++) <option value="{{ $i }}" {{ date('Y')==$i
                                    ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="form-group col-sm-2 form-hide">
                            Triwulan
                            <select name="tinjauan_triwulan" id="tinjauan_triwulan"
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
                            <label for="tinjauan_nama">Nama Kejadian</label>
                            <textarea name="tinjauan_nama" id="tinjauan_nama" class="form-control" rows="5"
                                required></textarea>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_pernyataan">Pernyataan Risiko</label>
                            <textarea name="tinjauan_pernyataan" id="tinjauan_pernyataan" class="form-control" rows="5"
                                required></textarea>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_penyebab">Penyebab Risiko</label>
                            <textarea name="tinjauan_penyebab" id="tinjauan_penyebab" class="form-control" rows="5"
                                required></textarea>
                        </div>

                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_kemungkinan">Skor Kemungkinan</label>
                            <select name="tinjauan_kemungkinan" id="tinjauan_kemungkinan"
                                class="form-control inovasi select2">
                                <option value="">- Pilih -</option>
                                @foreach ($data->kriteria_kemungkinan as $item)
                                <option value="{{ $item->id_kriteria_kemungkinan }}">{{ $item->level_kemungkinan . '-
                                    Nilai : ' . $item->nilai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_dampak">Skor Dampak</label>
                            <select name="tinjauan_dampak" id="tinjauan_dampak" class="form-control inovasi select2">
                                <option value="">- Pilih -</option>
                                @foreach ($data->kriteria_dampak as $item)
                                <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak . '- Nilai : ' .
                                    $item->nilai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_nilai">Besaran Risiko</label>
                            <input type="text" name="tinjauan_nilai" id="tinjauan_nilai" class="form-control inovasi"
                                readonly>
                        </div>
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_level">Level Risiko</label>
                            <input type="text" name="tinjauan_level" id="tinjauan_level" class="form-control inovasi"
                                readonly>
                        </div>
                        {{-- <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_level">Level Risiko</label>
                            <textarea name="tinjauan_level" id="tinjauan_level" class="form-control" rows="5"
                                required></textarea>
                        </div> --}}
                        <div class="form-group col-sm-12 form-hide">
                            <label for="tinjauan_respon">Respon Risiko</label>
                            <select name="tinjauan_respon" id="tinjauan_respon" class="form-control select2">
                                <option value="">- Pilih -</option>
                                @foreach ($data->respon as $item)
                                <option value="{{ $item->id_respon_risiko }}">{{ $item->respon_risiko }}</option>
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
    var urlInsert = '{{ route( $data->page->class . ".store") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update") }}';
    var tinjauan_id = '{{ app("request")->input("tinjauan_id") }}';
    var urlData = '{{ route( $data->page->class . ".get_data") }}';
</script>
@endsection