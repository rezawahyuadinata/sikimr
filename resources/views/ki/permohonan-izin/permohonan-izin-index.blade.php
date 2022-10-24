@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="form-group col-sm-2">
        <button type="button" class="btn btn-block btn-primary" onclick="getJob()">
         Sinkronisasi Data API
        </button>
    </div>
    <div class="col-sm-3">

    </div>
    <div class="col-sm-12"></div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="perizinan-start">Waktu Awal</label>
                        <div class='input-group date' id='datetimepicker-perizinan-start'>
                            <input type='text' id="perizinan-start" class="form-control change-draw" value="{{now()->firstOfMonth()->format("Y-m-d")}}"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                         </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="perizinan-end">Waktu Akhir</label>
                        <div class='input-group date' id='datetimepicker-perizinan-end'>
                            <input type='text' id="perizinan-end" class="form-control change-draw" value="{{now()->format('Y-m-d')}}"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                         </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="nama_balai">UPT</label>
                        <select name="nama_balai" id="nama_balai" class="form-control change-draw select2">
                            <option value="">ALL</option>
                            @foreach ($data->upt_perizinan as $upt)
                            <option>{{ $upt->nama_balai }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false">#</th>
                            <th data-orderable="true" >Nomor Registrasi Permohonan Izin</th>
                            <th data-orderable="true" >Nomor Surat Permohonan</th>
                            <th data-orderable="true" >Tanggal Surat Permohonan</th>
                            <th data-orderable="true" >Tanggal Pengajuan Permohonan Izin</th>
                            <th data-orderable="true" >Nama Pemohon</th>
                            <th data-orderable="true" >Perusahaan Pemohon</th>
                            <th data-orderable="true" >Jenis Permohonan</th>
                            <th data-orderable="true" >Sumber Air</th>
                            <th data-orderable="true" >UPT</th>
                            <th data-orderable="true" >Volume Yang Dimohonkan (liter/detik)</th>
                            <th data-orderable="true" >Tujuan Penggunaan SDA</th>
                            <th data-orderable="true" >Batas Waktu Penerbitan Izin *)</th>
                            <th data-orderable="true" >Status Permohonan</th>
                            @if (Auth::user()->level == "UPR-T2" || Auth::user()->username = "developer")
                                <th data-orderable="false"></th>
                            @endif
                        </tr>
                    </thead>
                </table>
                <p>*) apabila tidak sesuai, harap update pada data tersebut</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-data" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-data">
            <div class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-data-title">Permohonan Izin</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tanggal_surat">Tanggal Surat Permohonan</label>
                            <div class='input-group date' id='datetimepicker-tanggal_surat'>
                                <input type='text' id="tanggal_surat" class="form-control" name='tanggal_surat'/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                             </div>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tanggal_surat_edit">Tanggal Pengajuan Permohonan Izin</label>
                            <div class='input-group date' id='datetimepicker-tanggal_surat_edit'>
                                <input type='text' id="tanggal_surat_edit" class="form-control" name='tanggal_surat_edit'/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                             </div>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="volume_yang_dimohonkan">Volume Yang dimohonkan (liter/detik)</label>
                            <input type="number" class="form-control" name="volume_yang_dimohonkan" id="volume_yang_dimohonkan" placeholder="Masukkan Volume Yang Dimohonkan">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="status_permohonan">Status Permohonan</label>
                            <select name="status_permohonan" id="status_permohonan" class="form-control select2">
                                <option>DITOLAK</option>
                                <option>DIPROSES</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default d-none" data-dismiss="modal">Tutup</button>
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
    var urlJob = "{{ url()->current() }}/job"
    var actionCol = {{ (Auth::user()->level == "UPR-T2" || Auth::user()->username == "developer") ? "true" : "false" }}
</script>
@endsection