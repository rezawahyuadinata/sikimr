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
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border; label label-primary">
                    <h3 class="box-title">MANAJEMEN RISIKO</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-10">
                            <h3 class="box-title">Penyampaian Formulir Komitmen Manajemen Risiko</h3>
                        </div>
                        <div class="col-xs-2 text-right">
                            <a href='{{ route('home') }}' class="btn btn-warning">Kembali</a>
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
                                <th colspan="15" class="text-center"
                                    style="vertical-align:middle; border:1px solid white;">STATUS PENYAMPAIAN</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center"
                                    style="vertical-align:middle; border:1px solid white;">KOMITMEN MR</th>
                                <th colspan="3" class="text-center"
                                    style="vertical-align:middle; border:1px solid white;">Triwulan 1</th>
                                <th colspan="3" class="text-center"
                                    style="vertical-align:middle; border:1px solid white;">Triwulan 2</th>
                                <th colspan="3" class="text-center"
                                    style="vertical-align:middle; border:1px solid white;">Triwulan 3</th>
                                <th colspan="3" class="text-center"
                                    style="vertical-align:middle; border:1px solid white;">Triwulan 4</th>
                            </tr>
                            <tr>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">V
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">D
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">B
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">V
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">D
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">B
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">V
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">D
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">B
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">V
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">D
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">B
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">V
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">D
                                </th>
                                <th class="text-center" style="vertical-align:middle; border:1px solid white; width:5%">B
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-mr-body">
                            @php
                                $vr = 0;
                                $dr = 0;
                                $br = 0;
                                $v1 = 0;
                                $d1 = 0;
                                $b1 = 0;
                                $v2 = 0;
                                $d2 = 0;
                                $b2 = 0;
                                $v3 = 0;
                                $d3 = 0;
                                $b3 = 0;
                                $v4 = 0;
                                $d4 = 0;
                                $b4 = 0;
                            @endphp
                            @foreach ($data->unit as $item)
                                @if (!$item->verifikasi)
                                    @php
                                        $color = '#c50909';
                                    @endphp
                                @elseif ($item->verifikasi < 3)
                                    @php
                                        $color = '#d8b802';
                                    @endphp
                                @else
                                    @php
                                        $color = '#048504';
                                    @endphp
                                @endif
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="color: {{ $color }}">{{ $item->NAMA }}</td>
                                    @if (!$item->verifikasi && !$item->triwulan)
                                        @php
                                            $br++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                    @elseif ($item->verifikasi < 3 && !$item->triwulan)
                                        @php
                                            $dr++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                    @else
                                        @php
                                            $vr++;
                                        @endphp
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    @endif
                                    @if ((!$item->verifikasi && $item->triwulan == 1) || ($item->verifikasi <= 3 && !$item->triwulan))
                                        @php
                                            $b1++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                    @elseif ($item->verifikasi < 3 && $item->triwulan == 1)
                                        @php
                                            $d1++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>asdasdas
                                        <td class="text-center"></td>
                                    @else
                                        @php
                                            $v1++;
                                        @endphp
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    @endif
                                    @if ((!$item->verifikasi && $item->triwulan == 2) ||
                                        ($item->verifikasi <= 3 && $item->triwulan == 1) ||
                                        ($item->verifikasi <= 3 && !$item->triwulan))
                                        @php
                                            $b2++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                    @elseif ($item->verifikasi < 3 && $item->triwulan == 2)
                                        @php
                                            $d2++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                    @else
                                        @php
                                            $v2++;
                                        @endphp
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    @endif
                                    @if ((!$item->verifikasi && $item->triwulan == 3) ||
                                        ($item->verifikasi <= 3 && $item->triwulan <= 2) ||
                                        ($item->verifikasi <= 3 && !$item->triwulan))
                                        @php
                                            $b3++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                    @elseif ($item->verifikasi < 3 && $item->triwulan == 3)
                                        @php
                                            $d3++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                    @else
                                        @php
                                            $v3++;
                                        @endphp
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    @endif
                                    @if ((!$item->verifikasi && $item->triwulan == 4) ||
                                        ($item->verifikasi <= 3 && $item->triwulan <= 3) ||
                                        ($item->verifikasi <= 3 && !$item->triwulan))
                                        @php
                                            $b4++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                    @elseif ($item->verifikasi < 3 && $item->triwulan == 4)
                                        @php
                                            $d4++;
                                        @endphp
                                        <td class="text-center"></td>
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                    @else
                                        @php
                                            $v4++;
                                        @endphp
                                        <td class="text-center"><span class="fa fa-check"></span></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-mr-foot">
                            <tr>
                                <td colspan="2">Total Jumlah</td>
                                {{-- Komitmen MR --}}
                                <td class="text-center" style="background-color: #048504; color: #fff">
                                    {{ $vr }}
                                </td>
                                <td class="text-center" style="background-color: #d8b802; color: #fff">
                                    {{ $dr }}
                                </td>
                                <td class="text-center" style="background-color: #c50909; color: #fff">
                                    {{ $br }}
                                </td>
                                {{-- Triwulan 1 --}}
                                <td class="text-center" style="background-color: #048504; color: #fff">
                                    {{ $v1 }}
                                </td>
                                <td class="text-center" style="background-color: #d8b802; color: #fff">
                                    {{ $d1 }}
                                </td>
                                <td class="text-center" style="background-color: #c50909; color: #fff">
                                    {{ $b1 }}
                                </td>
                                {{-- Triwulan 2 --}}
                                <td class="text-center" style="background-color: #048504; color: #fff">
                                    {{ $v2 }}
                                </td>
                                <td class="text-center" style="background-color: #d8b802; color: #fff">
                                    {{ $d2 }}
                                </td>
                                <td class="text-center" style="background-color: #c50909; color: #fff">
                                    {{ $b2 }}
                                </td>
                                {{-- Triwulan 3 --}}
                                <td class="text-center" style="background-color: #048504; color: #fff">
                                    {{ $v3 }}
                                </td>
                                <td class="text-center" style="background-color: #d8b802; color: #fff">
                                    {{ $d3 }}
                                </td>
                                <td class="text-center" style="background-color: #c50909; color: #fff">
                                    {{ $b3 }}
                                </td>
                                {{-- Triwulan 4 --}}
                                <td class="text-center" style="background-color: #048504; color: #fff">
                                    {{ $v4 }}
                                </td>
                                <td class="text-center" style="background-color: #d8b802; color: #fff">
                                    {{ $d4 }}
                                </td>
                                <td class="text-center" style="background-color: #c50909; color: #fff">
                                    {{ $b4 }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <p>Keterangan : </p>
                    <p>V : Terverifikasi</p>
                    <p>D : Draft, Dalam verifikasi UKI Uker/UPT, Dalam verifikasi UKI Unor</p>
                    <p>B : Belum membuat</p>
                </div>
            </div>
        </div>
    </div>
@endsection
