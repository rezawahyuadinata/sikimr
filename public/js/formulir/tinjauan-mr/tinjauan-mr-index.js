var table_tinjauan_detail;

function refresh_tinjauan_detail(result) {
    alertSuccess(result.message);
    table_tinjauan_detail.draw(false);
    $("#modal-tinjauan_detail").modal("hide");
}

function detailDataMR(tipe, id) {
    if (tipe == "tinjauan_detail") {
        detail_tinjauan_detail(id);
    }
}

// PEMANGKU KEPENTINGAN //
function detail_tinjauan_detail(id) {
    var dataSet = table_tinjauan_detail.rows().data();
    var data = dataSet.filter(function (index) {
        return index.tinjauan_detail_id == id;
    });

    action = urlUpdate;

    $("#tinjauan_detail_id").val(id);

    for (var key in data[0]) {
        if (key == "id") {
            $("#tinjauan_detail_id").val(data[0][key]);
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

    $("#modal-tinjauan_detail").modal("show");
}

function renderActionTinjauanDetail(data, type, row) {
    var button = "";

    button +=
        '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailDataMR(\'tinjauan_detail\', \'' +
        row.tinjauan_detail_id +
        '\')"><i class="fa fa-edit"></i></button>';

    button +=
        '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' +
        row.tinjauan_detail_id +
        "', '" +
        baseUrl +
        "/delete_data/tinjauan_detail/" +
        row.tinjauan_detail_id +
        '\', refresh_tinjauan_detail)"><i class="fa fa-remove"></i></button>';

    return button;
}
function romanize_tinjauan(num) {
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

function triWulan(data) {
    return data ? "Triwulan " + romanize_tinjauan(data) : "";
}

function setTableTinjauanDetail() {
    var colDef = [
        { data: "tinjauan_detail_id", render: renderNumRow },
        { data: "tinjauan_nama", seachable: false },
        { data: "tinjauan_pernyataan", seachable: false },
        { data: "tinjauan_penyebab", seachable: false },
        { data: "tinjauan_kemungkinan", name: "m_kriteria_dampak.dampak" },
        {
            data: "tinjauan_dampak",
            name: "m_kriteria_kemungkinan.level_kemungkinan",
        },
        { data: "tinjauan_nilai" },
        { data: "tinjauan_level" },
        { data: "respon_risiko", name: "m_respon_risiko.respon_risiko" },
        { data: "tinjauan_detail_id", render: renderActionTinjauanDetail },
    ];
    var reqData = {
        pemantauan_id: pemantauan_id,
        tipe: "tinjauan_detail",
    };

    var reqOrder = [[1, "ASC"]];

    table_tinjauan_detail = setDataTable(
        "#table-tinjauan_detail",
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

function fillNilaiResponTinjauan(result) {
    if (result.data != null) {
        $("#tinjauan_nilai").val(result.data.nilai);
        sample(result.data.nilai);
    } else {
        $("#tinjauan_nilai").val("");
    }
}

function sample(data) {
    var reqData = {
        number: data,
        tipe: "tinjauan",
    };
    ajaxData(urlData, reqData, fillTinjauanRespon);
}

function fillTinjauanRespon(result) {
    if (result.data != null) {
        $("#tinjauan_level").val(
            result.data.keterangan + " (" + result.data.level_risiko + ")"
        );
    } else {
        $("#tinjauan_level").val("");
    }
}

$(document).ready(function () {
    $(".notif-profil").hide();

    if (pemantauan_id == "") {
        
    } else {
        setTableTinjauanDetail();
    }

    $("#tinjauan_kemungkinan, #tinjauan_dampak").on("change", function () {
        var reqData = {
            id_kriteria_kemungkinan: $("#tinjauan_kemungkinan").val(),
            id_kriteria_dampak: $("#tinjauan_dampak").val(),
            tipe: "nilai",
        };

        ajaxData(urlData, reqData, fillNilaiResponTinjauan);
    });

    $("#inovasi_id").on("change", function () {
        var resiko_id = $("#inovasi_id option:selected").data("resiko_id");

        $("#resiko_id").val(resiko_id);
        $("#show_resiko_id").val(resiko_id).trigger("change");
    });

    $("#form-tinjauan_detail").validate({
        rules: {},
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append("pemantauan_id", pemantauan_id);
            reqData.append("tipe", "tinjauan_detail");

            ajaxData(action, reqData, refresh_tinjauan_detail, true);
        },
    });
});
