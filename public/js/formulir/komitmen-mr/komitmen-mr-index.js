var table_sasaran, table_pemangku_kepentingan, table_tujuan, table_resiko;
var tujuan_kegiatan_utama;
var sasaran_id, indikator_sasaran_id;
var data_inovasi;
console.log(baseUrl);
function refreshPage(result) {
    //console.log(baseUrl);
    if (result.data != undefined) {
        alertSuccess(result.message, baseUrl + '?mr_id=' + result.data)
    } else {
        alertSuccess(result.message, mainServerUrl + '/formulir');
    }
}

function refresh(result) {
    alertSuccess(result.message)
    table_sasaran.draw(false);
    table_pemangku_kepentingan.draw(false);
    table_tujuan.draw(false);
    table_resiko.draw(false);
    $('#modal-sasaran').modal('hide');
    $('#modal-pemangku_kepentingan').modal('hide');
    $('#modal-tujuan').modal('hide');
    $('#modal-resiko').modal('hide');
}

function reloadPage(result) {
    $('#modal-jadwal').modal('hide')
    alertSuccess(result.message)

    var reqData = {
        mr_id: mr_id,
        tipe: 'jadwal'
    }

    ajaxData(urlData, reqData, loadJadwal);

}

function loadPeta(result) {
    $('#load-peta').html(result.view)
}

function loadJadwal(result) {
    $('#load-jadwal').html(result.view)
    $('.btn-jadwal').on('click', function () {
        action = urlInsert;
        resetForm('#form-jadwal');
        var id = $(this).data('id')
        var nomor = $(this).data('nomor')
        var year = $(this).data('year')
        var no = 1;

        for (var i = 1; i <= 12; i++) {
            for (var y = 1; y <= 4; y++) {
                text = 'minggu_' + no;
                if (nomor[text] != null) {
                    $('input[type="checkbox"][class="' + text + '"]').prop('checked', true);
                }
                no++;
            }

        }

        $('#m_jadwal_id').val(id)
        $('#year').val(year)
        $('#modal-jadwal').modal('show')
    })

    $('#form-jadwal').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('mr_id', mr_id);
            reqData.append('tipe', 'jadwal');

            ajaxData(action, reqData, reloadPage, true);
        }
    });

    $('input[name="check_minggu"]').on('change', function () {
        var row = $(this).closest('tr');
        if ($(this).prop('checked')) {
            row.find('input[type="checkbox"]').prop('checked', true);
        } else {
            row.find('input[type="checkbox"]').prop('checked', false);
        }
    })

    $('input[name="check_all"]').on('change', function () {
        var row = $(this).closest('table');
        if ($(this).prop('checked')) {
            row.find('input[type="checkbox"]').prop('checked', true);
        } else {
            row.find('input[type="checkbox"]').prop('checked', false);
        }
    })

    $('#btn-print-jadwal').on('click', function () {
        var printContents = document.getElementById('print-jadwal').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    })
}

function fillSasaran(result) {
    $('#sasaran_id').html('');

    var html = '';
    $.each(result.data, function (idx, val) {
        // if (result.data.length == 1) {
        //     sasaran_id = val.ID;
        // }
        html += '<option value="' + val.ID + '">' + val.SASARAN + '</option>';
    })
    //if (level == 'UPR-T1' || (level == 'UPR-T2' && unit == 'Balai')) {
    $('#sasaran_id').append(html);
    $('#sasaran_id').val(sasaran_id).trigger('change')
    //} else {

    // }
}

function fillPaket(result) {
    $('#notif').hide();
    $('#paket_id').html('');

    var html = '<option value="">- Pilih -</option>';
    $.each(result.data, function (idx, val) {
        html += '<option value="' + val.id + '">' + val.nmpaket + '</option>';
    })

    $('#paket_id').html(html);
    $('#paket_id').val(paket_id).trigger('change')

    if (result.data.length < 1) {
        $('#notif').show();
    }
}

