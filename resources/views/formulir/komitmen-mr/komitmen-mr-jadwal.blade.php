<style>
    a {
        cursor: pointer;
    }
</style>
@php
    use App\Helpers\AppHelper;
@endphp
<h3><b>6. Jadwal Pelaksanaan</b></h3>
<div class="row">
    <div class="col-lg-12 table-responsive" id="print-jadwal">
        @foreach ($data->tahun as $keyyear => $year)
            <table id="table-jadwal" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th rowspan="3" style="text-align: center">No</th>
                        <th rowspan="3" style="text-align: center">Tahap Proses MR</th>
                        <th colspan="48" style="text-align: center">Tahun {{ $keyyear }}</th>
                        <th rowspan="3" style="text-align: center">Keterangan</th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i <= 12; $i++) {
                            echo '<th colspan="4" style="text-align:center">' . AppHelper::getMonthIndo($i) . '</th>';
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
                                    <a class="btn-jadwal" data-year="{{ $keyyear }}" data-id="{{ $item->id }}"
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
                                    <td>
                                        @if ($row->jenis == 'inovasi')
                                            {{-- catatan: {{ $row->resiko_kode }} --}}
                                            {{ $item->urutan . '.' . $row->urutan }}
                                        @else
                                            {{ $item->urutan . '.' . $row->urutan }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row->jenis == 'inovasi')
                                            {{ $row->resiko_kode }}
                                        @else
                                            <a class="btn-jadwal" data-year="{{ $keyyear }}"
                                                data-id="{{ $row->id }}"
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
                                    <td style="white-space: normal">
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

<div class="modal fade" id="modal-jadwal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-jadwal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-jadwal-title">Form Jadwal </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="m_jadwal_id" id="m_jadwal_id" required>
                    <input type="hidden" class="form-control" name="t_jadwal_id" id="t_jadwal_id" required>
                    <input type="hidden" class="form-control" name="year" id="year" required>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th rowspan="2">Bulan</th>
                                    <th colspan="4">Minggu</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    @for ($y = 1; $y <= 4; $y++)
                                        <td>{{ $y }}</td>
                                    @endfor
                                    <td>
                                        <input type="checkbox" name="check_all">
                                    </td>
                                </tr>
                                @php
                                    $no = 1;
                                @endphp
                                @for ($i = 1; $i <= 12; $i++)
                                    <tr>
                                        <td>{{ AppHelper::getMonthIndo($i) }}</td>
                                        @for ($y = 1; $y <= 4; $y++)
                                            <td><input type="checkbox" class="minggu_{{ $no }}"
                                                    name="minggu_id[{{ $no++ }}]"></td>
                                        @endfor
                                        <td>
                                            <input type="checkbox" name="check_minggu">
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

        })
    </script>
@endpush
