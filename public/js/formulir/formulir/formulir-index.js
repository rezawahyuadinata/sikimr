var tableData;

function refresh(result) {
    alertSuccess(result.message, mainServerUrl + '/formulir');
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

function renderButtonLink4(data, type, row) {
    button = '';

    if (data != null) {
        $.each(data, function(idx, val) {
            if (val.triwulan_1 != null) {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?pemantauan_id='+val.triwulan_1.pemantauan_id+'" class="label label-primary" style="margin: 1px;">'+val.year+'</a>';
            } else {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?mr_id='+row.mr_id+'&tahun='+val.year+'&triwulan=1" class="label label-primary" style="margin: 1px;"><i class="fa fa-plus"></i>'+val.year+'</a>';
            }
        })
    }

    return button;
}

function renderButtonLink5(data, type, row) {
    button = '';

    if (data != null) {
        $.each(data, function(idx, val) {
            if (val.triwulan_2 != null) {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?pemantauan_id='+val.triwulan_2.pemantauan_id+'" class="label label-primary" style="margin: 1px;">'+val.year+'</a>';
            } else {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?mr_id='+row.mr_id+'&tahun='+val.year+'&triwulan=2" class="label label-primary" style="margin: 1px;"><i class="fa fa-plus"></i>'+val.year+'</a>';
            }
        })
    }

    return button;
}

function renderButtonLink6(data, type, row) {
    button = '';

    if (data != null) {
        $.each(data, function(idx, val) {
            if (val.triwulan_3 != null) {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?pemantauan_id='+val.triwulan_3.pemantauan_id+'" class="label label-primary" style="margin: 1px;">'+val.year+'</a>';
            } else {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?mr_id='+row.mr_id+'&tahun='+val.year+'&triwulan=3" class="label label-primary" style="margin: 1px;"><i class="fa fa-plus"></i>'+val.year+'</a>';
            }
        })
    }

    return button;
}

function renderButtonLink7(data, type, row) {
    button = '';

    if (data != null) {
        $.each(data, function(idx, val) {
            if (val.triwulan_4 != null) {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?pemantauan_id='+val.triwulan_4.pemantauan_id+'" class="label label-primary" style="margin: 1px;">'+val.year+'</a>';
            } else {
                button += '<a href="'+mainServerUrl+'/formulir/pemantauan-mr?mr_id='+row.mr_id+'&tahun='+val.year+'&triwulan=4" class="label label-primary" style="margin: 1px;"><i class="fa fa-plus"></i>'+val.year+'</a>';
            }
        })
    }

    return button;
}

function detailFormulir(id) {
    location.href = mainServerUrl + '/formulir/formulir/detail/' + id;
}

function detailPemantauan(id) {
    location.href = mainServerUrl + '/formulir/formulir/pemantauan/' + id;
}

function renderAction(data, type, row) {
    var button = '';
    button += '<button type="button" class="btn btn-default btn-xs" onclick="detailFormulir(\'' + row.mr_id + '\')"><i class="fa fa-file"></i></button>';

    if (row.mr_status == null) {
        button += '<button type="button" class="btn btn-info btn-xs" onclick="updateFormulir(\'' + row.mr_id + '\')"><i class="fa fa-edit"></i></button>';

        if (roleDestroy == true) {
            button += '<button type="button" class="btn btn-danger btn-xs" onclick="deleteData(\'' + row.mr_id + '\', \'' + baseUrl + '/delete_data/'+row.mr_id+'\')"><i class="fa fa-remove"></i></button>';
        }
    }

    return button;
}

function renderStatus(data) {
    if (data == 0) return '<span class="label label-warning">Menunggu Verifikasi</span>'
    if (data == 1) return '<span class="label label-success">Terverifikasi</span>'
    if (data == 2) return '<span class="label label-danger">Tidak Terverifikasi</span>'

    return '<span class="label label-primary">Draft</span>'
}

function renderUnit(data, type, row) {
    if (row.satker_nama != null) return row.satker_nama;
    if (row.eselon2_nama != null) return row.eselon2_nama;
    if (row.eselon1_nama != null) return row.eselon1_nama;

    return '';
}

function setTable() {
    var colDef = [
        {data: 'mr_id', render: renderNumRow },
        {data: 'mr_periode'},
        {data: 'level'},
        {data: 'satker_nama', render: renderUnit},
        {data: 'mr_status', className: 'text-center', render: renderStatus},
        {data: 'mr_id', className: 'text-center', render: renderAction},
        {data: 'year', className: 'text-center', searchable: false, render: renderButtonLink4},
        {data: 'year', className: 'text-center', searchable: false, render: renderButtonLink5},
        {data: 'year', className: 'text-center', searchable: false, render: renderButtonLink6},
        {data: 'year', className: 'text-center', searchable: false, render: renderButtonLink7},
    ];
    var reqData = {
        tahun : $('#active_year').val()
    };

    var reqOrder = [[1, 'asc'], [2, 'asc']];

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function() {
    setTable();

    $('#year').on('change', function() {
        location.href = mainServerUrl + '/formulir?year=' + $(this).val()
    })
});