var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    $('#modal-data').modal('hide');
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
    $('#kdpaket').val(data[0].kdpaket).trigger("change");
    $('#satker_ppk').val(data[0].satker_ppk);
    $('#satker_nama').val(data[0].satker_nama);
    $('#kebutuhan_luas').val(data[0].kebutuhan_luas);
    $('#kebutuhan_jumlah_bidang').val(data[0].kebutuhan_jumlah_bidang);
    $('#kebutuhan_anggaran').val(data[0].kebutuhan_anggaran);
    $('#realisasi_luas').val(data[0].realisasi_luas);
    $('#realisasi_jumlah_bidang').val(data[0].realisasi_jumlah_bidang);
    $('#realisasi_anggaran').val(data[0].realisasi_anggaran);
    $('#sisa_luas').val(data[0].sisa_luas);
    $('#sisa_jumlah_bidang').val(data[0].sisa_jumlah_bidang);
    $('#sisa_anggaran').val(data[0].sisa_anggaran);
    $('#alokasi_anggaran').val(data[0].alokasi_anggaran);
    $('#penetapan_lokasi_no').val(data[0].penetapan_lokasi_no);
    $('#penetapan_lokasi_masa_laku_awal').val(data[0].penetapan_lokasi_masa_laku_awal);
    $('#penetapan_lokasi_masa_laku_akhir').val(data[0].penetapan_lokasi_masa_laku_akhir);
    $('#penetapan_lokasi_perpanjangan_dari').val(data[0].penetapan_lokasi_perpanjangan_dari);
    $('#penetapan_lokasi_perpanjangan_sampai').val(data[0].penetapan_lokasi_perpanjangan_sampai);
    $('#monev_status').val(data[0].monev_status).trigger("change");
    $('#monev_output').val(data[0].monev_output);
    $('#penyebab_lainnya').val(data[0].penyebab_lainnya);
    $('#penyebab_keterangan').val(data[0].penyebab_keterangan);
    $('#resiko_kemunduran_masa_konstruksi').val(data[0].resiko_kemunduran_masa_konstruksi);
    $('#resiko_output').val(data[0].resiko_output);
    $('#resiko_outcome').val(data[0].resiko_outcome);
    $('#resiko_penerima_manfaat').val(data[0].resiko_penerima_manfaat);

    $('#penyebab_terlambat').val(data[0].penyebab_terlambat.split(',')).trigger('change');

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
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'nmpaket' },
        { data: 'satker_ppk' },
        { data: 'satker_nama' },
        { data: 'kebutuhan_luas' },
        { data: 'kebutuhan_jumlah_bidang' },
        { data: 'kebutuhan_anggaran' },
        { data: 'realisasi_luas' },
        { data: 'realisasi_jumlah_bidang' },
        { data: 'realisasi_anggaran' },
        { data: 'sisa_luas' },
        { data: 'sisa_jumlah_bidang' },
        { data: 'sisa_anggaran' },
        { data: 'alokasi_anggaran' },
        { data: 'penetapan_lokasi_no' },
        { data: 'penetapan_lokasi_masa_laku_awal' },
        { data: 'penetapan_lokasi_masa_laku_akhir' },
        { data: 'penetapan_lokasi_perpanjangan_dari' },
        { data: 'penetapan_lokasi_perpanjangan_sampai' },
        { data: 'monev_status' },
        { data: 'monev_output' },
        { data: 'penyebab_terlambat' },
        { data: 'penyebab_lainnya' },
        { data: 'penyebab_keterangan' },
        { data: 'resiko_kemunduran_masa_konstruksi' },
        { data: 'resiko_output' },
        { data: 'resiko_outcome' },
        { data: 'resiko_penerima_manfaat' },
        { data: 'id', render: renderAction }
    ];
    var reqData = null;

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

    $('.form-penyebab-lainnya').hide();
    $('#penyebab_terlambat').change(function () {
        console.log($(this).val());
        $(this).val().find(function (val) {
            console.log(val);
            if (val == 'Lainnya') {
                $('.form-penyebab-lainnya').show();
            } else {
                $('.form-penyebab-lainnya').hide();
                $('#penyebab_terlambat').val('');
            }
        })
    })
});
