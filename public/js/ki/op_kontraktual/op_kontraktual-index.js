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
    var dataSet = tableData.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    urlAction = urlUpdate;

    toggleForm('#form-data', roleUpdate);
    resetForm('#form-data');

    $('#id').val(data[0].id);
    $('#kontrak_no').val(data[0].kontrak_no);
    $('#kontrak_penyedia_jasa').val(data[0].kontrak_penyedia_jasa);
    $('#kontrak_mulai').val(data[0].kontrak_mulai);
    $('#kontrak_selesai').val(data[0].kontrak_selesai);
    $('#kontrak_nilai').val(data[0].kontrak_nilai);
    $('#kontrak_sumber_dana').val(data[0].kontrak_sumber_dana).trigger("change");
    $('#kontrak_jenis').val(data[0].kontrak_jenis).trigger("change");
    $('#addendum_no').val(data[0].addendum_no);
    $('#addendum_perubahan').val(data[0].addendum_perubahan.split(',')).trigger('change');
    $('#addendum_perubahan_lainnya').val(data[0].addendum_perubahan_lainnya);
    $('#addendum_perubahan_keterangan').val(data[0].addendum_perubahan_keterangan);
    $('#addendum_analisis_status').val(data[0].addendum_analisis_status).trigger("change");
    $('#addendum_analisis_keterangan').val(data[0].addendum_analisis_keterangan);
    $('#monev_pergantian_tenaga_inti').val(data[0].monev_pergantian_tenaga_inti).trigger("change");
    $('#monev_progres_rencana').val(data[0].monev_progres_rencana);
    $('#monev_progres_realisasi').val(data[0].monev_progres_realisasi);
    $('#monev_deviasi').val(data[0].monev_deviasi);
    $('#resiko_program_terkait').val(data[0].resiko_program_terkait);
    $('#resiko_anggaran').val(data[0].resiko_anggaran);
    $('#resiko_output').val(data[0].resiko_output);
    $('#resiko_outcome').val(data[0].resiko_outcome);
    $('#resiko_penerima_manfaat').val(data[0].resiko_penerima_manfaat);
    $('#pengaduan_status').val(data[0].pengaduan_status).trigger("change");
    $('#pengaduan_jumlah').val(data[0].pengaduan_jumlah);
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
        { data: 'kontrak_no' },
        { data: 'kontrak_penyedia_jasa' },
        { data: 'kontrak_mulai' },
        { data: 'kontrak_selesai' },
        { data: 'kontrak_nilai' },
        { data: 'kontrak_sumber_dana' },
        { data: 'kontrak_jenis' },
        { data: 'addendum_no' },
        { data: 'addendum_perubahan' },
        { data: 'addendum_perubahan_lainnya' },
        { data: 'addendum_perubahan_keterangan' },
        { data: 'addendum_analisis_status' },
        { data: 'addendum_analisis_keterangan' },
        { data: 'monev_pergantian_tenaga_inti' },
        { data: 'monev_progres_rencana' },
        { data: 'monev_progres_realisasi' },
        { data: 'monev_deviasi' },
        { data: 'resiko_program_terkait' },
        { data: 'resiko_anggaran' },
        { data: 'resiko_output' },
        { data: 'resiko_outcome' },
        { data: 'resiko_penerima_manfaat' },
        { data: 'pengaduan_status' },
        { data: 'pengaduan_jumlah' },
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

    $('.form-addendum-lainnya').hide();
    $('#addendum_perubahan').change(function () {
        console.log($(this).val());
        $(this).val().find(function (val) {
            console.log(val);
            if (val == 'Lainnya') {
                $('.form-addendum-lainnya').show();
            } else {
                $('.form-addendum-lainnya').hide();
                $('#addendum_perubahan_lainnya').val('');
            }
        })
    })
});