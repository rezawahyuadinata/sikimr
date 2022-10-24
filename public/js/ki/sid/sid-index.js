var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    $('#modal-data').modal('hide');
}

function tambahData() {
    resetForm('#form-data');

    urlAction = urlInsert;
    $('#modal-data').modal('show');
}

function detailData(id) {
    console.log(id);
    var dataSet = tableData.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    urlAction = urlUpdate;

    toggleForm('#form-data', roleUpdate);
    resetForm('#form-data');

    $('#id').val(data[0].id);
    $('#kdpaket').val(data[0].kdpaket).trigger("change");
    $('#sid_tahun').val(data[0].sid_tahun);
    $('#sid_pemrakarsa').val(data[0].sid_pemrakarsa);
    $('#sid_ee').val(data[0].sid_ee);
    $('#sid_lingkup_pekerjaan').val(data[0].sid_lingkup_pekerjaan);
    $('#sid_outcome').val(data[0].sid_outcome);
    $('#desain_tahun').val(data[0].desain_tahun);
    $('#desain_pemrakarsa').val(data[0].desain_pemrakarsa);
    $('#desain_ee').val(data[0].desain_ee);
    $('#desain_lingkup_kerja').val(data[0].desain_lingkup_kerja);
    $('#desain_outcome').val(data[0].desain_outcome);
    $('#lingkungan_tahun').val(data[0].lingkungan_tahun);
    $('#lingkungan_pemrakarsa').val(data[0].lingkungan_pemrakarsa);
    $('#lingkungan_no_ijin').val(data[0].lingkungan_no_ijin);
    $('#lingkungan_masa_laku').val(data[0].lingkungan_masa_laku);
    $('#larap_tahun').val(data[0].larap_tahun);
    $('#larap_pemrakarsa').val(data[0].larap_pemrakarsa);
    $('#larap_objek').val(data[0].larap_objek);
    $('#sertifikasi_pengisian_no').val(data[0].sertifikasi_pengisian_no);
    $('#sertifikasi_pengisian_catatan').val(data[0].sertifikasi_pengisian_catatan);
    $('#rencana_no').val(data[0].rencana_no);
    $('#rencana_program').val(data[0].rencana_program).trigger('change');
    $('#rencana_tindak_lanjut').val(data[0].rencana_tindak_lanjut);
    $('#rencana_keterkaitan').val(data[0].rencana_keterkaitan);
    $('#pola_pengelolaan_sda_no').val(data[0].pola_pengelolaan_sda_no);
    $('#pola_pengelolaan_sda_program').val(data[0].pola_pengelolaan_sda_program).trigger('change');
    $('#pola_pengelolaan_sda_tindak_lanjut').val(data[0].pola_pengelolaan_sda_tindak_lanjut);
    $('#pola_pengelolaan_sda_keterkaitan').val(data[0].pola_pengelolaan_sda_keterkaitan);
    $('#rencana_pengelolaan_sda_no').val(data[0].rencana_pengelolaan_sda_no);
    $('#rencana_pengelolaan_sda_program').val(data[0].rencana_pengelolaan_sda_program).trigger('change');
    $('#rencana_pengelolaan_sda_tindak_lanjut').val(data[0].rencana_pengelolaan_sda_tindak_lanjut);
    $('#rencana_pengelolaan_sda_keterkaitan').val(data[0].rencana_pengelolaan_sda_keterkaitan);

    $('#table-sertifikasi-desain').html(`
    <tr>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
            <button type="button" class="btn btn-primary btn-sm" onclick="addDataDesign()"><i class="fa fa-plus"></i></button>
        </td>
    </tr>
    `);
    $('#table-sertifikasi-op').html(`
    <tr>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
            <button type="button" class="btn btn-primary btn-sm" onclick="addDataSOP()"><i class="fa fa-plus"></i></button>
        </td>
    </tr>
    `);
    $('#table-sertifikasi-pop').html(`
    <tr>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
            <button type="button" class="btn btn-primary btn-sm" onclick="addDataPOP()"><i class="fa fa-plus"></i></button>
        </td>
    </tr>
    `);

    var sertifikasi_desain = data[0].sertifikasi_desain.split(';');
    $.each(sertifikasi_desain, function (i, v) {
        addDataDesign();
        sertifikasi_desain_detail = v.split(':')
        $($('.sertifikasi_desain_no')[i]).val(sertifikasi_desain_detail[0]);
        $($('.sertifikasi_desain_lingkup_pekerjaan')[i]).val(sertifikasi_desain_detail[1]).trigger('change');
        $($('.sertifikasi_desain_catatan_penting')[i]).val(sertifikasi_desain_detail[2]);
    })

    var sertifikasi_op = data[0].sertifikasi_op.split(';');
    $.each(sertifikasi_op, function (i, v) {
        addDataSOP();
        sertifikasi_op_detail = v.split(':')
        $($('.sertifikasi_op_no')[i]).val(sertifikasi_op_detail[0]);
        $($('.sertifikasi_op_catatan')[i]).val(sertifikasi_op_detail[1]);
    })

    var persiapan_op = data[0].persiapan_op.split(';');
    $.each(persiapan_op, function (i, v) {
        addDataPOP();
        persiapan_op_detail = v.split(':')
        $($('.persiapan_op_pop')[i]).val(persiapan_op_detail[0]).trigger('change');;
        $($('.persiapan_op_catatan')[i]).val(persiapan_op_detail[1]);
    })

    $('#modal-data').modal('show');
}

