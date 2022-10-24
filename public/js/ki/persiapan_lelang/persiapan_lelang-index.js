var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
}

function DokPerencanaan(data, type, dataToSet){
  if (data.kak_kpa == null || data.idk_kpa == null || data.rab_kpa == null || data.jd_kpa == null || data.spt_kpa == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function ReviewDokRPP(data, type, dataToSet){
  if (data.usulan_pkt == null || data.spektek_pkj == null || data.rancangan_kontrak_pkj == null || data.hps_pkj == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function UploadBAHP(data, type, dataToSet){
  if (data.pelak_pml == null || data.monitoring == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function SPPBJdanKontrak(data, type, dataToSet){
  if (data.sppbj_pkt == null || data.sdpp_pkt == null || data.kntrk_pkt == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function KSO(data, type, dataToSet){
  if (data.kso_pkt == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function SubKontrak(data, type, dataToSet){
  if (data.subkon_pkt == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function PersonildanPeralatan(data, type, dataToSet){
  if (data.kmp_perso == null || data.perso == null || data.peralatan == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function UploadSPMK(data, type, dataToSet){
  if (data.spmk == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function AddendumKontrak(data, type, dataToSet){
  if (data.addendum == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function SerahTerima(data, type, dataToSet){
  if (data.srh_terima == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function DokRPP(data, type, dataToSet){
  if (data.spektek_rpp == null || data.rancangan_kontrak_rpp == null || data.hps_rpp == null){
    return '<i class="fa fa-remove text-danger"></i>';
  }else{
    return '<i class="fa fa-check text-success"></i>';
  }
}

function setTable(year = null) {

    $.each($('.change-draw'), function () {
      year = $('#tahun').val();
    })

    var colDef = [
        { data: 'idrupp'},
        { data: 'nama_satker', name: 'tbl_satker.nama_satker'},
        { data: 'namapaket'},
        { data: 'idrupp', "searchable": false, "orderable": false, render: function(data){if(data == null){return '<i class="fa fa-remove text-danger"></i>'}else{return '<i class="fa fa-check text-success"></i>'}}, className: "dt-body-center" },
        { data: 'pkt_ppk', "searchable": false, "orderable": false, render: function(data){if(data == null){return '<i class="fa fa-remove text-danger"></i>'}else{return '<i class="fa fa-check text-success"></i>'}}, className: "dt-body-center" },
        { data: DokPerencanaan, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: DokRPP, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: ReviewDokRPP, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: UploadBAHP, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: SPPBJdanKontrak, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: KSO, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: SubKontrak, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: PersonildanPeralatan, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: UploadSPMK, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: AddendumKontrak, "searchable": false, "orderable": false, className: "dt-body-center"},
        { data: SerahTerima, "searchable": false, "orderable": false, className: "dt-body-center"},
    ];

    var reqData = {
        'year' : year
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
    $('#datetimepicker-tahun').datetimepicker({
        format: 'YYYY',
    });
});

$('#datetimepicker-tahun').on('dp.change', function () {
    changeViewDate("kontrak", $("#tahun").val(), '#tgl_backup')
})

function changeViewDate(type, year, selector) {
    $.get(urlChangeDate, {
        type,
        year
    }, function (res) {
        if (res.status == 1) {

            $.each(res.data, function (i, v) {
            })

            $(selector).change();
        }
    })
}
