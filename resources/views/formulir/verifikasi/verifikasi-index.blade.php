@extends('layouts.layout_menu_all')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-body">
                    <table id="table-data-1" class="display table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" data-orderable="false">#</th>
                                <th rowspan="2" data-orderable="true">Tingkat</th>
                                <th rowspan="2" data-orderable="true">UPR</th>
                                <th rowspan="2" data-orderable="true">Periode</th>
                                <th rowspan="2" data-orderable="true">Verifikasi</th>
                                <th rowspan="2" data-orderable="true">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->komitmen_mr as $k1 => $lv1)
                                @php
                                    switch ($lv1->verifikasi) {
                                        case '0':
                                            $text = 'Draft';
                                            break;

                                        case '1':
                                            $text = 'Menunggu Verifikasi UKI (UKER / UPT)';
                                            break;

                                        case '2':
                                            $text = 'Menunggu Verifikasi UKI (UNOR)';
                                            break;

                                        case '3':
                                            $text = 'Terverifikasi';
                                            break;

                                        default:
                                            $text = 'Draft';
                                            break;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $k1 + 1 }}</td>
                                    <td>{{ $lv1->level }}</td>
                                    <td>
                                        @if ($lv1->satker_nama)
                                            @php
                                                $Nama = $lv1->satker_nama;
                                            @endphp
                                        @elseif ($lv1->eselon1_nama)
                                            @php
                                                $Nama = $lv1->eselon1_nama;
                                            @endphp
                                        @else
                                            @php
                                                $Nama = $lv1->eselon2_nama;
                                            @endphp
                                        @endif
                                        {{ $Nama }}
                                    </td>
                                    <td>{{ $lv1->mr_periode }}</td>
                                    <td>{{ $text }}</td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-xs"
                                            onclick="detailFormulir('{{ $lv1->mr_id }}')"><i
                                                class="fa fa-file"></i></button>
                                        @if ($lv1->verifikasi != 3)
                                            @if ($lv1->verifikasi == 2 && $data->user->level == 'UPR-T1')
                                                <button type="button" class="btn btn-info btn-xs"
                                                    onclick="verifikasiFormulir('{{ $lv1->mr_id }}')"><i
                                                        class="fa fa-edit"></i></button>
                                            @elseif ($lv1->verifikasi == 1 && $data->user->level == 'UPR-T2')
                                                <button type="button" class="btn btn-info btn-xs"
                                                    onclick="verifikasiFormulir('{{ $lv1->mr_id }}')"><i
                                                        class="fa fa-edit"></i></button>
                                            @endif
                                        @else
                                            @if (isset($data->page->fitur->destroy))
                                                <button type="button" class="btn btn-danger btn-xs"
                                                    onclick="cancelVerification('{{ $lv1->mr_id }}', '{{ url($data->page->prefix . '/' . $data->page->class . '/' . $lv1->mr_id) }}' )"><i
                                                        class="fa fa-times"></i></button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($data->komitmen_mr) < 1)
                                <tr>
                                    <td colspan="6">Data Kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="row col-lg-12 text-center">
                        {{ $data->komitmen_mr->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var roleDestroy = {{ isset($data->page->fitur->destroy) ? 'true' : 'false' }};
    </script>
@endsection
