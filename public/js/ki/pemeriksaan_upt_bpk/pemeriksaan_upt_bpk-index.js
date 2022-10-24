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
    $('#created_at').val(data[0].created_at);
    $('#unor').val(data[0].unor);
    $('#nomor_lhp').val(data[0].nomor_lhp_bpk);
    $('#tahun').val(data[0].tahun);
    $('#jenis_lhp').val(data[0].jenis_lhp);
    $('#rekomendasi_jumlah').val(data[0].rekomendasi_jumlah);
    $('#rekomendasi_nilai').val(data[0].rekomendasi_nilai);
    $('#tindak_lanjut_sesuai_rekomendasi_jumlah').val(data[0].tindak_lanjut_sesuai_rekomendasi_jumlah);
    $('#tindak_lanjut_sesuai_rekomendasi_nilai').val(data[0].tindak_lanjut_sesuai_rekomendasi_nilai);
    $('#tindak_lanjut_belum_sesuai_rekomendasi_jumlah').val(data[0].tindak_lanjut_belum_sesuai_rekomendasi_jumlah);
    $('#tindak_lanjut_belum_sesuai_rekomendasi_nilai').val(data[0].tindak_lanjut_belum_sesuai_rekomendasi_nilai);
    $('#tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah').val(data[0].tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah);
    $('#tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai').val(data[0].tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai);
    $('#tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah').val(data[0].tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah);
    $('#tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai').val(data[0].tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai);
    // $('#deskripsi_tindak_lanjut').val(data[0].deskripsi_tindak_lanjut);

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
        // { data: 'created_at' },
        // { data: 'unit_organisasi' },
        { data: 'esNama' },
        // { data: 'tahun_lhp' },
        // { data: 'jenis_lhp' },
        { data: 'rekomendasi_jumlah' },
        { data: 'rekomendasi_nilai' },
        { data: 'tindak_lanjut_sesuai_rekomendasi_jumlah' },
        { data: 'tindak_lanjut_sesuai_rekomendasi_nilai' },
        { data: 'tindak_lanjut_belum_sesuai_rekomendasi_jumlah' },
        { data: 'tindak_lanjut_belum_sesuai_rekomendasi_nilai' },
        { data: 'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_jumlah' },
        { data: 'tindak_lanjut_belum_ditindaklanjuti_rekomendasi_nilai' },
        { data: 'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_jumlah' },
        { data: 'tindak_lanjut_tidak_dapat_ditindaklanjuti_rekomendasi_nilai' },
        // { data: 'deskripsi_tindak_lanjut' },
        // { data: 'id', render: renderNumRow}
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

    $('#datetimepicker-TGL_PENGAJUAN').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-TGL_REKOMTEK').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-TGL_TERBIT').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    $('#datetimepicker-TGL_MONEV').datetimepicker({
        format: 'YYYY-MM-DD',
    });
});