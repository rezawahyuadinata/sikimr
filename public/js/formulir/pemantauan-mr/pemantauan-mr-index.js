var table_pemantauan_detail;

function refreshPage(result) {
    if (result.data != undefined) {
        alertSuccess(result.message, baseUrl + "?pemantauan_id=" + result.data);
    } else {
        alertSuccess(result.message, mainServerUrl + "/formulir");
    }
}

function refresh(result) {
    alertSuccess(result.message);
    table_pemantauan_detail.draw(false);
    $("#modal-pemantauan_detail").modal("hide");
}

function addDataMr(modal, form) {
    // resetForm(form);
    action = urlInsert;
    $(modal).modal("show");
}

function detailData(tipe, id) {
    if (tipe == "pemantauan_detail") {
        detail_pemantauan_detail(id);
    }
}

// PEMANGKU KEPENTINGAN //
function detail_pemantauan_detail(id) {
    var dataSet = table_pemantauan_detail.rows().data();
    var data = dataSet.filter(function (index) {
        return index.pemantauan_detail_id == id;
    });

    action = urlUpdate;

    $("#pemantauan_detail_id").val(id);

    console.log(data[0])
    for (var key in data[0]) {
        if (key == "id") {
            $("#pemantauan_detail_id").val(data[0][key]);
        } else if (key != 'pemantauan_inovasi_file') {
            if ($("#" + key).is("select")) {
                $("#" + key)
                    .val(data[0][key])
                    .trigger("change");
            } else {
                $("#" + key).val(data[0][key]);
            }
        }
    }

    $('#resiko_id').val(data[0].resiko_id).trigger('change')
    $("#show_pemantauan_periode")
        .val(data[0].pemantauan_periode)
        .trigger("change");

    $("#modal-pemantauan_detail").modal("show");
}

function renderActionPemantauanDetail(data, type, row) {
    var button = "";

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'pemantauan_detail\', \'' + row.pemantauan_detail_id + '\')"><i class="fa fa-edit"></i></button>';

    // button +=
    //     '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' +
    //     row.pemantauan_detail_id +
    //     "', '" +
    //     baseUrl +
    //     "/delete_data/pemantauan_detail/" +
    //     row.pemantauan_detail_id +
    //     '\')"><i class="fa fa-remove"></i></button>';

    return button;
}
function triWulan(data) {
    return data ? "Triwulan " + romanize(data) : "";
}

function renderFile(data) {
    if (data != null) return '<a href="' + mainServerUrl + '/storage/uploads/mr/' + data + '" target="_blank"> Lihat file </a>';

    return '';
}

function renderData(data) {
    return data.replaceAll("&lt;br&gt;", '\n');
}

