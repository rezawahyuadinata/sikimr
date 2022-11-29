@extends('layouts.layout_menu_all')

@section('content')
    @php
        use App\Helpers\AppHelper;
    @endphp
    <div id="print-area">
        <style>
            @media print {
                #print-area : {
                    -webkit-print-color-adjust: exact;
                }
            }

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
        <style>
            .inherent {
                background: #001bf2;
                width: 30px;
                height: 30px;
                border: 1px solid black;
                border-radius: 50%;
                color: #fff;
                text-align: center;
            }

            .controlled {
                background: #b600d4;
                width: 30px;
                height: 30px;
                border: 1px solid black;
                border-radius: 50%;
                color: #fff;
                text-align: center;
            }

            .controlled p {
                text-align: center;
                top: 10px;
                left: -47px;
                position: relative;
                width: 93px;
                height: 93px;
                margin: 0px;
            }

            .respon {
                background: #00bcd4;
                width: 30px;
                height: 30px;
                border: 1px solid black;
                border-radius: 50%;
                color: #000;
                text-align: center;
            }

            .innerTEXT {
                position: absolute;
            }

            .tabel-indikator {
                border: 1px solid black;
                margin-top: 10%;
            }

            .tabel-indikator th {
                background-color: #BECBDE;
                border: 1px solid black;
                text-align: center;
                width: 120px;
                height: 50px;
            }

            .tabel-indikator td {
                border: 1px solid black;
                text-align: center;
                font-weight: bold;
                width: 120px;
                height: 50px;
            }
        </style>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Dokumen</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="width: 25%">Nomor Dokumen Pemantauan Inovasi Pengendalian</td>
                                        <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->pemantauan_nomor : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Tanggal Dokumen</td>
                                        <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->pemantauan_tanggal : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Triwulan</td>
                                        <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->triwulan : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Tahun</td>
                                        <td>{{ isset($data->pemantauan_mr) ? $data->pemantauan_mr->tahun : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Nomor Dokumen Komitmen</td>
                                        <td>{{ isset($data->pemantauan_mr->komitmen_mr) ? $data->pemantauan_mr->komitmen_mr->mr_nomor : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Status Verifikasi</td>
                                        <td>{{ isset($data->pemantauan_mr) ? AppHelper::status($data->pemantauan_mr->verifikasi) : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Catatan Verifikasi</td>
                                        <td>{{ isset($data->pemantauan_mr->verifikasi_catatan) ? $data->pemantauan_mr->verifikasi_catatan : '-' }}
                                        </td>
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
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="text-align: center;">Laporan Pemantauan MR</h3>
                    </div>
                    {{-- catatan: <h3 style="text-align: center;">KOMITMEN MANAJEMEN RISIKO</h3> --}}
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">1. Pemantauan Inovasi Pengendalian</label>
                            </div>
                            <div class="col-lg-12 table-responsive">
                                <table id="table-pemantauan_detail" class="table table-bordered table-hover"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">No</th>
                                            <th data-orderable="true">Pernyataan Risiko</th>
                                            <th data-orderable="true">Penyebab Risiko</th>
                                            <th data-orderable="true">Respon Risiko</th>
                                            <th data-orderable="true">Inovasi Pengendalian</th>
                                            <th data-orderable="true">Penanggung Jawab</th>
                                            <th data-orderable="true">Indikator (Keluaran)</th>
                                            <th data-orderable="true">Target Waktu</th>
                                            <th data-orderable="true">Realisasi Waktu</th>
                                            <th data-orderable="true">Hasil Pemantauan</th>
                                            <th data-orderable="true">Hambatan / Kendala</th>
                                            <th data-orderable="true">File Bukti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->pemantauan_detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->resiko_pernyataan }}</td>
                                                <td>{{ $item->resiko_kegiatan_penyebab }}</td>
                                                <td>{{ $item->respon_risiko }}</td>
                                                <td>{{ $item->resiko_deskripsi }}</td>
                                                <td>{{ $item->pemantauan_penanggung_jawab }}</td>
                                                <td>{{ $item->pemantauan_indikator }}</td>
                                                <td>{{ $item->pemantauan_periode }}</td>
                                                <td>{{ $item->pemantauan_periode_realisasi }}</td>
                                                <td>{!! $item->pemantauan_hasil !!}</td>
                                                <td>{{ $item->pemantauan_hambatan }}</td>
                                                <td> {!! $item->pemantauan_inovasi_file
                                                    ? '<a href="' .
                                                        url('/storage/uploads/mr') .
                                                        '/' .
                                                        $item->pemantauan_inovasi_file .
                                                        '" target="_blank">Lihat file </a> '
                                                    : '' !!}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">2. Tinjauan Atas Risiko Baru atau Masalah Yang Belum
                                    Teridentifikasi</label>
                            </div>
                            <div class="col-lg-12 table-responsive">
                                <table id="table-tinjauan_detail" class="display table table-bordered table-hover"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th data-orderable="false">No</th>
                                            <th data-orderable="true">Nama Kejadian</th>
                                            <th data-orderable="true">Pernyataan Risiko</th>
                                            <th data-orderable="true">Penyebab Risiko</th>
                                            <th data-orderable="true">Skor Kemungkinan</th>
                                            <th data-orderable="true">Skor Dampak</th>
                                            <th data-orderable="true">Besaran Risiko</th>
                                            <th data-orderable="true">Level Risiko</th>
                                            <th data-orderable="true">Respon Risiko</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->tinjauan_detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tinjauan_nama }}</td>
                                                <td>{{ $item->tinjauan_pernyataan }}</td>
                                                <td>{{ $item->tinjauan_penyebab }}</td>
                                                <td>{{ $item->tinjauan_kemungkinan }}</td>
                                                <td>{{ $item->tinjauan_dampak }}</td>
                                                <td>{{ $item->tinjauan_nilai }}</td>
                                                <td>{{ $item->tinjauan_level }}</td>
                                                <td>{{ $item->respon_risiko }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">3. Daftar Pemantauan Level Risiko</label>
                            </div>
                            <div class="col-lg-12 table-responsive">
                                <table id="table-pemantauan_resiko_detail" class="display table table-bordered table-hover"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" data-orderable="false">No</th>
                                            <th rowspan="2" data-orderable="true">Pernyataan Risiko</th>
                                            <th rowspan="2" data-orderable="true">Kejadian Risiko 1 Tahun</th>
                                            <th colspan="3" class="text-center">Risiko yang Direspon</th>
                                            <th colspan="3" class="text-center">Level Risiko Aktual</th>
                                            <th rowspan="2" data-orderable="true">Selisih Besaran Risiko</th>
                                            <th rowspan="2" data-orderable="true">Rekomendasi</th>
                                        </tr>
                                        <tr>
                                            <th data-orderable="true">Frekuensi</th>
                                            <th data-orderable="true">Dampak</th>
                                            <th data-orderable="true">Besaran Risiko</th>
                                            <th data-orderable="true">Frekuensi</th>
                                            <th data-orderable="true">Dampak</th>
                                            <th data-orderable="true">Besaran Risiko</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->pemantauan_resiko_detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->pemantauan_resiko_pernyataan }}</td>
                                                <td>{{ $item->pemantauan_resiko_jumlah }}</td>
                                                <td>{{ $item->pemantauan_resiko_kemungkinan }}</td>
                                                <td>{{ $item->pemantauan_resiko_dampak }}</td>
                                                <td>{{ $item->pemantauan_resiko_nilai }}</td>
                                                <td>{{ $item->pemantauan_resiko_kemungkinan_act }}</td>
                                                <td>{{ $item->pemantauan_resiko_dampak_act }}</td>
                                                <td>{{ $item->pemantauan_resiko_nilai_act }}</td>
                                                <td>{{ $item->pemantauan_resiko_selisih }}</td>
                                                <td>{{ $item->pemantauan_resiko_rekomendasi }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
