var table_pemantauan_resiko_detail;

function refreshResikoLevel(result) {
    alertSuccess(result.message);
    table_pemantauan_resiko_detail.draw(false);
    $("#modal-pemantauan_resiko_detail").modal("hide");
}

function addData(modal, form) {
    resetForm(form);
    action = urlInsert;
    $(modal).modal("show");
}

function detailDataPR(tipe, id) {
    if (tipe == "pemantauan_resiko_detail") {
        detail_pemantauan_resiko_detail(id);
    }
}

// PEMANGKU KEPENTINGAN //
function detail_pemantauan_resiko_detail(id) {
    var dataSet = table_pemantauan_resiko_detail.rows().data();
    var data = dataSet.filter(function (index) {
        return index.pemantauan_resiko_detail_id == id;
    });

    action = urlUpdate;

    $("#pemantauan_resiko_detail_id").val(id);

    for (var key in data[0]) {
        if (key == "id") {
            $("#pemantauan_resiko_detail_id").val(data[0][key]);
        } else {
            if ($("#" + key).is("select")) {
                $("#" + key)
                    .val(data[0][key])
                    .trigger("change");
            } else {
                $("#" + key).val(data[0][key]);
            }
        }
    }

    $("#modal-pemantauan_resiko_detail").modal("show");
}

function renderActionResikoLevelDetail(data, type, row) {
    var button = "";

    button +=
        '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailDataPR(\'pemantauan_resiko_detail\', \'' +
        row.pemantauan_resiko_detail_id +
        '\')"><i class="fa fa-edit"></i></button>';

    // button +=
    //     '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' +
    //     row.pemantauan_resiko_detail_id +
    //     "', '" +
    //     baseUrl +
    //     "/delete_data/pemantauan_resiko_detail/" +
    //     row.pemantauan_resiko_detail_id +
    //     '\', refresh_tinjauan_detail)"><i class="fa fa-remove"></i></button>';

    return button;
}

function renderStatusResikoLevel(data) {
    if (parseFloat(data) < 0) {
        return (
            '<div style="background-color:red;color:white;text-align:center;">' +
            data +
            "</div>"
        );
    } else {
        return data;
    }
}

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

function triWulanResikoLevel(data) {
    return data ? "Triwulan " + romanize(data) : "";
}