function fillIndikatorSasaran(result) {
    $('#indikator_sasaran_id').html('');
    // $('#kegiatan_tujuan').html(indikator + ' (' + tujuan_kegiatan + ' ' + tujuan_kegiatan_satuan + ')');
    var html = '<option value="">- Pilih -</option>';
    $.each(result.data, function (idx, val) {
        if (level == 'UPR-T2' || level == 'UPR-T1') {
            html += '<option value="' + val.ID + '" data-indikator="' + val.INDIKATOR + '" data-target="' + val.TARGET + '" data-satuan="' + val.SATUAN + '">' + val.INDIKATOR + ' (' + val.SATUAN + ') </option>';
        } else {
            html += '<option value="' + val.ID + '" data-indikator="' + val.INDIKATOR + '" data-target="' + val.TARGET + '" data-satuan="' + val.SATUAN + '">' + val.INDIKATOR + '</option>';
        }
    })

    $('#indikator_sasaran_id').append(html);
    $('#indikator_sasaran_id').val(indikator_sasaran_id).trigger('change')
}

function setTujuanKegiatanUtama() {
    $('#resiko_paket_sasaran_id').html('');

    var html = '<option value="">- Pilih -</option>';
    console.log(tujuan_kegiatan_utama)
    $.each(tujuan_kegiatan_utama, function (idx, val) {
        if (level == 'UPR-T3') {
            html += '<option value="' + val.id + '">' + val.kegiatan_tujuan + ' ' + formatCurrency(val.tujuan_kegiatan) + ' ' + val.tujuan_kegiatan_satuan + '</option>';
        } else {
            html += '<option value="' + val.id + '">' + val.kegiatan_tujuan + ' ' + formatCurrency(val.tujuan_kegiatan) + ' ' + val.tujuan_kegiatan_satuan + '</option>';
        }
    })

    $('#resiko_paket_sasaran_id').append(html);
}

function addData(modal, form) {
    resetForm(form);
    sasaran_id = '';
    indikator_sasaran_id = '';
    data_inovasi = [];
    setTableInovasi();
    action = urlInsert;
    $(modal).modal('show');
    if (modal == '#modal-resiko') {
        var reqData = {
            mr_id: mr_id,
            tipe: 'sasaran',
            level: level
        };
        
        $.ajax({
            type: "POST",
            url: baseUrl + '/get_data',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: reqData,
            dataType: 'json',
            beforeSend: function () {
                $('#resiko_paket_sasaran_id').prop('disabled', true);
            },
            success: function (data) {
                tujuan_kegiatan_utama = data.data;
                $('#table-sasaran').DataTable().ajax.reload();
                setTujuanKegiatanUtama();
            },
            complete: function (data) {
                $('#resiko_paket_sasaran_id').prop('disabled', false);
            }
        });

        // console.log(tujuan_kegiatan_utama);
        // tujuan_kegiatan_utama = table_sasaran
        //     .rows()
        //     .data();


    }
}

function detailData(tipe, id) {
    if (tipe == 'sasaran') {
        if (level == 'UPR-T3') {
            detail_sasaran_t3(id)
        } else if (level == 'UPR-T2' && unit != 'Balai') {
            detail_sasaran_t2(id)
        } else {
            detail_sasaran(id)
        }
    } else if (tipe == 'pemangku_kepentingan') {
        detail_pemangku_kepentingan(id)
    } else if (tipe == 'tujuan') {
        detail_tujuan(id)
    } else if (tipe == 'resiko') {
        tujuan_kegiatan_utama = table_sasaran
            .rows()
            .data();

        setTujuanKegiatanUtama();

        detail_resiko(id)
        setTableInovasi();
    }
}

// SASARAN //
function detail_sasaran_t3(id) {
    var dataSet = table_sasaran.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;

    resetForm('#form-sasaran');
    $('#paket_sasaran_id').val(id)
    sasaran_id = data[0].sasaran_id;
    indikator_sasaran_id = data[0].indikator_sasaran_id
    $('#kegiatan_id').val(data[0].kegiatan_id).trigger('change')
    $('#paket_id').val(data[0].paket_id).trigger('change')
    $('#tujuan_kegiatan').val(formatCurrency(data[0].tujuan_kegiatan))
    $('#tujuan_kegiatan_satuan').val(data[0].tujuan_kegiatan_satuan)

    $('#modal-sasaran').modal('show')
}

