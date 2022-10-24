@extends('layouts.layout_menu_all')

@section('content')
@php
    use App\Helpers\AppHelper;
@endphp
    @if ($data->status == 'Terkontrak')
        @php
            $jumlah_data = 0;
            $piedata = array();
            foreach ($data->data as $key => $value) {
                $jumlah_data += $value->jumlah;
                $array = array(
                    'name'  => ($value->Jenis_Kontrak) ? $value->Jenis_Kontrak : '-',
                    'y'     => floatval($value->jumlah)
                );

                array_push($piedata, $array);
            }
        @endphp
        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-body">
                        <label for="">{{ $data->status }}</label>
                        <table id="table-data" class="display table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th data-orderable="false">#</th>
                                    <th data-orderable="true">Status</th>
                                    <th data-orderable="true">Jumlah</th>
                                    <th data-orderable="false">Persentase</th>
                                </tr>
                            </thead>
                            @foreach ($data->data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ($item->Jenis_Kontrak) ? $item->Jenis_Kontrak : '-' }}</td>
                                    <td class="text-right">{{ $item->jumlah }}</td>
                                    <td class="text-right">{{ AppHelper::NumberFormat($item->jumlah / $jumlah_data * 100, 2) }}%</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-body">
                        <div id="pie"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var series = @json($piedata);
        </script>
    @endif
@endsection
