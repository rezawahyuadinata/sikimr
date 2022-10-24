<div class="row">
    <div class="col-lg-12">
        <table id="table-peta" class="table table-bordered" width="100%">
            <tr>
                <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center">Peta Risiko</th>
            </tr>
            @foreach ($data->peta as $item)
                <tr>
                    <td style="width: 15%;">{{ $item->level_kemungkinan }}</td>
                    <td style="width: 5%;">{{ $item->nilai }}</td>
                    @foreach ($item->dampak as $val)
                        <td style="width: 16%; background-color: rgb({{ $val->nilai->r . ',' . $val->nilai->g . ',' . $val->nilai->b }}">{{ $val->nilai ? $val->nilai->nilai : '-' }}</td>
                    @endforeach
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                @foreach ($data->kriteria_dampak as $val)
                    <td>{{ $val->nilai }}</td>
                @endforeach
            </tr>
            <tr>
                <td></td>
                <td></td>
                @foreach ($data->kriteria_dampak as $val)
                    <td>{{ $val->dampak }}</td>
                @endforeach
            </tr>
            <tr>
                <th colspan="{{ count($data->kriteria_dampak) + 2 }}" class="text-center">DAMPAK</th>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table id="table-peta" class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th colspan="11" class="text-center">DAFTAR PERNYATAAN RESIKO</th>
                </tr>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Pernyataan Risiko</th>
                    <th colspan="3">Nilai Risiko Yang Melekat</th>
                    <th colspan="3">Nilai Risiko Setelah Pengendalian</th>
                    <th colspan="3">Risiko Yang Direspon</th>
                </tr>
                <tr>
                    @for ($i = 0; $i < 3; $i++)
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
            
        </table>
    </div>
</div>