@extends('layouts.layout_menu_all')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <label for="tanggal_backup">Tanggal Backup</label>
                        <input type="text" class="form-control change-draw" name="tanggal_backup" id="tanggal_backup" placeholder="Masukkan Tanggal Backup">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="uker">Unit Kerja</label>
                        <input type="text" class="form-control change-draw" name="uker" id="uker" placeholder="Masukkan Unit Kerja">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="upt">UPT</label>
                        <input type="text" class="form-control change-draw" name="upt" id="upt" placeholder="Masukkan UPT">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control change-draw" name="provinsi" id="provinsi" placeholder="Masukkan Provinsi">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control change-draw" name="kategori" id="kategori" placeholder="Masukkan Kategori">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="jenis_kontrak">Jenis Kontrak</label>
                        <input type="text" class="form-control change-draw" name="jenis_kontrak" id="jenis_kontrak" placeholder="Masukkan Jenis Kontrak">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="status_SIPBJ">Status SIPBJ</label>
                        <input type="text" class="form-control change-draw" name="status_SIPBJ" id="status_SIPBJ" placeholder="Masukkan Status SIPBJ">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="status">Status Proses Lelang</label>
                        <input type="text" class="form-control change-draw" name="status" id="status" placeholder="Masukkan Status Proses Lelang">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="durasi_lelang">Durasi Lelang</label>
                        <input type="text" class="form-control change-draw" name="durasi_lelang" id="durasi_lelang" placeholder="Masukkan Durasi Lelang">
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <label for="lama_proses">Lama Proses</label>
                        <input type="text" class="form-control change-draw" name="lama_proses" id="lama_proses" placeholder="Masukkan Lama Proses">
                    </div>
                </div>
                <table id="table-data" class="display table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th data-orderable="false">#</th>
                            <th data-orderable="true">Tanggal Backup</th>
                            <th data-orderable="true">Bulan Tahun Sync</th>
                            <th data-orderable="true">No</th>
                            <th data-orderable="true">Uker</th>
                            <th data-orderable="true">UPT</th>
                            <th data-orderable="true">BP2JK Prov</th>
                            <th data-orderable="true">Kode</th>
                            <th data-orderable="true">Satker Paket Pekerjaan</th>
                            <th data-orderable="true">Provinsi</th>
                            <th data-orderable="true">Kategori</th>
                            <th data-orderable="true">Jenis Kontrak</th>
                            <th data-orderable="true">Rencana Pengumuman Lelang</th>
                            <th data-orderable="true">RPM</th>
                            <th data-orderable="true">SBSN</th>
                            <th data-orderable="true">PHLN</th>
                            <th data-orderable="true">Belanja Barang</th>
                            <th data-orderable="true">Belanja Moda</th>
                            <th data-orderable="true">Pagu DIPA</th>
                            <th data-orderable="true">Kode SIRUP</th>
                            <th data-orderable="true">Tanggal Diusulkan Ke POKJA</th>
                            <th data-orderable="true">Status SIPBJ</th>
                            <th data-orderable="true">Kode SPSE</th>
                            <th data-orderable="true">Tanggal Pengumuman Lelang</th>
                            <th data-orderable="true">Tanggal Penetapan Pemenang</th>
                            <th data-orderable="true">Tanggal Rencana Kontrak</th>
                            <th data-orderable="true">Tanggal Realisasi Kontrak</th>
                            <th data-orderable="true">Status</th>
                            <th data-orderable="true">Durasi Lelang Hari</th>
                            <th data-orderable="true">Lama Proses Lelang</th>
                            <th data-orderable="true">Bulan Rencana Kontrak</th>
                            <th data-orderable="true">ES2 ID</th>
                            <th data-orderable="true">Kode Satker</th>
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
</script>
@endsection