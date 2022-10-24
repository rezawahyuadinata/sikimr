var tableData;

$(".unitkerja").on('change', function () {
    let dropdown = $('.satker');
    console.log(this.value);
    if (this.value) {
        dropdown.empty();

        dropdown.append('<option value="">Pilih Satker</option>');
        dropdown.prop('selectedIndex', 0);
        var getSatker = mainServerUrl + "/ki/ajax/satker/"
        const url = getSatker + this.value;

        // Populate dropdown with list of provinces
        $.getJSON(url, function (data) {
            $.each(data, function (key, entry) {
                dropdown.append($('<option></option>').attr({
                    "value": entry.ID
                }).text(entry.NAMA));
            })
        });
    }
});

function uploadExcel() {
    var _token = $('#token_excel').val();
    var files = $('#file_excel').prop('files')[0];
    // Check file selected or not
    swal({
        title: "Apakah anda yakin?",
        text: "Upload Excel ini ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, lanjutkan"
    }, function () {
        $('#modal-loading').fadeIn('fast');

        let formData = new FormData();
        formData.append('fileupload', files);
        formData.append('_token', _token);

        $.ajax({
            type: 'POST',
            url: mainServerUrl + "/ki/ajax/import-excel",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (res) {
                $('#modal-loading').fadeOut('fast');
                if (res.status == 1) {
                    swal('Sukses', res.message, 'success');
                    window.location.reload();

                } else {
                    swal('Terjadi Kesalahan', res.message, 'error');
                }
            },
            error: function () {
                $('#modal-loading').fadeOut('fast');
                swal('Terjadi Masalah');
            }
        });
    });
}

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
    // resetForm('#form-data');

    $('#id').val(data[0].id);
    $('#judul_matriks').val(data[0].judul_matriks);
    $('#no_lhp').val(data[0].no_lhp);
    $('#jenis_lhp').val(data[0].jenis_lhp);
    $('#jenis_temuan').val(data[0].jenis_temuan);
    $('#reff_lhp').val(data[0].reff_lhp);
    $('#ref_idt').val(data[0].ref_idt);
    $('#tahun_lhp').val(data[0].tahun_lhp);
    $('#judul_temuan_besar').val(data[0].judul_temuan_besar);
    $('#rekomendasi_temuan').val(data[0].rekomendasi_temuan);
    $('#unit_organisasi').val(data[0].unit_organisasi);
    $('#upt_id').val(data[0].upt_id).trigger('change');
    $('#provinsi').val(data[0].provinsi);
    $('#nilai_rekomendasi').val(data[0].nilai_rekomendasi);
    $('#nilai_ss').val(data[0].nilai_ss);
    $('#nilai_tptd').val(data[0].nilai_tptd);
    $('#nilai_sisa').val(data[0].nilai_sisa);
    $('#modal-data').modal('show');
    sleep(5000).then(() => {
        // Do something after the sleep!
        $('.satker').val(data[0].satker_id).trigger('change');
    });

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
    var colDef = [{
            data: 'id',
            render: renderNumRow
        },
        {
            data: 'judul_matriks'
        },
        {
            data: 'no_lhp'
        },
        {
            data: 'jenis_lhp'
        },
        {
            data: 'jenis_temuan'
        },
        {
            data: 'reff_lhp'
        },
        {
            data: 'ref_idt'
        },
        {
            data: 'tahun_lhp'
        },
        {
            data: 'judul_temuan_besar'
        },
        {
            data: 'rekomendasi_temuan'
        },
        {
            data: 'unit_organisasi'
        },
        {
            data: 'es2Nama'
        },
        {
            data: 'satkerNama'
        },
        {
            data: 'provinsi'
        },
        {
            data: 'nilai_rekomendasi'
        },
        {
            data: 'nilai_ss'
        },
        {
            data: 'nilai_tptd'
        },
        {
            data: 'nilai_sisa'
        },
        {
            data: 'uraian_tl_bpk'
        },
        {
            data: 'status_siptl'
        },
        {
            data: 'status_tekomendasi_unor'
        },
        {
            data: 'uraian_kekurangan_tl'
        },
        {
            data: 'status_upload_siptl'
        },
        {
            data: 'status_finalisasi_siptl'
        },
        {
            data: 'uraian_kekurangan_dokumen'
        },
        {
            data: 'uraian_verifikasi'
        },
        {
            data: 'nilai_memadai'
        },
        {
            data: 'status_verifikasi'
        },
        {
            data: 'catatan_belum_memadai'
        },
        {
            data: 'tl_baru_diajukan_verifikasi_itjen'
        },
        {
            data: 'nilai_tl_baru_diajukan_itjen'
        },
        {
            data: 'tl_baru_validasi_uki'
        },
        {
            data: 'nilai_tl_baru_validasi_uki'
        },
        {
            data: 'nilai_total_tl'
        },
        {
            data: 'status_tl_satker'
        },
        {
            data: 'sifat_rekomendasi'
        },
        {
            data: 'rencana_aksi'
        },
        {
            data: 'duedate_renaksi'
        },
        {
            data: 'penyelesaian_bpk_pendek'
        },
        {
            data: 'penyelesaian_bpk_menengah'
        },
        {
            data: 'penyelesaian_bpk_panjang'
        },
        {
            data: 'klasren_dapat_tl'
        },
        {
            data: 'klasren_pembahasan_tl'
        },
        {
            data: 'klasren_tptd'
        },
        {
            data: 'klasren_tl_disepakati'
        },
        {
            data: 'klasren_proses_telaah'
        },
        {
            data: 'pejabat_terkait'
        },
        {
            data: 'catatan_pembahasan'
        },
        {
            data: 'tl_sebelum_khp'
        },
        {
            data: 'id',
            render: renderAction
        }
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

function sleep(time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}
