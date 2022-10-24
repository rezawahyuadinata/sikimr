var table_pengaduan, table_pengaduan_kategori, table_pembahasan,
    table_peninjauan_lapangan, table_telaahan, table_pemantauan;

var satker, ppk;

function refresh(result) {
    alertSuccess(result.message)
    table_pengaduan.draw(false);
    table_pengaduan_kategori.draw(false);
    table_pembahasan.draw(false);
    table_peninjauan_lapangan.draw(false);
    table_telaahan.draw(false);
    table_pemantauan.draw(false);
    $('#modal-pengaduan').modal('hide');
    $('#modal-pengaduan_kategori').modal('hide');
    $('#modal-pembahasan').modal('hide');
    $('#modal-peninjauan_lapangan').modal('hide');
    $('#modal-telaahan').modal('hide');
    $('#modal-pemantauan').modal('hide');
    location.reload();
}

function reloadPage(result) {
    alertSuccess(result.message, baseUrl + '/create_detail/' + $('#id_surat').val())
}

function addData(modal, form) {
    resetForm(form);
    action = urlInsert;
    $(modal).modal('show');
}

function detailData(tipe, id) {
    if (tipe == 'pengaduan') {
        detail_pengaduan(id)
    } else if (tipe == 'pengaduan_kategori') {
        detail_pengaduan_kategori(id)
    } else if (tipe == 'pembahasan') {
        detail_pembahasan(id)
    } else if (tipe == 'peninjauan_lapangan') {
        detail_peninjauan_lapangan(id)
    } else if (tipe == 'telaahan') {
        detail_telaahan(id)
    } else if (tipe == 'pemantauan') {
        detail_pemantauan(id)
    }
}

function detail_pengaduan(id) {
    var dataSet = table_pengaduan.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;

    satker = data[0].pemilik_resiko_satker;
    ppk = data[0].pemilik_resiko_ppk;
    $('#pengaduan_id').val(id);
    $('#nama_pengadu').val(data[0].nama_pengadu);
    $('#jenis_pengaduan').val(data[0].jenis_pengaduan).trigger('change');
    $('#kegiatan').val(data[0].kegiatan);
    $('#pemilik_resiko_bws').val(data[0].pemilik_resiko_bws).trigger('change');
    $('#terkait_aph').val(data[0].terkait_aph);
    $('#modal-pengaduan').modal('show');
}

function detail_pengaduan_kategori(id) {
    var dataSet = table_pengaduan_kategori.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;
    $('#pengaduan_kategori_id').val(id);
    $('#kategori').val(data[0].kategori).trigger('change');
    $('#status').val(data[0].status).trigger('change');
    $('#keterangan').val(data[0].keterangan);
    $('#pendampingan').val(data[0].pendampingan);

    $('#modal-pengaduan_kategori').modal('show');
}

function detail_pembahasan(id) {
    var dataSet = table_pembahasan.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;
    var batas_waktu_peninjauan = moment(data[0].batas_waktu_peninjauan).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');
    var tanggal = moment(data[0].tanggal).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');

    $('#pembahasan_id').val(id);
    $('#memo_dinas').val(data[0].memo_dinas);
    $('#nomor_md').val(data[0].nomor_md);
    $('#bentuk_pembahasan').val(data[0].bentuk_pembahasan).trigger('change');
    $('#tanggal').val(tanggal);
    $('#catatan').val(data[0].catatan);
    $('#batas_waktu_peninjauan').val(batas_waktu_peninjauan);

    if (data[0].dokumentasi !== null) {
        $('#upload-target').html(`<img src="/media/pembahasan/dokumentasi/${data[0].dokumentasi}" style="width:100%; height:100%;">`);
    }
    $('#modal-pembahasan').modal('show');
}

function detail_peninjauan_lapangan(id) {
    var dataSet = table_peninjauan_lapangan.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;
    var waktu_pelaksanaan = moment(data[0].waktu_pelaksanaan).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');

    $('#peninjauan_lapangan_id').val(id);
    $('#waktu_pelaksanaan').val(waktu_pelaksanaan);
    $('#lokasi').val(data[0].lokasi);
    $('#pegawai_ditugaskan').val(data[0].pegawai_ditugaskan);
    $('#hasil_laporan').val(data[0].hasil_laporan);

    if (data[0].foto_laporan !== null) {
        $('#upload-target-laporan').html(`<img src="/media/peninjauan_lapangan/foto_laporan/${data[0].foto_laporan}" style="width:100%; height:100%;">`);
    }
    $('#modal-peninjauan_lapangan').modal('show');
}

