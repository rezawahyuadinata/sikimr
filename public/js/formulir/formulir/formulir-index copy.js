var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw();
}

function updateFormulir(id) {
    location.href = mainServerUrl + '/formulir/komitmen-mr?mr_id=' + id;
}

function updatePemantauan(id) {
    location.href = mainServerUrl + '/formulir/pemantauan-mr?pemantauan_id=' + id;
}

function updateTinjauan(id) {
    location.href = mainServerUrl + '/formulir/tinjauan-mr?tinjauan_id=' + id;
}

function updatePemantauanResiko(id) {
    location.href = mainServerUrl + '/formulir/pemantauan-resiko?pemantauan_resiko_id=' + id;
}

function renderButtonLink1(data, type, row) {
    if (data == null) {
        return '<a href="'+mainServerUrl+'/formulir/pemantauan-mr"><i class="fa fa-plus"></i></a>';
    }
    button = '<button type="button" class="btn btn-info btn-xs" onclick="updatePemantauan(\'' + row.pemantauan_id + '\')"><i class="fa fa-edit"></i></button>';

    return button;
}

function renderButtonLink2(data, type, row) {
    if (data == null) {
        return '<a href="'+mainServerUrl+'/formulir/tinjauan-mr"><i class="fa fa-plus"></i></a>';
    }
    button = '<button type="button" class="btn btn-info btn-xs" onclick="updateTinjauan(\'' + row.tinjauan_id + '\')"><i class="fa fa-edit"></i></button>';

    return button;
}

function renderButtonLink3(data, type, row) {
    if (data == null) {
        return '<a href="'+mainServerUrl+'/formulir/pemantauan-resiko"><i class="fa fa-plus"></i></a>';
    }
    button = '<button type="button" class="btn btn-info btn-xs" onclick="updatePemantauanResiko(\'' + row.pemantauan_resiko_id + '\')"><i class="fa fa-edit"></i></button>';

    return button;
}

function detailFormulir(id) {
    location.href = mainServerUrl + '/formulir/formulir/detail/' + id;
}

function renderAction(data, type, row) {
    var button = '';
    button += '<button type="button" class="btn btn-default btn-xs pull-right" onclick="detailFormulir(\'' + row.mr_id + '\')"><i class="fa fa-file"></i></button>';

    if (row.mr_status == null) {
        button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="updateFormulir(\'' + row.mr_id + '\')"><i class="fa fa-edit"></i></button>';

        if (roleDestroy == true) {
            button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.mr_id + '\', \'' + baseUrl + '/delete_data/'+row.mr_id+'\')"><i class="fa fa-remove"></i></button>';
        }
    }

    return button;
}

function renderStatus(data) {
    if (data == 0) return '<span class="label label-warning pull-left">Menunggu Verifikasi</span>'
    if (data == 1) return '<span class="label label-success pull-left">Terverifikasi</span>'
    if (data == 2) return '<span class="label label-danger pull-left">Tidak Terverifikasi</span>'

    return '<span class="label label-primary pull-left">Draft</span>'
}

function setTable() {
    var colDef = [
        {data: 'mr_id', render: renderNumRow },
        {data: 'dibuat_pada'},
        {data: 'mr_nomor'},
        {data: 'paket', searchable: false},
        {data: 'mr_periode'},
        {data: 'mr_status', render: renderStatus},
        {data: 'pemantauan_id', className: 'text-center', searchable: false, render: renderButtonLink1},
        {data: 'tinjauan_id', className: 'text-center', searchable: false, render: renderButtonLink2},
        {data: 'pemantauan_resiko_id', className: 'text-center', searchable: false, render: renderButtonLink3},
        {data: 'mr_id', render: renderAction}
    ];
    var reqData = {
        tahun : $('#active_year').val()
    };

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function() {
    setTable();
});