function renderStatus(data) {
    if (data == 1) return '<i class="fa fa-check text-success"></i>';

    return '<i class="fa fa-remove text-danger"></i>';
}

function renderAction(data, type, row) {
    var button = '';

    var button = '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'' + row.id + '\')"><i class="fa fa-search"></i></button>';

    if (roleDestroy === true) {
        button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/' + row.id + '\')"><i class="fa fa-remove"></i></button>';
    }


    return button;
}

function setTable() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'nmpaket' },
        { data: 'sid_tahun' },
        { data: 'sid_pemrakarsa' },
        { data: 'sid_ee' },
        { data: 'sid_lingkup_pekerjaan' },
        { data: 'sid_outcome' },
        { data: 'desain_tahun' },
        { data: 'desain_pemrakarsa' },
        { data: 'desain_ee' },
        { data: 'desain_lingkup_kerja' },
        { data: 'desain_outcome' },
        { data: 'lingkungan_tahun' },
        { data: 'lingkungan_pemrakarsa' },
        { data: 'lingkungan_no_ijin' },
        { data: 'lingkungan_masa_laku' },
        { data: 'larap_tahun' },
        { data: 'larap_pemrakarsa' },
        { data: 'larap_objek' },
        { data: 'sertifikasi_desain' },
        { data: 'sertifikasi_pengisian_no' },
        { data: 'sertifikasi_pengisian_catatan' },
        { data: 'sertifikasi_op' },
        { data: 'persiapan_op' },
        { data: 'rencana_no' },
        { data: 'rencana_program' },
        { data: 'rencana_tindak_lanjut' },
        { data: 'rencana_keterkaitan' },
        { data: 'pola_pengelolaan_sda_no' },
        { data: 'pola_pengelolaan_sda_program' },
        { data: 'pola_pengelolaan_sda_tindak_lanjut' },
        { data: 'pola_pengelolaan_sda_keterkaitan' },
        { data: 'rencana_pengelolaan_sda_no' },
        { data: 'rencana_pengelolaan_sda_program' },
        { data: 'rencana_pengelolaan_sda_tindak_lanjut' },
        { data: 'rencana_pengelolaan_sda_keterkaitan' },
        { data: 'id', render: renderAction }
    ];
    var reqData = null;

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function () {
    setTable();

    $('#form-data').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);

            ajaxData(urlAction, reqData, refresh, true);
        }
    });

    $('.form-rencana-tindak-lanjut').hide();
    $('#rencana_program').change(function () {
        if ($(this).val() == 'Tidak Sesuai') {
            $('.form-rencana-tindak-lanjut').show();
        } else {
            $('.form-rencana-tindak-lanjut').hide();
            $('#penyebab_terlambat').val('');
        }
    })

    $('.form-pola_pengelolaan_sda_tindak_lanjut').hide();
    $('#pola_pengelolaan_sda_program').change(function () {
        if ($(this).val() == 'Tidak Sesuai') {
            $('.form-pola_pengelolaan_sda_tindak_lanjut').show();
        } else {
            $('.form-pola_pengelolaan_sda_tindak_lanjut').hide();
            $('#pola_pengelolaan_sda_tindak_lanjut').val('');
        }
    })
    $('.form-rencana_pengelolaan_sda_tindak_lanjut').hide();
    $('#rencana_pengelolaan_sda_program').change(function () {
        if ($(this).val() == 'Tidak Sesuai') {
            $('.form-rencana_pengelolaan_sda_tindak_lanjut').show();
        } else {
            $('.form-rencana_pengelolaan_sda_tindak_lanjut').hide();
            $('#rencana_pengelolaan_sda_tindak_lanjut').val('');
        }
    })

});

