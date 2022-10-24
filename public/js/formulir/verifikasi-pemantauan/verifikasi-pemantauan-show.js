

function refreshPage(result) {
    alertSuccess(result.message, mainServerUrl + '/formulir/verifikasi-pemantauan');
}

$(document).ready(function () {
    $('#form-submit').validate({
        rules: {

        },
        submitHandler: function (form) {
            var reqData = new FormData(form);

            ajaxData(urlInsert, reqData, refreshPage, true);
        }
    });
})