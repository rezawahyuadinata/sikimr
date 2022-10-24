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
	var data = dataSet.filter(function(index) {
		return index.id == id;
    });

    urlAction = urlUpdate;

    toggleForm('#form-data', roleUpdate);
    resetForm('#form-data');

    $('#id').val(data[0].id);
    $('#UNIT_ORGANISASI').val(data[0].UNIT_ORGANISASI);
    $('#KONTRAK_PKT').val(data[0].KONTRAK_PKT);
    $('#KONTRAK_PAGU_DIPA').val(data[0].KONTRAK_PAGU_DIPA);
    $('#KONTRAK_PAGU_PENGADAAN').val(data[0].KONTRAK_PAGU_PENGADAAN);
    $('#TERKONTRAK_PKT').val(data[0].TERKONTRAK_PKT);
    $('#TERKONTRAK_PAGU_DIPA').val(data[0].TERKONTRAK_PAGU_DIPA);
    $('#TERKONTRAK_PAGU_PENGADAAN').val(data[0].TERKONTRAK_PAGU_PENGADAAN);
    $('#PERSIAPAN_PKT').val(data[0].PERSIAPAN_PKT);
    $('#PERSIAPAN_PAGU_DIPA').val(data[0].PERSIAPAN_PAGU_DIPA);
    $('#PERSIAPAN_PAGU_PENGADAAN').val(data[0].PERSIAPAN_PAGU_PENGADAAN);
    $('#PROSES_LELANG_PKT').val(data[0].PROSES_LELANG_PKT);
    $('#PROSES_LELANG_PAGU_DIPA').val(data[0].PROSES_LELANG_PAGU_DIPA);
    $('#PROSES_LELANG_PAGU_PENGADAAN').val(data[0].PROSES_LELANG_PAGU_PENGADAAN);
    $('#BELUM_LELANG_PKT').val(data[0].BELUM_LELANG_PKT);
    $('#BELUM_LELANG_PAGU_DIPA').val(data[0].BELUM_LELANG_PAGU_DIPA);
    $('#BELUM_LELANG_PAGU_PENGADAAN').val(data[0].BELUM_LELANG_PAGU_PENGADAAN);
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
        button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/'+row.id+'\')"><i class="fa fa-remove"></i></button>';
    }


    return button;
}

function setTable() {
    var colDef = [
        {data: 'id', render: renderNumRow },
        {data: 'UNIT_ORGANISASI'},
        {data: 'KONTRAK_PKT'},
        {data: 'KONTRAK_PAGU_DIPA'},
        {data: 'KONTRAK_PAGU_PENGADAAN'},
        {data: 'TERKONTRAK_PKT'},
        {data: 'TERKONTRAK_PAGU_DIPA'},
        {data: 'TERKONTRAK_PAGU_PENGADAAN'},
        {data: 'PERSIAPAN_PKT'},
        {data: 'PERSIAPAN_PAGU_DIPA'},
        {data: 'PERSIAPAN_PAGU_PENGADAAN'},
        {data: 'PROSES_LELANG_PKT'},
        {data: 'PROSES_LELANG_PAGU_DIPA'},
        {data: 'PROSES_LELANG_PAGU_PENGADAAN'},
        {data: 'BELUM_LELANG_PKT'},
        {data: 'BELUM_LELANG_PAGU_DIPA'},
        {data: 'BELUM_LELANG_PAGU_PENGADAAN'},
        {data: 'id', render: renderAction}
    ];
    var reqData = null;

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function() {
    setTable();

    $('#form-data').validate({
        rules : {
            
        },
        submitHandler:function (form) {
            var reqData = new FormData(form);

            ajaxData(urlAction, reqData, refresh, true);
        }
    });
});