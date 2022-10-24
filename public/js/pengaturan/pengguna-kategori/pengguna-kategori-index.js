var tableData;

function refresh(result) {
    alertSuccess(result.message );
    tableData.draw();
    $('#modal-data').modal('hide');
}

function tambahData() {
    urlAction = urlInsert;
    $('#modal-data').modal('show');
}

function detailData(id) {
	var dataSet = tableData.rows().data();
	var data = dataSet.filter(function(index) {
		return index.pengguna_kategori_id == id;
    });

	urlAction = urlUpdate;

	resetForm('#form-data');

	if (data[0].pengguna_kategori_spesial == 'superadmin') {
		toggleForm('#form-data', roleUpdate);
	} else {
		toggleForm('#form-data', roleUpdate);
    }
    
	$.each(JSON.parse(data[0].pengguna_kategori_akses.replace(/&quot;/g,'"')), function(index_akses, val_akses) {
        $.each(val_akses, function(index_folder, val_folder) {
            $.each(val_folder, function(index_menu, val_menu) {
                $.each(val_menu, function(index_fitur, val_fitur) {
                    $('input[name="pengguna_kategori_akses['+ index_akses +']['+ index_folder +']['+ index_menu +']['+ index_fitur +']"]').prop('checked', true);
                });
            });
        });
	});

	$('#pengguna_kategori_id').val(data[0].pengguna_kategori_id);
	$('#pengguna_kategori_nama').val(data[0].pengguna_kategori_nama);
	$('input[name="pengguna_kategori_status"][value="'+ data[0].pengguna_kategori_status +'"]').prop('checked', true);

	$('#modal-data').modal('show');
}

function renderStatus(data) {
	if (data == 1) return '<i class="fa fa-check text-success"></i>';

	return '<i class="fa fa-remove text-danger"></i>';
}

function renderAction(data, type, row) {
    var button = '';

    var button = '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'' + row.pengguna_kategori_id + '\')"><i class="fa fa-search"></i></button>';

    if (roleDestroy === true) {
        if (row.pengguna_kategori_status == true && row.pengguna_kategori_spesial == null) {
            button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.pengguna_kategori_id + '\', \'' + baseUrl + '/' + row.pengguna_kategori_id + '\')"><i class="fa fa-remove"></i></button>';
        }
    }


    return button;
}

function setTable() {
    var colDef = [
        {data: 'pengguna_kategori_id', render: renderNumRow },
        {data: 'pengguna_kategori_nama'},
        {data: 'pengguna_kategori_id', render: renderAction}
    ];
    var reqData = null;

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function() {
    setTable();

    $('input[name=check_all]').on('click', function() {
        if ($(this).prop('checked')) {
            $('input[type=checkbox][name*=pengguna_kategori_akses]').prop('checked', true);
        } else {
            $('input[type=checkbox][name*=pengguna_kategori_akses]').prop('checked', false);
        }
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