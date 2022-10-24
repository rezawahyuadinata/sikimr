var tableData;
var kota, kecamatan;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    $('#modal-data').modal('hide');
}

function fillKota(result) {
    $('#kota_id').html('');

    var html = '<option value="">- Pilih Kota-</option>';
    $.each(result.data, function(index, val) {
        html += '<option value="'+val.kota_id+'">'+val.kota_nama+'</option>';
    });
    
    $('#kota_id').append(html);

    $('#kota_id').val(kota).trigger('change');
}

function fillKecamatan(result) {
    $('#kecamatan_id').html('');

    var html = '<option value="">- Pilih Kecamatan-</option>';
    $.each(result.data, function(index, val) {
        html += '<option value="'+val.kecamatan_id+'">'+val.kecamatan_nama+'</option>';
    });
    
    $('#kecamatan_id').append(html);

    $('#kecamatan_id').val(kecamatan).trigger('change');
}

function tambahData() {
    resetForm('#form-data');

    urlAction = urlInsert;
    kota = '';
    kecamatan = '';

    $('#modal-data').modal('show');
}

function detailData(id) {
    var dataSet = tableData.rows().data();
	var data = dataSet.filter(function(index) {
		return index.kelurahan_id == id;
    });

    urlAction = urlUpdate;

    toggleForm('#form-data', roleUpdate);
    resetForm('#form-data');

    kota = data[0].kota_id;    
    kecamatan = data[0].kecamatan_id;
    $('#kelurahan_id').val(data[0].kelurahan_id);
    $('#provinsi_id').val(data[0].provinsi_id).trigger('change');
    $('#kelurahan_kode').val(data[0].kelurahan_kode);
    $('#kelurahan_nama').val(data[0].kelurahan_nama);
    $('#modal-data').modal('show');
}

function renderStatus(data) {
	if (data == 1) return '<i class="fa fa-check text-success"></i>';

	return '<i class="fa fa-remove text-danger"></i>';
}

function renderAction(data, type, row) {
    var button = '';

    var button = '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'' + row.kelurahan_id + '\')"><i class="fa fa-search"></i></button>';

    if (roleDestroy === true) {
        button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.kelurahan_id + '\', \'' + baseUrl + '/'+row.kelurahan_id+'\')"><i class="fa fa-remove"></i></button>';
    }


    return button;
}

function setTable() {
    var colDef = [
        {data: 'kelurahan_id', render: renderNumRow },
        {data: 'provinsi_nama'},
        {data: 'kota_nama'},
        {data: 'kecamatan_nama'},
        {data: 'kelurahan_kode'},
        {data: 'kelurahan_nama'},
        {data: 'kelurahan_id', render: renderAction}
    ];
    var reqData = null;

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function() {
    setTable();

    $('#provinsi_id').on('change', function() {
        var reqData = {
            provinsi_id : $(this).val() 
        }

        ajaxData(urlKota, reqData, fillKota)
    })

    $('#kota_id').on('change', function() {
        var reqData = {
            kota_id : $(this).val() 
        }

        ajaxData(urlKecamatan, reqData, fillKecamatan)
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