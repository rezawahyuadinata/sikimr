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

    var tgl_terima = moment(data[0].tgl_terima).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');
    var tgl_surat = moment(data[0].tgl_surat).format('YYYY-MM-DD HH:mm:ss').replace(' ', 'T');

    $('#id').val(data[0].id);
    $('#tgl_surat').val(tgl_surat);
    $('#tgl_terima').val(tgl_terima);
    $('#unit_pengirim').val(data[0].unit_pengirim);
    $('#no_surat').val(data[0].no_surat);
    $('#perihal').val(data[0].perihal);
    $('#identitas_pelapor').val(data[0].identitas_pelapor);
    $('#entitas_pelapor').val(data[0].entitas_pelapor);
    $('#kata_kunci').val(data[0].kata_kunci);
    $('#proses').val(data[0].kata_kunci);
    $('#modal-data').modal('show');
}



function addFormulir(id) {
    location.href = baseUrl + '/create_detail/' + id;
}

function nothing(id) {
    console.log("deadline"+id);
 }

function renderAction(data, type, row) {
    var button = '<button type="button" class="btn btn-primary btn-xs pull-right" onclick="detailData(\'' + row.id + '\')">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-search" >View</i>&nbsp;&nbsp;&nbsp;</button>';
    
    if (roleCreateDetail === true) {
        var button;
        button += '<button type="button" class="btn btn-success btn-xs pull-right" onclick="addFormulir(\'' + row.id + '\')"><i class="fa fa-plus"> Isi Surat</i></button>';
    }

    if (roleDestroy === true) {
        var button;
        button += '<button type="button" class="btn btn-danger btn-xs pull-right" onclick="deleteData(\'' + row.id + '\', \'' + baseUrl + '/' + row.id + '\')">&nbsp;&nbsp;<i class="fa fa-trash"> Hapus </i>&nbsp;&nbsp;</button>';
    }
    
    return button;
}

function Warninght(data, type, row) {
    var date1 = new Date();
    var date2 = new Date(row.tanggal_md);
    var button;
    
    var Difference_In_Days = Math.floor((date2 - date1) / (1000*60*60*24))
    console.log(Difference_In_Days)

    if(Difference_In_Days <= 0)
    {
        button = '<button type="button" class="btn btn-danger btn-xs pull-right"><i class="fa fa-exclamation-circle"> Deadline </i></button>';
        
    }else if (Difference_In_Days < 5) 
    {
        button = '<button type="button" class="btn btn-warning btn-xs pull-right"><i class="fa fa-warning"> Deadline </i></button>';
    }
    else
    {
        button = '<button type="button" class="btn btn-primary btn-xs pull-right"><i class="fa fa-circle"></i> Deadline </i></button>';
    }
    
    return button;
}

function setTable() {
    var colDef = [
        { data: 'id', render: renderNumRow },
        { data: 'tgl_surat' },
        { data: 'no_surat' },
        { data: 'unit_pengirim' },
        { data: 'perihal' },
        { data: 'identitas_pelapor' },
        { data: 'prosses' },
        { data: 'waktu' },
        { data: 'status_tl_nota_dinas' },
        { data: 'id', render: Warninght },
        { data: 'balai' },
        { data: 'id', render: renderAction }
    ];
    var reqData = null;

    var reqOrder = null;

    tableData = setDataTable('#table-data', urlData, colDef, reqData, reqOrder, null, null, false);
}

$(document).ready(function () {

    setTable();

    $('#form-data').validate({
        submitHandler: function (form) {
            var reqData = new FormData(form);

            ajaxData(urlAction, reqData, refresh, true);
        }
    });
});