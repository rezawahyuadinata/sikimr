<style>
    .inherent {
        background: #001bf2;
        width: 22.5px;
        height: 22.5px;
        border: 1px solid black;
        border-radius: 50%;
        color: #fff;
        text-align: center;
        font-size: 12px;
    }

    .controlled {
        background: #b600d4;
        width: 22.5px;
        height: 22.5px;
        border: 1px solid black;
        border-radius: 50%;
        color: #fff;
        text-align: center;
        font-size: 12px;
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
        width: 22.5px;
        height: 22.5px;
        border: 1px solid black;
        border-radius: 50%;
        color: #000;
        text-align: center;
        font-size: 12px;
    }

    .innerTEXT {
        position: absolute;
    }

    .tabel-indikator {
        border: 1px solid black;
        margin-top: 16%;
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

    #table-peta tbody {
        display: block;
        height: 300px;
        overflow: auto;
    }

    #table-peta thead,
    #table-peta tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }
</style>
<div class="row">
    <div class="col-lg-8">
        <table id="table-peta1" class="table table-bordered" width="50%">
            <tr>
                <th colspan="{{ count($data->kriteria_dampak) + 2 }}">
                    {{-- catatan: <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center"> --}}
                    <h3><b>5. Peta Risiko</b></h3>
                    <h3 style="margin-left: 50%;margin-bottom:25px;"><b>PETA RISIKO</b></h3>
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
                    <td style="width: 10%;font-weight:bold;text-align: center;">{{ $item->level_kemungkinan }}</td>
                    @if ($item->nilai == 5)
                        <td
                            style="width: 5%;border-bottom: 3px solid blue;text-align: center;font-weight:bold;vertical-align: middle;">
                            {{ $item->nilai }}</td>
                    @else
                        <td style="width: 5%;text-align: center;font-weight:bold;vertical-align: middle;">
                            {{ $item->nilai }}</td>
                    @endif
                    @foreach ($item->dampak as $val)
                        @php
                            $nilai = $val->nilai->nilai;
                        @endphp
                        @if ($nilai == 11 || $nilai == 12 || $nilai == 14 || $nilai == 13)
                            <td
                                style="width: 10%;height:5%;border: 2px solid black; border-bottom: 3px solid blue;font-weight:bold;text-align: center; text-align:right;
    vertical-align:top;background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})">
                                {{ $val->nilai ? $val->nilai->nilai : '-' }}
                                <div class=" container-fluid" style="padding-left: 3px">
                                    <div class=" row" id="{{ $val->nilai ? $val->nilai->nilai : '-' }}">
                                    </div>
                                </div>
                            @elseif ($nilai == 6 || $nilai == 8 || $nilai == 10 || $nilai == 9)
                            <td
                                style="width: 10%;height:5%;font-weight:bold;border: 2px solid black;border-right: 3px solid blue;text-align: center; text-align:right;
    vertical-align:top; background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})">
                                {{ $val->nilai ? $val->nilai->nilai : '-' }}
                                <div class=" container-fluid" style="padding-left: 3px">
                                    <div class=" row" id="{{ $val->nilai ? $val->nilai->nilai : '-' }}">
                                    </div>
                                </div>
                            </td>
                        @else
                            <td
                                style="width: 10%;height:5%;border: 2px solid black;font-weight:bold;text-align: center;  text-align:right;
    vertical-align:top;background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }})">
                                {{ $val->nilai ? $val->nilai->nilai : '-' }}
                                <div class=" container-fluid" style="padding-left: 3px">
                                    <div class=" row" id="{{ $val->nilai ? $val->nilai->nilai : '-' }}">
                                    </div>
                                </div>
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
                        <td style="border-left: 3px solid blue;font-weight:bold;text-align: center;">
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
                    <td style="border-bottom: 2px solid black;font-weight:bold;">{{ $val->dampak }}</td>
                @endforeach
            </tr>

            <tr>
                <th></th>
                <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center">DAMPAK</th>
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
                <td style="background-color: rgb(255,0,0)">MERAH</td>
            </tr>
            <tr>
                <td>Tinggi (4)</td>
                <td>16-19</td>
                <td style="background-color: rgb(255,129,0)">ORANYE</td>
            </tr>
            <tr>
                <td>Sedang (3)</td>
                <td>11-15</td>
                <td style="background-color: rgb(255,255,0)">KUNING</td>
            </tr>
            <tr>
                <td>Rendah (2)</td>
                <td>6-10</td>
                <td style="background-color: rgb(121,255,121)">HIJAU MUDA</td>
            </tr>
            <tr>
                <td>Sangat Rendah (1)</td>
                <td>1-5</td>
                <td style="background-color: rgb(0,159,0)">HIJAU</td>
            </tr>
        </table>
        <table class="table table-bordered"
            style="width:300px;heigth:100px;margin-top:20px;font-weight: bold;font-size:18px;">
            <tr>
                <th>Simbol</th>
                <th>Keterangan</th>
                <!-- <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center">

                    </th> -->
            </tr>
            <tr>
                <td style="text-align: -webkit-center;height:50px; width:100px;">
                    {{-- catatan: <div class="inherent">
                        </div> --}}
                    <hr style="width:50px;border: 1px solid blue">
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
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-peta" class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th colspan="11" class="text-center">DAFTAR PERNYATAAN RISIKO</th>
                </tr>
                <tr>
                    <th rowspan="2" style="text-align: center;">No</th>
                    <th rowspan="2" style="text-align: center;">Pernyataan Risiko</th>
                    <th colspan="3" style="text-align: center; background-color: #001bf2; color: #fff;">Nilai Risiko
                        Yang Melekat</th>
                    <th colspan="3" style="text-align: center; background-color: #b600d4; color: #fff;">Nilai Risiko
                        Setelah Pengendalian</th>
                    <th colspan="3" style="text-align: center; background-color: #00bcd4; color: #000;">Risiko Yang
                        Direspon</th>
                </tr>
                <tr>
                    @for ($i = 0; $i < 3; $i++)
                        @if ($i == 0)
                            @php ; @endphp
                        @elseif($i == 1)
                            @php
                            $bgcolor = '#ED88A6'; @endphp
                        @elseif($i == 2)
                            @php $bgcolor='#97D2F4' ; @endphp
                        @else
                            @php
                            $bgcolor = ''; @endphp
                        @endif
                        <th class="text-center">K</th>
                        <th class="text-center">D</th>
                        <th class="text-center">Nilai</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($data->resiko as $item)
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
                        <td class="text-center">{{ $item->inovasi ? $item->inovasi->resiko_kemungkinan : '0' }}
                        </td>
                        <td class="text-center">{{ $item->inovasi ? $item->inovasi->resiko_dampak : '0' }}</td>
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

<script>
    var pointing = @json($data->pointing, JSON_PRETTY_PRINT);

    $(document).ready(function() {
        console.log(pointing)
        $.each(pointing, function(idx, value) {
            $.each(value, function(index, val) {
                inherent = '<div class="inherent">' + val.pernyataan + '</div>'
                controlled = '<div class="controlled">' + val.pernyataan + '</div>'
                respon = '<div class="respon">' + val.pernyataan + '</div>'

                $('#' + val.inherent).append(
                    '<div class="col-md-1">' + inherent +
                    '<br></div>')
                $('#' + val.controlled).append(
                    '<div class="col-md-1">' + controlled +
                    '<br></div>')
                $('#' + val.respon).append(
                    '<div class="col-md-1">' + respon + '<br></div>')
                // $('#' + val.inherent).append('<br>' + val.pernyataan)
                // $('#' + val.controlled).append('<br>' + val.pernyataan)
                // $('#' + val.respon).append('<br>' + val.pernyataan)
            })
        })
    })
</script>
