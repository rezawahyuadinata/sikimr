<div class="row">
    <div class="col-sm-10">

    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block" onclick="addData('#modal-resiko', '#form-resiko')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-resiko" class="display table table-bordered table-hover" width="100%">
            <thead>
                <tr>
                    <th data-orderable="false">No</th>
                    <th data-orderable="true">Tujuan Kegiatan Utama</th>
                    <th data-orderable="true">Pernyataan Risiko</th>
                    <th data-orderable="false"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<div class="modal fade" id="modal-resiko" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <form class="form" id="form-resiko">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-resiko-title">Form Risiko </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="resiko_id" id="resiko_id" required>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Register Risiko</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="paket_sasaran_id">Tujuan Kegiatan Utama</label>
                                            <select name="paket_sasaran_id" id="resiko_paket_sasaran_id" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pernyataan">Pernyataan Risiko</label>
                                            <textarea name="resiko_pernyataan" id="resiko_pernyataan" class="form-control" rows="5" required placeholder="Masukkan pernyataan risiko"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_tahap">Tahap Kegiatan</label>
                                            <select name="resiko_kegiatan_tahap" id="resiko_kegiatan_tahap" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->tahap as $item)
                                                    <option value="{{ $item->id_tahap_kegiatan }}">{{ $item->tahap }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_lingkup_jenis">Jenis Lingkup Risiko</label>
                                            <select name="resiko_kegiatan_lingkup_jenis" id="resiko_kegiatan_lingkup_jenis" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                <option value="0">Non Teknis</option>
                                                <option value="1">Teknis</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide linkup-teknis">
                                            <label for="resiko_kegiatan_lingkup_balai">Lingkup Risiko Balai</label>
                                            <select name="resiko_kegiatan_lingkup_balai" id="resiko_kegiatan_lingkup_balai" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->balai as $item)
                                                    <option value="{{ $item->id_balai_teknik }}">{{ $item->balai_teknik }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide linkup-non_teknis">
                                            <label for="resiko_kegiatan_lingkup">Lingkup Risiko</label>
                                            <select name="resiko_kegiatan_lingkup" id="resiko_kegiatan_lingkup" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->lingkup as $item)
                                                    <option value="{{ $item->id_lingkup_risiko }}">{{ $item->lingkup_risiko }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_kategori">Kategori Risiko</label>
                                            <select name="resiko_kegiatan_kategori" id="resiko_kegiatan_kategori" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kategori as $item)
                                                    <option value="{{ $item->id_kategori_risiko }}">{{ $item->kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_penyebab">Penyebab Risiko</label>
                                            <textarea name="resiko_kegiatan_penyebab" id="resiko_kegiatan_penyebab" class="form-control" rows="5" required placeholder="Masukkan penyebab risiko"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_sumber">Sumber Risiko</label>
                                            <select name="resiko_kegiatan_sumber" id="resiko_kegiatan_sumber" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->sumber_risiko as $item)
                                                    <option value="{{ $item->id_sumber_risiko }}">{{ $item->sumber_risiko }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_kriteria_dampak">Dampak Risiko Melekat</label>
                                            <select name="resiko_kegiatan_kriteria_dampak" id="resiko_kegiatan_kriteria_dampak" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_dampak as $item)
                                                    <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak . '- Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kegiatan_dampak">Dampak</label>
                                            <textarea name="resiko_kegiatan_dampak" id="resiko_kegiatan_dampak" class="form-control" rows="5" required placeholder="Masukkan dampak"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Penilaian Risiko Melekat</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penilaian_kemungkinan">Kemungkinan Risiko Melekat</label>
                                            <select name="resiko_penilaian_kemungkinan" id="resiko_penilaian_kemungkinan" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_kemungkinan as $item)
                                                    <option value="{{ $item->id_kriteria_kemungkinan }}">{{ $item->level_kemungkinan . '- Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penilaian_dampak">Dampak Risiko Melekat</label>
                                            <select name="resiko_penilaian_dampak" id="resiko_penilaian_dampak" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_dampak as $item)
                                                    <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak . '- Nilai : ' . $item->nilai }}</option>
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
                            <div class="box box-primary collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pengendalian Risiko</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_uraian">Uraian Pengendalian</label>
                                            <textarea name="resiko_pengendalian_uraian" id="resiko_pengendalian_uraian" class="form-control" rows="5" required placeholder="Masukkan uraian pengendalian"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_memadai">Memadai/ Belum Memadai</label>
                                            <select name="resiko_pengendalian_memadai" id="resiko_pengendalian_memadai" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->memadai as $item)
                                                    <option value="{{ $item->id }}">{{ $item->memadai_belum }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_kemungkinan">Kemungkinan Risiko Setelah Pengendalian</label>
                                            <select name="resiko_pengendalian_kemungkinan" id="resiko_pengendalian_kemungkinan" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_kemungkinan as $item)
                                                    <option value="{{ $item->id_kriteria_kemungkinan }}">{{ $item->level_kemungkinan . '- Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_pengendalian_dampak">Dampak Risiko Setelah Pengendalian</label>
                                            <select name="resiko_pengendalian_dampak" id="resiko_pengendalian_dampak" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_dampak as $item)
                                                    <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak . '- Nilai : ' . $item->nilai }}</option>
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
                            <div class="box box-primary collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Respon Risiko</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_respon">Respon Risiko</label>
                                            <select name="resiko_respon" id="resiko_respon" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->respon as $item)
                                                    <option value="{{ $item->id_respon_risiko }}">{{ $item->respon_risiko }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_inovasi">Inovasi Pengendalian</label>
                                            <select name="resiko_inovasi" id="resiko_inovasi" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->inovasi as $item)
                                                    <option value="{{ $item->id_inovasi_pengendalian }}">{{ $item->inovasi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_deskripsi">Deskripsi Inovasi Pengendalian</label>
                                            <textarea name="resiko_deskripsi" id="resiko_deskripsi" class="form-control" rows="5" required placeholder="Masukkan deskripsi inovasi pengendalian"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_alokasi">Alokasi Sumber Daya</label>
                                            <select name="resiko_alokasi" id="resiko_alokasi" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->alokasi as $item)
                                                    <option value="{{ $item->id_alokasi }}">{{ $item->alokasi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_kemungkinan">Kemungkinan Risiko Direspon</label>
                                            <select name="resiko_kemungkinan" id="resiko_kemungkinan" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_kemungkinan as $item)
                                                    <option value="{{ $item->id_kriteria_kemungkinan }}">{{ $item->level_kemungkinan . '- Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_dampak">Dampak Risiko Direspon</label>
                                            <select name="resiko_dampak" id="resiko_dampak" class="form-control select2">
                                                <option value="">- Pilih -</option>
                                                @foreach ($data->kriteria_dampak as $item)
                                                    <option value="{{ $item->id_kriteria_dampak }}">{{ $item->dampak . '- Nilai : ' . $item->nilai }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_penanggung_jawab">Penanggung Jawab</label>
                                            <textarea name="resiko_penanggung_jawab" id="resiko_penanggung_jawab" class="form-control" rows="5" required placeholder="Masukkan penanggung jawab"></textarea>
                                        </div>
                                        <div class="form-group col-sm-4 form-hide">
                                            <label for="resiko_tanggal_mulai">Tanggal Mulai</label>
                                            <input type="date" name="resiko_tanggal_mulai" id="resiko_tanggal_mulai" class="form-control" rows="5" required>
                                        </div>
                                        <div class="form-group col-sm-4 form-hide">
                                            <label for="resiko_tanggal_akhir">Tanggal Akhir</label>
                                            <input type="date" name="resiko_tanggal_akhir" id="resiko_tanggal_akhir" class="form-control" rows="5" required>
                                        </div>
                                        <div class="form-group col-sm-4 form-hide">
                                            <label for="resiko_tahun">Tahun</label>
                                            <input type="text" name="resiko_tahun" id="resiko_tahun" class="form-control" rows="5" required>
                                        </div>
                                        <div class="form-group col-sm-12 form-hide">
                                            <label for="resiko_indikator">Indikator Keluaran</label>
                                            <textarea name="resiko_indikator" id="resiko_indikator" class="form-control" rows="5" required placeholder="Masukkan indikator keluaran"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
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