var tableData;
var tableData2;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    tableData2.draw(false);
    $('#modal-data').modal('hide');
}

function tambahData() {
    resetForm('#form-data');

    urlAction = urlInsert;

    $('#modal-data').modal('show');
}

function tambahDataKategori() {
    resetForm('#form-data-2');

    urlAction = urlInsert2;

    $('#modal-data-2').modal('show');
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
    $('#subject').val(data[0].subject);
    $('#editor').val(data[0].description);
    // $('#thumbnail').val(data[0].thumbnail);
    $('#modal-data').modal('show');
}

function detailData2(id) {
    var dataSet = tableData2.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });
    urlAction = urlUpdate2;

    toggleForm('#form-data-2', roleUpdate);
    resetForm('#form-data-2');

    $('#id_kategori').val(data[0].id);
    $('#category_name').val(data[0].name);
    $('#modal-data-2').modal('show');
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

function renderAction2(data, type, row) {
    var button = '';

    var button = '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData2(\'' + row.id + '\')"><i class="fa fa-search"></i></button>';

    if (roleDestroy === true) {
        button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' +  '/pengaturan/berita/kategori' + '/' + row.id + '\')"><i class="fa fa-remove"></i></button>';
    }


    return button;
}

function setTable() {

    var myImage = document.createElement('img');
    // myImage.setAttribute("src", "/storage/uploads/gallery/pngegg (1)_1656994854.png");
    // myImage.src = " {{ asset('storage/uploads/gallery/1.png') }} "
    var colDef = [{
            data: 'id',
            render: renderNumRow
        },
        {
            data: 'subject'
        },
        {
            data: 'description'
        },
        {
            data: 'id',
            render: renderAction
        }
    ];

    var reqData = null;

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

function setTable2() {
    var colDef2 = [{
            data: 'id',
            render: renderNumRow
        },
        {
            data: 'name'
        },
        {
            data: 'id',
            render: renderAction2
        }
    ];

    var reqData2 = null;

    var reqOrder2 = null;

    tableData2 = setDataTable('#table-data-2', urlData2, colDef2, reqData2, reqOrder2, null, null, false);
}

$(document).ready(function () {
    setTable();
    setTable2();

    $('#form-data').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);

            ajaxData(urlAction, reqData, refresh, true);
        }
    });

    $('#form-data-2').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);

            ajaxData(urlAction, reqData, refresh, true);
        }
    });
});
