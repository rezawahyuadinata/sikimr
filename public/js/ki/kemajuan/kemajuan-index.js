$(function () {
    $('#datetimepicker-pengadaan-banding1,#datetimepicker-pengadaan-banding2').datetimepicker({
        format: 'YYYY-MM-DD',
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }

    });

    $('#datetimepicker-tahun').datetimepicker({
        format: 'YYYY',
    });
})

$('#datetimepicker-tahun').on('dp.change', function () {
    console.log("change");
    changeViewDate("kontrak", $("#tahun").val())
})

function changeViewDate(type, year,) {
    $.get(urlChangeDate, {
        type,
        year
    }, function (res) {
        if (res.status == 1) {
            var option = '';
            $.each(res.data, function (i, v) {
                option += '<option>' + v.tgl_backup + '</option>';
            })
            $('#pengadaan-banding1').html(option);
            $('#pengadaan-banding1').select2({ width: "100%" }).change();
            $('#pengadaan-banding2').html(option);
            $('#pengadaan-banding2').select2({ width: "100%" }).change();
        } else {
            swal("Kesalahan", 'Terjadi kesalahan', 'error');
        }
    })
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

    delayKeyUp(() => { setTablePengadaanBanding() }, 1000)
})

$('.change-draw').on('change', function () {

    delayKeyUp(() => { setTablePengadaanBanding() }, 1000)
})

function getJob() {
    $('#modal-loading').fadeIn('fast');

    $.post(urlJob, {
        "_token": $('meta[name="csrf-token"]').attr('content')
    }, function (res) {
        console.log(res);
        setTablePengadaanBanding();
        $('#modal-loading').fadeOut('fast');
    })
}

$('#datetimepicker-pengadaan-banding1,#datetimepicker-pengadaan-banding2').on('dp.change', function () {
    setTablePengadaanBanding();
})

function setTablePengadaanBanding() {
    $('#modal-loading').fadeIn('fast');
    var date1 = $('#pengadaan-banding1').val();
    var date2 = $('#pengadaan-banding2').val();
    var year = $('#tahun').val();
    $.get(urlData, {
        date1,
        date2,
        year,
    }, function (res) {
        console.log(res);
        changeViewPengadaanBanding(res);
        $('#modal-loading').fadeOut('fast');
    })
}

function changeViewPengadaanBanding(data) {
    var table = "";
    $.each(data.datasets, function (i, v) {
        table += "<tr class='text-right'>";
        $.each(v, function (x, y) {
            if (x == 0) {
                table += "<td class='text-center'>" + y + "</td>";
            } else {
                var bg = ""
                if (x > 12) {
                    bg = "background-color: #d1d6ff";
                }
                table += "<td style='" + bg + "'>" + formatCurrency(y) + "</td>";
            }
        })
        table += "</tr>";
    });

    $('#table-date1').text(data.tanggal1);
    $('#table-date2').text(data.tanggal2);

    $('#table-pengadaan-banding>tbody').html(table);
}