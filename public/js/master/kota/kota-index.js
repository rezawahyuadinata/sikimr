var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    $('#modal-data').modal('hide');
}

function tambahData() {
    resetForm('#form-data');

    urlAction = urlInsert;

    $('#province_code').val($('#filter_province_code').val()).trigger('change');

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
    $('#province_code').val(data[0].province_code).trigger('change');
    $('#kabupaten_code').val(data[0].kabupaten_code);
    $('#kabupaten_name').val(data[0].kabupaten_name);
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
        {data: 'province_name', name: 'tbl_administrative_province.province_name'},
        {data: 'kabupaten_code'},
        {data: 'kabupaten_name'},
        {data: 'id', render: renderAction}
    ];
    var reqData = {
        filter_province_code : $('#filter_province_code').val()
    };

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function() {
    setTable();

    $('#filter_province_code').on('change', function() {
        setTable();
    })

    $('#form-data').validate({
        rules : {
            
        },
        submitHandler:function (form) {
            var reqData = new FormData(form);

            ajaxData(urlAction, reqData, refresh, true);
        }
    });
});