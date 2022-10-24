@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="form-group col-lg-3 col-md-4 form-hide">
        <label for="filter_province_code">Provinsi</label>
        <select name="filter_province_code" id="filter_province_code" class="form-control select2">
            <option value="">- Pilih Provinsi-</option>
            @foreach ($data->provinsi as $item)
                <option value="{{ $item->province_code }}">{{ $item->province_code . ' - '.$item->province_name }}</option>
            @endforeach
        </select>
    </div>
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
                    <h3 class="modal-title" id="modal-data-title">Form Kecamatan</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="province_code">Provinsi</label>
                            <select name="province_code" id="province_code" class="form-control select2">
                                <option value="">- Pilih Provinsi-</option>
                                @foreach ($data->provinsi as $item)
                                    <option value="{{ $item->province_code }}">{{ $item->province_code . ' - '.$item->province_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kabupaten_code">Kota / Kabupaten</label>
                            <select name="kabupaten_code" id="kabupaten_code" class="form-control select2">
                                <option value="">- Pilih Kota-</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kecamatan_code">Kode</label>
                            <input type="text" class="form-control" name="kecamatan_code" id="kecamatan_code" placeholder="Masukkan kode kecamatan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="kecamatan_name">Nama</label>
                            <input type="text" class="form-control" name="kecamatan_name" id="kecamatan_name" placeholder="Masukkan nama kecamatan">
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
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
</script>
@endsection
