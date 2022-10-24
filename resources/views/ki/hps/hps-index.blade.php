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
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <label for="tahun_backup">Tahun Backup</label>
                        <div class='input-group date' id='datetimepicker-tahun_backup'>
                            <input type='text' id="tahun_backup" class="form-control" value="{{now()->format("Y")}}"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <label for="deviasi">Tanggal Backup</label>
                        <select name="tgl_backup" id="tgl_backup" class="form-control select2 change-draw">
                            @foreach ($data->tgl_backup as $tgl_backup)
                                <option>{{$tgl_backup}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="kdkategori">Kategori</label>
                        <select name="kdkategori" id="kdkategori" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            <option value="0">AU</option>
                            <option value="1">Barang</option>
                            <option value="2">Pekerjaan Konstruksi</option>
                            <option value="3">Jasa Konsultansi (Badan Usaha)</option>
                            <option value="4">Jasa Konsultansi (Orang)</option>
                            <option value="5">Jasa Lainnya</option>
                            <option value="6">Cadangan</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="kdjnskon">Jenis Kontrak</label>
                        <select name="kdjnskon" id="kdjnskon" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            <option value="0">SYC</option>
                            <option value="1">MYC Baru</option>
                            <option value="2">MYC Lanjutan</option>
                            <option value="3">MYC Usulan</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="status_tender">Status Tender</label>
                        <select name="status_tender" id="status_tender" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            <option value="terkontrak">Terkontrak</option>
                            <option value="Proses Lelang">Proses Lelang</option>
                            <option value="persiapan kontrak">Persiapan Kontrak</option>
                            <option value="Gagal Lelang">Gagal Lelang</option>
                            <option value="Belum Lelang">Belum Lelang</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 50px">
                    {{-- <div class="col-xs-12 col-sm-3">
                        <label for="sumber_dana">Sumber Dana</label>
                        <select name="sumber_dana" id="sumber_dana" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            <option value="rmp">RMP</option>
                            <option value="phln">PHLN</option>
                            <option value="sbsn">SBSN</option>
                        </select>
                    </div> --}}
                    <div class="col-xs-12 col-sm-3">
                        <label for="unitkerja">Unit Kerja</label>
                        <select name="unit_kerja" id="unit_kerja" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            @foreach ($data->unit_kerja as $uk)
                                <option value="{{$uk->kode}}">{{$uk->unit_kerja}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="upt">UPT</label>
                        <select name="upt" id="upt" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            @foreach ($data->upt as $upt)
                                <option>{{$upt->nama_upt}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="persentase">Nilai Kontrak</label>
                        <select name="persentase" id="persentase" class="form-control select2 change-draw">
                            <option value="">ALL</option>
                            <option value="1">< 60%</option>
                            <option value="2">>= 60% dan < 70% </option>
                            <option value="3">>= 70% dan < 80% </option>
                        </select>
                    </div>
                </div>
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        {{-- <tr>
                            <th colspan="17"></th>
                            <th colspan="4" class="text-center">Sumber Dana (Rp)</td>
                        </tr> --}}
                        <tr>
                            <th data-orderable="false" class="text-center">#</th>
                            <th data-orderable="true" class="text-center">Kode Paket</th>
                            <th data-orderable="true" class="text-center">Nama Paket</th>
                            <th data-orderable="true" class="text-center">Tahun</th>
                            <th data-orderable="true" class="text-center">Nama Unit Kerja</th>
                            <th data-orderable="true" class="text-center">Nama UPT</th>
                            <th data-orderable="true" class="text-center">Nama Satker</th>
                            <th data-orderable="true" class="text-center">Nama Paket</th>
                            <th data-orderable="true" class="text-center">Pagu (Rp)</th>
                            <th data-orderable="true" class="text-center">Nilai Kontrak (Rp)</th>
                            <th data-orderable="true" class="text-center">HPS (Rp)</th>
                            <th data-orderable="true" class="text-center">Kategori</th>
                            <th data-orderable="true" class="text-center">Sumber Dana</th>
                            <th data-orderable="true" class="text-center">Nama Rekanan</th>
                            {{-- <th data-orderable="true" class="text-center">NPWP</th> --}}
                            <th data-orderable="true" class="text-center">Nomor Kontrak</th>
                            <th data-orderable="true" class="text-center">Tanggal Kontrak</th>
                            {{-- <th data-orderable="true" class="text-center">Tanggal SPMK</th> --}}
                            {{-- <th data-orderable="true" class="text-center">Durasi Waktu Hari</th> --}}
                            <th data-orderable="true" class="text-center">Status Tender</th>
                            <th data-orderable="true" class="text-center">% Kontrak dari HPS</th>
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