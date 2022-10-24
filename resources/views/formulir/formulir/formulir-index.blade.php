    @extends('layouts.layout_menu_all')

@section('content')
@php
    use App\Helpers\AppHelper;
@endphp
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header text-center; label label-primary">
                <h4 for="">{{ $data->user->satker ? $data->user->satker->NAMA : '-' }}</h4>
                <h4 for="">{{ $data->user->level }}</h4>
            </div>
            <div class="box-body">
                <div class="row col-lg-2">
                    <label for="">Tahun Periode</label>
                </div>
                <div class="row col-lg-1">
                   <select name="year" id="year" class="form-control">
                        @for ($i = 2021; $i <= date('Y')+1; $i++)
                            <option value="{{ $i }}" {{ $data->tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="row col-lg-12">
                    <table id="table-data-1" class="display table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" data-orderable="false">#</th>
                                <th rowspan="2" data-orderable="true">Tingkat</th>
                                <th rowspan="2" data-orderable="true"><center>UPR</center></th>
                                <th rowspan="2" data-orderable="true">Periode</th>
                                <th colspan="3"><center>Komitmen MR</center></th>

                                <th colspan="4"><center>Laporan Penerapan MR</center></th>
                            </tr>
                            <tr>
                                <th data-orderable="true">Status</th>
                                <th data-orderable="true">Catatan Verifikasi</th>
                                <th>Komitmen MR</th>
                                <th>Triwulan 1</th>
                                <th>Triwulan 2</th>
                                <th>Triwulan 3</th>
                                <th>Triwulan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data->satker_list) < 1)
                                <tr>
                                    <td colspan="11"> Data kosong. </td>
                                </tr>
                            @endif
                            @foreach ($data->satker_list as $k1 => $lv1)
                                <tr>
                                    <td>{{ ($k1 +1 ) }}</td>
                                    <td>{{ $lv1->level }}</td>
                                    <td>{{ $lv1->NAMA }}</td>
                                    <td>{{ $lv1->mr_periode }}</td>
                                    <td>{{ AppHelper::status($lv1->verifikasi) }}</td>
                                    <td>{{ $lv1->verifikasi_catatan }}</td>
                                    <td>
                                        <button type="button" data-toggle="tooltip" data-placement="left" title="Lihat" class="btn btn-default btn-xs" onclick="detailFormulir('{{ $lv1->mr_id }}')"><i class="fa fa-file"></i></button>
                                        @if ($lv1->verifikasi == 0)
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-info btn-xs" onclick="updateFormulir('{{ $lv1->mr_id }}')"><i class="fa fa-edit"></i></button>
                                             <button type="button" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-xs" onclick="deleteData('{{ $lv1->mr_id }}', '{{ url('formulir/formulir/delete_data/'. $lv1->mr_id) }}')"><i class="fa fa-remove"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($lv1->verifikasi == 3)
                                            @if ($lv1->triwulan_1 != null)
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('{{ $lv1->triwulan_1->pemantauan_id }}')"><i class="fa fa-file"></i></button> <br>
                                                @if ($lv1->triwulan_1->verifikasi == 0)
                                                    <a href="{{ url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_1->pemantauan_id) }}" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @else
                                                    {{ AppHelper::status($lv1->triwulan_1->verifikasi) }} <br>
                                                @endif
                                            @else
                                                <a href="{{ url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=1') }}" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($lv1->triwulan_1->verifikasi) && $lv1->triwulan_1->verifikasi == 3)
                                            @if ($lv1->triwulan_2 != null)
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('{{ $lv1->triwulan_2->pemantauan_id }}')"><i class="fa fa-file"></i></button> <br>
                                                @if ($lv1->triwulan_2->verifikasi == 0)
                                                    <a href="{{ url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_2->pemantauan_id) }}" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @else
                                                    {{ AppHelper::status($lv1->triwulan_2->verifikasi) }}
                                                @endif
                                            @else
                                                <a href="{{ url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=2') }}" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($lv1->triwulan_2->verifikasi) && $lv1->triwulan_2->verifikasi == 3)
                                            @if ($lv1->triwulan_3 != null)
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('{{ $lv1->triwulan_3->pemantauan_id }}')"><i class="fa fa-file"></i></button> <br>
                                                @if ($lv1->triwulan_3->verifikasi == 0)
                                                    <a href="{{ url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_3->pemantauan_id) }}" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @else
                                                    {{ AppHelper::status($lv1->triwulan_3->verifikasi) }}
                                                @endif
                                            @else
                                                <a href="{{ url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=3') }}" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($lv1->triwulan_3->verifikasi) && $lv1->triwulan_3->verifikasi == 3)
                                            @if ($lv1->triwulan_4 != null)
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailPemantauan('{{ $lv1->triwulan_4->pemantauan_id }}')"><i class="fa fa-file"></i></button> <br>
                                                @if ($lv1->triwulan_4->verifikasi == 0)
                                                    <a href="{{ url('/formulir/pemantauan-mr?pemantauan_id='. $lv1->triwulan_4->pemantauan_id) }}" class="label label-info" style="margin: 1px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @else
                                                    {{ AppHelper::status($lv1->triwulan_4->verifikasi) }}
                                                @endif
                                            @else
                                                <a href="{{ url('/formulir/pemantauan-mr?mr_id='. $lv1->mr_id . '&triwulan=4') }}" class="label label-primary" style="margin: 1px;">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @if (isset($lv1->child))
                                    @foreach ($lv1->child as $k2 => $lv2)
                                        <tr>
                                            <td>{{ ($k1 +1 ) . '.' . ($k2 +1) }}</td>
                                            <td>{{ $lv2->level }}</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $lv2->NAMA }}</td>
                                            <td>{{ $lv2->mr_periode }}</td>
                                            <td>{{ AppHelper::status($lv2->verifikasi) }}</td>
                                            <td>{{ $lv2->verifikasi_catatan }}</td>
                                            <td>
                                                <button type="button" class="btn btn-default btn-xs" onclick="detailFormulir('{{ $lv2->mr_id }}')"><i class="fa fa-file"></i></button>
                                            </td>
                                        </tr>
                                        @if (isset($lv2->child))
                                            @foreach ($lv2->child as $k3 => $lv3)
                                                <tr>
                                                    <td>{{ ($k1 +1 ) . '.' . ($k2 +1). '.' . ($k3 +1) }}</td>
                                                    <td>{{ $lv3->level }}</td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $lv3->NAMA }}</td>
                                                    <td>{{ $lv3->mr_periode }}</td>
                                                    <td>{{ AppHelper::status($lv3->verifikasi) }}</td>
                                                    <td>{{ $lv3->verifikasi_catatan }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-default btn-xs" onclick="detailFormulir('{{ $lv3->mr_id }}')"><i class="fa fa-file"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var urlData = '{{ route( $data->page->class . ".read") }}';
    var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
</script>
@endsection
