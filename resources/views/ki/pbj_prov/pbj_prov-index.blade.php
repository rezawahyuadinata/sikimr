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
                            <th data-orderable="true">Provinsi</th>
                            <th data-orderable="true">Total Kontrak PKT</th>
                            <th data-orderable="true">Total Kontrak Pagu Dipa</th>
                            <th data-orderable="true">Total Kontrak Pagu Pengadaan</th>
                            <th data-orderable="true">Terkontrak PKT</th>
                            <th data-orderable="true">Terkontrak Pagu Dipa</th>
                            <th data-orderable="true">Terkontrak Pagu Pengadaan</th>
                            <th data-orderable="true">Persiapan PKT</th>
                            <th data-orderable="true">Persiapan Pagu Dipa</th>
                            <th data-orderable="true">Persiapan Pagu Pengadaan</th>
                            <th data-orderable="true">Proses Lelang PKT</th>
                            <th data-orderable="true">Proses Lelang Pagu Dipa</th>
                            <th data-orderable="true">Proses Lelang Pagu Pengadaan</th>
                            <th data-orderable="true">Belum Lelang PKT</th>
                            <th data-orderable="true">Belum Lelang Pagu Dipa</th>
                            <th data-orderable="true">Belum Lelang Pagu Pengadaan</th>
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
                    <h3 class="modal-title" id="modal-data-title">Form PBJ Prov</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="provinsi">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control select2">
                                <option value="">- Pilih Provinsi-</option>
                                @foreach ($data->provinsi as $item)
                                <option value="{{ $item->province_name }}">{{ $item->province_code . ' -
                                    '.$item->province_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="TOTAL_KONTRAK_PKT">Total Kontrak PKT</label>
                            <input type="number" class="form-control" name="TOTAL_KONTRAK_PKT" id="TOTAL_KONTRAK_PKT"
                                placeholder="Masukkan Total Kontrak PKT">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="TOTAL_KONTRAK_PAGU_DIPA">Total Kontrak Pagu Dipa</label>
                            <input type="number" class="form-control" name="TOTAL_KONTRAK_PAGU_DIPA"
                                id="TOTAL_KONTRAK_PAGU_DIPA" placeholder="Masukkan Total Kontrak Pagu Dipa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="TOTAL_KONTRAK_PAGU_PENGADAAN">Total Kontrak Pagu Pengadaan</label>
                            <input type="number" class="form-control" name="TOTAL_KONTRAK_PAGU_PENGADAAN"
                                id="TOTAL_KONTRAK_PAGU_PENGADAAN" placeholder="Masukkan Total Kontrak Pagu Pengadaan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="TERKONTRAK_PKT">Terkontrak PKT</label>
                            <input type="number" class="form-control" name="TERKONTRAK_PKT" id="TERKONTRAK_PKT"
                                placeholder="Masukkan Terkontrak PKT">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="TERKONTRAK_PAGU_DIPA">Terkontrak Pagu Dipa</label>
                            <input type="number" class="form-control" name="TERKONTRAK_PAGU_DIPA"
                                id="TERKONTRAK_PAGU_DIPA" placeholder="Masukkan Terkontrak Pagu Dipa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="TERKONTRAK_PAGU_PENGADAAN">Terkontrak Pagu Pengadaan</label>
                            <input type="number" class="form-control" name="TERKONTRAK_PAGU_PENGADAAN"
                                id="TERKONTRAK_PAGU_PENGADAAN" placeholder="Masukkan Terkontrak Pagu Pengadaan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="PERSIAPAN_PKT">Persiapan PKT</label>
                            <input type="number" class="form-control" name="PERSIAPAN_PKT" id="PERSIAPAN_PKT"
                                placeholder="Masukkan Persiapan PKT">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="PERSIAPAN_PAGU_DIPA">Persiapan Pagu Dipa</label>
                            <input type="number" class="form-control" name="PERSIAPAN_PAGU_DIPA"
                                id="PERSIAPAN_PAGU_DIPA" placeholder="Masukkan Persiapan Pagu Dipa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="PERSIAPAN_PAGU_PENGADAAN">Persiapan Pagu Pengadaan</label>
                            <input type="number" class="form-control" name="PERSIAPAN_PAGU_PENGADAAN"
                                id="PERSIAPAN_PAGU_PENGADAAN" placeholder="Masukkan Persiapan Pagu Pengadaan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="PROSES_LELANG_PKT">Proses Lelang PKT</label>
                            <input type="number" class="form-control" name="PROSES_LELANG_PKT" id="PROSES_LELANG_PKT"
                                placeholder="Masukkan Proses Lelang PKT">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="PROSES_LELANG_PAGU_DIPA">Proses Lelang Pagu Dipa</label>
                            <input type="number" class="form-control" name="PROSES_LELANG_PAGU_DIPA"
                                id="PROSES_LELANG_PAGU_DIPA" placeholder="Masukkan Proses Lelang Pagu Dipa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="PROSES_LELANG_PAGU_PENGADAAN">Proses Lelang Pagu Pengadaan</label>
                            <input type="number" class="form-control" name="PROSES_LELANG_PAGU_PENGADAAN"
                                id="PROSES_LELANG_PAGU_PENGADAAN" placeholder="Masukkan Proses Lelang Pagu Pengadaan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="BELUM_LELANG_PKT">Belum Lelang PKT</label>
                            <input type="number" class="form-control" name="BELUM_LELANG_PKT" id="BELUM_LELANG_PKT"
                                placeholder="Masukkan Belum Lelang PKT">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="BELUM_LELANG_PAGU_DIPA">Belum Lelang Pagu Dipa</label>
                            <input type="number" class="form-control" name="BELUM_LELANG_PAGU_DIPA"
                                id="BELUM_LELANG_PAGU_DIPA" placeholder="Masukkan Belum Lelang Pagu Dipa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="BELUM_LELANG_PAGU_PENGADAAN">Belum Lelang Pagu Pengadaan</label>
                            <input type="number" class="form-control" name="BELUM_LELANG_PAGU_PENGADAAN"
                                id="BELUM_LELANG_PAGU_PENGADAAN" placeholder="Masukkan Belum Lelang Pagu Pengadaan">
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