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
                                <th data-orderable="true">Kode</th>
                                <th data-orderable="true">Nama</th>
                                <th data-orderable="true">Nilai Kontrak</th>
                                <th data-orderable="false"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var urlData = '{{ route($data->page->class . '.read') }}';
        var urlInsert = '{{ route($data->page->class . '.store') }}';
    </script>
@endsection
