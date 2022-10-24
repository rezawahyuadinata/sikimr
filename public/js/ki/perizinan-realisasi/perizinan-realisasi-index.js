var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    $('#modal-data').modal('hide');
}

function tambahData() {
    resetForm('#form-data');
    $('#perizinan_id').val(perizinan_id).trigger("change");

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
    $('#perizinan_id').val(perizinan_id).trigger("change");
    $('#tahun').val(data[0].tahun).trigger('change')
    $('#bulan').val(data[0].bulan).trigger('change')
    $('#volume_realisasi').val(data[0].volume_realisasi).trigger('change')

    $('#modal-data').modal('show');
}

function renderStatus(data) {
    if (data == 1) return '<i class="fa fa-check text-success"></i>';

    return '<i class="fa fa-remove text-danger"></i>';
}

function renderAction(data, type, row) {
    var button = '';
    // var button = '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'' + row.id + '\')"><i class="fa fa-search"></i></button>';

    if (roleDestroy === true) {
        button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/' + row.id + '\')"><i class="fa fa-remove"></i></button>';
    }


    return button;
}

function setTable() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'tahun' },
        { data: 'bulan' },
        { data: 'volume_realisasi' },
        { data: 'id', render: renderAction }
    ];
    var reqData = {
        perizinan_id
    };

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$('#table-data').DataTable().on("draw", function () {
    $.post(urlRealisasi + "/rata", { perizinan_id, '_token': $('meta[name="csrf-token"]').attr('content') }, function (res) {
        $(".btn-rata").text("Rata Rata Realisasi : " + res.data);
    })
})

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

    $('#datetimepicker-tahun').datetimepicker({
        format: 'YYYY',
    });
    $('#datetimepicker-bulan').datetimepicker({
        format: 'MM',
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