// SASARAN //
function detail_sasaran_t2(id) {
    var dataSet = table_sasaran.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;

    resetForm('#form-sasaran');
    indikator_sasaran_id = data[0].indikator_sasaran_id
    sasaran_id = data[0].sasaran_id;
    console.log(sasaran_id)
    $('#paket_sasaran_id').val(id)
    $('#kegiatan_id').val(data[0].kegiatan_id).trigger('change');
    $('#program_id').val(data[0].program_id).trigger('change');
    $('#isp_target').val(formatCurrency(data[0].isp_target));
    $('#isp_satuan').val(data[0].isp_satuan);
    $('#kegiatan_tujuan').val(data[0].kegiatan_tujuan);
    $('#tujuan_kegiatan').val(formatCurrency(data[0].tujuan_kegiatan));
    $('#tujuan_kegiatan_satuan').val(data[0].tujuan_kegiatan_satuan);

    $('#modal-sasaran').modal('show')
}

// SASARAN //
function detail_sasaran(id) {
    var dataSet = table_sasaran.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;

    resetForm('#form-sasaran');
    ip = data[0].ip_id
    sasaran_id = data[0].sasaran_id;
    indikator_sasaran_id = data[0].indikator_sasaran_id
    $('#paket_sasaran_id').val(id)
    $('#program_id').val(data[0].program_id).trigger('change');
    $('#isp_target').val(formatCurrency(data[0].isp_target));
    $('#isp_satuan').val(data[0].isp_satuan);
    $('#kegiatan_id').val(data[0].kegiatan_id).trigger('change');
    $('#kegiatan_tujuan').val(data[0].kegiatan_tujuan);
    $('#tujuan_kegiatan').val(formatCurrency(data[0].tujuan_kegiatan));
    $('#tujuan_kegiatan_satuan').val(data[0].tujuan_kegiatan_satuan);

    $('#modal-sasaran').modal('show')
}

