<style>
    a {
        cursor: pointer;
    }
</style>
<div class="row  table-responsive">
    <div class="col-lg-12">
        <table id="table-jadwal" class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th rowspan="3">No</th>
                    <th rowspan="3">Tahap Proses MR</th>
                    <th colspan="48">Bulan</th>
                    <th rowspan="3">Keterangan</th>
                </tr>
                <tr>
                    <?php for ($i=1; $i <= 12; $i++) { 
                        echo '<th colspan="4">Bulan ke-'.$i.'</th>';
                    } ?>
                </tr>
                <tr>
                    <?php for ($i=1; $i <= 12; $i++) { 
                        for ($y=1; $y <= 4; $y++) { 
                            echo '<th>'.$y.'</th>';
                        }
                    } ?>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->jadwal as $item)
                    <tr>
                        <td>
                                {{ $item->urutan }}
                        </td>
                        <td>
                            @if (count($item->child) < 1)
                                <a class="btn-jadwal" data-id="{{ $item->id }}" data-nomor="{{ json_encode($item) }}">{{ $item->nama }}</a>
                            @else
                                {{ $item->nama }}
                            @endif
                        </td>
                        @php
                            $no = 0;
                        @endphp
                        <?php for ($i=1; $i <= 12; $i++) { 
                            for ($y=1; $y <= 4; $y++) { 
                                $text = 'minggu_'.$no;
                                echo '<td>'.(($item->{$text}) ? '<i class="fa fa-check"></i>' : '' ).'</td>';
                                $no++;
                            }
                        } ?>
                    </tr>
                    @foreach ($item->child as $row)
                        <tr>
                            <td>{{ $item->urutan . '.'. $row->urutan }}</td>
                            <td>
                                <a class="btn-jadwal" data-id="{{ $row->id }}"  data-nomor="{{ json_encode($row) }}">{{ $row->nama }}</a> 
                            </td>
                            @php
                                $no = 0;
                            @endphp
                            <?php for ($i=1; $i <= 12; $i++) { 
                                for ($y=1; $y <= 4; $y++) { 
                                    $text = 'minggu_'.$no;
                                    echo '<td>'.(($row->{$text}) ? '<i class="fa fa-check"></i>' : '' ).'</td>';
                                    $no++;
                                }
                            } ?>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-jadwal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-jadwal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-jadwal-title">Form Jadwal </h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="m_jadwal_id" id="m_jadwal_id" required>
                    <input type="hidden" class="form-control" name="t_jadwal_id" id="t_jadwal_id" required>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th rowspan="2">Bulan</th>
                                    <th colspan="4">Minggu</th>
                                </tr>
                                <tr>
                                    @for ($y = 1; $y <= 4; $y++)
                                        <td>{{ $y }}</td>
                                    @endfor
                                </tr>
                                @php
                                    $no = 0;
                                @endphp
                                @for ($i = 1; $i <= 12; $i++)
                                    <tr>
                                        <td>{{ 'Bulan ke-'.$i }}</td>
                                        @for ($y = 1; $y <= 4; $y++)
                                            <td><input type="checkbox" class="minggu_{{ $no++ }}" name="minggu_id[{{ $no++ }}]"></td>
                                        @endfor
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