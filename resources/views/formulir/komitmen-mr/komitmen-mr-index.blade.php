@extends('layouts.layout_menu_all')

@section('content')
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

        .table-bordered {
            border: 1px solid #524f4f;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border: 1px solid #524f4f;
        }
    </style>
    <input type="hidden" name="mr_id" id="mr_id" value="">
    <input type="hidden" name="level" id="level"
        value="{{ isset($data->komitmen_mr->level) ? $data->komitmen_mr->level : $data->user->level }}">
    <input type="hidden" name="kdsatker" id="kdsatker" value="{{ $data->user->kode }}">
    <div class="row">
        <div class="col-md-12">
            <div class="box collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Dokumen</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width: 25%">Nomor Dokumen Risiko</td>
                                    <td>{{ isset($data->komitmen_mr) ? $data->komitmen_mr->mr_nomor : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tanggal Pembuatan</td>
                                    <td>{{ isset($data->komitmen_mr) ? $data->komitmen_mr->dibuat_pada : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Dibuat Oleh</td>
                                    <td>{{ isset($data->komitmen_mr) ? $data->komitmen_mr->creator->name : '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%">Tanggal Perubahan Terakhir</td>
                                    <td>{{ isset($data->komitmen_mr) ? $data->komitmen_mr->diubah_pada : '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Komitmen Manajemen Risiko</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Nama Pemilik Risiko</td>
                                    <td>{{ $data->user->pemilik_resiko }}</td>
                                </tr>
                                <tr>
                                    <td>NIP Pemilik Risiko</td>
                                    <td>{{ $data->user->pemilik_resiko_nip }}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan Pemilik Risiko</td>
                                    <td>{{ $data->user->pemilik_resiko_jabatan }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Pengelola Risiko {{ $data->user->level == 'UPR-T1' ? 1 : '' }}</td>
                                    <td>{{ $data->user->pengelola_resiko }}</td>
                                </tr>
                                <tr>
                                    <td>NIP Pengelola Risiko {{ $data->user->level == 'UPR-T1' ? 1 : '' }}</td>
                                    <td>{{ $data->user->pengelola_resiko_nip }}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan Pengelola Risiko {{ $data->user->level == 'UPR-T1' ? 1 : '' }}</td>
                                    <td>{{ $data->user->pengelola_resiko_jabatan }}</td>
                                </tr>
                                @if ($data->user->level == 'UPR-T1')
                                    <tr>
                                        <td>Nama Pengelola Risiko 2</td>
                                        <td>{{ $data->user->pengelola2_resiko }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIP Pengelola Risiko 2</td>
                                        <td>{{ $data->user->pengelola2_resiko_nip }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan Pengelola Risiko 2</td>
                                        <td>{{ $data->user->pengelola2_resiko_jabatan }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Periode Penerapan Manajemen Risiko</td>
                                    <td>{{ isset($data->komitmen_mr) ? $data->komitmen_mr->mr_periode : '-' }}</td>
                                </tr>
                                <tr>
                                    &nbsp;
                                </tr>
                                @if ($data->user->level == 'UPR-T3')

                                    <tr>
                                        <td>Pembantu Pengelola Risiko</td>
                                        @if (isset($data->ppk))
                                            <td>
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <tr>
                                                        <td><strong> PPK </strong></td>
                                                        <td><strong> Nama </strong></td>
                                                        <td><strong> NIP </strong></td>
                                                    </tr>
                                                    @foreach ($data->ppk as $ppk)
                                                        <tr>
                                                            <td>{{ $ppk->NAMA }} &emsp;</td>
                                                            <td>{{ $ppk->KETUA }} &emsp;</td>
                                                            <td>{{ $ppk->NIP }} &emsp;</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                            {{-- catatan: <td>
                                        @foreach ($data->ppk as $ppk)
                                        {{ $ppk->NAMA }}, {{ $ppk->KETUA }}, {{ $ppk->NIP }} <br>
                                        @endforeach
                                    </td> --}}
                                        @else
                                            <td></td>
                                        @endif
                                    </tr>
                                @endif
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
                    <li><a href="#tab_b" data-toggle="tab">Daftar Pemangku Kepentingan</a></li>
                    <li><a href="#tab_c" data-toggle="tab" style="display: none">Tujuan Pelaksanaan MR</a></li>
                    <li><a href="#tab_d" data-toggle="tab">Profil Risiko</a></li>
                    <li><a href="#tab_e" data-toggle="tab">Peta Risiko</a></li>
                    <li><a href="#tab_f" data-toggle="tab">Jadwal Pelaksanaan</a></li>
                    @if (!in_array($data->user->pengguna_kategori->pengguna_kategori_spesial, ['pengelola', 'operator']))
                        <li><a href="#tab_g" data-toggle="tab">Kirim Dokumen</a></li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_a">
                        @include('formulir.komitmen-mr.komitmen-mr-sasaran')
                    </div>
                    <div class="tab-pane" id="tab_b">
                        @include('formulir.komitmen-mr.komitmen-mr-kepentingan')
                    </div>
                    <div class="tab-pane" id="tab_c" style="display: none">
                        @include('formulir.komitmen-mr.komitmen-mr-tujuan')
                    </div>
                    <div class="tab-pane" id="tab_d">
                        @include('formulir.komitmen-mr.komitmen-mr-resiko')
                    </div>
                    <div class="tab-pane" id="tab_e">
                        <div id="load-peta">

                        </div>
                        {{-- catatan: @include('formulir.komitmen-mr.komitmen-mr-peta') --}}
                    </div>
                    <div class="tab-pane" id="tab_f">
                        <div id="load-jadwal">

                        </div>
                        {{-- catatan: @include('formulir.komitmen-mr.komitmen-mr-jadwal') --}}
                    </div>
                    @if ($data->user->pengguna_kategori->pengguna_kategori_spesial != 'pengelola')
                        <div class="tab-pane" id="tab_g">
                            @include('formulir.komitmen-mr.komitmen-mr-kirim')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-mr" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form class="form" id="form-mr">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-mr-title">Formulir Komitmen Manajemen Risiko </h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12 form-hide">
                                <label for="mr_nomor">Nomor</label>
                                <input type="text" name="mr_nomor" id="mr_nomor" class="form-control"
                                    value="{{ $data->mr_nomor }}" required>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="mr_periode">Periode Penerapan Manajemen Risiko</label>
                                <select name="mr_periode" id="mr_periode" class="form-control select2" required
                                    onChange="update()">
                                    <option value="">- Pilih Periode -</option>
                                    @for ($i = 2017; $i <= date('Y') + 2; $i++)
                                        <option value="{{ $i }}" {{ date('Y') == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <!-- <div class="form-group col-sm-12 form-hide">
                                                                                                                    <label for="mr_tanggal">Tanggal Dokumen</label>
                                                                                                                    <input type="date" name="mr_tanggal" id="mr_tanggal" class="form-control"
                                                                                                                        value="{{ date('Y-m-d') }}" required>
                                                                                                                </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('formulir.index') }}" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var urlInsert = '{{ route($data->page->class . '.store') }}';
        var urlUpdate = '{{ route($data->page->class . '.update') }}';
        var mr_id = '{{ app('request')->input('mr_id') }}';
        var urlData = '{{ route($data->page->class . '.get_data') }}';
        var level = '{{ isset($data->komitmen_mr->level) ? $data->komitmen_mr->level : $data->user->level }}';
        var unit = '{{ $data->user->unit }}';
        var satker = '{{ $data->user->satker ? $data->user->satker->NAMA : '' }}';
    </script>

    <script type="text/javascript">
        function update() {
            var select = document.getElementById('mr_periode');
            var option = select.options[select.selectedIndex];
            const d = new Date();
            let year = String(d.getFullYear());
            const mr_nomor = '{{ $data->mr_nomor }}';
            document.getElementById('mr_nomor').value = mr_nomor.replace(year, String(option.value));
        }

        update()
    </script>
@endsection