// romanize
function setTablePemantauanDetail() {
    var colDef = [
        { data: "pemantauan_detail_id", render: renderNumRow },
        { data: "resiko_pernyataan", seachable: false },
        { data: "resiko_kegiatan_penyebab", seachable: false },
        { data: "respon_risiko", seachable: false },
        { data: "resiko_deskripsi", seachable: false },
        { data: "pemantauan_penanggung_jawab" },
        { data: "pemantauan_indikator" },
        { data: "resiko_penilaian_keterangan" },
        { data: "pemantauan_periode_realisasi" },
        { data: "pemantauan_hasil", render: renderData },
        { data: "pemantauan_hambatan" },
        {
            data: "pemantauan_inovasi_file",
            render: renderFile,
            createdCell: function (td, cellData, rowData, row, col) {
                if (rowData.resiko_penilaian_keterangan) {
                    const tgl = new Date(rowData.resiko_penilaian_keterangan)
                    const tglNow = new Date()
                    tglNow.setHours(0, 0, 0, 0);

                    const Difference_In_Time = tgl.getTime() - tglNow.getTime();
                    const Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24)


                    if (rowData.pemantauan_inovasi_file) {
                        const year = rowData.pemantauan_inovasi_file.substring(0, 4);
                        const month = rowData.pemantauan_inovasi_file.substring(4, 6);
                        const date = rowData.pemantauan_inovasi_file.substring(6, 8);
                        const tglUp = new Date(year + '-' + month + '-' + date);
                        tglUp.setHours(0, 0, 0, 0)
                        const Difference_In_Time_Up = tgl.getTime() - tglUp.getTime();
                        const Difference_In_Days_Up = Difference_In_Time_Up / (1000 * 3600 * 24);
                        if (Difference_In_Days_Up >= 0) {
                            $(td).css('background-color', '#76ff03');
                        }
                        else {
                            $(td).css('background-color', '#ff3d00');
                        }
                    }
                    else {
                        if (Difference_In_Days > 0 && Difference_In_Days <= 7) {
                            $(td).css('background-color', '#ffeb3b');
                        }
                        else if (Difference_In_Days <= 0) {
                            $(td).css('background-color', '#ff3d00');
                        }
                    }
                }
            }
        },
        { data: "pemantauan_detail_id", render: renderActionPemantauanDetail },
    ];
    var reqData = {
        pemantauan_id: pemantauan_id,
        tipe: "pemantauan_detail",
    };

    var reqOrder = [[1, "ASC"]];

    table_pemantauan_detail = setDataTable(
        "#table-pemantauan_detail",
        baseUrl + "/get_data",
        colDef,
        reqData,
        reqOrder,
        null,
        null,
        false
    );
}
// PEMANGKU KEPENTINGAN //

// romawi
function romanize(num) {
    if (isNaN(num)) return NaN;
    var digits = String(+num).split(""),
        key = [
            "",
            "C",
            "CC",
            "CCC",
            "CD",
            "D",
            "DC",
            "DCC",
            "DCCC",
            "CM",
            "",
            "X",
            "XX",
            "XXX",
            "XL",
            "L",
            "LX",
            "LXX",
            "LXXX",
            "XC",
            "",
            "I",
            "II",
            "III",
            "IV",
            "V",
            "VI",
            "VII",
            "VIII",
            "IX",
        ],
        roman = "",
        i = 3;
    while (i--) roman = (key[+digits.pop() + i * 10] || "") + roman;
    return Array(+digits.join("") + 1).join("M") + roman;
}

