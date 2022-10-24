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
                            <th data-orderable="true">Kota</th>
                            <th data-orderable="true">Kecamatan</th>
                            <th data-orderable="true">Kode</th>
                            <th data-orderable="true">Nama</th>
                            <th data-orderable="false"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-data-title">Form Kelurahan</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="kelurahan_id" id="kelurahan_id">
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="provinsi_id">Provinsi</label>
                            <select name="provinsi_id" id="provinsi_id" class="form-control select2">
                                <option value="">- Pilih Provinsi-</option>
                                @foreach ($data->provinsi as $item)
                                    <option value="{{ $item->provinsi_id }}">{{ $item->provinsi_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kota_id">Kota</label>
                            <select name="kota_id" id="kota_id" class="form-control select2">
                                <option value="">- Pilih Kota-</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kecamatan_id">Kecamatan</label>
                            <select name="kecamatan_id" id="kecamatan_id" class="form-control select2">
                                <option value="">- Pilih Kecamatan-</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 form-hide">
                            <label for="kelurahan_kode">Kode</label>
                            <input type="text" class="form-control" name="kelurahan_kode" id="kelurahan_kode">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kelurahan_nama">Nama</label>
                            <input type="text" class="form-control" name="kelurahan_nama" id="kelurahan_nama">
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
    var urlKota = '{{ route( $data->page->class . ".get_kota") }}';
    var urlKecamatan = '{{ route( $data->page->class . ".get_kecamatan") }}';
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
</script>
@endsection