function setTableResikoLevelDetail() {
    var colDef = [
        { data: "pemantauan_resiko_detail_id", render: renderNumRow },
        { data: "pemantauan_resiko_pernyataan" },
        { data: "pemantauan_resiko_jumlah" },
        {
            data: "pemantauan_resiko_kemungkinan",
            name: "m_kriteria_dampak.dampak",
        },
        {
            data: "pemantauan_resiko_dampak",
            name: "m_kriteria_kemungkinan.level_kemungkinan",
        },
        { data: "pemantauan_resiko_nilai" },
        { data: "pemantauan_resiko_kemungkinan_act" },
        { data: "pemantauan_resiko_dampak_act" },
        { data: "pemantauan_resiko_nilai_act" },
        { data: "pemantauan_resiko_selisih", render: renderStatusResikoLevel },
        { data: "pemantauan_resiko_rekomendasi" },
        {
            data: "pemantauan_resiko_detail_id",
            render: renderActionResikoLevelDetail,
        },
    ];
    var reqData = {
        pemantauan_id: pemantauan_id,
        tipe: "pemantauan_resiko_detail",
    };

    var reqOrder = [[1, "ASC"]];

    table_pemantauan_resiko_detail = setDataTable(
        "#table-pemantauan_resiko_detail",
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

function fillNilaiResponResikoLevelActResikoLevel(result) {
    if (result.data != null) {
        $("#pemantauan_resiko_nilai_act").val(result.data.nilai);
    } else {
        $("#pemantauan_resiko_nilai_act").val(0);
    }

    var rowAct = parseFloat($("#pemantauan_resiko_nilai_act").val());
    var row = parseFloat($("#pemantauan_resiko_nilai").val());
    var selisih = row - rowAct;

    $("#pemantauan_resiko_selisih").val(selisih);

    if (parseFloat(selisih) < 0) {
        $("#pemantauan_resiko_selisih").css("background-color", "red");
        $("#pemantauan_resiko_selisih").css("color", "white");
        $('#pemantauan_resiko_rekomendasi').val('')
    } else {
        $("#pemantauan_resiko_selisih").css("background-color", "#eee");
        $("#pemantauan_resiko_selisih").css("color", "black");
        $('#pemantauan_resiko_rekomendasi').val('Pengendalian Memadai')
    }
    
    level = '';
    if (rowAct >= 20 && rowAct <= 25) {
        level = 'Sangat Tinggi';
    } else if (rowAct >= 16 && rowAct <= 19) {
        level = 'Tinggi';
    } else if (rowAct >= 11 && rowAct <=15) {
        level = 'Sedang';
    } else if (rowAct >= 6 && rowAct <= 10) {
        level = 'Rendah';
    } else if (rowAct <= 5) {
        level = 'Sangat Rendah';
    }

    $('#pemantauan_resiko_nilai_capt').val(level)
}

function fillNilaiResponResikoLevel(result) {
    if (result.data != null) {
        $("#pemantauan_resiko_nilai").val(result.data.nilai);
    } else {
        $("#pemantauan_resiko_nilai").val(0);
    }

    var rowAct = parseFloat($("#pemantauan_resiko_nilai_act").val());
    var row = parseFloat($("#pemantauan_resiko_nilai").val());
    var selisih = row - rowAct;

    $("#pemantauan_resiko_selisih").val(selisih);

    if (parseFloat(selisih) < 0) {
        $("#pemantauan_resiko_selisih").css("background-color", "red");
    } else {
        $("#pemantauan_resiko_selisih").css("background-color", "");
    }
}

$(document).ready(function () {
    $(".notif-profil").hide();
    if (pemantauan_id == "") {
        
    } else {
        setTableResikoLevelDetail();
    }

    $('#pemantauan_resiko_pernyataan').on('change', function() {
        var resiko_kemungkinan = $('#pemantauan_resiko_pernyataan option:selected').data('resiko_kemungkinan');
        var resiko_dampak = $('#pemantauan_resiko_pernyataan option:selected').data('resiko_dampak');
        var resiko_nilai = $('#pemantauan_resiko_pernyataan option:selected').data('resiko_nilai');

        $('#pemantauan_resiko_kemungkinan').val(resiko_kemungkinan).trigger('change')
        $('#pemantauan_resiko_dampak').val(resiko_dampak).trigger('change')
        $('#pemantauan_resiko_nilai').val(resiko_nilai).trigger('change')
    })

    $("#pemantauan_resiko_kemungkinan, #pemantauan_resiko_dampak").on(
        "change",
        function () {
            var reqData = {
                id_kriteria_kemungkinan: $(
                    "#pemantauan_resiko_kemungkinan"
                ).val(),
                id_kriteria_dampak: $("#pemantauan_resiko_dampak").val(),
                tipe: "nilai",
            };

            ajaxData(urlData, reqData, fillNilaiResponResikoLevel);
        }
    );

    $("#pemantauan_resiko_kemungkinan_act, #pemantauan_resiko_dampak_act").on(
        "change",
        function () {
            var reqData = {
                id_kriteria_kemungkinan: $(
                    "#pemantauan_resiko_kemungkinan_act"
                ).val(),
                id_kriteria_dampak: $("#pemantauan_resiko_dampak_act").val(),
                tipe: "nilai",
            };

            ajaxData(urlData, reqData, fillNilaiResponResikoLevelActResikoLevel);
        }
    );

    $("#inovasi_id").on("change", function () {
        var resiko_id = $("#inovasi_id option:selected").data("resiko_id");

        $("#resiko_id").val(resiko_id);
        $("#show_resiko_id").val(resiko_id).trigger("change");
    });

    $("#form-pemantauan_resiko_detail").validate({
        rules: {},
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append("pemantauan_id", pemantauan_id);
            reqData.append("tipe", "pemantauan_resiko_detail");

            ajaxData(action, reqData, refreshResikoLevel, true);
        },
    });
});
