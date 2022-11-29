@extends('layouts.layout_menu_all')

@section('content')
    <div class="row">
        <div class="form-group col-sm-2">
            <button type="button" class="btn btn-block btn-primary" onclick="getJob()">
                Sinkronisasi Data PBJ
            </button>
        </div>
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <label for="tahun_backup">Tahun Backup</label>
                            <div class='input-group date' id='datetimepicker-tahun_backup'>
                                <input type='text' id="tahun" class="form-control change-draw"
                                    value="{{ now()->format('Y') }}" />
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
                                {{-- catatan: @foreach ($data->tgl_backup as $tgl_backup)
                                <option>{{$tgl_backup}}</option>
                            @endforeach --}}
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label for="kdkategori">Kategori</label>
                            <select name="kdkategori" id="kdkategori" class="form-control select2 change-draw">
                                <option value="">ALL</option>
                                {{-- catatan: <option value="0">AU</option> --}}
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
                        <div class="col-xs-12 col-sm-3">
                            <label for="sumber_dana">Sumber Dana</label>
                            <select name="sumber_dana" id="sumber_dana" class="form-control select2 change-draw">
                                <option value="">ALL</option>
                                <option value="rmp">RMP</option>
                                <option value="phln">PHLN</option>
                                <option value="sbsn">SBSN</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label for="unitkerja">Unit Kerja</label>
                            <select name="unit_kerja" id="unit_kerja" class="form-control select2 change-draw">
                                <option value="">ALL</option>
                                @foreach ($data->unit_kerja as $uk)
                                    <option value="{{ $uk->kode }}">{{ $uk->unit_kerja }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label for="upt">UPT</label>
                            <select name="upt" id="upt" class="form-control select2 change-draw">
                                <option value="">ALL</option>
                                @foreach ($data->upt as $upt)
                                    <option>{{ $upt->nama_upt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <label for="durasi">Durasi Kontrak</label>
                            <select name="durasi" id="durasi" class="form-control select2 change-draw">
                                <option value="">ALL</option>
                                <option value="1">0 - 60 Hari</option>
                                <option value="2">61 - 90 Hari</option>
                                <option value="3">91 - 120 Hari </option>
                                <option value="4">> 120 Hari</option>
                            </select>
                        </div>
                    </div>
                    <table id="table-data" class="display table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th data-orderable="true" class="text-center">No</th>
                                <th data-orderable="true" class="text-center">Kode Paket</th>
                                <th data-orderable="true" class="text-center">Nama Paket</th>
                                <th data-orderable="true" class="text-center">Unit Kerja</th>
                                <th data-orderable="true" class="text-center">UPT</th>
                                {{-- catatan: <th data-orderable="true" class="text-center">Kode Satker</th> --}}
                                <th data-orderable="true" class="text-center">Nama Satuan Kerja</th>
                                <th data-orderable="true" class="text-center">Kategori</th>
                                <th data-orderable="true" class="text-center">Jenis Kontrak</th>
                                <th data-orderable="true" class="text-center">Status Tender</th>
                                {{-- catatan: <th class="text-center">Sumber Dana (Rp)</td> --}}
                                <th data-orderable="true">Sumber Dana</th>
                                <th data-orderable="true" class="text-center">Tanggal Pengumuman Lelang</th>
                                <th data-orderable="true" class="text-center">Tanggal Tanda Tangan Kontrak</th>
                                <th data-orderable="true" class="text-center">Durasi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var urlData = '{{ route($data->page->class . '.read') }}';
        var roleRead = {{ isset($data->page->fitur->read) ? 'true' : 'false' }};
        var urlJob = "{{ url()->current() }}/job";
        const urlChangeDate = '{{ url('home/change-date') }}';
    </script>
@endsection
