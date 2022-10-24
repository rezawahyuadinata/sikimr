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
        $('#modal-loading').fadeOut('fast');
        tableData.draw(false);
        if (res.status == 1) {
            window.location.reload();
        } else {
            swal("Terjadi Kesalahan", res.message, 'error');
        }
    })
}

function setTable(filters = null) {
    var filters = {};
    $.each($('.change-draw'), function (i, v) {
        filters[v.id] = $('#' + v.id).val();
    })
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'kdpaket' },
        { data: 'nmpaket' },
        { data: 'nmuker' },
        { data: 'nmupt' },
        // { data: 'kdsatker' },
        { data: 'nmsatkerjoin' },
        { data: 'kdkategori' },
        { data: 'kdjnskon' },
        { data: 'status_tender' },
        // { data: 'rmp' },
        // { data: 'sbsn' },
        // { data: 'phln' },
        // { data: 'sumber_dana_total' },
        { data: 'sumber_dana' },
        { data: 'jadwal_pengumuman' },
        { data: 'tanggal_kontrak' },
        { data: 'durasi_lelang_hari' },
    ];
    var reqData = {
        'filters': filters
    };

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

const delayKeyUp = (() => {
    let timer = null;
    const delay = (func, ms) => {
        timer ? clearTimeout(timer) : null
        timer = setTimeout(func, ms)
    }
    return delay
})();

$('.change-draw').keyup(function () {

    delayKeyUp(() => { setTable() }, 1000)
})

$('.change-draw').on('change', function () {

    delayKeyUp(() => { setTable() }, 1000)
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

    $('#datetimepicker-tahun_backup').datetimepicker({
        format: 'YYYY',
    });
});

$('#datetimepicker-tahun_backup').on('dp.change', function () {
    changeViewDate("kontrak", $("#tahun").val(), '#tgl_backup')
})

function changeViewDate(type, year, selector) {
    $.get(urlChangeDate, {
        type,
        year
    }, function (res) {
        if (res.status == 1) {
            var option = '';
            $.each(res.data, function (i, v) {
                option += '<option>' + v.tgl_backup + '</option>';
            })
            $(selector).html(option);
            $(selector).select2({ width: "100%" }).change();
        } else {
            swal("Kesalahan", 'Terjadi kesalahan', 'error');
        }
    })
}
