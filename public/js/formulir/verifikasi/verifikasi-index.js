function refresh(result) {
    alertSuccess('Verifikasi berhasil dibatalkan', baseUrl);
}

function verifikasiFormulir(id) {
    location.href = baseUrl + '/' + id;
}

function detailFormulir(id) {
    location.href = baseUrl + '/detail/' + id;
}