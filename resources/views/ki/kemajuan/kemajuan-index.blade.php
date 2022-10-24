@extends('layouts.layout_menu_all')

@section('content')
<style>
    .border-black-1px {
        border: solid black 1px;
    }
    #table-pengadaan-banding tr, td, th{
        border: solid black 1px;
    }
</style>
<div class="row">
    {{-- <div class="form-group col-sm-2">
        <button type="button" class="btn btn-block btn-primary" onclick="getJob()">
            Sinkronisasi Data API
        </button>
    </div> --}}
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Kemajuan Proses Tender Mingguan</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-4">
                        <label for="tahun">Tahun Anggaran</label>
                        <div class='input-group date' id='datetimepicker-tahun'>
                            <input type='text' id="tahun" class="form-control change-draw" value="{{now()->format("Y")}}"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="status">Tanggal</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <select name="pengadaan-banding1" id="pengadaan-banding1" class="form-control select2 change-draw"></select>
                            </div>
                            <div class="col-sm-6">
                                <select name="pengadaan-banding2" id="pengadaan-banding2" class="form-control select2 change-draw"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="margin-top: 20px;">
                        <div class="" style="max-width:100%; overflow-x:auto">
                            <table id="table-pengadaan-banding" class="table table-hover table-striped">
                                <thead style="position: sticky; top:0">
                                    <tr class="text-center text-bold">
                                        <td rowspan="3" class="text-center text-bold" style="background-color: #009999">UPT</td>
                                        <td colspan="12" id="table-date1">11 Desember</td>
                                        <td colspan="12" id="table-date2" style="background-color: #d1d6ff">11 Desember</td>
                                    </tr>
                                    <tr class="text-center text-bold">
                                        <td colspan="2" class="text-center text-bold" style="background-color: #009999">Kontraktual</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #00FF00">Terkontrak</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #CC99FF">Persiapan Terkontrak</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #FFFF00">Proses Lelang</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #FF6666">Belum Lelang</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: grey">Gagal Lelang</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #009999">Kontraktual</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #00FF00">Terkontrak</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #CC99FF">Persiapan Terkontrak</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #FFFF00">Proses Lelang</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: #FF6666">Belum Lelang</th>
                                        <td colspan="2" class="text-center text-bold" style="background-color: grey">Gagal Lelang</th>
                                    </tr>
                                    <tr class="text-center text-bold">
                                        <td style="background-color: #009999">PKT</th>
                                        <td style="background-color: #009999">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #00FF00">PKT</th>
                                        <td style="background-color: #00FF00">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #CC99FF">PKT</th>
                                        <td style="background-color: #CC99FF">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #FFFF00">PKT</th>
                                        <td style="background-color: #FFFF00">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #FF6666">PKT</th>
                                        <td style="background-color: #FF6666">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: grey">PKT</th>
                                        <td style="background-color: grey">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #009999">PKT</th>
                                        <td style="background-color: #009999">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #00FF00">PKT</th>
                                        <td style="background-color: #00FF00">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #CC99FF">PKT</th>
                                        <td style="background-color: #CC99FF">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #FFFF00">PKT</th>
                                        <td style="background-color: #FFFF00">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: #FF6666">PKT</th>
                                        <td style="background-color: #FF6666">Pagu Dipa (Rp Ribu)</th>
                                        <td style="background-color: grey">PKT</th>
                                        <td style="background-color: grey">Pagu Dipa (Rp Ribu)</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
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