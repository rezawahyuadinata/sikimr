@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="tahun">Tahun Anggaran</label>
                        <div class='input-group date' id='datetimepicker-tahun'>
                            <input type='text' id="tahun" class="form-control change-draw" value="{{now()->format("Y")}}"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <input name="tgl_backup" type="hidden" id="tgl_backup" class="form-control change-draw">
                    </div>
                </div><br>
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="true" rowspan="2">ID RUP</th>
                            <th data-orderable="true" rowspan="2">Satker</th>
                            <th data-orderable="true" rowspan="2">Nama Paket</th>
                            <th data-orderable="false" colspan="3" class="text-center">Perencanaan</th>
                            <th data-orderable="false" colspan="1">Persiapan</th>
                            <th data-orderable="false" colspan="1">Review Pokja</th>
                            <th data-orderable="false" colspan="1">Pelaksanaan Pemilihan</th>
                            <th data-orderable="false" colspan="7" class="text-center">Pelaksanaan Pekerjaan</th>
                        </tr>
                        <tr>
                          <th data-orderable="true">Paket Didaftarkan</th>
                          <th data-orderable="true">Penugasan PPK</th>
                          <th data-orderable="true">Dokumen Perencanaan</th>
                          <th data-orderable="true">Dokumen RPP</th>
                          <th data-orderable="true">Review Dokumen RPP</th>
                          <th data-orderable="true">Upload BAHP</th>
                          <th data-orderable="true">SPPBJ & KONTRAK</th>
                          <th data-orderable="true">KSO</th>
                          <th data-orderable="true">Sub Kontrak</th>
                          <th data-orderable="true">Personil & Peralatan</th>
                          <th data-orderable="true">Upload SPMK</th>
                          <th data-orderable="true">Addendum Kontrak</th>
                          <th data-orderable="true">Serah Terima</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var urlData = '{{ route( $data->page->class . ".read") }}';
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    const urlChangeDate = '{{url('home/change-date')}}';
</script>
<!-- <script>
var urlData = '{{ route( $data->page->class . ".read") }}';
</script> -->
@endsection
