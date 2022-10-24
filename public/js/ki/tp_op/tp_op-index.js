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
    $('#ppk').val(data[0].ppk);
    $('#satuan_kerja').val(data[0].satuan_kerja);
    $('#balai').val(data[0].balai);
    $('#alokasi_dana').val(data[0].alokasi_dana);
    $('#sumber_dana').val(data[0].sumber_dana).trigger("change");
    $('#jumlah_paket_kegiatan').val(data[0].jumlah_paket_kegiatan);
    $('#jumlah_kak_delegasi').val(data[0].jumlah_kak_delegasi);
    $('#tp_op_non_fisik_jumlah').val(data[0].tp_op_non_fisik_jumlah);
    $('#tp_op_non_fisik_dana').val(data[0].tp_op_non_fisik_dana);
    $('#tp_op_fisik_jumlah').val(data[0].tp_op_fisik_jumlah);
    $('#tp_op_fisik_dana').val(data[0].tp_op_fisik_dana);
    $('#kegiatan_irisan_non_fisik_jumlah').val(data[0].kegiatan_irisan_non_fisik_jumlah);
    $('#kegiatan_irisan_non_fisik_dana').val(data[0].kegiatan_irisan_non_fisik_dana);
    $('#kegiatan_irisan_fisik_jumlah').val(data[0].kegiatan_irisan_fisik_jumlah);
    $('#kegiatan_irisan_fisik_dana').val(data[0].kegiatan_irisan_fisik_dana);
    $('#monev_fisik_progres_rencana').val(data[0].monev_fisik_progres_rencana);
    $('#monev_fisik_progres_realisasi').val(data[0].monev_fisik_progres_realisasi);
    $('#monev_fisik_progres_deviasi').val(data[0].monev_fisik_progres_deviasi);
    $('#monev_keuangan_rencana').val(data[0].monev_keuangan_rencana);
    $('#monev_keuangan_realisasi').val(data[0].monev_keuangan_realisasi);
    $('#monev_keuangan_deviasi').val(data[0].monev_keuangan_deviasi);
    $('#resiko_program_terkait').val(data[0].resiko_program_terkait);
    $('#resiko_anggaran').val(data[0].resiko_anggaran);
    $('#resiko_output').val(data[0].resiko_output);
    $('#resiko_outcome').val(data[0].resiko_outcome);
    $('#resiko_penerima_manfaat').val(data[0].resiko_penerima_manfaat);
    $('#pengaduan_status').val(data[0].pengaduan_status).trigger("change");
    $('#pengaduan_jumlah').val(data[0].pengaduan_jumlah);
    $('#laporan_pelaksanaan_proses').val(data[0].laporan_pelaksanaan_proses);
    $('#laporan_pelaksanaan_selesai').val(data[0].laporan_pelaksanaan_selesai);
    $('#laporan_pelaksanaan_deliver').val(data[0].laporan_pelaksanaan_deliver);
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
        { data: 'ppk' },
        { data: 'satuan_kerja' },
        { data: 'balai' },
        { data: 'alokasi_dana' },
        { data: 'sumber_dana' },
        { data: 'jumlah_paket_kegiatan' },
        { data: 'jumlah_kak_delegasi' },
        { data: 'tp_op_non_fisik_jumlah' },
        { data: 'tp_op_non_fisik_dana' },
        { data: 'tp_op_fisik_jumlah' },
        { data: 'tp_op_fisik_dana' },
        { data: 'kegiatan_irisan_non_fisik_jumlah' },
        { data: 'kegiatan_irisan_non_fisik_dana' },
        { data: 'kegiatan_irisan_fisik_jumlah' },
        { data: 'kegiatan_irisan_fisik_dana' },
        { data: 'monev_fisik_progres_rencana' },
        { data: 'monev_fisik_progres_realisasi' },
        { data: 'monev_fisik_progres_deviasi' },
        { data: 'monev_keuangan_rencana' },
        { data: 'monev_keuangan_realisasi' },
        { data: 'monev_keuangan_deviasi' },
        { data: 'resiko_program_terkait' },
        { data: 'resiko_anggaran' },
        { data: 'resiko_output' },
        { data: 'resiko_outcome' },
        { data: 'resiko_penerima_manfaat' },
        { data: 'pengaduan_status' },
        { data: 'pengaduan_jumlah' },
        { data: 'laporan_pelaksanaan_proses' },
        { data: 'laporan_pelaksanaan_selesai' },
        { data: 'laporan_pelaksanaan_deliver' },
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
});