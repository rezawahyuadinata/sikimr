@extends('layouts.layout_menu_all')

@section('content')
    <style>
        table,
        th,
        td {
            border: 1px solid grey;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px auto;
        }

        .bg-blue-green {
            background-color: #009999
        }

        .bg-blue-green-1 {
            background-color: #CCFFCC
        }

        .bg-blue {
            background-color: #000099
        }

        .bg-blue-1 {
            background-color: #CCCCFF
        }

        .bg-blue-3 {
            background-color: #89c1f8
        }

        .bg-blue-4 {
            background-color: #00d2f7
        }

        .bg-green {
            background-color: #00cc00
        }

        .bg-green-1 {
            background-color: #CCFFCC
        }

        .bg-purple {
            background-color: #b266ff
        }

        .bg-purple-1 {
            background-color: #E5CCFF
        }

        .bg-yellow {
            background-color: #FFFF00
        }

        .bg-yellow-1 {
            background-color: #FFFFCC
        }

        .bg-red {
            background-color: #FF3333
        }

        .bg-red-1 {
            background-color: #FFCCCC
        }

        .text-white {
            color: white;
        }

        .text-strong {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .text-justify {
            text-align: justify;
        }

        .border-status-blue {
            border-color: blue
        }

        .border-white {
            border-color: white;
            border-width: thick;
        }

        .bg-color-black {
            background-color: black;
        }
    </style>
    {{-- catatan: <div class="row">
        @foreach ($data->modul as $key => $value)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{ Route::has($value->route) ? route($value->route) : "#" }}" class="small-box-footer">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h1><i class="{{ $value->ikon ? $value->ikon : 'fa fa-list' }}"></i></h1>
                            <h4>{{ $value->nama }}</h4>
                        </div>
                        <div class="icon">
                            <i class="{{ $value->ikon ? $value->ikon : 'fa fa-list' }}"></i>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div> --}}
    <div class="row">
        @if (auth()->user()->level == 'UPR-T1')
            <!--Manajemen risiko(label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-primary">
                        <h3 class="box-title">MANAJEMEN RISIKO</h3>
                    </div>
                </div>
            </div>

            <!--Penyampaian Formulir Komitmen Manajemen Risiko-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-xs-10">
                                <h3 class="box-title">Penyampaian Formulir Komitmen Manajemen Risiko</h3>
                            </div>
                            <div class="col-xs-2 text-right">
                                {{-- catatan: <a href='#' class="btn btn-warning">Detail</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tahun</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-year-mr'>
                                            <input type='text' id="year-mr" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-mr">
                            <thead class="label-warning">
                                <tr>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">NO</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">TINGKAT</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">UNIT</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">JUMLAH</th>
                                    <th colspan="15" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">STATUS PENYAMPAIAN</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">KOMITMEN MR</th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR TRIWULAN
                                        I
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR TRIWULAN
                                        II
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR TRIWULAN
                                        III
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR TRIWULAN
                                        IV
                                    </th>
                                </tr>
                                <tr>
                                    {{-- catatan: <th class="text-center" style="vertical-align:middle; border:1px solid white;">JUMLAH</th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white;">SUDAH</th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white;">BELUM</th> --}}
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-mr-body">
                                @foreach ($data->tingkat_unit as $item)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $item['tingkat'] }}</td>
                                        <td>
                                            <a href="{{ route('detail', ['unit' => $item['param']]) }}">
                                                {{ $item['unit'] }}
                                            </a>
                                        </td>
                                        {{-- catatan: <td>0</td> --}}
                                        {{-- catatan: <td>0</td> --}}
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-mr-foot">
                                <tr>
                                    <td colspan="3">Total Jumlah</td>
                                    <td>0</td>
                                    {{-- catatan: <td>0</td> --}}
                                    {{-- catatan: <td>0</td> --}}
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        <p>Keterangan : </p>
                        <p>V : Terverifikasi</p>
                        <p>D : Draft, Dalam verifikasi UKI Uker/UPT, Dalam verifikasi UKI Unor</p>
                        <p>B : Belum membuat</p>

                        <hr>

                        <table class="table table-mr-terverifikasi" style="margin-bottom: 50px">
                            <tr class="label-primary">
                                <th class="text-center" colspan="5">TERVERIFIKASI</th>
                            </tr>
                            <tr class="label-primary">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-primary">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-terverifikasi-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-mr-draft">
                            <tr class="label-warning">
                                <th class="text-center" colspan="5">DRAFT</th>
                            </tr>
                            <tr class="label-warning">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-warning">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-draft-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-mr-belum">
                            <tr class="label-danger">
                                <th class="text-center" colspan="5">BELUM</th>
                            </tr>
                            <tr class="label-danger">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-danger">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-belum-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--pengadaan barang dan jasa (Label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-warning">
                        <h3 class="box-title">PENGADAAN BARANG DAN JASA</h3>
                    </div>
                </div>
            </div>

            <!--History pengadaan barang dan jasa-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">History Pengadaan Barang dan Jasa</h3>
                        <p>History Pengadaan Barang dan Jasa diambil berdasarkan data e-monitoring tanggal terakhir per
                            bulan
                            pukul 16.00 WIB</p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="status">Tahun Anggaran</label>
                                <div class='input-group date' id='datetimepicker-pengadaan'>
                                    <input type='text' id="pengadaan" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <canvas id="history-chart" style="max-height: 300px; width:100%"></canvas>
                            </div>
                            <div class="col-sm-12">
                                <table id="table-pengadaan">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kemajuan Pelaksanaan Lelang-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kemajuan Pelaksanaan Lelang</h3>
                        <p>History Kemajuan Pelaksanaan Lelang diambil berdasarkan data e-monitoring tanggal terakhir per
                            bulan
                            pukul 16.00 WIB</p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="status">Tahun Anggaran</label>
                                <div class='input-group date' id='datetimepicker-kemajuan'>
                                    <input type='text' id="kemajuan" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                {{-- catatan: <label for="status">Status sampai dengan</label>
                            <div class='input-group date' id='datetimepicker-kemajuan'>
                                <input type='text' id="kemajuan" class="form-control" value="{{now()->format("Y-m-d")}}"/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div> --}}
                                <canvas id="kemajuan-chart" style="max-height: 300px; width:100%"></canvas>
                            </div>
                            <div class="col-sm-12">
                                <table id="table-kemajuan">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kemajuan Proses Tender Mingguan-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kemajuan Proses Tender Mingguan</h3>
                    </div>
                    <div class="box-body">
                        <label>Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class='input-group date' id='datetimepicker-tahun-pengadaan-banding'>
                                    <input type='text' id="tahun-pengadaan-banding" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select name="tgl-pengadaan-banding1" id="tgl-pengadaan-banding1"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup as $tgl)
                                                <option value="{{ $tgl->tgl_backup }}">{{ $tgl->tgl_backup }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="tgl-pengadaan-banding2" id="tgl-pengadaan-banding2"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup as $tgl)
                                                <option value="{{ $tgl->tgl_backup }}">{{ $tgl->tgl_backup }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <table id="table-pengadaan-banding">
                                    <thead>
                                        <tr class="text-center text-bold">
                                            <th rowspan="2" class="text-center text-bold"
                                                style="background-color: #009999">Status</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #009999">Kontraktual</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #00FF00">Terkontrak</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #CC99FF">Persiapan Terkontrak</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #FFFF00">Proses Lelang</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #FF6666">Belum Lelang</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: grey">
                                                Gagal Lelang</th>
                                        </tr>
                                        <tr class="text-center text-bold">
                                            <th style="background-color: #009999">PKT</th>
                                            <th style="background-color: #009999">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #00FF00">PKT</th>
                                            <th style="background-color: #00FF00">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #CC99FF">PKT</th>
                                            <th style="background-color: #CC99FF">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #FFFF00">PKT</th>
                                            <th style="background-color: #FFFF00">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #FF6666">PKT</th>
                                            <th style="background-color: #FF6666">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: grey">PKT</th>
                                            <th style="background-color: grey">Pagu Dipa (Rp Ribu)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                        </tr>
                                        <tr class="text-center">
                                        </tr>
                                        <tr class="text-center">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Pemantauan Duras Terkontrak-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">PEMANTAUAN DURASI TERKONTRAK</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="terkontrak-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="tgl-terkontrak">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker-tahun-terkontrak'>
                                            <input type='text' id="tahun-terkontrak" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="tgl-terkontrak" id="tgl-terkontrak" class="form-control select2">
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%" class="text-center">
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Durasi</th>
                                                <th class="text-center text-white">Jumlah Paket</th>
                                                <th class="text-center text-white">Persentase</th>
                                            </tr>
                                            <tr style="background-color: rgba(224, 224, 224, 1)">
                                                <td>0-60 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah02"></td>
                                                <td class="text-right" id="terkontrak-persen02"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 255, 0, 1)">
                                                <td>61-90 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah23"></td>
                                                <td class="text-right" id="terkontrak-persen23"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 153, 51)">
                                                <td>91-120 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah34"></td>
                                                <td class="text-right" id="terkontrak-persen34"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 51, 51)">
                                                <td>>120 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah4"></td>
                                                <td class="text-right" id="terkontrak-persen4"></td>
                                            </tr>
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Jumlah</th>
                                                <th class="text-right text-white" id="terkontrak-total-paket-lelang">0
                                                </th>
                                                <th class="text-right text-white" id="terkontrak-persen-paket-persentase">
                                                    0%
                                                </th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Pemantauan Durasi Proses Lelang-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">PEMANTAUAN DURASI PROSES LELANG</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="proses-lelang-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="proses-lelang">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker-tahun-proses-lelang'>
                                            <input type='text' id="tahun-proses-lelang" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="proses-lelang" id="proses-lelang" class="form-control select2">
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%" class="text-center">
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Durasi</th>
                                                <th class="text-center text-white">Jumlah Paket</th>
                                                <th class="text-center text-white">Persentase</th>
                                            </tr>
                                            <tr style="background-color: rgba(224, 224, 224, 1)">
                                                <td>0-60 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah02"></td>
                                                <td class="text-right" id="proses-lelang-persen02"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 255, 0, 1)">
                                                <td>61-90 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah23"></td>
                                                <td class="text-right" id="proses-lelang-persen23"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 153, 51)">
                                                <td>91-120 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah34"></td>
                                                <td class="text-right" id="proses-lelang-persen34"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 51, 51)">
                                                <td>>120 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah4"></td>
                                                <td class="text-right" id="proses-lelang-persen4"></td>
                                            </tr>
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Jumlah</th>
                                                <th class="text-right text-white" id="proses-lelang-total-paket-lelang">0
                                                </th>
                                                <th class="text-right text-white"
                                                    id="proses-lelang-persen-paket-persentase">
                                                    0%</th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Status Paket yang Belum Lelang-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Paket yang belum lelang </h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <div class='input-group date' id='datetimepicker-tahun-status-paket-belum-lelang'>
                                    <input type='text' id="tahun-status-paket-belum-lelang" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="status-paket-belum-lelang-tgl">Tanggal Backup</label>
                                <select name="status-paket-belum-lelang-tgl" id="status-paket-belum-lelang-tgl"
                                    class="form-control select2">
                                    <option>-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <table style="width: 100%; font-size:40px; border-color:white; border-width:thick;"
                                    class="text-center text-bold table-status text-white">
                                    <tr>
                                        <td class="border-white" style="width: 33%"></td>
                                        <td class="border-white" style="width: 34%; background-color:blue">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-total-paket">40</div>
                                                <div class="col-sm-12" style="font-size: 23px">Paket</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="width: 33%"></td>
                                    </tr>
                                    <tr>
                                        <td class="border-white" style="background-color: #006666">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-total-myc">29</div>
                                                <div class="col-sm-12" style="font-size: 20px">MYC</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-myc-phln">18</div>
                                                <div class="col-sm-12" style="font-size: 20px">PHLN</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-myc-rmp">9</div>
                                                <div class="col-sm-12" style="font-size: 20px">RMP</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-white" style="background-color: #006666">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-total-syc">29</div>
                                                <div class="col-sm-12" style="font-size: 20px">SYC</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-syc-phln">18</div>
                                                <div class="col-sm-12" style="font-size: 20px">PHLN</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-syc-rmp">9</div>
                                                <div class="col-sm-12" style="font-size: 20px">RMP</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            {{-- catatan: <div class="col-sm-6">
                            <table style="width: 100%; font-size:40px; border-color:white; border-width:thick;" class="text-center text-bold table-status text-white">
                                <tr>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Irwa</div>
                                        </div>
                                    </td>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Bina OP</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Supan</div>
                                        </div>
                                    </td>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit SSPSDA</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Benda</div>
                                        </div>
                                    </td>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit ATAB</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div> --}}
                            <div class="col-sm-6 col-xs-12">
                                <table class="table table-hover table-stripped text-center table-spbl">
                                    <thead class="text-bold text-white">
                                        <tr style="background-color: #FF8000">
                                            <th rowspan="2">Kategori</th>
                                            <th rowspan="2">Jumlah Paket</th>
                                            <th rowspan="2">Pagu DIPA (Rp Ribu)</th>
                                            <th colspan="2">Lelang</th>
                                        </tr>
                                        <tr style="background-color: #FF8000">
                                            <th>SYC</th>
                                            <th>MYC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td text-left>Ini Deskripsi Kategori</td>
                                            <td>28</td>
                                            <td class="text-right">1.150.000</td>
                                            <td>0</td>
                                            <td>11</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="text-center text-bold text-white" style="background-color: #FF8000">
                                        <tr>
                                            <th>Jumlah</th>
                                            <th id="table-spbl-total-paket">41</th>
                                            <th class="text-right" id="table-spbl-total-pagu">298.312.111</th>
                                            <th id="table-spbl-total-syc">1</th>
                                            <th id="table-spbl-total-myc">13</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12" style="display: none">
                                <table class="table table-hover table-stripped text-center table-paket">
                                    <thead class="text-bold text-white">
                                        <tr style="background-color: #3492eb">
                                            <th>Nama Satker</th>
                                            <th>Nama Paket</th>
                                            <th>Kategori</th>
                                            <th>Jenis Kontrak</th>
                                            <th>Sumber Dana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Nilai Kontrak <80% HPS-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nilai Kontrak < 80% HPS</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="kontrak-hps-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-sm-5 col-xs-12">
                                        <div class='input-group date' id='datetimepicker-tahun-kontrak-hps'>
                                            <input type='text' id="tahun-kontrak-hps" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="tgl-kontrak-hps" id="tgl-kontrak-hps" class="form-control select2">
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%" class="text-center">
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Nilai Kontrak</th>
                                                {{-- catatan: <th class="text-center text-white">AU</th> --}}
                                                <th class="text-center text-white">Pengadaan Barang</th>
                                                <th class="text-center text-white">Pekerjaan Konstruksi</th>
                                                <th class="text-center text-white">Jasa Konsultansi (Badan Usaha)</th>
                                                <th class="text-center text-white">Jasa Konsultansi (Orang)</th>
                                                <th class="text-center text-white">Jasa Lainnya</th>
                                                {{-- catatan: <th class="text-center text-white">Cadangan</th> --}}
                                                <th class="text-center text-white">Jumlah Paket</th>
                                                <th class="text-center text-white">Persentase</th>
                                            </tr>
                                            <tr style="background-color: rgba(224, 224, 224, 1)">
                                                <td>
                                                    < 60% </td>
                                                        {{-- catatan: <td class="text-right" id="kontrak-hps-au60"></td> --}}
                                                <td class="text-right" id="kontrak-hps-pengadaan60"></td>
                                                <td class="text-right" id="kontrak-hps-konstruksi60"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-bu60"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-orang60"></td>
                                                <td class="text-right" id="kontrak-hps-lainnya60"></td>
                                                {{-- catatan: <td class="text-right" id="kontrak-hps-cadangan60"></td> --}}
                                                <td class="text-right" id="kontrak-hps-jumlah60"></td>
                                                <td class="text-right" id="kontrak-hps-persentase60"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 255, 0, 1)">
                                                <td>>= 60% dan < 70%</td>
                                                        {{-- catatan: <td class="text-right" id="kontrak-hps-au6070"></td> --}}
                                                <td class="text-right" id="kontrak-hps-pengadaan6070"></td>
                                                <td class="text-right" id="kontrak-hps-konstruksi6070"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-bu6070"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-orang6070"></td>
                                                <td class="text-right" id="kontrak-hps-lainnya6070"></td>
                                                {{-- catatan: <td class="text-right" id="kontrak-hps-cadangan6070"></td> --}}
                                                <td class="text-right" id="kontrak-hps-jumlah6070"></td>
                                                <td class="text-right" id="kontrak-hps-persentase6070"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 153, 51)">
                                                <td>>= 70% dan < 80%</td>
                                                        {{-- catatan: <td class="text-right" id="kontrak-hps-au7080"></td> --}}
                                                <td class="text-right" id="kontrak-hps-pengadaan7080"></td>
                                                <td class="text-right" id="kontrak-hps-konstruksi7080"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-bu7080"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-orang7080"></td>
                                                <td class="text-right" id="kontrak-hps-lainnya7080"></td>
                                                {{-- catatan: <td class="text-right" id="kontrak-hps-cadangan7080"></td> --}}
                                                <td class="text-right" id="kontrak-hps-jumlah7080"></td>
                                                <td class="text-right" id="kontrak-hps-persentase7080"></td>
                                            </tr>
                                            <tr class="text-bold text-white" style="background-color: black">
                                                <th class="text-center">Total</th>
                                                {{-- catatan: <th class="text-right" id="kontrak-hps-au-total"></th> --}}
                                                <th class="text-right" id="kontrak-hps-pengadaan-total"></th>
                                                <th class="text-right" id="kontrak-hps-konstruksi-total"></th>
                                                <th class="text-right" id="kontrak-hps-konsultansi-bu-total"></th>
                                                <th class="text-right" id="kontrak-hps-konsultansi-orang-total"></th>
                                                <th class="text-right" id="kontrak-hps-lainnya-total"></th>
                                                {{-- catatan: <th class="text-right" id="kontrak-hps-cadangan-total"></th> --}}
                                                <th class="text-right" id="kontrak-hps-jumlah-total"></th>
                                                <th class="text-right" id="kontrak-hps-persentase-total"></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kemajuan Fisik dan Keuangan (Label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-warning">
                        <h3 class="box-title">KEMAJUAN FISIK DAN KEUANGAN</h3>
                    </div>
                </div>
            </div>

            <!--Progres Keuangan-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Progres Keuangan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="progress-pekerjaan-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="status_progress_pekerjaan">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5">
                                        <div class='input-group date' id='datetimepicker-tahun-status_progress_pekerjaan'>
                                            <input type='text' id="tahun-status_progress_pekerjaan"
                                                class="form-control" value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="status_progress_pekerjaan" id="status_progress_pekerjaan"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup_profile as $tgl)
                                                <option value="{{ $tgl->tanggal_backup }}">{{ $tgl->tanggal_backup }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%">
                                            <tr class="text-bold">
                                                <td rowspan="2" class="text-center">Nilai Deviasi</td>
                                                <td colspan="2" class="text-center">Keuangan</td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td class="text-center">%</td>
                                                <td class="text-center">Jumlah Satuan Kerja</td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #00cc00">
                                                <td>Dev > 10%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #6666FF">
                                                <td>0% < Dev <=10%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #808080">
                                                <td>-10% < Dev <=0%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #cccc00">
                                                <td>-30% < Dev <=-10%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #ff6666">
                                                <td>Dev <= -30%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td>Total</td>
                                                <td class="text-center data-deviasi-persentase-total">%</td>
                                                <td class="text-center data-deviasi-satker-total"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Progress Fisik-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Progres Fisik</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="progress-fisik-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="status_progress_fisik">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5">
                                        <div class='input-group date' id='datetimepicker-tahun-status_progress_fisik'>
                                            <input type='text' id="tahun-status_progress_fisik" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="status_progress_fisik" id="status_progress_fisik"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup_profile as $tgl)
                                                <option value="{{ $tgl->tanggal_backup }}">{{ $tgl->tanggal_backup }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%">
                                            <tr class="text-bold">
                                                <td rowspan="2" class="text-center">Nilai Deviasi</td>
                                                <td colspan="2" class="text-center">Keuangan</td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td class="text-center">%</td>
                                                <td class="text-center">Jumlah Satuan Kerja</td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #00cc00">
                                                <td>Dev > 10%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #6666FF">
                                                <td>0% < Dev <=10%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #808080">
                                                <td>-10% < Dev <=0%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #cccc00">
                                                <td>-30% < Dev <=-10%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #ff6666">
                                                <td>Dev <= -30%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td>Total</td>
                                                <td class="text-center data-deviasi-fisik-persentase-total">%</td>
                                                <td class="text-center data-deviasi-fisik-satker-total"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kelengkapan Dokumen Per Paket-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kelengkapan Dokumen per Paket</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tahun</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class='input-group date' id='datetimepicker-year-keldok'>
                                            <input type='text' id="year-keldok" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box-body">
                                    <canvas id="kelengkapan-dokumen" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Perizinan SDA-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-success">
                        <h3 class="box-title">PERIZINAN SDA</h3>
                    </div>
                </div>
            </div>

            <!--Jumlah Perizinan-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Jumlah Perizinan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-start'>
                                            <input type='text' id="perijinan-start" class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-end'>
                                            <input type='text' id="perijinan-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                            </div>
                            <div class="col-sm-6">
                                <label for="perijinan-upt">UPT</label>
                                <select name="perijinan-upt" id="perijinan-upt" class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->upt_perizinan as $upt)
                                        <option>{{ $upt->nama_balai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="perijinan-chart" style="max-height: 300px; width:100%"anvas>
                    </div>
                </div>
            </div>

            <!--Progres Perizinan-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Progres Perizinan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-table-start'>
                                            <input type='text' id="perijinan-table-start" class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-table-end'>
                                            <input type='text' id="perijinan-table-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="perijinan-table-upt">UPT</label>
                                <select name="perijinan-table-upt" id="perijinan-table-upt" class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->upt_permohonan_izin as $upt)
                                        <option>{{ $upt->nama_balai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table id="table-perijinan" class="display table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th data-orderable="false">#</th>
                                    <th data-orderable="true">Nomor Registrasi Permohonan Izin</th>
                                    <th data-orderable="true">Tanggal Pengajuan Permohonan Izin</th>
                                    <th data-orderable="true">Nama Perusahaan</th>
                                    <th data-orderable="true">UPT</th>
                                    <th data-orderable="true">Sumber Air</th>
                                    <!--<th data-orderable="true">Jenis Permohonan</th>-->
                                    <!--<th data-orderable="true">Tujuan Penggunaan Air Daya Air</th>-->
                                    <!--<th data-orderable="true">Tujuan Penggunaan Sumber Air</th>-->
                                    {{-- catatan: <th data-orderable="false">Verifikasi</th> --}}
                                    <th data-orderable="false">Batas Waktu Penerbitan Izin *)</th>
                                </tr>
                            </thead>
                        </table>
                        <p>*) apabila tidak sesuai, harap update pada menu <a
                                href="{{ url('ki/permohonan-izin') }}">permohonan perizinan</a></p>
                    </div>
                </div>
            </div>

            <!--Status Pemberian Izin-->
            <div class="col-sm-6 col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Status Pemberian Izin</h3>
                            </div>
                            <div class="box-body">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-batas-waktu-start'>
                                            <input type='text' id="perijinan-batas-waktu-start" class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-batas-waktu-end'>
                                            <input type='text' id="perijinan-batas-waktu-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="perijinan-batas-waktu-upt">UPT</label>
                                        <select name="perijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt"
                                            class="form-control select2">
                                            <option value="">ALL</option>
                                            @foreach ($data->upt_permohonan_izin as $upt)
                                                <option>{{ $upt->nama_balai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                                <canvas id="perijinan-batas-waktu-chart"style="max-height: 300px; width:100%"></canvas>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-xs-12">-->
                    <!--    <div class="box">-->
                    <!--        <div class="box-header with-border">-->
                    <!--            <h3 class="box-title">Balai Terlambat Terbanyak</h3>-->
                    <!--        </div>-->
                    <!--        <div class="box-body">-->
                    <!--            <label for="status">Tanggal</label>-->
                    <!--            <div class="row">-->
                    <!--                <div class="col-sm-6">-->
                    <!--                    <div class='input-group date' id='datetimepicker-perizinan-terlambat-start'>-->
                    <!--                        <input type='text' id="perizinan-terlambat-start" class="form-control" value="{{ now()->firstOfMonth()->format('Y-m-d') }}"/>-->
                    <!--                        <span class="input-group-addon">-->
                    <!--                        <span class="glyphicon glyphicon-calendar"></span>-->
                    <!--                        </span>-->
                    <!--                     </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-sm-6">-->
                    <!--                    <div class='input-group date' id='datetimepicker-perizinan-terlambat-end'>-->
                    <!--                        <input type='text' id="perizinan-terlambat-end" class="form-control" value="{{ now()->format('Y-m-d') }}"/>-->
                    <!--                        <span class="input-group-addon">-->
                    <!--                        <span class="glyphicon glyphicon-calendar"></span>-->
                    <!--                        </span>-->
                    <!--                     </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <canvas id="perizinan-terlambat-chart"style="max-height: 500px; width:100%"></canvas>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pemberian Izin Terlambat Per Balai</h3>
                            </div>
                            <div class="box-body">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perizinan-terlambat-full-start'>
                                            <input type='text' id="perizinan-terlambat-full-start"
                                                class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perizinan-terlambat-full-end'>
                                            <input type='text' id="perizinan-terlambat-full-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <canvas id="perizinan-terlambat-full-chart"style="max-height: 500px; width:100%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Status Monitoring dan Evaluasi Perizinan-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Monitoring dan Evaluasi Perizinan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perizinan-monev-start'>
                                            <input type='text' id="perizinan-monev-start" class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perizinan-monev-end'>
                                            <input type='text' id="perizinan-monev-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="perizinan-monev-upt">UPT</label>
                                        <select name="perizinan-monev-upt" id="perizinan-monev-upt"
                                            class="form-control select2">
                                            <option value="">ALL</option>
                                            @foreach ($data->upt_perizinan as $upt)
                                                <option>{{ $upt->nama_balai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="perizinan-monev-chart" style="max-height: 300px; width:100%"anvas>
                    </div>
                </div>
            </div>

            <!--Pengaduan Masyarakat (label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-danger">
                        <h3 class="box-title">PENGADUAN MASYARAKAT</h3>
                    </div>
                </div>
            </div>

            <!--Pengaduan Masyarakat-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pengaduan Masyarakat</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <h3 class="box-title">Presentasi Jumlah Pengaduan Berdasarkan Unit Kerja dan UPT</h3>
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="box-body">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Rekap Pengaduan balai</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="status">Tahun</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class='input-group date' id='datetimepicker-rekap-table-start'>
                                                        <input type='text' id="rekap-table-start" class="form-control"
                                                            value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class='input-group date' id='datetimepicker-rekap-table-end'>
                                                        <input type='text' id="rekap-table-end" class="form-control"
                                                            value="{{ now()->format('Y-m-d') }}" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="rekap-table-upt">BALAI</label>
                                            <select name="rekap-table-upt" id="rekap-table-upt"
                                                class="form-control select2">
                                                <option value="">ALL</option>

                                                @foreach ($data->satker_pengaduan as $satker)
                                                    <option>{{ $satker->pemilik_resiko_satker }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <table id="table-rekap" class="display table table-bordered table-hover"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th data-orderable="false">#</th>
                                                <th data-orderable="true">Pengadu</th>
                                                <th data-orderable="true">Perihal Laporan</th>
                                                <th data-orderable="true">Kategori Pengaduan</th>
                                                <th data-orderable="true">Poin Pengaduan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- <div class="box-header">
                                                                                                                                                                                                        <h3 class="box-title">Pengaduan UPT</h3>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="box">
                                                                                                                                                                                                        <label for="status">Tahun Anggaran</label>
                                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                                            <div class="col-sm-6">
                                                                                                                                                                                                                <div class='input-group date' id='datetimepicker-pengaduan-upt-start'>
                                                                                                                                                                                                                    <input type='text' id="pengaduan-upt-start" class="form-control" value="{{ now()->firstOfMonth()->format('Y-m-d') }}"/>
                                                                                                                                                                                                                    <span class="input-group-addon">
                                                                                                                                                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                 </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div class="col-sm-6">
                                                                                                                                                                                                                <div class='input-group date' id='datetimepicker-pengaduan-upt-end'>
                                                                                                                                                                                                                    <input type='text' id="pengaduan-upt-end" class="form-control" value="{{ now()->format('Y-m-d') }}"/>
                                                                                                                                                                                                                    <span class="input-group-addon">
                                                                                                                                                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                 </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            {{-- catatan: <div class="col-sm-6">
                            <label for="perijinan-batas-waktu-upt">UPT</label>
                            <select name="perijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt" class="form-control select2">
                                <option value="">ALL</option>
                                @foreach ($data->upt_permohonan_izin as $upt)
                                <option>{{ $upt->nama_balai }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                                                                                                                                                                                                        <canvas id="pengaduan-upt-chart"style="max-height: 300px; width:100%"></canvas>
                                                                                                                                                                                                    </div> -->
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="box-header">
                                    <h3 class="box-title">Status Penanganan</h3>
                                </div>
                                <div class="col-sm-12">
                                    <label for="status">Tahun</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class='input-group date' id='datetimepicker-status-penanganan-start'>
                                                <input type='text' id="status-status-penanganan-start"
                                                    class="form-control"
                                                    value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class='input-group date' id='datetimepicker-status-penanganan-end'>
                                                <input type='text' id="status-status-penanganan-end"
                                                    class="form-control" value="{{ now()->format('Y-m-d') }}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <canvas id="status-chart" style="max-height: 300px; width:100%"anvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Balai dengan Jumlah Pengaduan Terbanyak-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Balai dengan Jumlah Pengaduan Terbanyak</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-balai-pengaduan-terbanyak-start'>
                                    <input type='text' id="balai-pengaduan-terbanyak-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-balai-pengaduan-terbanyak-end'>
                                    <input type='text' id="balai-pengaduan-terbanyak-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            {{-- catatan: <div class="col-sm-6">
                            <label for="perijinan-batas-waktu-upt">UPT</label>
                            <select name="perijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt" class="form-control select2">
                                <option value="">ALL</option>
                                @foreach ($data->upt_permohonan_izin as $upt)
                                <option>{{ $upt->nama_balai }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="balai-pengaduan-terbanyak-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Grafik Bidang Pengaduan-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Bidang Pengaduan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-spengaduan-start'>
                                    <input type='text' id="spengaduan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-spengaduan-end'>
                                    <input type='text' id="spengaduan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            {{-- catatan: <div class="col-sm-6">
                            <label for="sperijinan-batas-waktu-upt">UPT</label>
                            <select name="sperijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt" class="form-control select2">
                                <option value="">ALL</option>
                                @foreach ($data->upt_permohonan_izin as $upt)
                                <option>{{ $upt->nama_balai }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="spengaduan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Integritas-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Integritas</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-integritas-start'>
                                    <input type='text' id="integritas-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-integritas-end'>
                                    <input type='text' id="integritas-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="integritas-batas-waktu-upt">UPT</label>
                                <select name="integritas-batas-waktu-upt" id="integritas-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="integritas-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Perencanaan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Perencanaan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-perencanaan-start'>
                                    <input type='text' id="perencanaan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-perencanaan-end'>
                                    <input type='text' id="perencanaan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="perencanaan-batas-waktu-upt">UPT</label>
                                <select name="perencanaan-batas-waktu-upt" id="perencanaan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="perencanaan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Pembebasan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pembebasan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pembebasan-start'>
                                    <input type='text' id="pembebasan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pembebasan-end'>
                                    <input type='text' id="pembebasan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="pembebasan-batas-waktu-upt">UPT</label>
                                <select name="pembebasan-batas-waktu-upt" id="pembebasan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="pembebasan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Tender-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tender</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-tender-start'>
                                    <input type='text' id="tender-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-tender-end'>
                                    <input type='text' id="tender-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="tender-batas-waktu-upt">UPT</label>
                                <select name="tender-batas-waktu-upt" id="tender-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="tender-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Pelaksanaan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pelaksanaan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pelaksanaan-start'>
                                    <input type='text' id="pelaksanaan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pelaksanaan-end'>
                                    <input type='text' id="pelaksanaan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="pelaksanaan-batas-waktu-upt">UPT</label>
                                <select name="pelaksanaan-batas-waktu-upt" id="pelaksanaan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="pelaksanaan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Pemanfaatan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pemanfaatan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pemanfaatan-start'>
                                    <input type='text' id="pemanfaatan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pemanfaatan-end'>
                                    <input type='text' id="pemanfaatan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="pemanfaatan-batas-waktu-upt">UPT</label>
                                <select name="pemanfaatan-batas-waktu-upt" id="pemanfaatan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="pemanfaatan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Tindak Lanjut Temuan BPK (Label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-danger">
                        <h3 class="box-title">TINDAK LANJUT TEMUAN BPK</h3>
                    </div>
                </div>
            </div>

            <!--Grafik Status SIPTL-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Status SIPTL</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-siptl-start'>
                                    <input type='text' id="status-siptl-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-siptl-end'>
                                    <input type='text' id="status-siptl-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <canvas id="status-siptl-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Status Verifikasi ITJEN-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Verifikasi ITJEN</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-verifikasi-start'>
                                    <input type='text' id="status-verifikasi-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-verifikasi-end'>
                                    <input type='text' id="status-verifikasi-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="status-verifikasi-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Persentase Verifikasi ITJEN-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Persentase Verifikasi ITJEN</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-persentase-itjen-start'>
                                    <input type='text' id="persentase-itjen-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-persentase-itjen-end'>
                                    <input type='text' id="persentase-itjen-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="persentase-itjen-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>
        @elseif (auth()->user()->name == 'Developer')
            <!--Manajemen risiko(label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-primary">
                        <h3 class="box-title">MANAJEMEN RISIKO</h3>
                    </div>
                </div>
            </div>

            <!--Penyampaian Formulir Komitmen Manajemen Risiko-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-xs-10">
                                <h3 class="box-title">Penyampaian Formulir Komitmen Manajemen Risiko</h3>
                            </div>
                            <div class="col-xs-2 text-right">
                                {{-- catatan: <a href='#' class="btn btn-warning">Detail</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tahun</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-year-mr'>
                                            <input type='text' id="year-mr" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-mr">
                            <thead class="label-warning">
                                <tr>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">NO</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">TINGKAT</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">UNIT</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">JUMLAH</th>
                                    <th colspan="15" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">STATUS PENYAMPAIAN</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">KOMITMEN MR</th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        I
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        II
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        III
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        IV
                                    </th>
                                </tr>
                                <tr>
                                    {{-- catatan: <th class="text-center" style="vertical-align:middle; border:1px solid white;">JUMLAH</th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white;">SUDAH</th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white;">BELUM</th> --}}
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-mr-body">
                                @foreach ($data->tingkat_unit as $item)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $item['tingkat'] }}</td>
                                        <td>
                                            <a href="{{ route('detail', ['unit' => $item['param']]) }}">
                                                {{ $item['unit'] }}
                                            </a>
                                        </td>
                                        {{-- catatan: <td>0</td> --}}
                                        {{-- catatan: <td>0</td> --}}
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-mr-foot">
                                <tr>
                                    <td colspan="3">Total Jumlah</td>
                                    <td>0</td>
                                    {{-- catatan: <td>0</td> --}}
                                    {{-- catatan: <td>0</td> --}}
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        <p>Keterangan : </p>
                        <p>V : Terverifikasi</p>
                        <p>D : Draft, Dalam verifikasi UKI Uker/UPT, Dalam verifikasi UKI Unor</p>
                        <p>B : Belum membuat</p>

                        <hr>

                        <table class="table table-mr-terverifikasi" style="margin-bottom: 50px">
                            <tr class="label-primary">
                                <th class="text-center" colspan="5">TERVERIFIKASI</th>
                            </tr>
                            <tr class="label-primary">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-primary">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-terverifikasi-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-mr-draft">
                            <tr class="label-warning">
                                <th class="text-center" colspan="5">DRAFT</th>
                            </tr>
                            <tr class="label-warning">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-warning">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-draft-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-mr-belum">
                            <tr class="label-danger">
                                <th class="text-center" colspan="5">BELUM</th>
                            </tr>
                            <tr class="label-danger">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-danger">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-belum-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--pengadaan barang dan jasa (Label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-warning">
                        <h3 class="box-title">PENGADAAN BARANG DAN JASA</h3>
                    </div>
                </div>
            </div>

            <!--History pengadaan barang dan jasa-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">History Pengadaan Barang dan Jasa</h3>
                        <p>History Pengadaan Barang dan Jasa diambil berdasarkan data e-monitoring tanggal terakhir per
                            bulan
                            pukul 16.00 WIB</p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="status">Tahun Anggaran</label>
                                <div class='input-group date' id='datetimepicker-pengadaan'>
                                    <input type='text' id="pengadaan" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <canvas id="history-chart" style="max-height: 300px; width:100%"></canvas>
                            </div>
                            <div class="col-sm-12">
                                <table id="table-pengadaan">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kemajuan Pelaksanaan Lelang-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kemajuan Pelaksanaan Lelang</h3>
                        <p>History Kemajuan Pelaksanaan Lelang diambil berdasarkan data e-monitoring tanggal terakhir per
                            bulan
                            pukul 16.00 WIB</p>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="status">Tahun Anggaran</label>
                                <div class='input-group date' id='datetimepicker-kemajuan'>
                                    <input type='text' id="kemajuan" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                {{-- catatan: <label for="status">Status sampai dengan</label>
                            <div class='input-group date' id='datetimepicker-kemajuan'>
                                <input type='text' id="kemajuan" class="form-control" value="{{now()->format("Y-m-d")}}"/>
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div> --}}
                                <canvas id="kemajuan-chart" style="max-height: 300px; width:100%"></canvas>
                            </div>
                            <div class="col-sm-12">
                                <table id="table-kemajuan">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kemajuan Proses Tender Mingguan-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kemajuan Proses Tender Mingguan</h3>
                    </div>
                    <div class="box-body">
                        <label>Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class='input-group date' id='datetimepicker-tahun-pengadaan-banding'>
                                    <input type='text' id="tahun-pengadaan-banding" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <select name="tgl-pengadaan-banding1" id="tgl-pengadaan-banding1"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup as $tgl)
                                                <option value="{{ $tgl->tgl_backup }}">{{ $tgl->tgl_backup }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="tgl-pengadaan-banding2" id="tgl-pengadaan-banding2"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup as $tgl)
                                                <option value="{{ $tgl->tgl_backup }}">{{ $tgl->tgl_backup }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <table id="table-pengadaan-banding">
                                    <thead>
                                        <tr class="text-center text-bold">
                                            <th rowspan="2" class="text-center text-bold"
                                                style="background-color: #009999">Status</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #009999">Kontraktual</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #00FF00">Terkontrak</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #CC99FF">Persiapan Terkontrak</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #FFFF00">Proses Lelang</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: #FF6666">Belum Lelang</th>
                                            <th colspan="2" class="text-center text-bold"
                                                style="background-color: grey">
                                                Gagal Lelang</th>
                                        </tr>
                                        <tr class="text-center text-bold">
                                            <th style="background-color: #009999">PKT</th>
                                            <th style="background-color: #009999">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #00FF00">PKT</th>
                                            <th style="background-color: #00FF00">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #CC99FF">PKT</th>
                                            <th style="background-color: #CC99FF">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #FFFF00">PKT</th>
                                            <th style="background-color: #FFFF00">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: #FF6666">PKT</th>
                                            <th style="background-color: #FF6666">Pagu Dipa (Rp Ribu)</th>
                                            <th style="background-color: grey">PKT</th>
                                            <th style="background-color: grey">Pagu Dipa (Rp Ribu)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                        </tr>
                                        <tr class="text-center">
                                        </tr>
                                        <tr class="text-center">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Pemantauan Duras Terkontrak-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">PEMANTAUAN DURASI TERKONTRAK</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="terkontrak-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="tgl-terkontrak">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker-tahun-terkontrak'>
                                            <input type='text' id="tahun-terkontrak" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="tgl-terkontrak" id="tgl-terkontrak"
                                            class="form-control select2">
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%" class="text-center">
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Durasi</th>
                                                <th class="text-center text-white">Jumlah Paket</th>
                                                <th class="text-center text-white">Persentase</th>
                                            </tr>
                                            <tr style="background-color: rgba(224, 224, 224, 1)">
                                                <td>0-60 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah02"></td>
                                                <td class="text-right" id="terkontrak-persen02"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 255, 0, 1)">
                                                <td>61-90 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah23"></td>
                                                <td class="text-right" id="terkontrak-persen23"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 153, 51)">
                                                <td>91-120 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah34"></td>
                                                <td class="text-right" id="terkontrak-persen34"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 51, 51)">
                                                <td>>120 Hari</td>
                                                <td class="text-right" id="terkontrak-jumlah4"></td>
                                                <td class="text-right" id="terkontrak-persen4"></td>
                                            </tr>
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Jumlah</th>
                                                <th class="text-right text-white" id="terkontrak-total-paket-lelang">0
                                                </th>
                                                <th class="text-right text-white"
                                                    id="terkontrak-persen-paket-persentase">
                                                    0%
                                                </th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Pemantauan Durasi Proses Lelang-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">PEMANTAUAN DURASI PROSES LELANG</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="proses-lelang-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="proses-lelang">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker-tahun-proses-lelang'>
                                            <input type='text' id="tahun-proses-lelang" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="proses-lelang" id="proses-lelang" class="form-control select2">
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%" class="text-center">
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Durasi</th>
                                                <th class="text-center text-white">Jumlah Paket</th>
                                                <th class="text-center text-white">Persentase</th>
                                            </tr>
                                            <tr style="background-color: rgba(224, 224, 224, 1)">
                                                <td>0-60 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah02"></td>
                                                <td class="text-right" id="proses-lelang-persen02"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 255, 0, 1)">
                                                <td>61-90 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah23"></td>
                                                <td class="text-right" id="proses-lelang-persen23"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 153, 51)">
                                                <td>91-120 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah34"></td>
                                                <td class="text-right" id="proses-lelang-persen34"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 51, 51)">
                                                <td>>120 Hari</td>
                                                <td class="text-right" id="proses-lelang-jumlah4"></td>
                                                <td class="text-right" id="proses-lelang-persen4"></td>
                                            </tr>
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Jumlah</th>
                                                <th class="text-right text-white" id="proses-lelang-total-paket-lelang">
                                                    0
                                                </th>
                                                <th class="text-right text-white"
                                                    id="proses-lelang-persen-paket-persentase">
                                                    0%</th>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Status Paket yang Belum Lelang-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Paket yang belum lelang </h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <div class='input-group date' id='datetimepicker-tahun-status-paket-belum-lelang'>
                                    <input type='text' id="tahun-status-paket-belum-lelang" class="form-control"
                                        value="{{ now()->format('Y') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="status-paket-belum-lelang-tgl">Tanggal Backup</label>
                                <select name="status-paket-belum-lelang-tgl" id="status-paket-belum-lelang-tgl"
                                    class="form-control select2">
                                    <option>-</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <table style="width: 100%; font-size:40px; border-color:white; border-width:thick;"
                                    class="text-center text-bold table-status text-white">
                                    <tr>
                                        <td class="border-white" style="width: 33%"></td>
                                        <td class="border-white" style="width: 34%; background-color:blue">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-total-paket">40</div>
                                                <div class="col-sm-12" style="font-size: 23px">Paket</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="width: 33%"></td>
                                    </tr>
                                    <tr>
                                        <td class="border-white" style="background-color: #006666">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-total-myc">29</div>
                                                <div class="col-sm-12" style="font-size: 20px">MYC</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-myc-phln">18</div>
                                                <div class="col-sm-12" style="font-size: 20px">PHLN</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-myc-rmp">9</div>
                                                <div class="col-sm-12" style="font-size: 20px">RMP</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-white" style="background-color: #006666">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-total-syc">29</div>
                                                <div class="col-sm-12" style="font-size: 20px">SYC</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-syc-phln">18</div>
                                                <div class="col-sm-12" style="font-size: 20px">PHLN</div>
                                            </div>
                                        </td>
                                        <td class="border-white" style="background-color: #0066CC">
                                            <div class="row">
                                                <div class="col-sm-12" id="spbl-syc-rmp">9</div>
                                                <div class="col-sm-12" style="font-size: 20px">RMP</div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            {{-- catatan: <div class="col-sm-6">
                            <table style="width: 100%; font-size:40px; border-color:white; border-width:thick;" class="text-center text-bold table-status text-white">
                                <tr>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Irwa</div>
                                        </div>
                                    </td>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Bina OP</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Supan</div>
                                        </div>
                                    </td>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit SSPSDA</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit Benda</div>
                                        </div>
                                    </td>
                                    <td class="border-white bg-color-black">
                                        <div class="row">
                                            <div class="col-sm-12">0</div>
                                            <div class="col-sm-12" style="font-size: 20px">Dit ATAB</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div> --}}
                            <div class="col-sm-6 col-xs-12">
                                <table class="table table-hover table-stripped text-center table-spbl">
                                    <thead class="text-bold text-white">
                                        <tr style="background-color: #FF8000">
                                            <th rowspan="2">Kategori</th>
                                            <th rowspan="2">Jumlah Paket</th>
                                            <th rowspan="2">Pagu DIPA (Rp Ribu)</th>
                                            <th colspan="2">Lelang</th>
                                        </tr>
                                        <tr style="background-color: #FF8000">
                                            <th>SYC</th>
                                            <th>MYC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td text-left>Ini Deskripsi Kategori</td>
                                            <td>28</td>
                                            <td class="text-right">1.150.000</td>
                                            <td>0</td>
                                            <td>11</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="text-center text-bold text-white" style="background-color: #FF8000">
                                        <tr>
                                            <th>Jumlah</th>
                                            <th id="table-spbl-total-paket">41</th>
                                            <th class="text-right" id="table-spbl-total-pagu">298.312.111</th>
                                            <th id="table-spbl-total-syc">1</th>
                                            <th id="table-spbl-total-myc">13</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-sm-6 col-xs-12" style="display: none">
                                <table class="table table-hover table-stripped text-center table-paket">
                                    <thead class="text-bold text-white">
                                        <tr style="background-color: #3492eb">
                                            <th>Nama Satker</th>
                                            <th>Nama Paket</th>
                                            <th>Kategori</th>
                                            <th>Jenis Kontrak</th>
                                            <th>Sumber Dana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Nilai Kontrak <80% HPS-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nilai Kontrak < 80% HPS</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="kontrak-hps-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-sm-5 col-xs-12">
                                        <div class='input-group date' id='datetimepicker-tahun-kontrak-hps'>
                                            <input type='text' id="tahun-kontrak-hps" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="tgl-kontrak-hps" id="tgl-kontrak-hps"
                                            class="form-control select2">
                                            <option>-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%" class="text-center">
                                            <tr class="text-bold" style="background-color: black">
                                                <th class="text-center text-white">Nilai Kontrak</th>
                                                {{-- catatan: <th class="text-center text-white">AU</th> --}}
                                                <th class="text-center text-white">Pengadaan Barang</th>
                                                <th class="text-center text-white">Pekerjaan Konstruksi</th>
                                                <th class="text-center text-white">Jasa Konsultansi (Badan Usaha)</th>
                                                <th class="text-center text-white">Jasa Konsultansi (Orang)</th>
                                                <th class="text-center text-white">Jasa Lainnya</th>
                                                {{-- catatan: <th class="text-center text-white">Cadangan</th> --}}
                                                <th class="text-center text-white">Jumlah Paket</th>
                                                <th class="text-center text-white">Persentase</th>
                                            </tr>
                                            <tr style="background-color: rgba(224, 224, 224, 1)">
                                                <td>
                                                    < 60% </td>
                                                        {{-- catatan: <td class="text-right" id="kontrak-hps-au60"></td> --}}
                                                <td class="text-right" id="kontrak-hps-pengadaan60"></td>
                                                <td class="text-right" id="kontrak-hps-konstruksi60"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-bu60"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-orang60"></td>
                                                <td class="text-right" id="kontrak-hps-lainnya60"></td>
                                                {{-- catatan: <td class="text-right" id="kontrak-hps-cadangan60"></td> --}}
                                                <td class="text-right" id="kontrak-hps-jumlah60"></td>
                                                <td class="text-right" id="kontrak-hps-persentase60"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 255, 0, 1)">
                                                <td>>= 60% dan < 70%</td>
                                                        {{-- catatan: <td class="text-right" id="kontrak-hps-au6070"></td> --}}
                                                <td class="text-right" id="kontrak-hps-pengadaan6070"></td>
                                                <td class="text-right" id="kontrak-hps-konstruksi6070"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-bu6070"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-orang6070"></td>
                                                <td class="text-right" id="kontrak-hps-lainnya6070"></td>
                                                {{-- catatan: <td class="text-right" id="kontrak-hps-cadangan6070"></td> --}}
                                                <td class="text-right" id="kontrak-hps-jumlah6070"></td>
                                                <td class="text-right" id="kontrak-hps-persentase6070"></td>
                                            </tr>
                                            <tr style="background-color: rgba(255, 153, 51)">
                                                <td>>= 70% dan < 80%</td>
                                                        {{-- catatan: <td class="text-right" id="kontrak-hps-au7080"></td> --}}
                                                <td class="text-right" id="kontrak-hps-pengadaan7080"></td>
                                                <td class="text-right" id="kontrak-hps-konstruksi7080"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-bu7080"></td>
                                                <td class="text-right" id="kontrak-hps-konsultansi-orang7080"></td>
                                                <td class="text-right" id="kontrak-hps-lainnya7080"></td>
                                                {{-- catatan: <td class="text-right" id="kontrak-hps-cadangan7080"></td> --}}
                                                <td class="text-right" id="kontrak-hps-jumlah7080"></td>
                                                <td class="text-right" id="kontrak-hps-persentase7080"></td>
                                            </tr>
                                            <tr class="text-bold text-white" style="background-color: black">
                                                <th class="text-center">Total</th>
                                                {{-- catatan: <th class="text-right" id="kontrak-hps-au-total"></th> --}}
                                                <th class="text-right" id="kontrak-hps-pengadaan-total"></th>
                                                <th class="text-right" id="kontrak-hps-konstruksi-total"></th>
                                                <th class="text-right" id="kontrak-hps-konsultansi-bu-total"></th>
                                                <th class="text-right" id="kontrak-hps-konsultansi-orang-total"></th>
                                                <th class="text-right" id="kontrak-hps-lainnya-total"></th>
                                                {{-- catatan: <th class="text-right" id="kontrak-hps-cadangan-total"></th> --}}
                                                <th class="text-right" id="kontrak-hps-jumlah-total"></th>
                                                <th class="text-right" id="kontrak-hps-persentase-total"></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kemajuan Fisik dan Keuangan (Label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-warning">
                        <h3 class="box-title">KEMAJUAN FISIK DAN KEUANGAN</h3>
                    </div>
                </div>
            </div>

            <!--Progres Keuangan-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Progres Keuangan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="progress-pekerjaan-chart"
                                        style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="status_progress_pekerjaan">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5">
                                        <div class='input-group date'
                                            id='datetimepicker-tahun-status_progress_pekerjaan'>
                                            <input type='text' id="tahun-status_progress_pekerjaan"
                                                class="form-control" value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="status_progress_pekerjaan" id="status_progress_pekerjaan"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup_profile as $tgl)
                                                <option value="{{ $tgl->tanggal_backup }}">
                                                    {{ $tgl->tanggal_backup }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%">
                                            <tr class="text-bold">
                                                <td rowspan="2" class="text-center">Nilai Deviasi</td>
                                                <td colspan="2" class="text-center">Keuangan</td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td class="text-center">%</td>
                                                <td class="text-center">Jumlah Satuan Kerja</td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #00cc00">
                                                <td>Dev > 10%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #6666FF">
                                                <td>0% < Dev <=10%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #808080">
                                                <td>-10% < Dev <=0%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #cccc00">
                                                <td>-30% < Dev <=-10%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #ff6666">
                                                <td>Dev <= -30%</td>
                                                <td class="text-center data-deviasi-persentase">%</td>
                                                <td class="text-center data-deviasi-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td>Total</td>
                                                <td class="text-center data-deviasi-persentase-total">%</td>
                                                <td class="text-center data-deviasi-satker-total"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Progress Fisik-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Progres Fisik</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="box-body">
                                    <canvas id="progress-fisik-chart" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="status_progress_fisik">Tahun Anggaran</label>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5">
                                        <div class='input-group date' id='datetimepicker-tahun-status_progress_fisik'>
                                            <input type='text' id="tahun-status_progress_fisik"
                                                class="form-control" value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12 form-hide">
                                        <select name="status_progress_fisik" id="status_progress_fisik"
                                            class="form-control select2">
                                            @foreach ($data->tgl_backup_profile as $tgl)
                                                <option value="{{ $tgl->tanggal_backup }}">
                                                    {{ $tgl->tanggal_backup }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table style="width: 100%">
                                            <tr class="text-bold">
                                                <td rowspan="2" class="text-center">Nilai Deviasi</td>
                                                <td colspan="2" class="text-center">Keuangan</td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td class="text-center">%</td>
                                                <td class="text-center">Jumlah Satuan Kerja</td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #00cc00">
                                                <td>Dev > 10%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #6666FF">
                                                <td>0% < Dev <=10%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #808080">
                                                <td>-10% < Dev <=0%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #cccc00">
                                                <td>-30% < Dev <=-10%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-white" style="background-color: #ff6666">
                                                <td>Dev <= -30%</td>
                                                <td class="text-center data-deviasi-fisik-persentase">%</td>
                                                <td class="text-center data-deviasi-fisik-jumlah_satker"></td>
                                            </tr>
                                            <tr class="text-bold">
                                                <td>Total</td>
                                                <td class="text-center data-deviasi-fisik-persentase-total">%</td>
                                                <td class="text-center data-deviasi-fisik-satker-total"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Kelengkapan Dokumen Per Paket-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kelengkapan Dokumen per Paket</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tahun</label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class='input-group date' id='datetimepicker-year-keldok'>
                                            <input type='text' id="year-keldok" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box-body">
                                    <canvas id="kelengkapan-dokumen" style="max-height: 300px; width:100%"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Perizinan SDA-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-success">
                        <h3 class="box-title">PERIZINAN SDA</h3>
                    </div>
                </div>
            </div>

            <!--Jumlah Perizinan-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Jumlah Perizinan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-start'>
                                            <input type='text' id="perijinan-start" class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-end'>
                                            <input type='text' id="perijinan-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                            </div>
                            <div class="col-sm-6">
                                <label for="perijinan-upt">UPT</label>
                                <select name="perijinan-upt" id="perijinan-upt" class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->upt_perizinan as $upt)
                                        <option>{{ $upt->nama_balai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="perijinan-chart" style="max-height: 300px; width:100%"anvas>
                    </div>
                </div>
            </div>

            <!--Progres Perizinan-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Progres Perizinan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-table-start'>
                                            <input type='text' id="perijinan-table-start" class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-table-end'>
                                            <input type='text' id="perijinan-table-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="perijinan-table-upt">UPT</label>
                                <select name="perijinan-table-upt" id="perijinan-table-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->upt_permohonan_izin as $upt)
                                        <option>{{ $upt->nama_balai }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table id="table-perijinan" class="display table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th data-orderable="false">#</th>
                                    <th data-orderable="true">Nomor Registrasi Permohonan Izin</th>
                                    <th data-orderable="true">Tanggal Pengajuan Permohonan Izin</th>
                                    <th data-orderable="true">Nama Perusahaan</th>
                                    <th data-orderable="true">UPT</th>
                                    <th data-orderable="true">Sumber Air</th>
                                    <!--<th data-orderable="true">Jenis Permohonan</th>-->
                                    <!--<th data-orderable="true">Tujuan Penggunaan Air Daya Air</th>-->
                                    <!--<th data-orderable="true">Tujuan Penggunaan Sumber Air</th>-->
                                    {{-- catatan: <th data-orderable="false">Verifikasi</th> --}}
                                    <th data-orderable="false">Batas Waktu Penerbitan Izin *)</th>
                                </tr>
                            </thead>
                        </table>
                        <p>*) apabila tidak sesuai, harap update pada menu <a
                                href="{{ url('ki/permohonan-izin') }}">permohonan perizinan</a></p>
                    </div>
                </div>
            </div>

            <!--Status Pemberian Izin-->
            <div class="col-sm-6 col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Status Pemberian Izin</h3>
                            </div>
                            <div class="box-body">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-batas-waktu-start'>
                                            <input type='text' id="perijinan-batas-waktu-start"
                                                class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perijinan-batas-waktu-end'>
                                            <input type='text' id="perijinan-batas-waktu-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="perijinan-batas-waktu-upt">UPT</label>
                                        <select name="perijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt"
                                            class="form-control select2">
                                            <option value="">ALL</option>
                                            @foreach ($data->upt_permohonan_izin as $upt)
                                                <option>{{ $upt->nama_balai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                                <canvas id="perijinan-batas-waktu-chart"style="max-height: 300px; width:100%"></canvas>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-xs-12">-->
                    <!--    <div class="box">-->
                    <!--        <div class="box-header with-border">-->
                    <!--            <h3 class="box-title">Balai Terlambat Terbanyak</h3>-->
                    <!--        </div>-->
                    <!--        <div class="box-body">-->
                    <!--            <label for="status">Tanggal</label>-->
                    <!--            <div class="row">-->
                    <!--                <div class="col-sm-6">-->
                    <!--                    <div class='input-group date' id='datetimepicker-perizinan-terlambat-start'>-->
                    <!--                        <input type='text' id="perizinan-terlambat-start" class="form-control" value="{{ now()->firstOfMonth()->format('Y-m-d') }}"/>-->
                    <!--                        <span class="input-group-addon">-->
                    <!--                        <span class="glyphicon glyphicon-calendar"></span>-->
                    <!--                        </span>-->
                    <!--                     </div>-->
                    <!--                </div>-->
                    <!--                <div class="col-sm-6">-->
                    <!--                    <div class='input-group date' id='datetimepicker-perizinan-terlambat-end'>-->
                    <!--                        <input type='text' id="perizinan-terlambat-end" class="form-control" value="{{ now()->format('Y-m-d') }}"/>-->
                    <!--                        <span class="input-group-addon">-->
                    <!--                        <span class="glyphicon glyphicon-calendar"></span>-->
                    <!--                        </span>-->
                    <!--                     </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <canvas id="perizinan-terlambat-chart"style="max-height: 500px; width:100%"></canvas>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pemberian Izin Terlambat Per Balai</h3>
                            </div>
                            <div class="box-body">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date'
                                            id='datetimepicker-perizinan-terlambat-full-start'>
                                            <input type='text' id="perizinan-terlambat-full-start"
                                                class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perizinan-terlambat-full-end'>
                                            <input type='text' id="perizinan-terlambat-full-end"
                                                class="form-control" value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <canvas
                                    id="perizinan-terlambat-full-chart"style="max-height: 500px; width:100%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Status Monitoring dan Evaluasi Perizinan-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Monitoring dan Evaluasi Perizinan</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tanggal</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perizinan-monev-start'>
                                            <input type='text' id="perizinan-monev-start" class="form-control"
                                                value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-perizinan-monev-end'>
                                            <input type='text' id="perizinan-monev-end" class="form-control"
                                                value="{{ now()->format('Y-m-d') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="perizinan-monev-upt">UPT</label>
                                        <select name="perizinan-monev-upt" id="perizinan-monev-upt"
                                            class="form-control select2">
                                            <option value="">ALL</option>
                                            @foreach ($data->upt_perizinan as $upt)
                                                <option>{{ $upt->nama_balai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- catatan: <input type="text" class="form-control" name="status" id="status" value="{{date("Y-m-d")}}"> --}}
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="perizinan-monev-chart" style="max-height: 300px; width:100%"anvas>
                    </div>
                </div>
            </div>

            <!--Pengaduan Masyarakat (label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-danger">
                        <h3 class="box-title">PENGADUAN MASYARAKAT</h3>
                    </div>
                </div>
            </div>

            <!--Pengaduan Masyarakat-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pengaduan Masyarakat</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <h3 class="box-title">Presentasi Jumlah Pengaduan Berdasarkan Unit Kerja dan UPT</h3>
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="box-body">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Rekap Pengaduan balai</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-lg-12 form-hide">
                                            <label for="status">Tahun</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class='input-group date' id='datetimepicker-rekap-table-start'>
                                                        <input type='text' id="rekap-table-start"
                                                            class="form-control"
                                                            value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class='input-group date' id='datetimepicker-rekap-table-end'>
                                                        <input type='text' id="rekap-table-end"
                                                            class="form-control"
                                                            value="{{ now()->format('Y-m-d') }}" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="rekap-table-upt">BALAI</label>
                                            <select name="rekap-table-upt" id="rekap-table-upt"
                                                class="form-control select2">
                                                <option value="">ALL</option>

                                                @foreach ($data->satker_pengaduan as $satker)
                                                    <option>{{ $satker->pemilik_resiko_satker }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <table id="table-rekap" class="display table table-bordered table-hover"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th data-orderable="false">#</th>
                                                <th data-orderable="true">Pengadu</th>
                                                <th data-orderable="true">Perihal Laporan</th>
                                                <th data-orderable="true">Kategori Pengaduan</th>
                                                <th data-orderable="true">Poin Pengaduan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- <div class="box-header">
                                                                                                                                                                                                        <h3 class="box-title">Pengaduan UPT</h3>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="box">
                                                                                                                                                                                                        <label for="status">Tahun Anggaran</label>
                                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                                            <div class="col-sm-6">
                                                                                                                                                                                                                <div class='input-group date' id='datetimepicker-pengaduan-upt-start'>
                                                                                                                                                                                                                    <input type='text' id="pengaduan-upt-start" class="form-control" value="{{ now()->firstOfMonth()->format('Y-m-d') }}"/>
                                                                                                                                                                                                                    <span class="input-group-addon">
                                                                                                                                                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                 </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            <div class="col-sm-6">
                                                                                                                                                                                                                <div class='input-group date' id='datetimepicker-pengaduan-upt-end'>
                                                                                                                                                                                                                    <input type='text' id="pengaduan-upt-end" class="form-control" value="{{ now()->format('Y-m-d') }}"/>
                                                                                                                                                                                                                    <span class="input-group-addon">
                                                                                                                                                                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                 </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                            {{-- catatan: <div class="col-sm-6">
                            <label for="perijinan-batas-waktu-upt">UPT</label>
                            <select name="perijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt" class="form-control select2">
                                <option value="">ALL</option>
                                @foreach ($data->upt_permohonan_izin as $upt)
                                <option>{{ $upt->nama_balai }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                                                                                                                                                                                                        <canvas id="pengaduan-upt-chart"style="max-height: 300px; width:100%"></canvas>
                                                                                                                                                                                                    </div> -->
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="box-header">
                                    <h3 class="box-title">Status Penanganan</h3>
                                </div>
                                <div class="col-sm-12">
                                    <label for="status">Tahun</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class='input-group date' id='datetimepicker-status-penanganan-start'>
                                                <input type='text' id="status-status-penanganan-start"
                                                    class="form-control"
                                                    value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class='input-group date' id='datetimepicker-status-penanganan-end'>
                                                <input type='text' id="status-status-penanganan-end"
                                                    class="form-control" value="{{ now()->format('Y-m-d') }}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <canvas id="status-chart" style="max-height: 300px; width:100%"anvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Balai dengan Jumlah Pengaduan Terbanyak-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Balai dengan Jumlah Pengaduan Terbanyak</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-balai-pengaduan-terbanyak-start'>
                                    <input type='text' id="balai-pengaduan-terbanyak-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-balai-pengaduan-terbanyak-end'>
                                    <input type='text' id="balai-pengaduan-terbanyak-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            {{-- catatan: <div class="col-sm-6">
                            <label for="perijinan-batas-waktu-upt">UPT</label>
                            <select name="perijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt" class="form-control select2">
                                <option value="">ALL</option>
                                @foreach ($data->upt_permohonan_izin as $upt)
                                <option>{{ $upt->nama_balai }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="balai-pengaduan-terbanyak-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Grafik Bidang Pengaduan-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Bidang Pengaduan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-spengaduan-start'>
                                    <input type='text' id="spengaduan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-spengaduan-end'>
                                    <input type='text' id="spengaduan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            {{-- catatan: <div class="col-sm-6">
                            <label for="sperijinan-batas-waktu-upt">UPT</label>
                            <select name="sperijinan-batas-waktu-upt" id="perijinan-batas-waktu-upt" class="form-control select2">
                                <option value="">ALL</option>
                                @foreach ($data->upt_permohonan_izin as $upt)
                                <option>{{ $upt->nama_balai }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="spengaduan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Integritas-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Integritas</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-integritas-start'>
                                    <input type='text' id="integritas-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-integritas-end'>
                                    <input type='text' id="integritas-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="integritas-batas-waktu-upt">UPT</label>
                                <select name="integritas-batas-waktu-upt" id="integritas-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="integritas-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Perencanaan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Perencanaan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-perencanaan-start'>
                                    <input type='text' id="perencanaan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-perencanaan-end'>
                                    <input type='text' id="perencanaan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="perencanaan-batas-waktu-upt">UPT</label>
                                <select name="perencanaan-batas-waktu-upt" id="perencanaan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="perencanaan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Pembebasan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pembebasan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pembebasan-start'>
                                    <input type='text' id="pembebasan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pembebasan-end'>
                                    <input type='text' id="pembebasan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="pembebasan-batas-waktu-upt">UPT</label>
                                <select name="pembebasan-batas-waktu-upt" id="pembebasan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="pembebasan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Tender-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tender</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-tender-start'>
                                    <input type='text' id="tender-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-tender-end'>
                                    <input type='text' id="tender-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="tender-batas-waktu-upt">UPT</label>
                                <select name="tender-batas-waktu-upt" id="tender-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="tender-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Pelaksanaan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pelaksanaan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pelaksanaan-start'>
                                    <input type='text' id="pelaksanaan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pelaksanaan-end'>
                                    <input type='text' id="pelaksanaan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="pelaksanaan-batas-waktu-upt">UPT</label>
                                <select name="pelaksanaan-batas-waktu-upt" id="pelaksanaan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="pelaksanaan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Pemanfaatan-->
            <div class="col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pemanfaatan</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pemanfaatan-start'>
                                    <input type='text' id="pemanfaatan-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-pemanfaatan-end'>
                                    <input type='text' id="pemanfaatan-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="pemanfaatan-batas-waktu-upt">UPT</label>
                                <select name="pemanfaatan-batas-waktu-upt" id="pemanfaatan-batas-waktu-upt"
                                    class="form-control select2">
                                    <option value="">ALL</option>
                                    @foreach ($data->satker_pengaduan as $upt)
                                        <option>{{ $upt->pemilik_resiko_satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="pemanfaatan-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Tindak Lanjut Temuan BPK (Label)-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-danger">
                        <h3 class="box-title">TINDAK LANJUT TEMUAN BPK</h3>
                    </div>
                </div>
            </div>

            <!--Grafik Status SIPTL-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Grafik Status SIPTL</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-siptl-start'>
                                    <input type='text' id="status-siptl-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-siptl-end'>
                                    <input type='text' id="status-siptl-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <canvas id="status-siptl-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Status Verifikasi ITJEN-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Verifikasi ITJEN</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-verifikasi-start'>
                                    <input type='text' id="status-verifikasi-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-status-verifikasi-end'>
                                    <input type='text' id="status-verifikasi-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="status-verifikasi-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>

            <!--Persentase Verifikasi ITJEN-->
            <div class="col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Persentase Verifikasi ITJEN</h3>
                    </div>
                    <div class="box-body">
                        <label for="status">Tahun Anggaran</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-persentase-itjen-start'>
                                    <input type='text' id="persentase-itjen-start" class="form-control"
                                        value="{{ now()->firstOfMonth()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class='input-group date' id='datetimepicker-persentase-itjen-end'>
                                    <input type='text' id="persentase-itjen-end" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- catatan: <div id="mr-chart" height="200" style="height: 380px;"></div> --}}
                        <canvas id="persentase-itjen-chart"style="max-height: 300px; width:100%"></canvas>
                    </div>
                </div>
            </div>
        @else
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border; label label-primary">
                        <h3 class="box-title">MANAJEMEN RISIKO</h3>
                    </div>
                </div>
            </div>

            <!--Penyampaian Formulir Komitmen Manajemen Risiko-->
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-xs-10">
                                <h3 class="box-title">Penyampaian Formulir Komitmen Manajemen Risiko</h3>
                            </div>
                            <div class="col-xs-2 text-right">
                                {{-- catatan: <a href='#' class="btn btn-warning">Detail</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-12 form-hide">
                                <label for="status">Tahun</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='input-group date' id='datetimepicker-year-mr'>
                                            <input type='text' id="year-mr" class="form-control"
                                                value="{{ now()->format('Y') }}" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-mr">
                            <thead class="label-warning">
                                <tr>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">NO</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">TINGKAT</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">UNIT</th>
                                    <th rowspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">JUMLAH</th>
                                    <th colspan="15" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">STATUS PENYAMPAIAN</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">KOMITMEN MR</th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        I
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        II
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        III
                                    </th>
                                    <th colspan="3" class="text-center"
                                        style="vertical-align:middle; border:1px solid white;">LAPORAN PENERAPAN MR
                                        TRIWULAN
                                        IV
                                    </th>
                                </tr>
                                <tr>
                                    {{-- catatan: <th class="text-center" style="vertical-align:middle; border:1px solid white;">JUMLAH</th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white;">SUDAH</th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white;">BELUM</th> --}}
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        V
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        D
                                    </th>
                                    <th class="text-center"
                                        style="vertical-align:middle; border:1px solid white; width:5%">
                                        B
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-mr-body">
                                @foreach ($data->tingkat_unit as $item)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $item['tingkat'] }}</td>
                                        <td>
                                            <a href="{{ route('detail', ['unit' => $item['param']]) }}">
                                                {{ $item['unit'] }}
                                            </a>
                                        </td>
                                        {{-- catatan: <td>0</td> --}}
                                        {{-- catatan: <td>0</td> --}}
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-mr-foot">
                                <tr>
                                    <td colspan="3">Total Jumlah</td>
                                    <td>0</td>
                                    {{-- catatan: <td>0</td> --}}
                                    {{-- catatan: <td>0</td> --}}
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        <p>Keterangan : </p>
                        <p>V : Terverifikasi</p>
                        <p>D : Draft, Dalam verifikasi UKI Uker/UPT, Dalam verifikasi UKI Unor</p>
                        <p>B : Belum membuat</p>

                        <hr>

                        <table class="table table-mr-terverifikasi" style="margin-bottom: 50px">
                            <tr class="label-primary">
                                <th class="text-center" colspan="5">TERVERIFIKASI</th>
                            </tr>
                            <tr class="label-primary">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-primary">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-terverifikasi-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-mr-draft">
                            <tr class="label-warning">
                                <th class="text-center" colspan="5">DRAFT</th>
                            </tr>
                            <tr class="label-warning">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-warning">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-draft-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-mr-belum">
                            <tr class="label-danger">
                                <th class="text-center" colspan="5">BELUM</th>
                            </tr>
                            <tr class="label-danger">
                                <th class="text-center" rowspan="2">KOMITMEN MR</th>
                                <th class="text-center" colspan="4">LAPORAN PENERAPAN MR</th>
                            </tr>
                            <tr class="label-danger">
                                <th class="text-center">TRIWULAN I</th>
                                <th class="text-center">TRIWULAN II</th>
                                <th class="text-center">TRIWULAN III</th>
                                <th class="text-center">TRIWULAN IV</th>
                            </tr>
                            <tbody class="table-mr-belum-body">
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    {{-- catatan: <script src="https://code.highcharts.com/highcharts.js"></script> --}}
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0-rc"></script>
    <script>
        const URL = '{{ url('') }}';
        const CURRENT_URL = '{{ url()->current() }}';
        const urlData = '{{ url('home/tablePerijinan') }}';
        const urlDataB = '{{ url('home/tableRekapPengaduanBalai') }}';
        const urlDataC = '{{ url('home/tableBalaiPengaduanTerbanyak') }}';

        const colours = [
            'rgba(0, 128, 255, 1)', // blue
            'rgba(255, 128, 0, 1)', // orange
            'rgba(240, 240, 51, 1)', // yellow
            'rgba(255, 102, 102, 1)', // red
            'rgba(128, 255, 0, 1)', // green
            'rgba(102, 0, 204, 1)', // purple
            'rgba(204, 204, 255, 1)', // Peach
            'rgba(102, 255, 255, 1)', // Cyan
        ];
    </script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <!-- Resources -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script>
        // var map = L.map('mapid').setView([-5.439840185658451, 106.81662399891715], 4);

        //         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //             attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        //         }).addTo(map);
    </script>
    <script>
        var blueIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        // var greenIcon = new L.Icon({
        //     iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png',
        //     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        //     iconSize: [25, 41],
        //     iconAnchor: [12, 41],
        //     popupAnchor: [1, -34],
        //     shadowSize: [41, 41]
        // });
        // var redIcon = new L.Icon({
        //     iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
        //     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        //     iconSize: [25, 41],
        //     iconAnchor: [12, 41],
        //     popupAnchor: [1, -34],
        //     shadowSize: [41, 41]
        // });
        // var orangeIcon = new L.Icon({
        //     iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-orange.png',
        //     shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        //     iconSize: [25, 41],
        //     iconAnchor: [12, 41],
        //     popupAnchor: [1, -34],
        //     shadowSize: [41, 41]
        // });
    </script>
    <!-- @foreach ($data->map as $item)
    @if ($item->lat && $item->long)
    <script>
        // var lat = {{ $item->lat }}
        // var long = {{ $item->long }}
        // // var tempat = {{ $item->Tempat }};
        // console.log(lat,long)
        L.marker([{{ $item->lat }}, {{ $item->long }}], {
            icon: blueIcon
        }).bindPopup('{{ $item->Tempat }}').addTo(map);
    </script>
    @endif
    @endforeach -->
    </div>
@endsection
