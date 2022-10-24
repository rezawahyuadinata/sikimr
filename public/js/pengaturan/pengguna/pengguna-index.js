var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw();
    $('#modal-data').modal('hide');
    $('#modal-access').modal('hide');
}

function accessData(id) {
    var dataSet = tableData.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    $('#pengguna_id').val(data[0].id);

    $('#list-akses').html('');

    var html = '';

    $.each(data[0].pengguna_akses, function (idx, val) {
        html += '<tr>';
        html += '<td>' + (idx + 1) + '</td>';
        html += '<td>' + val.pengguna_kategori_nama + '</td>';
        html += '<td>' + renderStatus(val.pengguna_akses_aktif) + '</td>';
        html += '<td><button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + val.pengguna_akses_id + '\', \'' + baseUrl + '/destroy_kategori/' + val.pengguna_akses_id + '\')"><i class="fa fa-remove"></i></button></td>';
        html += '</tr>';
    })

    $('#list-akses').html(html);

    $('#modal-access').modal('show');
}

function tambahData() {
    urlAction = urlInsert;

    $('.input').prop('autocomplete', false);

    resetForm('#form-data');
    $('#modal-data').modal('show');
}

function detailData(id) {
    var dataSet = tableData.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    urlAction = urlUpdate;

    resetForm('#form-data');
    toggleForm('#form-data', roleUpdate);

    $('#id').val(data[0].id);
    $('#level').val(data[0].level).trigger('change');
    $('#unit').val(data[0].unit).trigger('change');
    $('#pengguna_kategori_id').val(data[0].pengguna_kategori_id).trigger('change');
    $('#satker_id').val(data[0].satker_id).trigger('change');
    $('#eselon1_id').val(data[0].eselon1_id).trigger('change');
    $('#eselon2_id').val(data[0].eselon2_id).trigger('change');
    $('#name').val(data[0].name);
    $('#username').val(data[0].username);
    $('input[name="active"][value="' + data[0].active + '"]').prop('checked', true);

    if (data[0].pengguna_foto !== null) {
        $('#upload-target').html('<img src="' + mainServerUrl + '/storage/uploads/images/user/' + data[0].pengguna_foto + '" style="width:100%; height:100%;">');
    }

    $('#modal-data').modal('show');
}

function renderStatus(data) {
    if (data == 1) return '<i class="fa fa-check text-success"></i>';

    return '<i class="fa fa-remove text-danger"></i>';
}

function renderAction(data, type, row) {
    var button = '';

    var button = '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'' + row.id + '\')"><i class="fa fa-search"></i></button>';

    if (roleAccess === true) {
        // button += '<button type="button" class="btn btn-success btn-xs pull-right" onclick="accessData(\'' + row.id + '\')"><i class="fa fa-users"></i></button>';
    }

    if (roleDestroy === true) {
        if (row.active == true) {
            button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/' + row.id + '\')"><i class="fa fa-remove"></i></button>';
        }
    }


    return button;
}

function renderLevel(data, type, row) {
    if (data != null) return data;

    return 'Unit Organisasi';
}

function renderNama(data, type, row) {
    if (row.nama_satker) return row.nama_satker;
    if (row.nama_eselon1) return row.nama_eselon1;
    if (row.nama_eselon2) return row.nama_eselon2;

    return ''
}

function setTable() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        null,
        null,
        { data: 'unit', render: renderLevel },
        null,
        { data: 'satker_nama', searchable: false, render: renderNama },
        null,
        null,
        { data: 'active', render: renderStatus },
        { data: 'id', render: renderAction }
    ];
    var reqData = null;

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function () {
    setTable();
    $('.satker').hide();
    $('.t2').hide();
    $('.t1').hide();
    $('.kelompok').hide();
    $('.ppk').hide();

    $('#level').on('change', function () {
        var level = $('#level option:selected').text();

        if (level == 'PPK') {
            $('.satker').show();
            $('.t2').hide();
            $('.t1').hide();
            $('.kelompok').show();
            $('.ppk').show();
        } else if (level == 'UPR-T3') {
            $('.satker').show();
            $('.t2').hide();
            $('.t1').hide();
            $('.kelompok').show();
            $('.ppk').hide();
        } else if (level == 'UPR-T2') {
            $('.satker').hide();
            $('.t2').show();
            $('.t1').hide();
            $('.kelompok').show();
            $('.ppk').hide();
        } else if (level == 'UPR-T1') {
            $('.satker').hide();
            $('.t2').hide();
            $('.t1').show();
            $('.kelompok').hide();
            $('.ppk').hide();
        }
    })

    $('.unitkerja').on('change', function () {
        var pejabat = $(this).children("option:selected").data('pejabat');
        var jabatan = $(this).children("option:selected").data('jabatan');
        var nip = $(this).children("option:selected").data('nip');

        $('#name').val(pejabat)
        $('#jabatan').val(jabatan)
        $('#nip').val(nip)

    })

    $('#form-data').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);

            ajaxData(urlAction, reqData, refresh, true);
        }
    });
});