function detail_telaahan(id) {
    var dataSet = table_telaahan.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;
    var tanggal = moment(data[0].tanggal).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');
    var batas_waktu_pemantauan = moment(data[0].batas_waktu_pemantauan).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');

    $('#telaahan_id').val(id);
    $('#nomor').val(data[0].nomor);
    $('#tanggal_telaahan').val(tanggal);
    $('#distribusi').val(data[0].distribusi).trigger('change');
    $('#indikasi_penyimpangan').val(data[0].indikasi_penyimpangan).trigger('change');
    $('#rekomendasi').val(data[0].rekomendasi);
    $('#key_telaahan').val(data[0].key_telaahan);
    $('#batas_waktu_pemantauan').val(batas_waktu_pemantauan);

    if (data[0].foto_telaahan !== null) {
        $('#upload-target-telaahan').html(`<img src="/media/telaahan/foto_telaahan/${data[0].foto_telaahan}" style="width:100%; height:100%;">`);
    }
    $('#modal-telaahan').modal('show');
}

function detail_pemantauan(id) {
    var dataSet = table_pemantauan.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;
    var tanggal = moment(data[0].tanggal).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');

    $('#pemantauan_id').val(id);
    $('#tanggal_pemantauan').val(tanggal);
    $('#uraian_pemantauan').val(data[0].uraian_pemantauan);

    if (data[0].foto_pemantauan !== null) {
        $('#upload-target-pemantauan').html(`<img src="/app/public/media/pemantauan/foto_pemantauan/${data[0].foto_pemantauan}" style="width:100%; height:100%;">`);
    }
    $('#modal-pemantauan').modal('show');
}

function renderActionPengaduan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'pengaduan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/pengaduan/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderActionPengaduanKategori(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'pengaduan_kategori\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/pengaduan_kategori/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderActionPembahasan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'pembahasan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/pembahasan/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderActionPeninjauanLapangan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'peninjauan_lapangan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/peninjauan_lapangan/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderActionTelaahan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'telaahan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/telaahan/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderActionPemantauan(data, type, row) {
    var button = '';


    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/pemantauan/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderJenisPengaduan(data) {
    if (data == 1) return 'Kegiatan'
    else if (data == 2) return 'Umum';

    return '';
}

function renderStatus(data) {
    if (data == 1) return 'Ya'
    else if (data == 0) return 'Tidak';

    return '';
}

function renderIndikasi(data) {
    if (data == 1) return 'Iya'
    else if (data == 0) return 'Tidak Ada';

    return '';
}

function renderDistribusi(data) {
    if (data == 1) return 'Sudah'
    else if (data == 0) return 'Belum';

    return '';
}

function renderStatusPengaduan(data) {
    if (data == 0) return 'Belum Tindak Lanjut'
    else if (data == 1) return 'Proses'
    else if (data == 2) return 'Selesai'
}

function renderActionBentukPembahasan(data) {
    if (data == 1) return 'Online'
    else if (data == 2) return 'Offline'
}

function renderGambarDokumentasi(data) {
    if (data != null) return `<a href="/media/pembahasan/dokumentasi/${data}" target="_blank"><img  src="/media/pembahasan/dokumentasi/${data}" style="width:50px;"></a>`;

    return '<img src="/image/no-image.png" style="width:50px;">';
}

function renderGambarLaporan(data) {
    if (data != null) return `<a href="/media/peninjauan_lapangan/foto_laporan/${data}" target="_blank"><img src="/media/peninjauan_lapangan/foto_laporan/${data}" style="width:50px;"></a>`;

    return '<img src="/image/no-image.png" style="width:50px;">';
}

function renderGambarTelaahan(data) {
    if (data != null) return `<a href="/media/telaahan/foto_telaahan/${data}" target="_blank"><img src="/media/telaahan/foto_telaahan/${data}" style="width:50px;"></a>`;

    return '<img src="/image/no-image.png" style="width:50px;">';
}

