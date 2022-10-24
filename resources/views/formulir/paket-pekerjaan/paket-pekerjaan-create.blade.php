@extends('layouts.layout_menu_all')

@section('content')
    <input type="hidden" name="paket_id" id="paket_id" value="{{ $data->paket_pekerjaan->id }}">
    <div class="row">
        <div class="col-md-12">
            <div class="box collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Paket Pekerjaan</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="15%">Kode Paket</td>
                                    <td>{{ $data->paket_pekerjaan->kdpaket }}</td>
                                </tr>
                                <tr>
                                    <td width="15%">Nama Paket</td>
                                    <td>{{ $data->paket_pekerjaan->nmpaket }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_a" data-toggle="tab">Sasaran</a></li>
                    <li><a href="#tab_b" data-toggle="tab">Pemangku Kepentingan</a></li>
                    <li><a href="#tab_c" data-toggle="tab">Tujuan Pelaksanaan MR</a></li>
                    <li><a href="#tab_d" data-toggle="tab">Profil Risiko</a></li>
                    <li><a href="#tab_e" data-toggle="tab">Peta Risiko</a></li>
                    <li><a href="#tab_f" data-toggle="tab">Jadwal Pelaksanaan</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_a">
                        @include('formulir.paket-pekerjaan.paket-pekerjaan-sasaran')
                    </div>
                    <div class="tab-pane" id="tab_b">
                        @include('formulir.paket-pekerjaan.paket-pekerjaan-kepentingan')
                    </div>
                    <div class="tab-pane" id="tab_c">
                        @include('formulir.paket-pekerjaan.paket-pekerjaan-tujuan')
                    </div>
                    <div class="tab-pane" id="tab_d">
                        @include('formulir.paket-pekerjaan.paket-pekerjaan-resiko')
                    </div>
                    <div class="tab-pane" id="tab_e">
                        @include('formulir.paket-pekerjaan.paket-pekerjaan-peta')
                    </div>
                    <div class="tab-pane" id="tab_f">
                        @include('formulir.paket-pekerjaan.paket-pekerjaan-jadwal')
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    var urlInsert = '{{ route( $data->page->class . ".store") }}';
    var urlUpdate = '{{ route( $data->page->class . ".update") }}';
</script>
@endsection
