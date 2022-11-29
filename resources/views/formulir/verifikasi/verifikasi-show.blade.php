@extends('layouts.layout_menu_all')

@section('content')
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
                                        <td style="width: 25%">Nomor Dokumen Risiko</td>
                                        <td>{{ $data->komitmen_mr->mr_nomor }}</td>
                                    </tr>
                                    {{-- catatan: <tr>
                                    <td style="width: 25%">Tanggal Dokumen</td>
                                    <td>{{ $data->komitmen_mr->mr_tanggal }}</td>
                                </tr> --}}
                                    <tr>
                                        <td style="width: 25%">Tanggal Pembuatan</td>
                                        <td>{{ $data->komitmen_mr->dibuat_pada }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Dibuat Oleh</td>
                                        <td>{{ $data->komitmen_mr->creator->name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Tanggal Perubahan Terakhir</td>
                                        <td>{{ $data->komitmen_mr->diubah_pada }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">Diubah Oleh</td>
                                        <td>{{ $data->komitmen_mr->updater->name }}</td>
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
                        <h3 class="box-title" style="text-align: center;">Komitmen Manajemen Risiko</h3>
                    </div>
                    {{-- catatan: <h3 style="text-align: center;">KOMITMEN MANAJEMEN RISIKO</h3> --}}
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="komitmen">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="50px" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">
                                                <h3 style="text-align: center;">KOMITMEN MANAJEMEN RISIKO</h3>

                                            </th>
                                        </tr>
                                        <tr>
                                            <td style="width: 25%;margin-left: 50px">Nama Pemilik Risiko</td>
                                            <td style="width:5px">{{ $data->komitmen_mr->pemilik_resiko }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP Pemilik Risiko</td>
                                            <td style="width:5px">{{ $data->komitmen_mr->pemilik_resiko_nip }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan Pemilik Risiko</td>
                                            <td>{{ $data->komitmen_mr->pemilik_resiko_jabatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pengelola Risiko</td>
                                            <td>{{ $data->komitmen_mr->pengelola_resiko }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP Pengelola Risiko</td>
                                            <td>{{ $data->komitmen_mr->pengelola_resiko_nip }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan Pengelola Risiko</td>
                                            <td>{{ $data->komitmen_mr->pengelola_resiko_jabatan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Periode Penerapan Risiko</td>
                                            <td>{{ $data->komitmen_mr->mr_periode }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <label for="">1. Sasaran Program/Kegiatan Unit Pemilik Risiko</label>
                            </div>
                            <div class="col-lg-12">

                                <table class="display table table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            @if ($data->komitmen_mr->level == 'UPR-T2')
                                                <th>Sasaran Program</th>
                                            @else
                                                <th>Sasaran Output</th>
                                            @endif
                                            <th>Indikator Sasaran</th>
                                            <th>Kegiatan Utama</th>
                                            <th>Tujuan Kegiatan Utama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data->komitmen_mr->level == 'UPR-T3' ||
                                            ($data->komitmen_mr->level == 'UPR-T2' && $data->komitmen_mr->creator->unit != 'Balai'))
                                            @foreach ($data->komitmen_mr->sasaran_t3 as $item)
                                                <tr>
                                                    <td>{{ $data->komitmen_mr->level }}</td>
                                                    <td>{{ $item->SASARAN }}</td>
                                                    @if ($data->komitmen_mr->level == 'UPR-T3')
                                                        <td>{{ $item->isp_text . ' ' . $item->isp_target . ' ' . $item->isp_satuan }}
                                                        </td>
                                                    @else
                                                        <td>{{ $item->INDIKATOR }}</td>
                                                    @endif
                                                    <td>{{ $item->nmpaket }}</td>
                                                    <td>{{ $item->kegiatan_tujuan }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach ($data->komitmen_mr->sasaran_t3 as $item)
                                                @php
                                                    $row = count($item->sasaran_list);
                                                @endphp
                                                @foreach ($item->sasaran_list as $i)
                                                    @php
                                                        $row += count($i->nmpaket);
                                                    @endphp
                                                @endforeach
                                                <tr>
                                                    <td>{{ $data->komitmen_mr->level }}</td>
                                                    <td {{ $row > 0 ? 'rowspan="' . $row . '"' : '' }}>
                                                        {{ $item->SASARAN }}
                                                    </td>
                                                    @foreach ($item->sasaran_list as $i)
                                                        @if ($loop->index == 0)
                                                            <td>{{ $i->isp_text . ' ' . $i->isp_target . ' ' . $i->isp_satuan }}
                                                            </td>
                                                        @else
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $i->isp_text . ' ' . $i->isp_target . ' ' . $i->isp_satuan }}
                                                    </td>
                                            @endif
                                            @foreach ($i->nmpaket as $in)
                                                @if ($loop->index == 0)
                                                    <td>{{ $in->nmpaket }}</td>
                                                @else
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>{{ $in->nmpaket }}</td>
                                                @endif
                                                @foreach ($in->tujuan_kegiatan_utama as $itku)
                                                    @if ($loop->index == 0)
                                                        <td>
                                                            <b>{{ $itku->SASARAN }}</b>
                                                            <ol>
                                                                @foreach ($itku->list as $il)
                                                                    <li>{{ ($il->kegiatan_tujuan ? $il->kegiatan_tujuan : $il->tujuan_kegiatan) . ' ' . $il->tujuan_kegiatan . ' ' . $il->tujuan_kegiatan_satuan }}
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                        </td>
                                                    @else
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <b>{{ $itku->SASARAN }}</b>
                                                                <ol>
                                                                    @foreach ($itku->list as $il)
                                                                        <li>{{ ($il->kegiatan_tujuan ? $il->kegiatan_tujuan : $il->tujuan_kegiatan) . ' ' . $il->tujuan_kegiatan . ' ' . $il->tujuan_kegiatan_satuan }}
                                                                        </li>
                                                                    @endforeach
                                                                </ol>
                                                            </td>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>

                                </table>

                            </div>
                            <p style="page-break-after: always;">&nbsp;</p>
                            <div class="col-lg-12">
                                <label for="">2. Daftar Pemangku Kepentingan</label>
                            </div>
                            <div class="col-lg-12">
                                <table class="display table table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Daftar Pemangku Kepentingan</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->komitmen_mr->pemangku_kepentingan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->pemangku_kepentingan }}</td>
                                                <td>{{ $item->pemangku_kepentingan_keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p style="page-break-after: always;">&nbsp;</p>
                            <div class="col-lg-12">
                                <label for="">3. Tujuan Pelaksanaan Manajemen Risiko</label>
                            </div>
                            <div class="col-lg-12">
                                {{-- catatan: <table class="display table table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-orderable="false">No</th>
                                        <th data-orderable="true">Tujuan Pelaksanaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->komitmen_mr->paket_tujuan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tujuan_pelaksanaan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
                                <p style="text-align: justify;font-size:16px;">Tujuan pelaksanaan Manajemen Risiko adalah
                                    untuk menciptakan dan melindungi nilai agar UPR dapat meningkatkan kinerja mendorong
                                    inovasi dan mendukung pencapaian sasaran.
                                </p>
                            </div>

                        </div>
                        <p style="page-break-after: always;">&nbsp;</p>
                        <div id="resiko">
                            <div class="col-lg-12">
                                <label for="">4. Profil Risiko</label>
                            </div>
                            <div class="col-lg-12 table-responsive">
                                <table class="display table table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" data-orderable="false">No</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Tujuan
                                                Kegiatan Utama</th>
                                            <th rowspan=" 2" data-orderable="true" style="text-align: center;">Pernyataan
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Unit Kerja
                                                Pembina</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Tahapan
                                                Kegiatan</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Lingkup
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Kategori
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Penyebab
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Sumber
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Dampak
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Uraian
                                                Dampak Risiko</th>
                                            <th colspan="3" data-orderable="true" style="text-align: center;">Nilai
                                                Risiko yang Melekat</th>
                                            <th colspan="2" data-orderable="true" style="text-align: center;">
                                                Pengendalian yang Ada</th>
                                            <th colspan="3" data-orderable="true" style="text-align: center;">Nilai
                                                Risiko Setelah Pengendalian
                                            </th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Prioritas
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Respon
                                                Risiko</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Inovasi
                                                Pengendalian</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Alokasi
                                                Sumber Daya</th>
                                            <th colspan="3" data-orderable="true" style="text-align: center;">Risiko
                                                Yang Direspon</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">
                                                Penangung Jawab</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">Target
                                                Waktu</th>
                                            <th rowspan="2" data-orderable="true" style="text-align: center;">
                                                Indikator Keluaran</th>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <th style="text-align: center;">K</th>
                                            <th style="text-align: center;">D</th>
                                            <th style="text-align: center;">Nilai</th>
                                            <th style="text-align: center;">Uraian</th>
                                            <th style="text-align: center;">Memadai/Belum</th>
                                            <th style="text-align: center;">K</th>
                                            <th style="text-align: center;">D</th>
                                            <th style="text-align: center;">Nilai</th>
                                            <th style="text-align: center;">K</th>
                                            <th style="text-align: center;">D</th>
                                            <th style="text-align: center;">Nilai</th>
                                        </tr>
                                        <tr>
                                            @for ($i = 1; $i < 30; $i++)
                                                <th style="text-align: center;">
                                                    {{ $i }}
                                                </th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->komitmen_mr->resiko as $item)
                                            <tr>
                                                <td>{{ $item->resiko_kode }}</td>
                                                <td>{{ $item->kegiatan_tujuan ? $item->kegiatan_tujuan : $item->tujuan_kegiatan }}
                                                </td>
                                                <td>{{ $item->resiko_pernyataan }}</td>
                                                <td>{{ $item->nama_pembina }}</td>
                                                <td>{{ $item->tahap }}</td>
                                                <td>{{ $item->resiko_kegiatan_lingkup_jenis == 1 ? $item->balai_teknik : $item->lingkup_risiko }}
                                                </td>
                                                <td>{{ $item->kategori }}</td>
                                                <td>{{ $item->resiko_kegiatan_penyebab }}</td>
                                                <td>{{ $item->sumber_risiko }}</td>
                                                <td>{{ $item->nama_dampak }}</td>
                                                <td>{{ $item->resiko_kegiatan_dampak }}</td>
                                                <td>{{ $item->resiko_penilaian_kemungkinan }}</td>
                                                <td>{{ $item->resiko_penilaian_dampak }}</td>
                                                <td>{{ $item->resiko_penilaian_nilai }}</td>
                                                <td>{{ $item->resiko_pengendalian_uraian }}</td>
                                                <td>{{ $item->memadai_belum }}</td>
                                                <td>{{ $item->resiko_pengendalian_kemungkinan }}</td>
                                                <td>{{ $item->resiko_pengendalian_dampak }}</td>
                                                <td>{{ $item->resiko_pengendalian_nilai }}</td>
                                                <td>{{ $item->resiko_prioritas }}</td>
                                                <td>{{ $item->respon_risiko }}</td>
                                                <td>{{ $item->inovasi->resiko_deskripsi }}</td>
                                                <td>{{ $item->alokasi->alokasi }}</td>
                                                <td>{{ $item->inovasi->resiko_kemungkinan }}</td>
                                                <td>{{ $item->inovasi->resiko_dampak }}</td>
                                                <td>{{ $item->inovasi->resiko_nilai }}</td>
                                                <td>{{ $item->inovasi->resiko_penanggung_jawab }}</td>
                                                <td>{{ $item->inovasi->resiko_triwulan }}</td>
                                                <td>{{ $item->inovasi->resiko_indikator }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <p style="page-break-after: always;">&nbsp;</p>
                        <div id="take-pict-peta">

                            <div class="col-lg-12">
                                <label for="">5. Peta Risiko</label>
                            </div>
                            <div class="col-lg-8">
                                <table id="table-peta" class="table table-bordered" width="50%">
                                    <tr>
                                        <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center">
                                            <h2><b>PETA RISIKO</b></h2>
                                        </th>
                                    </tr>
                                    @foreach ($data->peta as $item)
                                        <tr style="height: 100px;">
                                            @if ($loop->index == 0)
                                                <td rowspan="8"
                                                    style="width: 5%;writing-mode: vertical-rl;text-align: center;font-weight: bold;">
                                                    KEMUNGKINAN
                                                </td>
                                            @endif
                                            <td style="width: 10%;font-weight:bold;text-align: center;">
                                                {{ $item->level_kemungkinan }}</td>
                                            @if ($item->nilai == 5)
                                                <td
                                                    style="width: 5%;border-bottom: 5px solid blue;text-align: center;font-weight:bold;vertical-align: middle;">
                                                    {{ $item->nilai }}</td>
                                            @else
                                                <td
                                                    style="width: 5%;text-align: center;font-weight:bold;vertical-align: middle;">
                                                    {{ $item->nilai }}</td>
                                            @endif
                                            @foreach ($item->dampak as $val)
                                                @php
                                                    $nilai = $val->nilai->nilai;
                                                @endphp
                                                @if ($nilai == 11 || $nilai == 12 || $nilai == 14 || $nilai == 13)
                                                    <td style="width: 10%;height:5%;border: 2px solid black; border-bottom: 5px solid blue;font-weight:bold;text-align: center; text-align:right;
                        vertical-align:bottom;background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})"
                                                        {{-- catatan: <td style="width: 16%; background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})" --}}
                                                        id="{{ $val->nilai ? $val->nilai->nilai : '-' }}">
                                                        {{ $val->nilai ? $val->nilai->nilai : '-' }}
                                                    @elseif ($nilai == 6 || $nilai == 8 || $nilai == 10 || $nilai == 9)
                                                    <td style="width: 10%;height:5%;font-weight:bold;border: 2px solid black;border-right: 5px solid blue;text-align: center; text-align:right;
                        vertical-align:bottom; background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})"
                                                        {{-- catatan: <td style="width: 16%; background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})" --}}
                                                        id="{{ $val->nilai ? $val->nilai->nilai : '-' }}">
                                                        {{ $val->nilai ? $val->nilai->nilai : '-' }}
                                                    </td>
                                                @else
                                                    <td style="width: 10%;height:5%;border: 2px solid black;font-weight:bold;text-align: center; text-align:right;
                        vertical-align:bottom; background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})"
                                                        {{-- catatan: <td style="width: 16%; background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})" --}}
                                                        id="{{ $val->nilai ? $val->nilai->nilai : '-' }}">
                                                        {{ $val->nilai ? $val->nilai->nilai : '-' }}
                                                @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        @foreach ($data->kriteria_dampak as $val)
                                            @if ($val->nilai == 5)
                                                <td
                                                    style="border-left: 5px solid blue;font-weight:bold;text-align: center;">
                                                    {{ $val->nilai }}</td>
                                            @else
                                                <td style="font-weight:bold;text-align: center;">{{ $val->nilai }}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        @foreach ($data->kriteria_dampak as $val)
                                            <td style="border-bottom: 2px solid black;font-weight:bold;">
                                                {{ $val->dampak }}</td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center">DAMPAK
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-5">
                                <table class="tabel-indikator">
                                    <tr>
                                        <th>LEVEL RISIKO</th>
                                        <th>BESARAN RISIKO</th>
                                        <th>WARNA</th>
                                    </tr>
                                    <tr>
                                        <td>Sangat Tinggi (5)</td>
                                        <td>20-25</td>
                                        <td style="background-color: #E83F32">MERAH</td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi (4)</td>
                                        <td>16-19</td>
                                        <td style="background-color: #F5C032">ORANYE</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang (3)</td>
                                        <td>11-15</td>
                                        <td style="background-color: #FAF832">KUNING</td>
                                    </tr>
                                    <tr>
                                        <td>Rendah (2)</td>
                                        <td>6-10</td>
                                        <td style="background-color: #90D150">HIJAU MUDA</td>
                                    </tr>
                                    <tr>
                                        <td>Sangat Rendah (1)</td>
                                        <td>1-5</td>
                                        <td style="background-color: #59B151">HIJAU</td>
                                    </tr>
                                </table>
                                <table style="width:300px;heigth:100px;margin-top:20px;font-weight: bold;font-size:18px">
                                    <tr>
                                        <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center">
                                            {{-- catatan: <h2><b>PETA RISIKO</b></h2> --}}
                                        </th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: -webkit-center;height:50px; width:100px;">
                                            {{-- catatan: <div class="inherent">
                                            </div> --}}
                                            <hr style="width:55px;border: 1px solid blue">
                                        </td>
                                        <td>
                                            Garis Toleransi
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: -webkit-center;height:50px; width:100px;">
                                            <div class="inherent">
                                                1
                                            </div>
                                        </td>
                                        <td>
                                            Inherent Risk
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: -webkit-center;height:50px; width:100px;">
                                            <div class="controlled">
                                                2
                                            </div>
                                        </td>
                                        <td>
                                            Controlled Risk
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: -webkit-center;height:50px; width:100px;">
                                            <div class="respon">
                                                3
                                            </div>
                                        </td>
                                        <td>
                                            Respon Risk
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-12">
                                <table id="table-peta" class="table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th colspan="11" class="text-center">DAFTAR PERNYATAAN RESIKO</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Pernyataan Risiko</th>
                                            <th colspan="3"
                                                style="text-align: center; background-color: #001bf2; color: #fff;">Nilai
                                                Risiko Yang Melekat</th>
                                            <th colspan="3"
                                                style="text-align: center; background-color: #b600d4; color: #fff;">Nilai
                                                Risiko Setelah Pengendalian</th>
                                            <th colspan="3"
                                                style="text-align: center; background-color: #00bcd4; color: #000;">Risiko
                                                Yang Direspon</th>
                                        </tr>
                                        <tr>
                                            @for ($i = 0; $i < 3; $i++)
                                                @if ($i == 0)
                                                    @php
                                                        $bgcolor = '#001bf2';
                                                    @endphp
                                                @elseif($i == 1)
                                                    @php
                                                        $bgcolor = '#b600d4';
                                                    @endphp
                                                @elseif($i == 2)
                                                    @php
                                                        $bgcolor = '#00bcd4';
                                                    @endphp
                                                @else
                                                    @php
                                                        $bgcolor = '';
                                                    @endphp
                                                @endif
                                                <th class="text-center">K</th>
                                                <th class="text-center">D</th>
                                                <th class="text-center">Nilai</th>
                                            @endfor
                                        </tr>
                                        <tr>
                                            @for ($i = 1; $i < 12; $i++)
                                                <td class="text-center">{{ $i }}</td>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data->komitmen_mr->resiko as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->resiko_kode }}</td>
                                                <td class="text-center">{{ $item->resiko_penilaian_kemungkinan }}</td>
                                                <td class="text-center">{{ $item->resiko_penilaian_dampak }}</td>
                                                <td class="text-center"
                                                    style="background-color: rgb({{ $item->r . ', ' . $item->g . ', ' . $item->b }})">
                                                    {{ $item->resiko_penilaian_nilai }}</td>
                                                <td class="text-center">{{ $item->resiko_pengendalian_kemungkinan }}</td>
                                                <td class="text-center">{{ $item->resiko_pengendalian_dampak }}</td>
                                                <td class="text-center"
                                                    style="background-color: rgb({{ $item->pr . ', ' . $item->pg . ', ' . $item->pb }})">
                                                    {{ $item->resiko_pengendalian_nilai }}</td>
                                                <td class="text-center">
                                                    {{ $item->inovasi ? $item->inovasi->resiko_kemungkinan : '0' }}</td>
                                                <td class="text-center">
                                                    {{ $item->inovasi ? $item->inovasi->resiko_dampak : '0' }}</td>
                                                @if ($item->inovasi)
                                                    <td class="text-center"
                                                        style="background-color: rgb({{ $item->inovasi->r . ', ' . $item->inovasi->g . ', ' . $item->inovasi->b }})">
                                                        {{ $item->inovasi->resiko_nilai }}</td>
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <p style="page-break-after: always;">&nbsp;</p>
                        <div id="take-pict-jadwal">
                            <div class="col-lg-12">
                                <label for="">6. Jadwal Pelaksanaan Kegiatan UPR</label>
                            </div>
                            <div class="col-lg-12 table-responsive" id="print-jadwal">
                                @foreach ($data->tahun as $keyyear => $year)
                                    <table id="table-jadwal" class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="3" style="text-align: center">No</th>
                                                <th rowspan="3" style="text-align: center">Tahap Proses MR</th>
                                                <th colspan="48" style="text-align: center">Tahun {{ $keyyear }}
                                                </th>
                                                <th rowspan="3" style="text-align: center">Keterangan</th>
                                            </tr>
                                            <tr>
                                                <?php for ($i = 1; $i <= 12; $i++) {
                                                    echo '<th colspan="4" style="text-align:center">Bulan ke-' . $i . '</th>';
                                                } ?>
                                            </tr>
                                            <tr>
                                                <?php for ($i = 1; $i <= 12; $i++) {
                                                    for ($y = 1; $y <= 4; $y++) {
                                                        echo '<th>' . $y . '</th>';
                                                    }
                                                } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($year as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->urutan }}
                                                    </td>
                                                    <td>
                                                        @if (isset($item->child) && count($item->child) < 1 && $loop->index != 0)
                                                            <a class="btn-jadwal" data-id="{{ $item->id }}"
                                                                data-nomor="{{ json_encode($item) }}">{{ $item->nama }}</a>
                                                        @else
                                                            {{ $item->nama }}
                                                        @endif
                                                    </td>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    <?php for ($i = 1; $i <= 12; $i++) {
                                                        for ($y = 1; $y <= 4; $y++) {
                                                            $text = 'minggu_' . $no;
                                                            if ($item->id == 1 || $item->id == 4) {
                                                                echo '<td style="background-color: #1ac01a"></td>';
                                                            } else {
                                                                echo '<td ' . ($item->{$text} ? 'style="background-color: #1ac01a"' : '') . '></td>';
                                                            }
                                                            $no++;
                                                        }
                                                    } ?>
                                                    <td></td>
                                                </tr>
                                                @if (isset($item->child))
                                                    @foreach ($item->child as $row)
                                                        <tr>
                                                            <td>{{ $item->urutan . '.' . $row->urutan }}</td>
                                                            <td>
                                                                @if ($row->jenis == 'inovasi')
                                                                    {{ $row->resiko_kode }}
                                                                @else
                                                                    <a class="btn-jadwal" data-id="{{ $row->id }}"
                                                                        data-nomor="{{ json_encode($row) }}">{{ $row->nama }}</a>
                                                                @endif
                                                            </td>
                                                            @php
                                                                $no = 1;
                                                                $tgl_pelaksanaan = $row->keterangan;
                                                                $time = strtotime($tgl_pelaksanaan);
                                                                $tgl = date('d', $time);
                                                                $week = ceil(intval($tgl) / 7);
                                                                $bulan = intval(date('m', $time));
                                                                $bln = $bulan % 3;
                                                                if ($week == 5) {
                                                                    $week = $week - 1;
                                                                }
                                                                if ($bln == 0) {
                                                                    $bln = $bln + 3;
                                                                }
                                                            @endphp

                                                            {{-- catatan: versi pertama --}}
                                                            @for ($i = 1; $i <= 4; $i++)
                                                                @for ($j = 1; $j <= 3; $j++)
                                                                    @if ($row->jenis == 'inovasi')
                                                                        @for ($k = 1; $k <= 4; $k++)
                                                                            @if ($i == implode('|', (array) $row->resiko_triwulan) && $k == $week && $j == $bln)
                                                                                <?php echo '<td style="background-color: #1ac01a"></td>'; ?>
                                                                            @else
                                                                                <?php echo '<td></td>'; ?>
                                                                            @endif
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                        @endfor
                                                                    @else
                                                                        @php
                                                                            for ($y = 1; $y <= 4; $y++) {
                                                                                $text = 'minggu_' . $no;
                                                                                echo '<td ' . ($row->{$text} ? 'style="background-color: #1ac01a"' : '') . '></td>';
                                                                                $no++;
                                                                            }
                                                                        @endphp
                                                                    @endif
                                                                @endfor
                                                            @endfor
                                                            <td>
                                                                @if ($row->jenis == 'inovasi')
                                                                    {{ isset($row->keterangan) ? date('d-m-Y', strtotime($row->keterangan)) : 'Melaksanakan Pemantauan dan Pelaporan Pengendalian yang Ada' }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td>Laporan Penerapan MR</td>
                                                <?php for ($i = 1; $i <= 12; $i++) {
                                                    for ($y = 1; $y <= 4; $y++) {
                                                        $text = 'minggu_' . $no;
                                                        if (in_array($i, [3, 6, 9, 12]) && $y == 4) {
                                                            echo '<td style="background-color: #1ac01a"></td>';
                                                        } else {
                                                            echo '<td ' . ($item->{$text} ? 'style="background-color: #1ac01a"' : '') . '></td>';
                                                        }
                                                        $no++;
                                                    }
                                                } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>

                        </div>
                        <form id="form-submit">
                            <input type="hidden" name="mr_id" value="{{ $data->komitmen_mr->mr_id }}">
                            <div class="row">
                                <div class="form-group col-lg-12 form-hide">
                                    <label for="verifikasi">Verifikasi</label><br>
                                </div>
                                <div class="form-group col-lg-2 form-hide">
                                    <div class="radio">
                                        <label for="aktif0">
                                            <input type="radio" required name="verifikasi" id="aktif0"
                                                value="0">
                                            Tidak terverifikasi
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-lg-9 form-hide">
                                    <textarea class="form-control" name="verifikasi_catatan" placeholder="Masukkan catatan"></textarea>
                                </div>
                                <div class="form-group col-lg-3 form-hide">
                                    <div class="radio">
                                        <label for="aktif1">
                                            <input type="radio" required name="verifikasi" id="aktif1"
                                                value="1">
                                            Terverifikasi
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var urlInsert = '{{ route($data->page->class . '.store') }}';
    </script>
@endsection

@push('scripts')
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js" type="text/javascript"></script>
    <script>
        var pointing = @json($data->pointing, JSON_PRETTY_PRINT);

        $(document).ready(function() {
            $.each(pointing, function(idx, val) {
                inherent = '<div class="inherent">' + val.pernyataan + '</div>'
                controlled = '<div class="controlled">' + val.pernyataan + '</div>'
                respon = '<div class="respon">' + val.pernyataan + '</div>'

                $('#' + val.inherent).append('<br>' + inherent)
                $('#' + val.controlled).append('<br>' + controlled)
                $('#' + val.respon).append('<br>' + respon)
            })

            $('#btn-print-area').on('click', function() {
                var printContents = document.getElementById('print-area').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            })

            $('#btn-print-area-komitmen').on('click', function() {
                var printContents = document.getElementById('komitmen').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            })

            $('#btn-print-area-resiko').on('click', function() {
                var printContents = document.getElementById('resiko').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            })

            $('#btn-simpan-pict-peta').on('click', function() {
                window.scrollTo(0, 0);
                html2canvas(document.getElementById("take-pict-peta")).then(function(canvas) {
                    var anchorTag = document.createElement("a");
                    document.body.appendChild(anchorTag);
                    // document.getElementById("previewImg").appendChild(canvas);
                    anchorTag.download = "petaresiko-" + '{{ $data->komitmen_mr->mr_nomor }}' +
                        ".jpg";
                    anchorTag.href = canvas.toDataURL();
                    anchorTag.target = '_blank';
                    anchorTag.click();
                });
                window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
            })

            $('#btn-simpan-pict-jadwal').on('click', function() {
                window.scrollTo(0, 0);
                html2canvas(document.getElementById("take-pict-jadwal")).then(function(canvas) {
                    var anchorTag = document.createElement("a");
                    document.body.appendChild(anchorTag);
                    // document.getElementById("previewImg").appendChild(canvas);
                    anchorTag.download = "jadwal-" + '{{ $data->komitmen_mr->mr_nomor }}' +
                        ".jpg";
                    anchorTag.href = canvas.toDataURL();
                    anchorTag.target = '_blank';
                    anchorTag.click();
                });
                window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
            })
        })
    </script>
@endpush
