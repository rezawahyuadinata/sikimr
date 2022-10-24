var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    $('#modal-data').modal('hide');
}

function getJob() {
    $('#modal-loading').fadeIn('fast');

    $.post(urlJob, {
        "_token": $('meta[name="csrf-token"]').attr('content')
    }, function (res) {
        console.log(res);
        tableData.draw(false);
        $('#modal-loading').fadeOut('fast');
    })
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
    $('#tanggal_surat').val(data[0].tanggal_surat).trigger("change");
    $('#tanggal_surat_edit').val(data[0].tanggal_surat_edit).trigger("change");
    $('#volume_yang_dimohonkan').val(data[0].volume_yang_dimohonkan).trigger("change");
    $('#status_permohonan').val(data[0].status_permohonan).trigger("change");

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
    var filters = {};
    $.each($('.change-draw'), function (i, v) {
        filters[v.id] = $('#' + v.id).val();
    })

    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'nomor_registrasi' },
        { data: 'nomor_surat' },
        { data: 'tanggal_surat' },
        { data: 'tanggal_surat_edit' },
        { data: 'nama_pemohon' },
        { data: 'nama_perusahaan' },
        { data: 'jenis_permohonan' },
        { data: 'sumber_air' },
        { data: 'nama_balai' },
        { data: 'volume_yang_dimohonkan' },
        { data: 'tujuan_penggunaan_sumberair' },
        { data: 'sk_menteri' },
        { data: 'status_permohonan' },
    ];
    if(actionCol) {
        colDef.push({ data: 'id', render: renderAction });
    }
    var reqData = {
        'filters': filters
    };

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

    $('#datetimepicker-tanggal_surat').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-tanggal_surat_edit').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    $('#datetimepicker-perizinan-start').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-perizinan-end').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    // $('#datetimepicker-TGL_REKOMTEK').datetimepicker({
    //     format: 'YYYY-MM-DD',
    // });
    // $('#datetimepicker-TGL_TERBIT').datetimepicker({
    //     format: 'YYYY-MM-DD',
    // });
    // $('#datetimepicker-TGL_MONEV').datetimepicker({
    //     format: 'YYYY-MM-DD',
    // });
});

// $('#PENGADUAN').change(function () {
//     var pengaduan = $(this).val();
//     console.log(pengaduan);
//     if (pengaduan == "ADA") {
//         $('.btn-pengaduan').show();
//     } else {
//         $('.btn-pengaduan').hide();
//     }
// })

// $('#STATUS_MONEV').change(function () {
//     var status_monev = $(this).val();
//     console.log(status_monev);
//     if (status_monev == "SUDAH") {
//         $('.form-monev').show();
//     } else {
//         $('.form-monev').hide();
//     }
// })


const delayKeyUp = (() => {
    let timer = null;
    const delay = (func, ms) => {
        timer ? clearTimeout(timer) : null
        timer = setTimeout(func, ms)
    }
    return delay
})();

$('.change-draw').on('change', function () {

    delayKeyUp(() => { setTable() }, 1000)
})

$('.change-draw').keyup(function () {

    delayKeyUp(() => { setTable() }, 1000)
})

$('#datetimepicker-perizinan-start,#datetimepicker-perizinan-end').on('dp.change', function () {
    delayKeyUp(() => { setTable() }, 1000)
});
