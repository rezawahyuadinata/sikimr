<div class="row">
    <div class="col-sm-10">
        <h3><b>1. Sasaran Program/Kegiatan</b></h3>
    </div>
    <div class="form-group col-sm-2">
        <button class="btn btn-primary btn-block" onclick="addData('#modal-sasaran', '#form-sasaran')">Tambah</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @if ($data->user->level == 'UPR-T3' || $data->user->level == 'PPK')
            <table id="table-sasaran" class="display table table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th data-orderable="false" style="text-align: center;">Tingkat</th>
                        <th data-orderable="true" style="text-align: center;">Sasaran Kegiatan</th>
                        <th data-orderable="true" style="text-align: center;">Indikator Sasaran</th>
                        <th data-orderable="true" style="text-align: center;">Kegiatan Utama</th>
                        <th data-orderable="true" style="text-align: center;">Tujuan Kegiatan Utama</th>
                        <th data-orderable="false" style="text-align: center;"></th>
                    </tr>
                </thead>
            </table>
        @elseif ($data->user->level == 'UPR-T2' && $data->user->unit != 'Balai')
            <table id="table-sasaran" class="display table table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th data-orderable="false" style="text-align: center;">Tingkat</th>
                        <th data-orderable="true" style="text-align: center;">Sasaran Program</th>
                        <th data-orderable="true" style="text-align: center;">Indikator Sasaran</th>
                        <th data-orderable="true" style="text-align: center;">Kegiatan Utama</th>
                        <th data-orderable="true" style="text-align: center;">Tujuan Kegiatan Utama</th>
                        <th data-orderable="false" style="text-align: center;"></th>
                    </tr>
                </thead>
            </table>
        @else
            <table id="table-sasaran" class="display table table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th data-orderable="false" style="text-align: center;">Tingkat</th>
                        <th data-orderable="true" style="text-align: center;">Sasaran Program/Kegiatan</th>
                        <th data-orderable="true" style="text-align: center;">Indikator Sasaran</th>
                        <th data-orderable="true" style="text-align: center;">Kegiatan Utama</th>
                        <th data-orderable="true" style="text-align: center;">Tujuan Kegiatan Utama</th>
                        <th data-orderable="false" style="text-align: center;"></th>
                    </tr>
                </thead>
            </table>
        @endif
    </div>
</div>


