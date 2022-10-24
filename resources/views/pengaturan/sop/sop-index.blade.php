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
                                <th data-orderable="true">Nama</th>
                                <th data-orderable="true">Kategori SOP</th>
                                <th data-orderable="true">Status</th>
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
                        <h3 class="modal-title" id="modal-data-title">Form SOP</h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" id="id">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="name">Nama SOP</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama SOP" />
                            </div>
                            <div class="form-group col-lg-12 form-hide">
                                <label for="category">Kategori SOP</label>
                                <select name="category" id="category" class="form-control select2">
                                    <option value="" selected="true" disabled="disabled">- Pilih -</option>
                                    @foreach ($data->sopCat as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-12 form-hide">
                                <label for="file_sop">File SOP</label>
                                <input type="file" required class="form-control" id="file_sop" name="file_sop"
                                    accept="application/pdf" />
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

    <div class="modal fade" id="modal-data-edit" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-data-edit">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-data-title">Form SOP</h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id_sop" id="id_sop">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Status SOP</label>
                                <select name="status" id="status" class="form-control select2">
                                    <option value="" selected="true" disabled="disabled">- Pilih -</option>
                                    <option value="1">Dihapus</option>
                                    <option value="2">Revisi</option>
                                    <option value="3">Verifikasi</option>
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

    <script>
        var urlData = '{{ route($data->page->class . '.read') }}';
        var urlInsert = '{{ route($data->page->class . '.store') }}';
        var urlUpdate = '{{ route($data->page->class . '.update') }}';
        var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
        var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
        var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
    </script>
@endsection
