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
                            <th data-orderable="true">Nama Paket Kegiatan</th>
                            <th data-orderable="true">Satuan Kerja PPK</th>
                            <th data-orderable="true">Nama Satuan Kerja</th>
                            <th data-orderable="true">Kebutuhan Luas (Ha)</th>
                            <th data-orderable="true">Kebutuhan Jumlah Bidang (buah)</th>
                            <th data-orderable="true">Kebutuhan Anggaran (Rp)</th>
                            <th data-orderable="true">Realisasi Luas (Ha)</th>
                            <th data-orderable="true">Realisasi Jumlah Bidang (buah)</th>
                            <th data-orderable="true">Realisasi Anggaran (Rp)</th>
                            <th data-orderable="true">Sisa Luas (Ha)</th>
                            <th data-orderable="true">Sisa Jumlah Bidang (buah)</th>
                            <th data-orderable="true">Sisa Anggaran (Rp)</th>
                            <th data-orderable="true">Jumlah Alokasi Anggaran (Rp)</th>
                            <th data-orderable="true">Nomor Penetapan Lokasi</th>
                            <th data-orderable="true">Awal Masa Laku Penetapan Lokasi</th>
                            <th data-orderable="true">Akhir Masa Laku Penetapan Lokasi</th>
                            <th data-orderable="true">Penetapan Lokasi Perpanjangan Dari</th>
                            <th data-orderable="true">Penetapan Lokasi Perpanjangan Sampai</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Status</th>
                            <th data-orderable="true">Monitoring dan Evaluasi Output (Ha)</th>
                            <th data-orderable="true">Faktor Penyebab Terlambat</th>
                            <th data-orderable="true">Faktor Lainnya Penyebab Terlambat</th>
                            <th data-orderable="true">Keterangan Penyebab Terlambat</th>
                            <th data-orderable="true">Potensi Resiko Kemunduran Masa Konstruksi (tahun)</th>
                            <th data-orderable="true">Potensi Resiko Kemunduran Output</th>
                            <th data-orderable="true">Potensi Resiko Kemunduran Outcome</th>
                            <th data-orderable="true">Potensi Resiko Kemunduran Penerima Manfaat</th>
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
                    <h3 class="modal-title" id="modal-data-title">Form Pelaksanaan Pengadaan Tanah</h3>
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
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Satuan Kerja</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="satker_ppk">Satker</label>
                            <input type="text" class="form-control" name="satker_ppk" id="satker_ppk" placeholder="Masukkan Satker">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="satker_nama">PPK</label>
                            <input type="text" class="form-control" name="satker_nama" id="satker_nama"
                                placeholder="Masukkan PPK">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Kebutuhan</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kebutuhan_luas">Luas (Ha)</label>
                            <input type="number" class="form-control" name="kebutuhan_luas" id="kebutuhan_luas" placeholder="Masukkan Luas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kebutuhan_jumlah_bidang">Jumlah Bidang (Buah)</label>
                            <input type="number" class="form-control" name="kebutuhan_jumlah_bidang" id="kebutuhan_jumlah_bidang" placeholder="Masukkan Jumlah Bidang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kebutuhan_anggaran">Anggaran (Rp)</label>
                            <input type="number" class="form-control" name="kebutuhan_anggaran" id="kebutuhan_anggaran" placeholder="Masukkan Anggaran">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Realisasi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="realisasi_luas">Luas (Ha)</label>
                            <input type="number" class="form-control" name="realisasi_luas" id="realisasi_luas" placeholder="Masukkan Luas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="realisasi_jumlah_bidang">Jumlah Bidang (Buah)</label>
                            <input type="number" class="form-control" name="realisasi_jumlah_bidang" id="realisasi_jumlah_bidang" placeholder="Masukkan Jumlah Bidang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="realisasi_anggaran">Anggaran (Rp)</label>
                            <input type="number" class="form-control" name="realisasi_anggaran" id="realisasi_anggaran" placeholder="Masukkan Anggaran">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Sisa</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sisa_luas">Luas (Ha)</label>
                            <input type="number" class="form-control" name="sisa_luas" id="sisa_luas" placeholder="Masukkan Luas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sisa_jumlah_bidang">Jumlah Bidang (Buah)</label>
                            <input type="number" class="form-control" name="sisa_jumlah_bidang" id="sisa_jumlah_bidang" placeholder="Masukkan Jumlah Bidang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sisa_anggaran">Anggaran (Rp)</label>
                            <input type="number" class="form-control" name="sisa_anggaran" id="sisa_anggaran" placeholder="Masukkan Anggaran">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Alokasi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="alokasi_anggaran">Alokasi Anggaran (Rp)</label>
                            <input type="number" class="form-control" name="alokasi_anggaran" id="alokasi_anggaran" placeholder="Masukkan Alokasi Anggaran">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Penetapan Lokasi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="penetapan_lokasi_no">Nomor/Tanggal</label>
                            <input type="text" class="form-control" name="penetapan_lokasi_no" id="penetapan_lokasi_no" placeholder="Masukkan Nomor/Tanggal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="penetapan_lokasi_masa_laku_awal">Masa Laku Awal</label>
                            <input type="text" class="form-control" name="penetapan_lokasi_masa_laku_awal" id="penetapan_lokasi_masa_laku_awal" placeholder="Masukkan Masa Laku Awal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="penetapan_lokasi_masa_laku_akhir">Masa Laku Akhir</label>
                            <input type="text" class="form-control" name="penetapan_lokasi_masa_laku_akhir" id="penetapan_lokasi_masa_laku_akhir" placeholder="Masukkan Masa Laku Akhir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="penetapan_lokasi_perpanjangan_dari">Perpanjangan dari</label>
                            <input type="text" class="form-control" name="penetapan_lokasi_perpanjangan_dari" id="penetapan_lokasi_perpanjangan_dari" placeholder="Perpanjangan dari">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="penetapan_lokasi_perpanjangan_sampai">Perpanjangan sampai</label>
                            <input type="text" class="form-control" name="penetapan_lokasi_perpanjangan_sampai" id="penetapan_lokasi_perpanjangan_sampai" placeholder="Perpanjangan sampai">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Monitoring dan Evaluasi</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_status">Status</label>
                            <select name="monev_status" id="monev_status" class="form-control select2">
                                <option>Terlambat</option>
                                <option>Tidak Terlambat</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="monev_output">Output (Ha)</label>
                            <input type="number" class="form-control" name="monev_output" id="monev_output" placeholder="Output">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Faktor Penyebab Terhambat</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="penyebab_terlambat">Penyebab</label>
                            <select name="penyebab_terlambat[]" id="penyebab_terlambat" class="form-control select2 multiple" multiple>
                                <option>Teknis</option>
                                <option>Administratif/Anggaran</option>
                                <option>Sosial</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide form-penyebab-lainnya">
                            <label for="penyebab_lainnya">Penyebab Lainnya</label>
                            <input type="text" class="form-control" name="penyebab_lainnya" id="penyebab_lainnya" placeholder="Faktor Lainnya">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="penyebab_keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="penyebab_keterangan" id="penyebab_keterangan" placeholder="Faktor Lainnya">
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-bold">Potensi Resiko</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_kemunduran_masa_konstruksi">Terhadap Kemunduran Masa Konstruksi (Tahun)</label>
                            <input type="number" class="form-control" name="resiko_kemunduran_masa_konstruksi" id="resiko_kemunduran_masa_konstruksi" placeholder="Terhadap Kemunduran Kemunduran Masa Konstruksi">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_output">Terhadap Kemunduran Output</label>
                            <input type="text" class="form-control" name="resiko_output" id="resiko_output" placeholder="Terhadap Kemunduran Output">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_outcome">Terhadap Kemunduran Outcome</label>
                            <input type="text" class="form-control" name="resiko_outcome" id="resiko_outcome" placeholder="Terhadap Kemunduran Outcome">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="resiko_penerima_manfaat">Terhadap Kemunduran Penerima Manfaat</label>
                            <input type="text" class="form-control" name="resiko_penerima_manfaat" id="resiko_penerima_manfaat" placeholder="Terhadap Kemunduran Penerima Manfaat">
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