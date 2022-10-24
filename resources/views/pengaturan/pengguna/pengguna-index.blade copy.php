@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="form-group col-sm-2">
        @isset($data->page->fitur->store)
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
                            <th data-orderable="true" data-data="name">Nama</th>
                            <th data-orderable="true" data-data="pengguna_kategori_nama">Kategori Pengguna</th>
                            <th data-orderable="true" data-data="level">Tingkat</th>
                            <th data-orderable="true" data-data="active">Status</th>
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
                    <h3 class="modal-title" id="modal-data-title">Form Pengguna</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="control-label">Tingkat</label>
                            <select name="level" id="level" class="form-control select2">
                                <option value="">- Pilih -</option>
                                <option value="UPR-T3">UPR-T3</option>
                                <option value="UPR-T2">UPR-T2</option>
                                <option value="UPR-T1">UPR-T1</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label">Unit</label>
                            <select name="unit" id="unit" class="form-control select2">
                                <option value="">- Pilih -</option>
                                <option value="Balai">Balai</option>
                                <option value="Unit Organisasi">Unit Organisasi</option>
                                <option value="Balai Teknik">Balai Teknik</option>
                                <option value="Unit Kerja">Unit Kerja</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label">Pengguna Kategori</label>
                            <select name="pengguna_kategori_id" id="pengguna_kategori_id" class="form-control select2">
                                <option value="">- Pilih Pengguna Kategori -</option>
                                @foreach ($data->pengguna_kategori as $item)
                                    <option value="{{ $item->pengguna_kategori_id }}">{{ $item->pengguna_kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 satker">
                            <label class="control-label">Satker</label>
                            <select name="satker_id" id="satker_id" class="form-control select2">
                                <option value="">- Pilih Satker -</option>
                                @foreach ($data->satker as $item)
                                    <option value="{{ $item->ID }}">{{ $item->NAMA }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 t2">
                            <label class="control-label">UPR-T2</label>
                            <select name="eselon2_id" id="eselon2_id" class="form-control select2">
                                <option value="">- Pilih UPR-T2 -</option>
                                @foreach ($data->eselon2 as $item)
                                    <option value="{{ $item->ID }}">{{ $item->NAMA }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 t1">
                            <label class="control-label">UPR-T1</label>
                            <select name="eselon1_id" id="eselon1_id" class="form-control select2">
                                <option value="">- Pilih UPR-T1 -</option>
                                @foreach ($data->eselon1 as $item)
                                    <option value="{{ $item->ID }}">{{ $item->NAMA }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="control-label">Username</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="control-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password-confirm" class="control-label">{{ __('Konfirmasi Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
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

{{-- <div class="modal fade" id="modal-access" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-access">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-access-title">Form Hak Akses</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="pengguna_id" id="pengguna_id">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label class="control-label">Pengguna Kategori</label>
                            <select name="pengguna_kategori_id" id="pengguna_kategori_id" class="form-control select2">
                                <option value="">- Pilih Pengguna Kategori -</option>
                                @foreach ($data->pengguna_kategori as $item)
                                    <option value="{{ $item->pengguna_kategori_id }}">{{ $item->pengguna_kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4 form-hide">
                            <label for="pengguna_akses_aktif">Status</label><br>
                            <div class="radio">
                                <label for="pengguna_akses_aktif1">
                                    <input type="radio" name="pengguna_akses_aktif" id="pengguna_akses_aktif1" value="1">
                                    Aktif
                                </label>
                            </div>
                            <div class="radio">
                                <label for="pengguna_akses_aktif0">
                                    <input type="radio" name="pengguna_akses_aktif" id="pengguna_akses_aktif0" value="0">
                                    Tidak Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered datatable" id="tabel-akses">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pengguna Kategori</th>
                                        <th>Status</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="list-akses">

                                </tbody>
                            </table>
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
</div> --}}

<script>
    var urlData = '{{ route( $data->page->class . ".read") }}';
    console.log(urlData);
    var urlInsert = '{{ route( $data->page->class . ".store") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update") }}';
    var urlAccess = '{{ route( $data->page->class . ".store_kategori") }}';
    var roleAccess = {{ isset($data->page->fitur->hak_akses) ? 'true' : 'false' }};
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
</script>
@endsection
