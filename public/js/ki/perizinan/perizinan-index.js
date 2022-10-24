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
    $('#nomor_surat').val(data[0].nomor_surat).trigger('change')
    $('#tanggal_surat').val(data[0].tanggal_surat).trigger('change')
    // $('#tanggal_surat_edit').val(data[0].tanggal_surat_edit).trigger('change')
    $('#masa_berlaku').val(data[0].masa_berlaku).trigger('change')
    $('#volume_yang_diizinkan').val(parseFloat(data[0].volume_yang_diizinkan.replace(".", "").replace(",", "."))).trigger('change')
    $('#nama_pemohon').val(data[0].nama_pemohon).trigger('change')
    $('#nama_perusahaan').val(data[0].nama_perusahaan).trigger('change')
    $('#jenis_permohonan_edit').val(data[0].jenis_permohonan_edit).trigger('change')
    $('#tanggal_monev').val(data[0].tanggal_monev).trigger("change");
    $('#status_monev').val(data[0].status_monev).trigger("change");
    $('#sesuai_izin').val(data[0].sesuai_izin).trigger("change");
    $('#keterangan').val(data[0].keterangan).trigger("change");
    $('#pengaduan').val(data[0].pengaduan).trigger("change");
    $('#sumber_air').val(data[0].sumber_air).trigger("change");
    $('#nama_balai').val(data[0].nama_balai).trigger("change");

    $('#modal-data').modal('show');
}

function renderStatus(data) {
    if (data == 1) return '<i class="fa fa-check text-success"></i>';

    return '<i class="fa fa-remove text-danger"></i>';
}

function renderAction(data, type, row) {
    var button = '';

    var button = '<button type="button" class="btn btn-success btn-xs pull-right" onclick="window.location.href = \'' + urlRealisasi + '?perizinan_id=' + row.id + '\'"><i class="fa fa-plus"></i></button>';
    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'' + row.id + '\')"><i class="fa fa-search"></i></button>';

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
        { data: 'nomor_surat' },
        { data: 'tanggal_surat' },
        // { data: 'tanggal_surat_edit' },
        { data: 'masa_berlaku' },
        { data: 'volume_yang_diizinkan' },
        { data: 'volume_realisasi' },
        { data: 'nama_pemohon' },
        { data: 'nama_perusahaan' },
        { data: 'jenis_permohonan_edit' },
        { data: 'sumber_air' },
        { data: 'nama_balai' },
        { data: 'status_monev' },
        { data: 'tanggal_monev' },
        { data: 'dokumen_hasil_monev' },
        { data: 'sesuai_izin' },
        { data: 'keterangan' },
        { data: 'pengaduan' },
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

    $('#datetimepicker-tanggal_monev').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-tanggal_surat').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    // $('#datetimepicker-tanggal_surat_edit').datetimepicker({
    //     format: 'YYYY-MM-DD',
    // });
    $('#datetimepicker-masa_berlaku').datetimepicker({
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

$('#status_monev').change(function () {
    var status_monev = $(this).val();
    console.log(status_monev);
    if (status_monev == "SUDAH") {
        $('.status_monev_sudah').show();
    } else {
        $('.status_monev_sudah').hide();
    }
})

$('#pengaduan').on('change', function () {
    var pengaduan = $(this).val();
    console.log(pengaduan);
    if (pengaduan == "ADA") {
        $('.btn-pengaduan').show();
    } else {
        $('.btn-pengaduan').hide();
    }
})

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