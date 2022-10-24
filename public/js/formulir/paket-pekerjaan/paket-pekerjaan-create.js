var table_sasaran, table_pemangku_kepentingan, table_tujuan, table_resiko;
var tujuan_kegiatan_utama;

function refresh(result) {
    alertSuccess(result.message)
    table_sasaran.draw(false);
    table_pemangku_kepentingan.draw(false);
    table_tujuan.draw(false);
    table_resiko.draw(false);
    $('#modal-sasaran').modal('hide');
    $('#modal-pemangku_kepentingan').modal('hide');
    $('#modal-tujuan').modal('hide');
    $('#modal-resiko').modal('hide');
}

function reloadPage(result) {
    alertSuccess(result.message, baseUrl + '/create/' + $('#paket_id').val())
}

function setTujuanKegiatanUtama() {
    $('#resiko_paket_sasaran_id').html('');

    var html = '<option value="">- Pilih -</option>';
    $.each(tujuan_kegiatan_utama, function(idx, val) {
        html += '<option value="'+val.paket_sasaran_id+'">'+val.kegiatan_tujuan+'</option>';   
    })

    $('#resiko_paket_sasaran_id').append(html);
}

function addData(modal, form) {
	resetForm(form);
    action = urlInsert;
    $(modal).modal('show');
    if (modal == '#modal-resiko') {
        tujuan_kegiatan_utama = table_sasaran
            .rows()
            .data();

        setTujuanKegiatanUtama();
    }
}

function detailData(tipe, id) {
    if (tipe == 'sasaran') {
        detail_sasaran(id)
    } else if (tipe == 'pemangku_kepentingan') {
        detail_pemangku_kepentingan(id)
    } else if (tipe == 'tujuan') {
        detail_tujuan(id)
    } else if (tipe == 'resiko') {
        tujuan_kegiatan_utama = table_sasaran
            .rows()
            .data();

        setTujuanKegiatanUtama();

        detail_resiko(id)
    }
}

// SASARAN //
function detail_sasaran(id) {
    var dataSet = table_sasaran.rows().data();
	var data = dataSet.filter(function(index) {
		return index.paket_sasaran_id == id;
    });

    action = urlUpdate;

    $('#paket_sasaran_id').val(id)
    $('#indikator_manual').val(data[0].indikator)
    $('#kegiatan_manual').val(data[0].kegiatan)
    $('#kegiatan_tujuan').val(data[0].kegiatan_tujuan)

    $('#modal-sasaran').modal('show')
}

