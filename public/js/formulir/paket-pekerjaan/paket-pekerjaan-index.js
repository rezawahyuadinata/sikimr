var tableData;

function addFormulir(id) {
    location.href = baseUrl + '/create/' + id;
}

function renderAction(data, type, row) {
    var button = '';

    var button = '<button type="button" class="btn btn-info btn-xs pull-right" onclick="addFormulir(\'' + row.id + '\')"><i class="fa fa-plus"></i></button>';

    return button;
}

function setTable() {
    var colDef = [
        {data: 'id', render: renderNumRow },
        {data: 'kdpaket'},
        {data: 'nmpaket'},
        {data: 'nilai_kontrak', className:'text-right', render: formatCurrency},
        {data: 'id', render: renderAction}
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