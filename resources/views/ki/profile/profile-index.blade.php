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
                        <label for="thang">Tahun Anggaran</label>
                        <div class='input-group date' id='datetimepicker-thang'>
                            <input type='text' id="thang" class="form-control change-draw" value="{{now()->format("Y")}}"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="deviasi">Tanggal Backup</label>
                        <select name="tanggal_backup" id="tanggal_backup" class="form-control select2 change-draw">
                            @foreach ($data->tanggal_backup as $tgl_backup)
                                <option>{{$tgl_backup}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="real_keu">Progres Keuangan 0%</label>
                        <select name="real_keu" id="real_keu" class="form-control select2 change-draw">
                            <option>Tidak Tampil</option>
                            <option>Tampil</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="real_fisik">Progres Fisik 0%</label>
                        <select name="real_fisik" id="real_fisik" class="form-control select2 change-draw">
                            <option>Tidak Tampil</option>
                            <option>Tampil</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="progresKeu">Deviasi Keuangan</label>
                        <select name="progresKeu" id="progresKeu" class="form-control select2 change-draw">
                            <option>ALL</option>
                            <option value="1">Dev > 10%</option>
                            <option value="2">0% < Dev <= 10%</option>
                            <option value="3">-10% < Dev <= 0%</option>
                            <option value="4">-30% < Dev <= -10%</option>
                            <option value="5">Dev <= -30%</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="progresFis">Deviasi Fisik</label>
                        <select name="progresFis" id="progresFis" class="form-control select2 change-draw">
                            <option>ALL</option>
                            <option value="1">Dev > 10%</option>
                            <option value="2">0% < Dev <= 10%</option>
                            <option value="3">-10% < Dev <= 0%</option>
                            <option value="4">-30% < Dev <= -10%</option>
                            <option value="5">Dev <= -30%</option>
                        </select>
                    </div>
                </div>
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false">#</th>
                            <th data-orderable="true">Nama Satuan Kerja</th>
                            <th data-orderable="true">Pagu (Rp)</th>
                            <th data-orderable="true">Rencana Keuangan</th>
                            <th data-orderable="true">Realisasi Keuangan</th>
                            <th data-orderable="true">Deviasi Keuangan</th>
                            <th data-orderable="true">Rencana Fisik</th>
                            <th data-orderable="true">Realisasi Fisik</th>
                            <th data-orderable="true">Deviasi Fisik</th>
                            <th data-orderable="true">Tanggal Kirim</th>
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
    var urlJob = "{{ url()->current() }}/job";
    const urlChangeDate = '{{url('home/change-date')}}';

</script>
@endsection