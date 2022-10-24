<style>
    .modal {
        overflow: auto !important;
    }
</style>

<div class="row">
    <div class="col-sm-10">
        <h3><b>4. Profil Risiko</b></h3>
    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block" onclick="addData('#modal-resiko', '#form-resiko')">Tambah</button>
    </div>
</div>
<div class="row notif-profil">
    <div class="col-sm-12">
        <div class="callout callout-warning">
            <p>Syarat : minimal harus diisi Pernyataan Risiko yang terdiri dari {{ (isset($data->komitmen_mr->level) && $data->komitmen_mr->level == 'UPR-T1') ? 4 : 3 }} Kategori Risiko</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 table-responsive">

        <table id="table-resiko" class="display table table-bordered table-hover table-responsive" width="100%">
            <thead>
                <tr>
                    <th rowspan="2" data-orderable="false">No</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Tujuan Kegiatan Utama</th>
                    <th rowspan=" 2" data-orderable="true" style="text-align: center;">Pernyataan Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Unit Kerja Pembina</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Tahapan Kegiatan</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Lingkup Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Kategori Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Penyebab Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Sumber Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Dampak Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Uraian Dampak Risiko</th>
                    <th colspan="3" data-orderable="true" style="text-align: center;">Nilai Risiko yang Melekat</th>
                    <th colspan="2" data-orderable="true" style="text-align: center;">Pengendalian yang Ada</th>
                    <th colspan="3" data-orderable="true" style="text-align: center;">Nilai Risiko Setelah Pengendalian
                    </th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Prioritas Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Respon Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Inovasi Pengendalian</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Alokasi Sumber Daya</th>
                    <th colspan="3" data-orderable="true" style="text-align: center;">Risiko Yang Direspon</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Penangung Jawab</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Target Waktu</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Indikator Keluaran</th>
                    <th rowspan="2" data-orderable="false" style="text-align: center;">#</th>
                </tr>
                <tr style="text-align: center;">
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">D</th>
                    <th style="text-align: center;">Nilai</th>
                    <th style="text-align: center;">Uraian</th>
                    <th style="text-align: center;">Memadai/Belum</th>
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">D</th>
                    <th style="text-align: center;">Nilai</th>
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">D</th>
                    <th style="text-align: center;">Nilai</th>

                </tr>
                <tr>
                    @for ($i=1;$i<=30;$i++) <th style="text-align: center;">
                        {{ $i != 30 ? $i : '' }}
                        </th>
                        @endfor
                </tr>
            </thead>
            {{-- <tfoot>
                <tr>
                    <th rowspan="2" data-orderable="false">No</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Tujuan Kegiatan Utama</th>
                    <th rowspan=" 2" data-orderable="true" style="text-align: center;">Pernyataan Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Unit Kerja Pembina</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Tahapan Kegiatan</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Lingkup Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Kategori Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Penyebab Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Sumber Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Dampak Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Uraian Dampak Risiko</th>
                    <th colspan="3" data-orderable="true" style="text-align: center;">Nilai Risiko yang Melekat</th>
                    <th colspan="2" data-orderable="true" style="text-align: center;">Pengendalian yang Ada</th>
                    <th colspan="3" data-orderable="true" style="text-align: center;">Nilai Risiko Setelah Pengendalian
                    </th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Prioritas Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Respon Risiko</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Inovasi Pengendalian</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Alokasi Sumber Daya</th>
                    <th colspan="3" data-orderable="true" style="text-align: center;">Risiko Yang Direspon</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Penangung Jawab</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Target Waktu</th>
                    <th rowspan="2" data-orderable="true" style="text-align: center;">Indikator Keluaran</th>
                    <th rowspan="2" data-orderable="false" style="text-align: center;">#</th>
                </tr>
                <tr style="text-align: center;">
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">D</th>
                    <th style="text-align: center;">Nilai</th>
                    <th style="text-align: center;">Uraian</th>
                    <th style="text-align: center;">Memadai/Belum</th>
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">D</th>
                    <th style="text-align: center;">Nilai</th>
                    <th style="text-align: center;">K</th>
                    <th style="text-align: center;">D</th>
                    <th style="text-align: center;">Nilai</th>
                </tr>
                <tr>
                    @for ($i=1;$i<=30;$i++)
                        <th style="text-align: center;">
                            {{ $i != 30 ? $i : '' }}
            </th>
            @endfor
            </tr>
            </tfoot> --}}
        </table>
        {{-- tampilan sesuai profil risiko--}}
        <table id="" class="display table table-bordered table-hover table-responsive" width="100%">
            <thead>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-resiko" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <form class="form" id="form-resiko">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-resiko-title">4. Profil Risiko </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="resiko_id" id="resiko_id" required>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide pull-right">
                                            <button type="button" id="cari-risiko">Cari Risiko</button>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="paket_sasaran_id">Tujuan Kegiatan Utama</label>
                                            <select name="paket_sasaran_id" id="resiko_paket_sasaran_id" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pernyataan">Pernyataan Risiko</label>
                                            <textarea name="resiko_pernyataan" id="resiko_pernyataan" class="form-control" rows="5" required placeholder="(diisi dengan uraian peristiwa risiko yang telah diidentifikasi)
                                                Catatan:
                                                Risiko bersifat:
                                                - Belum Terjadi
                                                - Akibat Keputusan Saat Ini
                                                (Risiko ≠ Masalah)">
                                            </textarea>
                                        </div>
                                        <!-- penambahan T2 Pembina -->
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_pembina">Unit Kerja Pembina</label>
                                            <select name="resiko_kegiatan_pembina" id="resiko_kegiatan_pembina" required class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->eselon2 as $item)
                                                <option value="{{ $item->ID }}">{{ $item->NAMA }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_tahap">Tahap Kegiatan</label>
                                            <select name="resiko_kegiatan_tahap" id="resiko_kegiatan_tahap" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->tahap as $item)
                                                <option value="{{ $item->id_tahap_kegiatan }}">{{ $item->tahap }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_lingkup_jenis">Jenis Lingkup Risiko</label>
                                            <select name="resiko_kegiatan_lingkup_jenis" id="resiko_kegiatan_lingkup_jenis" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                <option value="0">Non Teknis</option>
                                                <option value="1">Teknis</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide linkup-teknis">
                                            <label for="resiko_kegiatan_lingkup_balai">Lingkup Risiko</label>
                                            <select name="resiko_kegiatan_lingkup_balai" id="resiko_kegiatan_lingkup_balai" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->balai as $item)
                                                <option value="{{ $item->id_balai_teknik }}">{{ $item->balai_teknik
                                                    }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide linkup-non_teknis">
                                            <label for="resiko_kegiatan_lingkup">Lingkup Risiko</label>
                                            <select name="resiko_kegiatan_lingkup" id="resiko_kegiatan_lingkup" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->lingkup as $item)
                                                <option value="{{ $item->id_lingkup_risiko }}">{{ $item->lingkup_risiko
                                                    }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_kategori">Kategori Risiko</label>
                                            <select name="resiko_kegiatan_kategori" id="resiko_kegiatan_kategori" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kategori as $item)
                                                <option value="{{ $item->id_kategori_risiko }}">{{ $item->id_kategori_risiko . '. ' . $item->kategori }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_penyebab">Penyebab Risiko</label>
                                            <textarea name="resiko_kegiatan_penyebab" id="resiko_kegiatan_penyebab" class="form-control" rows="5" required placeholder="Masukkan penyebab risiko"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_sumber">Sumber Risiko</label>
                                            <select name="resiko_kegiatan_sumber" id="resiko_kegiatan_sumber" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->sumber_risiko as $item)
                                                <option value="{{ $item->id_sumber_risiko }}">{{ $item->sumber_risiko }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_list_dampak">Dampak</label>
                                            <select name="resiko_list_dampak" id="resiko_list_dampak" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->dampak as $item)
                                                <option value="{{ $item->id_dampak }}">{{ $item->id_dampak . '. ' . $item->dampak}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_dampak">Uraian Dampak</label>
                                            <textarea name="resiko_kegiatan_dampak" id="resiko_kegiatan_dampak" class="form-control" rows="5" required placeholder="(deskripsi dari Dampak yang dipilih.)"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Penilaian Risiko Melekat</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penilaian_kemungkinan">Nilai Kemungkinan (K) </label> <span class="fa fa-question text-warning hint-kemungkinan"></span>
                                            <select name="resiko_penilaian_kemungkinan" id="resiko_penilaian_kemungkinan" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_kemungkinan as $item)
                                                <option value="{{ $item->id_kriteria_kemungkinan }}">{{
                                                    $item->level_kemungkinan . '- Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penilaian_dampak">Nilai Dampak (D)</label> <span class="fa fa-question text-warning hint-dampak"></span>
                                            <select name="resiko_penilaian_dampak" id="resiko_penilaian_dampak" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_dampak as $item)
                                                <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak . '-
                                                    Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penilaian_nilai">Nilai Risiko Melekat</label>
                                            <input type="text" name="resiko_penilaian_nilai" id="resiko_penilaian_nilai" class="form-control" readonly required>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penilaian_nilai_keterangan">Keterangan Nilai Risiko Melekat</label>
                                            <input type="text" name="resiko_penilaian_nilai_keterangan" id="resiko_penilaian_nilai_keterangan" class="form-control" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pengendalian yang Ada</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_uraian">Uraian Pengendalian yang Ada</label>
                                            <textarea name="resiko_pengendalian_uraian" id="resiko_pengendalian_uraian" class="form-control" rows="5" required placeholder="Kegiatan Pengendalian Dapat Berupa : Tata Kelola, SOP, Reviu Berjenjang, Regulasi, dll."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Penilaian Risiko Setelah Pengendalian yang Ada</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_kemungkinan">Nilai Kemungkinan (K)</label> <span class="fa fa-question text-warning hint-kemungkinan"></span>
                                            <select name="resiko_pengendalian_kemungkinan" id="resiko_pengendalian_kemungkinan" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_kemungkinan as $item)
                                                <option value="{{ $item->id_kriteria_kemungkinan }}">{{
                                                    $item->level_kemungkinan . '- Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_dampak">Nilai Dampak (D)</label> <span class="fa fa-question text-warning hint-dampak"></span>
                                            <select name="resiko_pengendalian_dampak" id="resiko_pengendalian_dampak" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_dampak as $item)
                                                <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak . '-
                                                    Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_nilai">Nilai Risiko Setelah
                                                Pengendalian</label>
                                            <input type="text" name="resiko_pengendalian_nilai" id="resiko_pengendalian_nilai" class="form-control" readonly required>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_nilai_keterangan">Keterangan Nilai Risiko Setelah
                                                Pengendalian</label>
                                            <input type="text" name="resiko_pengendalian_nilai_keterangan" id="resiko_pengendalian_nilai_keterangan" class="form-control" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pengendalian yang ada (Memadai/ Belum Memadai)</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_memadai">Memadai/ Belum Memadai</label>
                                            <select id="resiko_pengendalian_memadai" onchange="get_pengendalian_memadai(this,1)" class="form-control select2" disabled="disabled">
                                                <option value=""></option>
                                                @foreach ($data->memadai as $item)
                                                <option value="{{ $item->id }}">{{
                                                    $item->memadai_belum}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="resiko_pengendalian_memadai">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Respon Risiko</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_respon">Respon Risiko</label>
                                            <select name="resiko_respon" id="resiko_respon" class="form-control select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->respon as $item)
                                                <option value="{{ $item->id_respon_risiko }}">{{
                                                    $item->id_respon_risiko.". ".$item->respon_risiko }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_deskripsi">Inovasi Pengendalian</label>
                                            <textarea name="resiko_deskripsi" id="resiko_deskripsi" class="form-control inovasi" rows="5" placeholder="(diisi dengan uraian Inovasi Pengendalian yg akan dilakukan)
                                                Catatan:
                                                sesuai dengan Respon Risiko yang dipilih" required>
                                            </textarea>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_alokasi">Alokasi Sumber Daya</label>
                                            <select name="resiko_alokasi[]" id="resiko_alokasi" class="form-control inovasi select2" multiple="multiple" required>
                                                @foreach ($data->alokasi as $item)
                                                <option value="{{ $item->id_alokasi }}">{{ $item->alokasi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Penilaian Risiko Setelah Direspon</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kemungkinan">Nilai Kemungkinan (K)</label> <span class="fa fa-question text-warning hint-kemungkinan"></span>
                                            <select id="resiko_kemungkinan" onchange="get_pengendalian_memadai(this,2)" class="form-control inovasi select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_kemungkinan as $item)
                                                <option value="{{ $item->id_kriteria_kemungkinan }}">{{
                                                    $item->level_kemungkinan . '- Nilai : ' . $item->nilai }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="resiko_kemungkinan">
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_dampak">Nilai Dampak (D)</label> <span class="fa fa-question text-warning hint-dampak"></span>
                                            <select id="resiko_dampak" onchange="get_pengendalian_memadai(this,3)" class="form-control inovasi select2" required>
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_dampak as $item)
                                                <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak .
                                                    '-
                                                    Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="resiko_dampak">
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_nilai">Nilai Risiko Direspon</label>
                                            <input type="text" name="resiko_nilai" id="resiko_nilai" class="form-control inovasi" readonly required>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_nilai_keterangan">Keterangan Nilai Risiko Direspon</label>
                                            <input type="text" name="resiko_nilai_keterangan" id="resiko_nilai_keterangan" class="form-control" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    {{-- <h3 class="box-title">Respon</h3> --}}
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penanggung_jawab">Penanggung Jawab</label>
                                            <textarea name="resiko_penanggung_jawab" id="resiko_penanggung_jawab" class="form-control inovasi" rows="5" placeholder="(diisi dengan pihak/pejabat yg melaksanakan Respon Risiko)" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <label for="">Target Waktu</label>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-2 form-hide">
                                Tahun
                                <select name="resiko_penilaian_periode1" id="resiko_penilaian_periode1" class="form-control inovasi select2" required>
                                    <option value="">- Pilih -</option>
                                    @for ($i = 2017; $i <= date('Y') + 2; $i++) <option value="{{ $i }}" {{
                                        date('Y')==$i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="form-group col-sm-4 form-hide">
                                Triwulan
                                <select name="resiko_penilaian_periode2[]" id="resiko_penilaian_periode2" class="form-control inovasi select2" multiple="multiple" required>
                                    <option value="">- Pilih -</option>
                                    <option value="1">Triwulan I</option>
                                    <option value="2">Triwulan II</option>
                                    <option value="3">Triwulan III</option>
                                    <option value="4">Triwulan IV</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 form-hide">
                                <label for="resiko_penilaian_keterangan">Keterangan</label>
                                <input type="text" name="resiko_penilaian_keterangan" id="resiko_penilaian_keterangan" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 form-hide">
                        <label for="resiko_indikator">Indikator Keluaran</label>
                        <textarea name="resiko_indikator" id="resiko_indikator" class="form-control inovasi" rows="5" placeholder="(diisi dengan Indikator yg merupakan keluaran Respon Risiko)
                                    dapat berupa:
                                    - Dokumen
                                    - Aplikasi
                                    - atau bentuk lainnya
                                    (disesuaikan dengan UPR masing-masing)" required>
                        </textarea>
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

<div class="modal fade" id="modal-info" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-info">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-info-title">Formulir Komitmen Manajemen Risiko </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <img src="" alt="" id="img-info" style="width: 100%">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-risiko-lain" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <form class="form" id="form-risiko-lain">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-risiko-lain-title">Pernyataan Risiko </h3>
                </div>
                <div class="modal-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <table class="table table-bordered datatable" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Pembuat</th>
                                        <th>UPR</th>
                                        <th>Pernyataan Risiko</th>
                                        <th>Tahapan</th>
                                        <th>Kategori</th>
                                        <th>Penyebab</th>
                                        <th>Dampak</th>

                                        <th style="width: 10%">Nilai Risiko Setelah Pengendalian</th>
                                        <th style="width: 10%">Prioritas Risiko</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="list-risiko">
                                    @foreach ($data->risiko_lain as $item)
                                    <tr>
                                        <td>{{ $data->user->satker->NAMA }}</td>
                                        <td>{{ $item->level }}</td>
                                        <td>{{ $item->resiko_pernyataan }}</td>
                                        <th>{{ $item->tahap }}
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->resiko_kegiatan_penyebab }}</td>
                                        <td>{{ $item->resiko_kegiatan_dampak }}</td>
                                        <td>{{ $item->resiko_pengendalian_nilai }}</td>
                                        <td>{{ $item->resiko_prioritas }}</td>
                                        <td> <button type="button" class="btn-pilih" data-data="{{ json_encode($item) }}">Pilih</button> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
@push('scripts')
<script>
    var data_inovasi = [];
    var tableInovasi;

    // get pengendalian memadai
    function get_pengendalian_memadai(select, no) {
        var data = select.value;
        if (no == 1) {
            $('input[name="resiko_pengendalian_memadai"]').val(data);
        } else if (no == 2) {
            $('input[name="resiko_kemungkinan"]').val(data);
        } else if (no == 3) {
            $('input[name="resiko_dampak"]').val(data);
        }
    }

    function fillNilaiRisikoPenilaian(result) {
        if (result.data != null) {
            $('#resiko_penilaian_nilai').val(result.data.nilai)

            var keterangan = '';
            if (result.data.nilai >= 20 && result.data.nilai <= 25) {
                keterangan = 'Sangat Tinggi';
            } else if (result.data.nilai >= 16 && result.data.nilai <= 19) {
                keterangan = 'Tinggi';
            } else if (result.data.nilai >= 11 && result.data.nilai <= 15) {
                keterangan = 'Sedang';
            } else if (result.data.nilai >= 6 && result.data.nilai <= 10) {
                keterangan = 'Rendah';
            } else if (result.data.nilai <= 5) {
                keterangan = 'Sangat Rendah';
            }

            $('#resiko_penilaian_nilai_keterangan').val(keterangan)
        } else {
            $('#resiko_penilaian_nilai').val('')
            $('#resiko_penilaian_nilai_keterangan').val('')
        }
    }

    function fillNilaiRisikoPengendalian(result) {
        $('#resiko_respon option[value=6]').prop('disabled', false);
        if (result.data != null) {
            $('#resiko_pengendalian_nilai').val(result.data.nilai)
            if (result.data.nilai < 11) {
                $('#resiko_pengendalian_memadai').val(1).trigger('change')
                $('#resiko_respon option[value=6]').prop('disabled', false);
            } else {
                $('#resiko_pengendalian_memadai').val(2).trigger('change')
                $('#resiko_respon option[value=6]').prop('disabled', true);
            }

            var keterangan = '';
            if (result.data.nilai >= 20 && result.data.nilai <= 25) {
                keterangan = 'Sangat Tinggi';
            } else if (result.data.nilai >= 16 && result.data.nilai <= 19) {
                keterangan = 'Tinggi';
            } else if (result.data.nilai >= 11 && result.data.nilai <= 15) {
                keterangan = 'Sedang';
            } else if (result.data.nilai >= 6 && result.data.nilai <= 10) {
                keterangan = 'Rendah';
            } else if (result.data.nilai <= 5) {
                keterangan = 'Sangat Rendah';
            }

            $('#resiko_pengendalian_nilai_keterangan').val(keterangan)
        } else {
            $('#resiko_pengendalian_nilai').val('')
            $('#resiko_pengendalian_nilai_keterangan').val('')
        }
    }

    function fillNilaiRespon(result) {
        if (result.data != null) {
            $('#resiko_nilai').val(result.data.nilai)

            var keterangan = '';
            if (result.data.nilai >= 20 && result.data.nilai <= 25) {
                keterangan = 'Sangat Tinggi';
            } else if (result.data.nilai >= 16 && result.data.nilai <= 19) {
                keterangan = 'Tinggi';
            } else if (result.data.nilai >= 11 && result.data.nilai <= 15) {
                keterangan = 'Sedang';
            } else if (result.data.nilai >= 6 && result.data.nilai <= 10) {
                keterangan = 'Rendah';
            } else if (result.data.nilai <= 5) {
                keterangan = 'Sangat Rendah';
            }

            $('#resiko_nilai_keterangan').val(keterangan)
        } else {
            $('#resiko_nilai').val('')
            $('#resiko_nilai_keterangan').val(keterangan)
        }
    }

    function renderAction(data, type, row, meta) {
        var button = '';

        button += '<button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(\'' + meta.row + '\')"> <span class="fa fa-trash"></span></button>';

        return button;
    }

    function deleteRow(row) {
        data_inovasi.splice(row, 1);

        setTableInovasi();
    }

    function setTableInovasi() {
        tableInovasi = $('#table-inovasi').dataTable({
            data: data_inovasi,
            columns: [{
                    render: renderNumRow,
                    data: "resiko_dampak"
                },
                {
                    data: "resiko_inovasi_text"
                },
                {
                    data: "resiko_deskripsi"
                },
                {
                    data: "resiko_alokasi"
                },
                {
                    data: "resiko_kemungkinan_text"
                },
                {
                    data: "resiko_dampak_text"
                },
                {
                    data: "resiko_nilai"
                },
                {
                    data: "resiko_penilaian_periode_text"
                },
                {
                    data: "resiko_penanggung_jawab"
                },
                {
                    data: "resiko_indikator"
                },
                {
                    render: renderAction
                }
            ],
            destroy: true,
            processing: true,
        });
    }

    $(document).ready(function() {
        setTableInovasi();

        $('.datatable').DataTable();
        // $('#table-resiko').DataTable({
        //     scrollX: true,
        //     "scrollY":        "500px",
        //     "scrollCollapse": true,
        //     "paging":         false,
        //     destroy: true,
        // });

        $('.hint-kemungkinan').on('click', function(params) {
            $('#img-info').prop('src', assetUrl + 'img/kemungkinan.png');
            $('#modal-info').modal('show')
        })

        $('.hint-dampak').on('click', function(params) {
            var id = $('#resiko_kegiatan_kategori').val();
            $('#img-info').prop('src', assetUrl + 'img/' + id + '.png');
            $('#modal-info').modal('show')
        })

        $('#cari-risiko').on('click', function() {
            $('#modal-risiko-lain').modal('show')
        })

        $('.btn-pilih').on('click', function() {
            var data = $(this).data('data')
            $('#resiko_paket_sasaran_id').append('<option value="' + data.paket_sasaran_id + '">' + data.kegiatan_tujuan + '</option>')
            for (var key in data) {
                if (key == 'id') {
                    $('#resiko_id').val(data[key])
                } else if (key == 'paket_sasaran_id') {
                    $('#resiko_paket_sasaran_id').val(data[key]).trigger('change')
                } else {
                    if ($('#' + key).is('select')) {
                        $('#' + key).val(data[key]).trigger('change');
                    } else {
                        $('#' + key).val(data[key]);
                    }
                }
            }

            $("#resiko_penilaian_periode2").val(data.resiko_triwulan1).trigger('change');
            console.log(data)

            $('#modal-risiko-lain').modal('hide')
        })

        $('#resiko_penilaian_kemungkinan, #resiko_penilaian_dampak').on('change', function() {
            var reqData = {
                id_kriteria_kemungkinan: $('#resiko_penilaian_kemungkinan').val(),
                id_kriteria_dampak: $('#resiko_penilaian_dampak').val(),
                tipe: 'nilai'
            }

            ajaxData(urlData, reqData, fillNilaiRisikoPenilaian)

        })

        $('#resiko_pengendalian_kemungkinan, #resiko_pengendalian_dampak').on('change', function() {
            var reqData = {
                id_kriteria_kemungkinan: $('#resiko_pengendalian_kemungkinan').val(),
                id_kriteria_dampak: $('#resiko_pengendalian_dampak').val(),
                tipe: 'nilai'
            }

            ajaxData(urlData, reqData, fillNilaiRisikoPengendalian)
        })

        $('#resiko_pengendalian_kemungkinan, #resiko_pengendalian_dampak').on('change', function() {
            var reqData = {
                id_kriteria_kemungkinan: $('#resiko_pengendalian_kemungkinan').val(),
                id_kriteria_dampak: $('#resiko_pengendalian_dampak').val(),
                tipe: 'nilai'
            }

            ajaxData(urlData, reqData, fillNilaiRisikoPengendalian)
        })

        $('#resiko_kemungkinan, #resiko_dampak').on('change', function() {
            var reqData = {
                id_kriteria_kemungkinan: $('#resiko_kemungkinan').val(),
                id_kriteria_dampak: $('#resiko_dampak').val(),
                tipe: 'nilai'
            }

            ajaxData(urlData, reqData, fillNilaiRespon)
        })


        $('#btn-add-inovasi').on('click', function() {
            data = {};
            $('.inovasi').each(function() {
                data[$(this).attr('id')] = $(this).val()
                if ($('#' + $(this).attr('id')).is('select')) {
                    data[$(this).attr('id') + '_text'] = $('#' + $(this).attr('id') + ' option:selected').text();
                }
            })

            data_inovasi.push(data)

            $('.inovasi').each(function() {
                if ($('#' + $(this).attr('id')).is('select')) {
                    $(this).val('').trigger('change')
                } else {
                    $(this).val('')
                }
            })

            setTableInovasi();
        })
    })
</script>
@endpush