<div class="modal fade" id="modal-sasaran" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form class="form" id="form-sasaran">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-sasaran-title">1. Sasaran Program/Kegiatan</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="paket_sasaran_id" id="paket_sasaran_id" required>
                    <div class="row">
                        @if ($data->user->level == 'UPR-T3' || $data->user->level == 'PPK')
                            <div class="form-group col-sm-12 form-hide">
                                <label for="kegiatan_id">Sasaran Kegiatan</label>
                                <select name="kegiatan_id" id="kegiatan_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data->kegiatan as $item)
                                        <option value="{{ $item->ID }}" data-kode="{{ $item->kode_kegiatan }}">
                                            {{ $item->NAMA }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="sasaran_id">Nama Konteks (Sasaran Kegiatan)</label>
                                <select name="sasaran_id" id="sasaran_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="indikator_sasaran_id">Indikator Sasaran Kegiatan</label>
                                <select name="indikator_sasaran_id" id="indikator_sasaran_id"
                                    class="form-control select2">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-8 form-hide" style="display: none">
                                <label for="isp_text">Indikator Sasaran Kegiatan</label>
                                <textarea name="isp_text" id="isp_text" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group col-sm-4 form-hide">
                                <label for="isp_target">Target (PK)</label>
                                <input type="text" name="isp_target" id="isp_target"
                                    class="form-control separator" rows="2" required>
                            </div>
                            <div class="form-group col-sm-4 form-hide">
                                <label for="isp_satuan">Satuan (PK)</label>
                                <input type="text" name="isp_satuan" id="isp_satuan" class="form-control"
                                    rows="2" required>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="paket_id">Kegiatan Utama</label>
                                <select name="paket_id" id="paket_id" class="form-control select2"
                                    onchange="TujuanKegiatan()">
                                    <option value="">- Pilih -</option>
                                    {{-- catatan: @foreach ($data->paket_pekerjaan as $item)
                                    <option value=" {{ $item->id }}">{{ $item->nmpaket }}</option>
                                    @endforeach --}}
                                </select>
                                <span class="text-danger" id="notif">Data paket tidak ditemukan.</span>
                            </div>
                            <div class="form-group col-sm-8 form-hide">
                                <label for="kegiatan_tujuan">Tujuan Kegiatan Utama</label>
                                <textarea name="kegiatan_tujuan" id="kegiatan_tujuan" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group col-sm-2 form-hide">
                                <label for="tujuan_kegiatan">Target (Paket)</label>
                                <input type="text" name="tujuan_kegiatan" id="tujuan_kegiatan"
                                    class="form-control separator" rows="5" required>
                            </div>
                            <div class="form-group col-sm-2 form-hide">
                                <label for="tujuan_kegiatan_satuan">Satuan (Paket)</label>
                                <input type="text" name="tujuan_kegiatan_satuan" id="tujuan_kegiatan_satuan"
                                    class="form-control" rows="5" required>
                            </div>
                        @elseif ($data->user->level == 'UPR-T2' && $data->user->unit != 'Balai')
                            <input type="hidden" name="unit" id="unit" value="{{ $data->user->unit }}">
                            <div class="form-group col-sm-12 form-hide">
                                <label for="kegiatan_id">Sasaran Kegiatan</label>
                                <select name="kegiatan_id" id="kegiatan_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data->kegiatan as $item)
                                        <option value="{{ $item->ID }}" data-kode="{{ $item->kode_kegiatan }}">
                                            {{ $item->kode_kegiatan }} - {{ $item->NAMA }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="sasaran_id">Nama Konteks (Sasaran Program/Kegiatan)</label>
                                <select name="sasaran_id" id="sasaran_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="indikator_sasaran_id">Indikator Sasaran</label>
                                <select name="indikator_sasaran_id" id="indikator_sasaran_id"
                                    class="form-control select2">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="kegiatan">Kegiatan Utama</label>
                                <textarea name="kegiatan" id="kegiatan" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group col-sm-8 form-hide">
                                <label for="kegiatan_tujuan">Tujuan Kegiatan Utama</label>
                                <textarea name="kegiatan_tujuan" id="kegiatan_tujuan" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group col-sm-2 form-hide">
                                <label for="tujuan_kegiatan">Target</label>
                                <input type="text" name="tujuan_kegiatan" id="tujuan_kegiatan"
                                    class="form-control separator" rows="5" required>
                            </div>
                            <div class="form-group col-sm-2 form-hide">
                                <label for="tujuan_kegiatan_satuan">Satuan</label>
                                <input type="text" name="tujuan_kegiatan_satuan" id="tujuan_kegiatan_satuan"
                                    class="form-control" rows="5" required>
                            </div>
                        @else
                            <input type="hidden" name="unit" id="unit" value="{{ $data->user->unit }}">
                            <div class="form-group col-sm-12 form-hide">
                                <label for="program_id">Sasaran Program</label>
                                <select name="program_id" id="program_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data->program as $item)
                                        <option value="{{ $item->ID }}">{{ $item->SASARAN }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="ip_id">Indikator Sasaran Program</label>
                                <select name="ip_id" id="ip_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-8 form-hide" style="display: none">
                                <label for="isp_text">Indikator Sasaran Kegiatan</label>
                                <textarea name="isp_text" id="isp_text" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group col-sm-4 form-hide">
                                <label for="isp_target">Target</label>
                                <input type="text" name="isp_target" value="" id="isp_target"
                                    class="form-control separator" rows="2" required>
                            </div>
                            <div class="form-group col-sm-4 form-hide">
                                <label for="isp_satuan">Satuan</label>
                                <input type="text" name="isp_satuan" value="" id="isp_satuan"
                                    class="form-control" rows="2" required>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="kegiatan_id">Kegiatan Utama</label>
                                <select name="kegiatan_id" id="kegiatan_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    @foreach ($data->kegiatan as $item)
                                        <option value="{{ $item->ID }}" data-kode="{{ $item->kode_kegiatan }}">
                                            {{ $item->kode_kegiatan }} - {{ $item->NAMA }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="sasaran_id">Sasaran Kegiatan</label>
                                <select name="sasaran_id" id="sasaran_id" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 form-hide">
                                <label for="indikator_sasaran_id">Indikator Sasaran Kegiatan</label>
                                <select name="indikator_sasaran_id" id="indikator_sasaran_id"
                                    class="form-control select2">
                                    <option value="">- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-8 form-hide">
                                <label for="kegiatan_tujuan">Tujuan Kegiatan Utama</label>
                                <textarea name="kegiatan_tujuan" id="kegiatan_tujuan" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="form-group col-sm-2 form-hide">
                                <label for="tujuan_kegiatan">Target</label>
                                <input type="text" name="tujuan_kegiatan" id="tujuan_kegiatan"
                                    class="form-control separator" rows="5" required>
                            </div>
                            <div class="form-group col-sm-2 form-hide">
                                <label for="tujuan_kegiatan_satuan">Satuan</label>
                                <input type="text" name="tujuan_kegiatan_satuan" id="tujuan_kegiatan_satuan"
                                    class="form-control" rows="5" required>
                            </div>
                        @endif
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
        var ip;

        function fillIndikatorProgram(result) {
            $('#ip_id').html('');
            var html = '<option value="" data-indikator="" data-target="" data-satuan="">- Pilih -</option>';
            $.each(result.data, function(idx, val) {
                html += '<option value="' + val.ID + '" data-indikator="' + val.INDIKATOR + '" data-target="' + val
                    .TARGET + '" data-satuan="' + val.SATUAN + '">' + val.INDIKATOR + ' (' + formatCurrency(val
                        .TARGET, 2) + ' ' + val.SATUAN + ') </option>';
            })

            $('#ip_id').append(html);
            $('#ip_id').val(ip).trigger('change')
        }

        $(document).ready(function() {
            $('#program_id').on('change', function() {
                var reqData = {
                    program_id: $(this).val(),
                    tipe: 'indikator_program'
                }
                ajaxData(urlData, reqData, fillIndikatorProgram);
            })

            $('#ip_id').on('change', function() {
                var indikator = $('#ip_id option:selected').data('indikator');
                var target = $('#ip_id option:selected').data('target');
                var satuan = $('#ip_id option:selected').data('satuan');

                $('#isp_text').val(indikator);
                if (action != urlUpdate) {
                    if (isNaN(target)) {
                        $('#isp_target').val('');
                        $('#isp_satuan').val(satuan);
                    } else {
                        $('#isp_target').val(formatCurrency(target));
                        $('#isp_satuan').val(satuan);
                    }
                }
            })
        });
    </script>
@endpush
