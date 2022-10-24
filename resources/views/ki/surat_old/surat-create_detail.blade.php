@extends('layouts.layout_menu_all')

@section('content')
<input type="hidden" name="id_surat" id="id_surat" value="{{ $data->surat->id }}">
<div class="row">
    <div class="col-sm-12">

        <div class="modal-header">
            <h3 class="modal-title" id="modal-data-title">Perihal :{{ $data->surat->perihal }} </h3>
            <h4 class="modal-title" id="modal-data-title">No Surat : {{ $data->surat->no_surat }} - Tanggal : {{ $data->surat->tgl_surat }}</h4>
            <h4 class="modal-title" id="modal-data-title">Identitas Pelapor  : {{ $data->surat->identitas_pelapor }} </h4>
            <h4 class="modal-title" id="modal-data-title">Entitas Pelapor : {{ $data->surat->entitas_pelapor }} </h4>    
        </div>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_a" data-toggle="tab">Terlapor</a></li>
                <li><a href="#tab_b" data-toggle="tab">Bidang Pengaduan</a></li>
                <li><a href="#tab_c" data-toggle="tab">Progres Penelaahan</a></li>
                <li><a href="#tab_d" data-toggle="tab">Peninjauan Lapangan</a></li>
                <li><a href="#tab_e" data-toggle="tab">Rekomendasi dan Telaah</a></li>
                <li><a href="#tab_f" data-toggle="tab">Pemantauan</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_a">
                    @include('ki.surat.surat_pengaduan')
                </div>
                <div class="tab-pane" id="tab_b">
                    @include('ki.surat.surat_pengaduan_kategori')
                </div>
                <div class="tab-pane" id="tab_c">
                    @include('ki.surat.surat_pembahasan')
                </div>
                <div class="tab-pane" id="tab_d">
                    @include('ki.surat.surat_peninjauan_lapangan')
                </div>
                <div class="tab-pane" id="tab_e">
                    @include('ki.surat.surat_telaahan')
                </div>
                <div class="tab-pane" id="tab_f">
                    @include('ki.surat.surat_pemantauan')
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var urlInsert = '{{ route( $data->page->class . ".store_detail") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update_detail") }}';
    var urlSatker = '{{ route( $data->page->class . ".get_satker") }}';
    var urlPpk = '{{ route( $data->page->class . ".get_ppk") }}';
</script>
@endsection