function renderActionSasaran(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'sasaran\', \'' + row.paket_sasaran_id + '\')"><i class="fa fa-edit"></i></button>';
    
    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.paket_sasaran_id + '\', \'' + baseUrl + '/delete_data/sasaran/'+row.paket_sasaran_id+'\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function setTableSasaran() {
    var colDef = [
        {data: 'paket_sasaran_id', render: renderNumRow },
        {data: 'sasaran' },
        {data: 'indikator' },
        {data: 'kegiatan' },
        {data: 'kegiatan_tujuan' },
        {data: 'paket_sasaran_id', render: renderActionSasaran}
    ];
    var reqData = {
        paket_id : $('#paket_id').val(),
        tipe : 'sasaran',
    };

    var reqOrder = [[1, 'ASC']];

    table_sasaran = setDataTable('#table-sasaran', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}
// SASARAN //

// PEMANGKU KEPENTINGAN //
function detail_pemangku_kepentingan(id) {
    var dataSet = table_pemangku_kepentingan.rows().data();
	var data = dataSet.filter(function(index) {
		return index.id == id;
    });

    action = urlUpdate;

    $('#pemangku_kepentingan_id').val(id)
    $('#pemangku_kepentingan').val(data[0].pemangku_kepentingan)
    $('#pemangku_kepentingan_tujuan').val(data[0].pemangku_kepentingan_tujuan)

    $('#modal-pemangku_kepentingan').modal('show')
}

function renderActionPemangkuKepentingan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'pemangku_kepentingan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';
    
    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/pemangku_kepentingan/'+row.id+'\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function setTablePemangkuKepentingan() {
    var colDef = [
        {data: 'id', render: renderNumRow },
        {data: 'pemangku_kepentingan' },
        {data: 'pemangku_kepentingan_keterangan' },
        {data: 'id', render: renderActionPemangkuKepentingan}
    ];
    var reqData = {
        paket_id : $('#paket_id').val(),
        tipe : 'pemangku_kepentingan',
    };

    var reqOrder = [[1, 'ASC']];

    table_pemangku_kepentingan = setDataTable('#table-pemangku_kepentingan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}
// PEMANGKU KEPENTINGAN //

// TUJUAN //
function detail_tujuan(id) {
    var dataSet = table_tujuan.rows().data();
	var data = dataSet.filter(function(index) {
		return index.id == id;
    });

    action = urlUpdate;

    $('#tujuan_id').val(id)
    $('#tujuan_pelaksanaan').val(data[0].tujuan_pelaksanaan)

    $('#modal-tujuan').modal('show')
}

function renderActionTujuan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'tujuan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';
    
    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/tujuan/'+row.id+'\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function setTableTujuan() {
    var colDef = [
        {data: 'id', render: renderNumRow },
        {data: 'tujuan_pelaksanaan' },
        {data: 'id', render: renderActionTujuan}
    ];
    var reqData = {
        paket_id : $('#paket_id').val(),
        tipe : 'tujuan',
    };

    var reqOrder = [[1, 'ASC']];

    table_tujuan = setDataTable('#table-tujuan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}
// TUJUAN //

// TUJUAN //
function detail_resiko(id) {
    var dataSet = table_resiko.rows().data();
	var data = dataSet.filter(function(index) {
		return index.id == id;
    });

    action = urlUpdate;

    $('#resiko_id').val(id)

    for(var key in data[0]){
        if (key == 'id') {
            $('#resiko_id').val(data[0][key])
        } else if(key == 'paket_sasaran_id'){
            $('#resiko_paket_sasaran_id').val(data[0][key]).trigger('change')
        } else {
            if ($('#' + key).is('select')) {
                $('#' + key).val(data[0][key]).trigger('change');
            } else {
                $('#' + key).val(data[0][key]);
            }
        }
    }

    $('#modal-resiko').modal('show')
}

function renderActionResiko(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'resiko\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';
    
    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/resiko/'+row.id+'\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function setTableResiko() {
    var colDef = [
        {data: 'id', render: renderNumRow },
        {data: 'kegiatan_tujuan' },
        {data: 'resiko_pernyataan' },
        {data: 'id', render: renderActionResiko}
    ];
    var reqData = {
        paket_id : $('#paket_id').val(),
        tipe : 'resiko',
    };

    var reqOrder = [[1, 'ASC']];

    table_resiko = setDataTable('#table-resiko', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}
// TUJUAN //

$(document).ready(function() {
    setTableSasaran()
    setTablePemangkuKepentingan()
    setTableTujuan()
    setTableResiko();

    $('a[href="#tab_a"]').on('click', function() {
        table_sasaran.draw(false);
    })

    $('a[href="#tab_b"]').on('click', function() {
        table_pemangku_kepentingan.draw(false);
    })

    $('a[href="#tab_c"]').on('click', function() {
        table_tujuan.draw(false);
    })

    $('a[href="#tab_d"]').on('click', function() {
        table_resiko.draw(false);
    })

    $('.linkup-non_teknis').hide()
    $('.linkup-teknis').hide()
    $('#resiko_kegiatan_lingkup_jenis').on('change', function() {
        if ($(this).val() == 0) {
            $('.linkup-teknis').show()
            $('.linkup-non_teknis').hide()
        } else {
            $('.linkup-teknis').hide()
            $('.linkup-non_teknis').show()
        }
    })

    $('.btn-jadwal').on('click', function() {
        action = urlInsert;
        resetForm('#form-jadwal');
        var id = $(this).data('id')
        var nomor = $(this).data('nomor')
        var no = 0;

        for (var i = 1; i <= 12; i++) {
            for (var y = 1; y <= 4; y++) {
                text = 'minggu_'+ no;
                if (nomor[text] != null) {
                    $('input[type="checkbox"][class="'+text+'"]').prop('checked', true);
                }
                no++;
            }
            
        }

        $('#m_jadwal_id').val(id)
        $('#modal-jadwal').modal('show')
    })

    $('#form-sasaran').validate({
        rules : {
            
        },
        submitHandler:function (form) {
            var reqData = new FormData(form);
            reqData.append('paket_id', $('#paket_id').val());
            reqData.append('tipe', 'sasaran');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-pemangku_kepentingan').validate({
        rules : {
            
        },
        submitHandler:function (form) {
            var reqData = new FormData(form);
            reqData.append('paket_id', $('#paket_id').val());
            reqData.append('tipe', 'pemangku_kepentingan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-tujuan').validate({
        rules : {
            
        },
        submitHandler:function (form) {
            var reqData = new FormData(form);
            reqData.append('paket_id', $('#paket_id').val());
            reqData.append('tipe', 'tujuan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-resiko').validate({
        rules : {
            
        },
        submitHandler:function (form) {
            var reqData = new FormData(form);
            reqData.append('paket_id', $('#paket_id').val());
            reqData.append('tipe', 'resiko');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-jadwal').validate({
        rules : {
            
        },
        submitHandler:function (form) {
            var reqData = new FormData(form);
            reqData.append('paket_id', $('#paket_id').val());
            reqData.append('tipe', 'jadwal');

            ajaxData(action, reqData, reloadPage, true);
        }
    });
})