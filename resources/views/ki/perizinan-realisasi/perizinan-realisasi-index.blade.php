@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="form-group col-sm-2">
        <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
            Tambah Data
        </button>
    </div>
    <div class="form-group col-sm-4">
        <div class="btn btn-block btn-warning">
            Volume yang Diizinkan (liter/detik) : {{$data->perizinan->volume_yang_diizinkan ?? 0}}
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="btn btn-block btn-warning btn-rata">
            Rata Rata Realisasi : {{$data->perizinan->volume_realisasi ?? 0}}
        </div>
    </div>
    <div class="form-group col-sm-2">
        <button type="button" class="btn btn-block btn-secondary" onclick="window.history.back()">
            Kembali
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
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false">#</th>
                            <th data-orderable="true" >Tahun</th>
                            <th data-orderable="true" >Bulan</th>
                            <th data-orderable="true" >Volume Realisasi (liter/detik)</th>
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
            <div class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-data-title">Realisasi Perizinan</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <input type="hidden" name="perizinan_id" id="perizinan_id" value="{{ request("perizinan_id") }}">
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tahun">Tahun</label>
                            <div class='input-group date' id='datetimepicker-tahun'>
                                <input type='text' id="tahun" class="form-control" name='tahun'/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                             </div>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="bulan">Bulan</label>
                            <select name="bulan" id="bulan" class="form-control select2">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="volume_realisasi">Volume Realisasi (liter/detik)</label>
                            <input type="number" class="form-control" name="volume_realisasi" id="volume_realisasi" placeholder="Masukkan Volume Yang diizinkan">
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
    var perizinan_id = {{request("perizinan_id")}}
    var urlData = '{{ route( $data->page->class . ".read") }}';
    var urlInsert = '{{ route( $data->page->class . ".store") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update") }}';
    var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
    var roleUpdate = {{ isset($data->page->fitur->update) ? 'true' : 'false' }};
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
    var urlJob = "{{ url()->current() }}/job";
    var urlRealisasi = "{{ url('ki/perizinan-realisasi') }}";
    var perizinan_id = {{ request('perizinan_id') }}
</script>
@endsection