function deleteDataDesign(el) {
    $(el).closest("tr").remove();
}

function addDataDesign() {
    $('#table-sertifikasi-desain').append(`<tr>
    <td>
        <div class="form-group col-lg-12 form-hide">
            <label for="sertifikasi_desain_no">No/Tanggal</label>
            <input type="text" class="form-control sertifikasi_desain_no" name="sertifikasi_desain_no[]" id="sertifikasi_desain_no" placeholder="Masukkan No Sertifikasi Desain">
        </div>
    </td>
    <td>
        <div class="form-group col-lg-12 form-hide">
            <label for="sertifikasi_desain_lingkup_pekerjaan">Lingkup Pekerjaan</label>
            <select name="sertifikasi_desain_lingkup_pekerjaan[]" id="sertifikasi_desain_lingkup_pekerjaan" class="form-control select2 sertifikasi_desain_lingkup_pekerjaan">
                <option>Tidak Ada</option>
                <option>Ada</option>
            </select>
        </div>
    </td>
    <td>
        <div class="form-group col-lg-12 form-hide">
            <label for="sertifikasi_desain_catatan_penting">Catatan Penting</label>
            <input type="text" class="form-control sertifikasi_desain_catatan_penting" name="sertifikasi_desain_catatan_penting[]" id="sertifikasi_desain_catatan_penting" placeholder="Masukkan Catatan Penting">
        </div>
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDataDesign(this)"><i class="fa fa-trash"></i></button>
    </td>
</tr>`)
}

function deleteDataSOP(el) {
    $(el).closest("tr").remove();
}

function addDataSOP() {
    $('#table-sertifikasi-op').append(`<tr>
    <td>
        <div class="form-group col-lg-12 form-hide">
            <label for="sertifikasi_op_no">No/Tanggal</label>
            <input type="text" class="form-control sertifikasi_op_no" name="sertifikasi_op_no[]" id="sertifikasi_op_no" placeholder="Masukkan No Sertifikasi Desain">
        </div>
    </td>
    <td>
        <div class="form-group col-lg-12 form-hide">
            <label for="sertifikasi_op_catatan">Catatan Penting</label>
            <input type="text" class="form-control sertifikasi_op_catatan" name="sertifikasi_op_catatan[]" id="sertifikasi_op_catatan" placeholder="Masukkan Catatan Penting">
        </div>
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDataSOP(this)"><i class="fa fa-trash"></i></button>
    </td>
</tr>`)
}

function deleteDataPOP(el) {
    $(el).closest("tr").remove();
}

function addDataPOP() {
    $('#table-sertifikasi-pop').append(`<tr>
    <td>
        <div class="form-group col-lg-12 form-hide">
            <label for="persiapan_op_pop">POP</label>
            <select name="persiapan_op_pop[]" id="persiapan_op_pop" class="form-control select2 persiapan_op_pop">
                <option>Tidak Ada</option>
                <option>Ada</option>
            </select>
        </div>
    </td>
    <td>
        <div class="form-group col-lg-12 form-hide">
            <label for="persiapan_op_catatan">Catatan Penting</label>
            <input type="text" class="form-control persiapan_op_catatan" name="persiapan_op_catatan[]" id="sertifikasi_desain_catatan_penting" placeholder="Masukkan Catatan Penting">
        </div>
    </td>
    <td>
        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDataPOP(this)"><i class="fa fa-trash"></i></button>
    </td>
</tr>`)
}