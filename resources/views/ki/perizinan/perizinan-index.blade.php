@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="form-group col-sm-2">
        <button type="button" class="btn btn-block btn-primary" onclick="tambahData()">
            Tambah Data
        </button>
    </div>
    <div class="form-group col-sm-2">
        <button type="button" class="btn btn-block btn-warning" onclick="getJob()">
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
                        <label for="nama_balai_fil">UPT</label>
                        <select name="nama_balai_fil" id="nama_balai_fil" class="form-control change-draw select2">
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
                            <th data-orderable="true" >Nomor Surat Izin</th>
                            <th data-orderable="true" >Tanggal Terbit</th>
                            {{-- <th data-orderable="true" >Tanggal Tanggal Pengajuan Permohonan Izin</th> --}}
                            <th data-orderable="true" >Masa Berlaku</th>
                            <th data-orderable="true" >Volume Yang Diizinkan (liter/detik)</th>
                            <th data-orderable="true" >Rata-rata Volume Realisasi (liter/detik)</th>
                            <th data-orderable="true" >Nama Pemohon</th>
                            <th data-orderable="true" >Perusahaan Pemohon</th>
                            <th data-orderable="true" >Jenis Permohonan</th>
                            <th data-orderable="true" >Sumber Air</th>
                            <th data-orderable="true" >Nama Balai</th>
                            <th data-orderable="true" >Status Monitoring dan Evaluasi</th>
                            <th data-orderable="true" >Tanggal Monitoring dan Evaluasi</th>
                            <th data-orderable="true" >Dokumen Hasil Monitoring dan Evaluasi</th>
                            <th data-orderable="true" >Status Realisasi</th>
                            <th data-orderable="true" >Keterangan</th>
                            <th data-orderable="true" >Pengaduan</th>
                            @if (Auth::user()->level == "UPR-T2" || Auth::user()->username = "developer")
                                <th data-orderable="false"></th>
                            @endif
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
                    <h3 class="modal-title" id="modal-data-title">Perizinan</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide status_monev_sudah">
                            <label for="nomor_surat">Nomor Surat Izin</label>
                            <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Masukkan Nomor Surat">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="tanggal_surat">Tanggal Terbit</label>
                            <div class='input-group date' id='datetimepicker-tanggal_surat'>
                                <input type='text' id="tanggal_surat" class="form-control" name='tanggal_surat'/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                             </div>
                        </div>
                        {{-- <div class="form-group col-lg-12 form-hide">
                            <label for="tanggal_surat_edit">Tanggal Pengajuan Permohonan Izin</label>
                            <div class='input-group date' id='datetimepicker-tanggal_surat_edit'>
                                <input type='text' id="tanggal_surat_edit" class="form-control" name='tanggal_surat_edit'/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                             </div>
                        </div> --}}
                        <div class="form-group col-lg-12 form-hide">
                            <label for="masa_berlaku">Masa Berlaku</label>
                            <div class='input-group date' id='datetimepicker-masa_berlaku'>
                                <input type='text' id="masa_berlaku" class="form-control" name='masa_berlaku'/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                             </div>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="volume_yang_diizinkan">Volume Yang diizinkan (liter/detik)</label>
                            <input type="number" class="form-control" name="volume_yang_diizinkan" id="volume_yang_diizinkan" placeholder="Masukkan Volume Yang diizinkan">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="nama_pemohon">Nama Pemohon</label>
                            <input type="text" class="form-control" name="nama_pemohon" id="nama_pemohon" placeholder="Masukkan Nama Pemohon">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="nama_perusahaan">Perusahaan Pemohon</label>
                            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukkan Perusahaan Pemohon">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="sumber_air">Sumber Air</label>
                            <input type="text" class="form-control" name="sumber_air" id="sumber_air" placeholder="Masukkan Sumber Air">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="nama_balai">Nama Balai</label>
                            <input type="text" class="form-control" name="nama_balai" id="nama_balai" placeholder="Masukkan Nama Balai">
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="jenis_permohonan_edit">Jenis Permohonan</label>
                            <select name="jenis_permohonan_edit" id="jenis_permohonan_edit" class="form-control select2">
                                <option>Pengusahaan SDA</option>
                                <option>Penggunaan SDA</option>
                                <option>Pengusahaan SDA Belum Berizin</option>
                                <option>Penggunaan SDA Belum Berizin</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide">
                            <label for="status_monev">Status MONEV</label>
                            <select name="status_monev" id="status_monev" class="form-control select2">
                                <option>SUDAH</option>
                                <option>BELUM</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide form-monev">
                            <label for="tanggal_monev">Tanggal MONEV</label>
                            <div class='input-group date' id='datetimepicker-tanggal_monev'>
                                <input type='text' id="tanggal_monev" class="form-control" name='tanggal_monev' value="{{date("Y-m-d")}}"/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                             </div>
                        </div>
                        <div class="form-group col-lg-12 form-hide status_monev_sudah">
                            <label for="dokumen_hasil_monev">Dokumen Hasil Monev</label>
                            <input type="file" name="dokumen_hasil_monev" id="dokumen_hasil_monev" class="form-control">
                            <span>Upload hanya file PDF dengan max file 1 mb</span>
                        </div>
                        <div class="form-group col-lg-12 form-hide status_monev_sudah">
                            <label for="sesuai_izin">Status Realisasi</label>
                            <select name="sesuai_izin" id="sesuai_izin" class="form-control select2">
                                <option>Sesuai Izin</option>
                                <option>Tidak Sesuai Izin</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 form-hide status_monev_sudah">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan">
                        </div>
                        <div class="form-group col-lg-12 form-hide status_monev_sudah">
                            <label for="pengaduan">Pengaduan</label>
                            <select name="pengaduan" id="pengaduan" class="form-control select2">
                                <option>ADA</option>
                                <option>TIDAK</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 form-hide">
                            <a href='{{ url('ki/surat') }}' target="_blank" class="btn btn-primary btn-pengaduan">Masukkan Data Pengaduan</a>
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
    var urlJob = "{{ url()->current() }}/job";
    var urlRealisasi = "{{ url('ki/perizinan-realisasi') }}";
    var actionCol = {{ (Auth::user()->level == "UPR-T2" || Auth::user()->username == "developer") ? "true" : "false" }}
</script>
@endsection