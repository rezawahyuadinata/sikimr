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
    $('#nama').val(data[0].nama);

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
        { data: 'nama' },
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

    $('#datetimepicker-TGL_PENGAJUAN').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-TGL_REKOMTEK').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-TGL_TERBIT').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-TGL_MONEV').datetimepicker({
        format: 'YYYY-MM-DD',
    });
});

$('#PENGADUAN').change(function () {
    var pengaduan = $(this).val();
    console.log(pengaduan);
    if (pengaduan == "ADA") {
        $('.btn-pengaduan').show();
    } else {
        $('.btn-pengaduan').hide();
    }
})