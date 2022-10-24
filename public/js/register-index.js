
$(document).ready(function () {
    $("#form-register").validate({
        rules: {},
        submitHandler: function (form) {
            var reqData = new FormData(form);

            ajaxData(urlRegister, reqData, refresh, true);
        }
    });

});