function renderGambarPemantauan(data) {
    if (data != null) return `<a href="/media/pemantauan/foto_pemantauan/${data}" target="_blank"><img src="/media/pemantauan/foto_pemantauan/${data}" style="width:50px;"></a>`;

    return '<img src="/image/no-image.png" style="width:50px;">';
}

function renderDownloadFileMemo(data) {
    if (data != null) return `<a href="/media/pembahasan/file_memo/${data}" target="_blank"><button type="button" class="btn btn-block btn-info" >Download</button></a>`;

    return '<span>Tidak ada file</span>';
}

function renderDownloadFileLaporan(data) {
    if (data != null) return `<a href="/media/peninjauan_lapangan/file_laporan/${data}" target="_blank"><button type="button" class="btn btn-block btn-info" >Download</button></a>`;

    return '<span>Tidak ada file</span>';
}

function renderDownloadFileTelaahan(data) {
    if (data != null) return `<a href="/surat/download_telaahan/${data}" target="_blank"><button type="button" class="btn btn-block btn-info" >Download</button></a>`;

    return '<span>Tidak ada file</span>';
}
function renderDownloadFilePemantauan(data) {
    if (data != null) return `<a href="/surat/download_pemantauan/${data}" target="_blank"><button type="button" class="btn btn-block btn-info" >Download</button></a>`;

    return '<span>Tidak ada file</span>';
}

function setTablePengaduan() {
    var colDef = [
        { data: 'id', render: renderNumRow },

        { data: 'jenis_pengaduan', render: renderJenisPengaduan },
        { data: 'unit_kerja' },
        { data: 'pemilik_resiko_bws' },
        { data: 'pemilik_resiko_satker' },
        { data: 'pemilik_resiko_ppk' },
        { data: 'kegiatan' },
        { data: 'terkait_aph', render: renderStatus },
        { data: 'id', render: renderActionPengaduan }
    ];
    var reqData = {
        id_surat: $('#id_surat').val(),
        tipe: 'pengaduan',
    };

    var reqOrder = [[1, 'ASC']];
    table_pengaduan = setDataTable('#table-pengaduan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}

function setTablePengaduanKategori() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'integritas' },
        { data: 'perencanaan' },
        { data: 'pembebasan' },
        { data: 'tender' },
        { data: 'pelaksanaan' },
        { data: 'pemanfaatan' },
        { data: 'status', render: renderStatusPengaduan },
        { data: 'keterangan' },
        { data: 'pendampingan' },
        { data: 'id', render: renderActionPengaduanKategori }
    ];
    var reqData = {
        id_surat: $('#id_surat').val(),
        tipe: 'pengaduan_kategori',
    };

    var reqOrder = [[1, 'ASC']];
    table_pengaduan_kategori = setDataTable('#table-pengaduan_kategori', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}

