@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="form-group col-sm-2">
        <button type="button" class="btn btn-block btn-primary" onclick="getJob()">
        Sinkronisasi Data API
        </button>
    </div>
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div class="row" style="margin-bottom: 50px">
                    <div class="col-xs-12 col-sm-3">
                        <label for="tahun_backup">Tahun Backup</label>
                        <div class='input-group date' id='datetimepicker-tahun_backup'>
                            <input type='text' id="tahun" class="form-control change-draw" value="{{now()->format("Y")}}"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="deviasi">Tanggal Backup</label>
                        <select name="tgl_backup" id="tgl_backup" class="form-control select2 change-draw">
                            @foreach ($data->tgl_backup as $tgl_backup)
                                <option>{{$tgl_backup}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="nmsatker">Nama Uker/UPT/Satker</label>
                        <select name="nmsatker" id="nmsatker" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            @foreach ($data->nmsatker as $satker)
                                <option>{{ $satker->nmsatker }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false" class="text-center">No</th>
                            <th data-orderable="true" class="text-center">Nama Uker/UPT/Satker</th>
                            <th data-orderable="true" class="text-center">Jumlah Terkontrak</th>
                            <th data-orderable="true" class="text-center">Jumlah Persiapan Terkontrak</th>
                            <th data-orderable="true" class="text-center">Jumlah Proses Lelang</th>
                            <th data-orderable="true" class="text-center">Jumlah Belum Lelang</th>
                            <th data-orderable="true" class="text-center">Jumlah Gagal Lelang</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total Data</th>
                            <th class="total_terkontrak">0</th>
                            <th class="total_persiapan_terkontrak">0</th>
                            <th class="total_proses_lelang">0</th>
                            <th class="total_belum_lelang">0</th>
                            <th class="total_gagal_lelang">0</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var urlData = '{{ route( $data->page->class . ".read") }}';
    var urlTotal = '{{ route( $data->page->class . ".total") }}';
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var urlJob = "{{ url()->current() }}/job";
    const urlChangeDate = '{{url('home/change-date')}}';
</script>
@endsection