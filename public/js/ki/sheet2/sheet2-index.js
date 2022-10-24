var tableData;

function refresh(result) {
    alertSuccess(result.message);
    tableData.draw(false);
    $('#modal-data').modal('hide');
}

function setTable() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'tanggal_backup' },
        { data: 'Bulan_Tahun_Sync' },
        { data: 'No' },
        { data: 'UKER' },
        { data: 'UPT' },
        { data: 'BP2JK_Prov' },
        { data: 'KODE' },
        { data: 'SATKER_PAKET_PEKERJAAN' },
        { data: 'Provinsi' },
        { data: 'Kategori' },
        { data: 'Jenis_Kontrak' },
        { data: 'Rencana_Pengumuman_Lelang' },
        { data: 'RPM' },
        { data: 'SBSN' },
        { data: 'PHLN' },
        { data: 'Belanja_Barang' },
        { data: 'Belanja_Moda' },
        { data: 'Pagu_DIPA' },
        { data: 'Kode_SIRUP' },
        { data: 'Tanggal_Diusulkan_ke_POKJA' },
        { data: 'Status_SIPBJ' },
        { data: 'Kode_SPSE' },
        { data: 'Tanggal_Pengumuman_Lelang' },
        { data: 'Tanggal_Penetapan_Pemenang' },
        { data: 'Tanggal_Rencana_Kontrak' },
        { data: 'Tanggal_Realisasi_Kontrak' },
        { data: 'Status' },
        { data: 'Durasi_Lelang_Hari' },
        { data: 'Lama_Proses_Lelang' },
        { data: 'Bulan_rencana_kontrak' },
        { data: 'es2_id' },
        { data: 'kode_satker' }
    ];
    var reqData = {
        'filters': {
            'tanggal_backup': $('#tanggal_backup').val(),
            'uker': $('#uker').val(),
            'upt': $('#upt').val(),
            'provinsi': $('#provinsi').val(),
            'kategori': $('#kategori').val(),
            'jenis_kontrak': $('#jenis_kontrak').val(),
            'status_SIPBJ': $('#status_SIPBJ').val(),
            'status': $('#status').val(),
            'durasi_lelang': $('#durasi_lelang').val(),
            'lama_proses': $('#lama_proses').val(),
        }
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