function setTablePembahasan() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'progres_penelaahan' },
        { data: 'memo_dinas' },
        { data: 'nomor_md' },
        { data: 'bentuk_pembahasan', render: renderActionBentukPembahasan },
        { data: 'tanggal' },
        { data: 'catatan' },
        { data: 'file_memo', render: renderDownloadFileMemo },
        { data: 'dokumentasi', render: renderGambarDokumentasi },
        { data: 'batas_waktu_peninjauan' },
        { data: 'proses' },
        { data: 'hambatan' },
        { data: 'id', render: renderActionPembahasan }
    ];

    var reqData = {
        id_surat: $('#id_surat').val(),
        tipe: 'pembahasan',
    };

    var reqOrder = [[1, 'ASC']];
    table_pembahasan = setDataTable('#table-pembahasan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}

function setTablePeninjauanLapangan() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'waktu_pelaksanaan' },
        { data: 'lokasi' },
        { data: 'pegawai_ditugaskan' },
        { data: 'hasil_laporan' },
        { data: 'file_laporan', render: renderDownloadFileLaporan },
        { data: 'foto_laporan', render: renderGambarLaporan },
        { data: 'id', render: renderActionPeninjauanLapangan }
    ];
    var reqData = {
        id_surat: $('#id_surat').val(),
        tipe: 'peninjauan_lapangan',
    };

    var reqOrder = [[1, 'ASC']];
    table_peninjauan_lapangan = setDataTable('#table-peninjauan_lapangan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}

function setTableTelaahan() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'nomor' },
        { data: 'tanggal' },
        { data: 'distribusi', render: renderDistribusi },
        { data: 'indikasi_penyimpangan', render: renderIndikasi },
        { data: 'rekomendasi' },
        { data: 'key_telaahan' },
        { data: 'file_telaahan', render: renderDownloadFileTelaahan },
        { data: 'foto_telaahan', render: renderGambarTelaahan },
        { data: 'batas_waktu_pemantauan' },
        { data: 'id', render: renderActionTelaahan }
    ];
    var reqData = {
        id_surat: $('#id_surat').val(),
        tipe: 'telaahan',
    };

    var reqOrder = [[1, 'ASC']];
    table_telaahan = setDataTable('#table-telaahan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}

function setTablePemantauan() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'tanggal' },
        { data: 'progres' },
        { data: 'rekomendasi_harus_tl' },
        { data: 'rekomendasi_sudah_tl' },
        { data: 'tgl_batas_waktu' },
        { data: 'uraian_pemantauan' },
        { data: 'file_pemantauan', render: renderDownloadFilePemantauan },
        { data: 'foto_pemantauan', render: renderGambarPemantauan },
        { data: 'id', render: renderActionPemantauan }
    ];
    var reqData = {
        id_surat: $('#id_surat').val(),
        tipe: 'pemantauan',
    };

    var reqOrder = [[1, 'ASC']];
    table_pemantauan = setDataTable('#table-pemantauan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}

function fillSatker(result) {
    if ($('#pemilik_resiko_satker').val() == '') {
        $('#pemilik_resiko_satker').html('');

        var html = '<option value="">- Pilih Satker -</option>';
        $.each(result.data, function (index, val) {
            html += '<option value="' + val.ID + '">' + val.ID + ' - ' + val.NAMA + '</option>';
        });

        $('#pemilik_resiko_satker').append(html);

        $('#pemilik_resiko_satker').val(satker).trigger('change');
    }
}

function fillPpk(result) {
    if ($('#pemilik_resiko_ppk').val() == '') {
        $('#pemilik_resiko_ppk').html('');

        var html = '<option value="">- Pilih PPK -</option>';
        $.each(result.data, function (index, val) {
            html += '<option value="' + val.ID + '">' + val.ID + ' - ' + val.NAMA + '</option>';
        });

        $('#pemilik_resiko_ppk').append(html);

        $('#pemilik_resiko_ppk').val(ppk).trigger('change');
    }
}

$(document).ready(function () {
    setTablePengaduan()
    setTablePengaduanKategori()
    setTablePembahasan()
    setTablePeninjauanLapangan()
    setTableTelaahan()
    setTablePemantauan()

    $('#pemilik_resiko_bws').on('change', function () {
        var reqData = {
            bws: $(this).val()
        }
        ajaxData(urlSatker, reqData, fillSatker)
    })

    $('#pemilik_resiko_satker').on('change', function () {
        var reqData = {
            satker: $(this).val()
        }
        ajaxData(urlPpk, reqData, fillPpk)
    })

    $('a[href="#tab_a"]').on('click', function () {
        table_pengaduan.draw(false);
    })
    $('a[href="#tab_b"]').on('click', function () {
        table_pengaduan_kategori.draw(false);
    })
    $('a[href="#tab_c"]').on('click', function () {
        table_pembahasan.draw(false);
    })
    $('a[href="#tab_d"]').on('click', function () {
        table_peninjauan_lapangan.draw(false);
    })
    $('a[href="#tab_e"]').on('click', function () {
        table_telaahan.draw(false);
    })
    $('a[href="#tab_f"]').on('click', function () {
        table_pemantauan.draw(false);
    })


    $('#form-pengaduan').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('id_surat', $('#id_surat').val());
            reqData.append('tipe', 'pengaduan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-pengaduan_kategori').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('id_surat', $('#id_surat').val());
            reqData.append('tipe', 'pengaduan_kategori');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-pembahasan').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('id_surat', $('#id_surat').val());
            reqData.append('tipe', 'pembahasan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-peninjauan_lapangan').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('id_surat', $('#id_surat').val());
            reqData.append('tipe', 'peninjauan_lapangan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-telaahan').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('id_surat', $('#id_surat').val());
            reqData.append('tipe', 'telaahan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-pemantauan').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('id_surat', $('#id_surat').val());
            reqData.append('tipe', 'pemantauan');

            ajaxData(action, reqData, refresh, true);
        }
    });
})