$(document).ready(function () {
    $(".notif-profil").hide();
    if (pemantauan_id == "") {
        $("#modal-pemantauan").modal("show");
    } else {
        setTablePemantauanDetail();
    }

    $("#inovasi_id").on("change", function () {
        var resiko_id = $("#inovasi_id option:selected").data("resiko_id");

        $("#resiko_id").val(resiko_id);
        $("#show_resiko_id").val(resiko_id).trigger("change");
    });

    $("#resiko_id").on("change", function () {
        var resiko_inovasi = $("#resiko_id option:selected").data(
            "resiko_inovasi"
        );

        if (resiko_inovasi != undefined) {
            if (resiko_inovasi.resiko_inovasi) {
                $("#inovasi_pengendalian").val(
                    resiko_inovasi.resiko_inovasi.resiko_deskripsi
                );
                $("#inovasi_id").val(resiko_inovasi.resiko_inovasi.id);
                $("#pemantauan_penanggung_jawab").val(
                    resiko_inovasi.resiko_inovasi.resiko_penanggung_jawab
                );
                $("#pemantauan_indikator").val(
                    resiko_inovasi.resiko_inovasi.resiko_indikator
                );

                triwulan = JSON.parse(resiko_inovasi.resiko_inovasi.resiko_triwulan);
                triwulan_text = '';
                $.each(triwulan, function (idx, val) {
                    triwulan_text += val;
                    if (idx != (triwulan.length - 1)) {
                        triwulan_text += ', ';
                    }
                });
                $("#pemantauan_periode_waktu").val(
                    resiko_inovasi.resiko_inovasi.resiko_tahun +
                    "" +
                    (resiko_inovasi.resiko_inovasi.resiko_triwulan
                        ? " - Triwulan " +
                        triwulan_text
                        : "")
                );
            } else {
                $("#inovasi_pengendalian").val("");
                $("#inovasi_id").val("");
                $("#pemantauan_penanggung_jawab").val("");
                $("#pemantauan_indikator").val("");
                $("#pemantauan_periode_waktu").val("");
            }
            $("#respon_risiko").val(resiko_inovasi.resiko_respon.respon_risiko);
            $("#penyebab_resiko").val(resiko_inovasi.resiko_kegiatan_penyebab);
            $("#show_pemantauan_periode")
                .val(resiko_inovasi.resiko_triwulan)
                .trigger("change");
        } else {
            $("#respon_risiko").val("");
            $("#penyebab_resiko").val("");
            $("#inovasi_pengendalian").val("");
            $("#pemantauan_indikator").val("");
            $("#pemantauan_periode_waktu").val("");
            $("#inovasi_id").val("");
            $("#pemantauan_penanggung_jawab").val("");
            $("#show_pemantauan_periode").val("").trigger("change");
        }
    });

    // $('input[type="radio"][name="pemantauan_hasil[terjadi]"]').on('change', function() {
    //     if ($(this).val() == 'Ya') {
    //         $('input[type="radio"][name="pemantauan_hasil[penyebab]"]').prop('disabled', false).trigger('change');
    //     } else {
    //         $('input[type="radio"][name="pemantauan_hasil[penyebab]"]').prop('disabled', true).trigger('change');
    //     }
    // })

    // $('input[type="radio"][name="pemantauan_hasil[penyebab]"]').on('change', function() {
    //     if ($(this).val() == 'Ya') {
    //         $('input[type="radio"][name="pemantauan_hasil[inov]"]').prop('disabled', false).trigger('change');
    //         $('#pemantauan_hambatan').val('');
    //         $('#pemantauan_hambatan').prop('readonly', true);
    //     } else {
    //         $('input[type="radio"][name="pemantauan_hasil[inov]"]').prop('disabled', true).trigger('change');
    //         $('#pemantauan_hambatan').val('');
    //         $('#pemantauan_hambatan').prop('readonly', false);
    //     }
    // })

    $('.bukti').hide();
    $('input[type="radio"][name="pemantauan_hasil[inov]"]').on('change', function () {
        if ($(this).val() == 'Ya') {
            // $('input[type="radio"][name="pemantauan_hasil[memadai]"]').prop('disabled', false).trigger('change');
            $('.bukti').show();
        } else {
            // $('input[type="radio"][name="pemantauan_hasil[memadai]"]').prop('disabled', true).trigger('change');
            $('.bukti').hide();
        }
    })

    // $('input[type="radio"][name="pemantauan_hasil[memadai]"]').on('change', function() {
    //     if ($(this).val() == 'Ya') {
    //         $('textarea[name="pemantauan_hasil[respon]"]').prop('disabled', false);
    //         $('#pemantauan_hambatan').val('');
    //         $('#pemantauan_hambatan').prop('readonly', true);
    //     } else {
    //         $('textarea[name="pemantauan_hasil[respon]"]').prop('disabled', true);
    //         $('#pemantauan_hambatan').prop('readonly', false);
    //     }
    // })

    $("#form-pemantauan_detail").validate({
        rules: {},
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append("pemantauan_id", pemantauan_id);
            reqData.append("tipe", "pemantauan_detail");

            ajaxData(action, reqData, refresh, true);
        },
    });

    // $('.bukti').hide();

    $("#form-pemantauan").validate({
        rules: {},
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append("tipe", "pemantauan");

            ajaxData(action, reqData, refreshPage, true);
        },
    });

    $('#form-submit').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('pemantauan_id', pemantauan_id);
            reqData.append('tipe', 'pemantauan_form');

            ajaxData(urlInsert, reqData, refreshPage, true);
        }
    });
});