function renderActionSasaran(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'sasaran\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/sasaran/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderActionSasaranT2(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'sasaran\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';
    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/sasaran/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderProgram(data, type, row) {
    return row.kode_kegiatan + ' - ' + row.NAMA;
}

function kegiatanTujuan(data, type, row) {
    var button = row.kegiatan_tujuan + " " + formatCurrency(row.tujuan_kegiatan) + " " + row.tujuan_kegiatan_satuan;

    return button;
}

function renderIsp(data, type, row) {
    return row.isp_text + ' ' + formatCurrency(row.isp_target) + ' ' + row.isp_satuan;
}

function renderKegiatanNama(data, type, row) {
    return row.kode_kegiatan + ' - ' + row.NAMA;
}

function setTableSasaran() {
    if (level == 'UPR-T3' || level == 'PPK') {
        var colDef = [
            // { data: 'id', render: renderNumRow },
            { data: 'level', name: 'tbl_komitmen_mr.level' },
            { data: 'SASARAN', name: 'sk.SASARAN' },
            { data: 'isp_text', render: renderIsp },
            { data: 'nmpaket', searchable: false },
            { data: 'kegiatan_tujuan', render: kegiatanTujuan },
            { data: 'id', render: renderActionSasaran }
        ];
        var reqData = {
            mr_id: mr_id,
            tipe: 'sasaran',
            level: level
        };

        var reqOrder = [[1, 'ASC']];

        table_sasaran = setDataTable('#table-sasaran', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
    } else if (level == 'UPR-T2' && unit != 'Balai') {
        var colDef = [
            // { data: 'id', render: renderNumRow },
            { data: 'level', name: 'tbl_komitmen_mr.level' },
            { data: 'SASARAN', name: 'sk.SASARAN' },
            { data: 'INDIKATOR', name: 'ik.INDIKATOR' },
            { data: 'NAMA', searchable: false, render: renderKegiatanNama },
            { data: 'tujuan_kegiatan', render: kegiatanTujuan },
            { data: 'id', render: renderActionSasaranT2 }
        ];
        var reqData = {
            mr_id: mr_id,
            tipe: 'sasaran',
            level: level,
            unit: unit
        };

        var reqOrder = [[1, 'ASC']];

        table_sasaran = setDataTable('#table-sasaran', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
    } else {
        var colDef = [
            // { data: 'id', render: renderNumRow },
            { data: 'level', name: 'tbl_komitmen_mr.level' },
            { data: 'SASARAN', name: 'program.PROGRAM' },
            { data: 'isp_text', render: renderIsp },
            { data: 'NAMA', name: 'kegiatan.NAMA', render: renderProgram },
            { data: 'kegiatan_tujuan', render: kegiatanTujuan },
            { data: 'id', render: renderActionSasaranT2 }
        ];
        var reqData = {
            mr_id: mr_id,
            tipe: 'sasaran',
            level: level,
            unit: unit
        };

        var reqOrder = [[1, 'ASC']];

        table_sasaran = setDataTable('#table-sasaran', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
    }
}
// SASARAN //

// PEMANGKU KEPENTINGAN //
function detail_pemangku_kepentingan(id) {
    var dataSet = table_pemangku_kepentingan.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;
    resetForm('#form-pemangku_kepentingan');

    $('#pemangku_kepentingan_id').val(id)
    $('#pemangku_kepentingan').val(data[0].pemangku_kepentingan)
    $('#pemangku_kepentingan_keterangan').val(data[0].pemangku_kepentingan_keterangan)

    $('#modal-pemangku_kepentingan').modal('show')
}

function renderActionPemangkuKepentingan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'pemangku_kepentingan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/pemangku_kepentingan/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function setTablePemangkuKepentingan() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'pemangku_kepentingan' },
        { data: 'pemangku_kepentingan_keterangan' },
        { data: 'id', render: renderActionPemangkuKepentingan }
    ];
    var reqData = {
        mr_id: mr_id,
        tipe: 'pemangku_kepentingan',
    };

    var reqOrder = [[1, 'ASC']];

    table_pemangku_kepentingan = setDataTable('#table-pemangku_kepentingan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}
// PEMANGKU KEPENTINGAN //

// TUJUAN //
function detail_tujuan(id) {
    var dataSet = table_tujuan.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;

    $('#tujuan_id').val(id)
    $('#tujuan_pelaksanaan').val(data[0].tujuan_pelaksanaan)

    $('#modal-tujuan').modal('show')
}

function renderActionTujuan(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'tujuan\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/tujuan/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function setTableTujuan() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'tujuan_pelaksanaan' }
    ];
    var reqData = {
        mr_id: mr_id,
        tipe: 'tujuan',
    };

    var reqOrder = [[1, 'ASC']];

    table_tujuan = setDataTable('#table-tujuan', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false);
}
// TUJUAN //

// TUJUAN //
function detail_resiko(id) {
    var dataSet = table_resiko.rows().data();
    var data = dataSet.filter(function (index) {
        return index.id == id;
    });

    action = urlUpdate;

    $('#resiko_id').val(id)

    for (var key in data[0]) {
        if (key == 'id') {
            $('#resiko_id').val(data[0][key])
        } else if (key == 'paket_sasaran_id') {
            $('#resiko_paket_sasaran_id').val(data[0][key]).trigger('change')
        } else {
            if ($('#' + key).is('select')) {
                $('#' + key).val(data[0][key]).trigger('change');
            } else {
                $('#' + key).val(data[0][key]);
            }
        }
    }

    $('#resiko_kegiatan_pembina').val(data[0].resiko_kegiatan_pembina).trigger('change');

    $("#resiko_penilaian_periode2").val(data[0].resiko_triwulan1).trigger('change');

    $('#modal-resiko').modal('show')
}

function renderLingkup(data) {
    if (data == 0) return 'Non Teknis'

    return 'Teknis';
}

function renderActionResiko(data, type, row) {
    var button = '';

    button += '<button type="button" class="btn btn-info btn-xs pull-right" onclick="detailData(\'resiko\', \'' + row.id + '\')"><i class="fa fa-edit"></i></button>';

    button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/delete_data/resiko/' + row.id + '\')"><i class="fa fa-remove"></i></button>';


    return button;
}

function renderKegiatanPembina(data, type, row) {
    return row.nama_pembina;
}

function renderLingkupJenis(data, type, row) {
    if (row.resiko_kegiatan_lingkup_jenis == 1) {
        return row.balai_teknik;
    }
    return row.lingkup_risiko;
}

function renderText(data, type, row) {
    if (data != null) return data;

    return row.kegiatan_tujuan
}

function renderKategori(data, type, row) {
    return row.resiko_kegiatan_kategori + '. ' + row.kategori;
}

function renderDampak(data, type, row) {
    return row.resiko_list_dampak + '. ' + row.nama_dampak;
}

function renderNumberResiko(data, type, row, meta) {
    no = parseFloat(meta.row) + 1 + parseFloat(meta.settings._iDisplayStart);
    return 'R' + no;
}

function setTableResiko() {
    var colDef = [
        { data: 'resiko_kode' },
        { data: 'kegiatan_tujuan' },
        { data: 'resiko_pernyataan' },
        { data: 'nama_pembina', name: 'eselon-2.NAMA' },
        { data: 'tahap' },
        { data: 'resiko_kegiatan_lingkup_jenis', render: renderLingkupJenis },
        { data: 'kategori' },
        { data: 'resiko_kegiatan_penyebab' },
        { data: 'sumber_risiko' },
        { data: 'nama_dampak' },
        { data: 'resiko_kegiatan_dampak' },
        { data: 'resiko_penilaian_kemungkinan', name: 'penilaian_kriteria.level_kemungkinan' },
        { data: 'resiko_penilaian_dampak', name: 'penilaian_dampak.dampak' },
        { data: 'resiko_penilaian_nilai', name: '' },
        { data: 'resiko_pengendalian_uraian' },
        { data: 'memadai_belum', name: 'm_memadai.memadai_belum' },
        { data: 'resiko_pengendalian_kemungkinan', name: 'pengendalian_kriteria.level_kemungkinan' },
        { data: 'resiko_pengendalian_dampak', name: 'pengendalian_dampak.dampak' },
        { data: 'resiko_pengendalian_nilai' },
        { data: 'resiko_prioritas' },
        { data: 'respon_risiko', name: 'm_respon_risiko.respon_risiko' },
        { data: 'resiko_deskripsi', name: 'tbl_resiko_inovasi.resiko_deskripsi' },
        { data: 'alokasi2', searchable: false },
        { data: 'resiko_kemungkinan', name: 'inovasi_kriteria.level_kemungkinan' },
        { data: 'resiko_dampak', name: 'inovasi_dampak.dampak' },
        { data: 'resiko_nilai', name: 'tbl_resiko_inovasi.resiko_nilai' },
        { data: 'resiko_penanggung_jawab', name: 'tbl_resiko_inovasi.resiko_penanggung_jawab' },
        {
            // data: 'resiko_penilaian_keterangan',
            data: function (row, type, set) {
                if (row.resiko_penilaian_keterangan) {
                    const res = row.resiko_penilaian_keterangan + ' (' + row.resiko_triwulan.substring(5, 15) + ')';

                    return res;
                } else {
                    return row.resiko_penilaian_keterangan
                }
                // console.log(row);

            },
            name: 'tbl_resiko.resiko_penilaian_keterangan',
        },
        { data: 'resiko_indikator' },
        { data: 'id', render: renderActionResiko }
    ];
    var reqData = {
        mr_id: mr_id,
        tipe: 'resiko',
    };

    var reqOrder = [[19, 'ASC']];

    var reqCreatedRow = function (row, data, dataIndex) {
        console.log(data.resiko_nilai)
        if (data.resiko_pengendalian_nilai > 10) {
            $(row).find('td:eq(1)').css('color', 'red');
            $(row).find('td:eq(18)').css('color', 'red');
        }
    };

    table_resiko = setDataTable('#table-resiko', baseUrl + '/get_data', colDef, reqData, reqOrder, null, null, false, reqCreatedRow);
}
// TUJUAN //

// update auto text
function text_data(result) {
    var nama;
    $.each(result.data, function (idx, val) {
        id = val.id;
        nama = val.nmpaket;
        vol = val.vol
        sat = val.sat
    })
    // console.log('aaaa' + action)
    // console.log('aaaa' + urlUpdate)
    if (action != urlUpdate) {
        $('#kegiatan_tujuan').attr('placeholder', nama);
        $('#kegiatan_tujuan').val(nama);
        if (isNaN(vol)) {
            $('#tujuan_kegiatan').val('');
        } else {
            $('#tujuan_kegiatan').val(formatCurrency(vol));
        }
        $('#tujuan_kegiatan_satuan').val(sat);
    } else {
        console.log(sat);
        $('#tujuan_kegiatan_satuan').val(sat);
        $('#kegiatan_tujuan').val(nama);
        $('#tujuan_kegiatan').val(formatCurrency(vol));
    }
}

function TujuanKegiatan() {
    paket_id_data = $("#paket_id").val();
    if (paket_id_data) {
        var reqData = {
            paket_id: paket_id_data,
            tipe: 'paket_placeholder'
        }

        ajaxData(urlData, reqData, text_data);
    } else {
        $('#kegiatan_tujuan').attr('placeholder', "Data paket tidak ditemukan.");
    }
}

$(document).ready(function () {
    $('.notif-profil').hide();
    $('#notif').hide();
    if (mr_id == '') {
        $('#modal-mr').modal('show');
    } else {
        setTablePemangkuKepentingan()
        setTableTujuan()
        setTableResiko();
    }

    // update resiko
    $('#resiko_respon').on('change', function () {
        if ($(this).val() == 5 || $(this).val() == 6) {
            if ($(this).val() == 5) {
                $('#resiko_kemungkinan').val(1).trigger('change')
                $('#resiko_dampak').val(1).trigger('change')
            } else if ($(this).val() == 6) {
                $('#resiko_kemungkinan').val($('#resiko_pengendalian_kemungkinan').val()).trigger('change')
                $('#resiko_dampak').val($('#resiko_pengendalian_dampak').val()).trigger('change')
            }
            document.getElementById("resiko_kemungkinan").disabled = true;
            document.getElementById("resiko_dampak").disabled = true;
            document.getElementById("resiko_penilaian_periode1").disabled = true;
            document.getElementById("resiko_penilaian_periode2").disabled = true;
            document.getElementById("resiko_penilaian_keterangan").disabled = true;
            document.getElementById("resiko_deskripsi").disabled = true;
            document.getElementById("resiko_alokasi").disabled = true;
            document.getElementById("resiko_penanggung_jawab").disabled = true;
            document.getElementById("resiko_indikator").disabled = true;
        } else {
            $('#resiko_kemungkinan').val("").trigger('change')
            $('#resiko_dampak').val("").trigger('change')
            document.getElementById("resiko_kemungkinan").disabled = false;
            document.getElementById("resiko_dampak").disabled = false;
            document.getElementById("resiko_penilaian_periode1").disabled = false;
            document.getElementById("resiko_penilaian_periode2").disabled = false;
            document.getElementById("resiko_penilaian_keterangan").disabled = false;
            document.getElementById("resiko_deskripsi").disabled = false;
            document.getElementById("resiko_alokasi").disabled = false;
            document.getElementById("resiko_penanggung_jawab").disabled = false;
            document.getElementById("resiko_indikator").disabled = false;
        }
    })

    $('#form-mr').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('tipe', 'mr');

            ajaxData(action, reqData, refreshPage, true);
        }
    });

    setTableSasaran()

    $('#kegiatan_id').on('change', function () {
        var reqData = {
            kegiatan_id: $(this).val(),
            tipe: 'sasaran_kegiatan'
        }
        ajaxData(urlData, reqData, fillSasaran);

        if (level == 'UPR-T3' || level == 'PPK') {
            var reqData = {
                kdsatker: $('#kdsatker').val(),
                kdgiat: $('#kegiatan_id option:selected').data('kode'),
                tipe: 'paket'
            }
            ajaxData(urlData, reqData, fillPaket);
        } else if (level == 'UPR-T2' && unit != 'Balai') {
            var thisKegiatan = $('#kegiatan_id option:selected').text();

            $('#kegiatan').val(thisKegiatan)
        }
    })

    $('#sasaran_id').on('change', function () {
        var reqData = {
            sasaran_id: $(this).val(),
            tipe: 'indikator_sasaran'
        }

        ajaxData(urlData, reqData, fillIndikatorSasaran);
    })

    $('#indikator_sasaran_id').on('change', function () {
        var indikator = $('#indikator_sasaran_id option:selected').data('indikator');
        var target = $('#indikator_sasaran_id option:selected').data('target');
        var satuan = $('#indikator_sasaran_id option:selected').data('satuan');


        if (level == 'UPR-T2' || level == 'UPR-T1') {
            if (action != urlUpdate) {
                $('#kegiatan_tujuan').val(indikator);
                if (isNaN(target)) {
                    $('#tujuan_kegiatan').val('');
                } else {
                    $('#tujuan_kegiatan').val(formatCurrency(target));
                }
                $('#tujuan_kegiatan_satuan').val(satuan);
            }
        } else {
            if (action != urlUpdate) {
                $('#isp_text').val(indikator);
                if (isNaN(target)) {
                    $('#isp_target').val('');
                } else {
                    $('#isp_target').val(formatCurrency(target));
                }
                $('#isp_satuan').val(satuan);
            } else {
                $('#isp_text').val(indikator);
                $('#isp_target').val(formatCurrency(target));
                $('#isp_satuan').val(satuan);
            }
        }
    })

    $('a[href="#tab_a"]').on('click', function () {
        table_sasaran.draw(false);
    })

    $('a[href="#tab_b"]').on('click', function () {
        table_pemangku_kepentingan.draw(false);
    })

    $('a[href="#tab_c"]').on('click', function () {
        table_tujuan.draw(false);
    })

    $('a[href="#tab_d"]').on('click', function () {
        $('.notif-profil').hide();
        table_resiko.draw(false);
        if (level == 'UPR-T1' && table_resiko.data().count() < 4) {
            $('.notif-profil').show();
        } else if (table_resiko.data().count() < 3) {
            $('.notif-profil').show();
        }
    })

    $('a[href="#tab_e"]').on('click', function () {
        var reqData = {
            mr_id: mr_id,
            tipe: 'peta_resiko'
        }

        ajaxData(urlData, reqData, loadPeta);
    })

    $('a[href="#tab_f"]').on('click', function () {
        var reqData = {
            mr_id: mr_id,
            tipe: 'jadwal'
        }

        ajaxData(urlData, reqData, loadJadwal);
    })

    $('.linkup-non_teknis').hide()
    $('.linkup-teknis').hide()
    $('#resiko_kegiatan_lingkup_jenis').on('change', function () {
        if ($(this).val() == 1) {
            $('.linkup-teknis').show()
            $('.linkup-non_teknis').hide()
        } else {
            $('.linkup-teknis').hide()
            $('.linkup-non_teknis').show()
        }
    })

    $('#form-sasaran').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('mr_id', mr_id);
            reqData.append('tipe', 'sasaran');
            reqData.append('level', level);

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-pemangku_kepentingan').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('mr_id', mr_id);
            reqData.append('tipe', 'pemangku_kepentingan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-tujuan').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('mr_id', mr_id);
            reqData.append('tipe', 'tujuan');

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('#form-resiko').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('mr_id', mr_id);
            reqData.append('tipe', 'resiko');
            reqData.append('data_inovasi', JSON.stringify(data_inovasi));

            ajaxData(action, reqData, refresh, true);
        }
    });

    $('a[href="#tab_g"]').on('click', function () {
        if (table_resiko.data().count() == 0 || table_sasaran.data().count() == 0 || table_pemangku_kepentingan.data().count() == 0) {
            $('input[type="radio"][name="mr_status"][value=1]').prop('disabled', true);
            $('#notif-kirim').show();
        } else {
            $('input[type="radio"][name="mr_status"][value=1]').prop('disabled', false);
            $('#notif-kirim').hide();
        }
    })

    $('#form-submit').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);
            reqData.append('mr_id', mr_id);
            reqData.append('tipe', 'mr_form');

            ajaxData(urlInsert, reqData, refreshPage, true);
        }
    });
})
