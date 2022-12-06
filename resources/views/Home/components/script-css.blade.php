{{-- catatan: UNDONE(Reza): memberikan animasi dalam css --}}
{{-- catatan: style dasar --}}
<style>
    /* variabel */
    :root {
        /* dasar font dan penggunaan font */
        --title-color: #009AFF;
        --sub-title-color: #377EC2;
        --font-weight-title: 500;
        --font-weight-subtitle: 200;
        --font-weight-text: 300;
        --font-size-title: 24px;
        --font-size-subtitle: 18px;
        --font-size-text: 14px;
        --font-family: 'OpenSans', 'sans-serif';
        /* chart */
        --tinggi-dalam-chart: 550px;
    }

    /* html */
    html {
        scroll-behavior: smooth;
    }

    /* opem sams weight  */
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap');

    /* css Navbar */
    .navbar-font-style {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        padding-top: 1em;
        padding-bottom: 1em;
    }

    /* .animasi-bg:hover {
        background-color: var(--sub-title-color);
        color: white
    } */

    .navbar-font-style:has(.navbar-menu) {
        color: black;
        border-radius: .5em;
    }

    .navbar-font-style:has(.navbar-menu):hover {
        background-color: var(--sub-title-color);
        color: white;
        border-radius: .5em;
    }

    .navbar-font-style:has(.navbar-btn-menu) {
        color: white;
    }

    .navbar-font-style:has(.navbar-btn-menu) :hover {
        color: white;
    }

    .btn-navbar-tutorial {
        background-color: red;
        width: auto;
        height: 50px;
    }

    .btn-navbar-tutorial:hover {
        color: white;
    }

    .btn-navbar-aplikasi {
        background-color: blue;
        width: auto;
        height: 50px;
    }

    .btn-navbar-aplikasi:hover {
        color: white;
    }
</style>

{{-- catatan: navbar style --}}
<style>
    .bg-gradient-navbar-first {
        background: rgb(15, 96, 156);
        background: -moz-linear-gradient(122deg, rgba(15, 96, 156, 1) 49%, rgba(12, 89, 203, 0.9360119047619048) 99%);
        background: -webkit-linear-gradient(122deg, rgba(15, 96, 156, 1) 49%, rgba(12, 89, 203, 0.9360119047619048) 99%);
        background: linear-gradient(122deg, rgba(15, 96, 156, 1) 49%, rgba(12, 89, 203, 0.9360119047619048) 99%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#0f609c", endColorstr="#0c59cb", GradientType=1);
    }

    .bg-gradient-navbar-second {
        background: rgb(235, 235, 235);
        background: -moz-linear-gradient(122deg, rgba(235, 235, 235, 1) 99%, rgba(255, 255, 255, 1) 100%);
        background: -webkit-linear-gradient(122deg, rgba(235, 235, 235, 1) 99%, rgba(255, 255, 255, 1) 100%);
        background: linear-gradient(122deg, rgba(235, 235, 235, 1) 99%, rgba(255, 255, 255, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ebebeb", endColorstr="#ffffff", GradientType=1);
    }

    .navbar-img-logo {
        width: 5;
        height: 5%;
    }

    .truncate-header {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .truncate-title-berita-terkini {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }

    .truncate-title-berita {
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }

    .truncate-body-berita {
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }

    .truncate-body-berita>p {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }
</style>

{{-- catatan: header style --}}
<style>
    /* tutorial box */
    .responsive-tutorial-box {
        width: calc(33.33% -2%);
        margin: 2% 1%;
        /* background-color: white;
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, 0.15); */
        border-radius: 5px;
    }

    @media only screen and(max-width:1200px) {
        .responsive-tutorial-box {
            width: calc(50% -2%);
        }
    }

    @media only screen and(max-width:767px) {
        .responsive-tutorial-box {
            width: calc(100% -2%);
        }
    }

    .responsive-tutorial-body {
        box-sizing: border-box;
        padding: 1.5rem;
        margin: 0 auto;
        position: relative;
        width: 100%;
        height: auto;
    }

    /* berita box */
    .responsive-berita-box {
        width: calc(33.33% -2%);
        margin: 2% 1%;
        /* background-color: white; */
        /* box-shadow: 0 0 2rem 0 rgba(136, 152, 170, 0.15); */
        border-radius: 5px;
    }

    @media only screen and(max-width:1200px) {
        .responsive-berita-box {
            width: calc(50% -2%);
        }
    }

    @media only screen and(max-width:767px) {
        .responsive-berita-box {
            width: calc(100% -2%);
        }
    }

    .responsive-berita-body {
        box-sizing: border-box;
        padding: .5rem;
        margin: 0 auto;
        position: relative;
        width: 100%;
        height: auto;
    }

    /* chart box */
    .responsive-chart-box {
        width: calc(33.33% -2%);
        margin: 2% 1%;
        /* background-color: white;
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, 0.15); */
        border-radius: 5px;
    }

    @media only screen and(max-width:1200px) {
        .responsive-chart-box {
            width: calc(50% -2%);
        }
    }

    @media only screen and(max-width:767px) {
        .responsive-chart-box {
            width: calc(100% -2%);
        }
    }

    .responsive-chart-body {
        box-sizing: border-box;
        padding: 1.5rem;
        margin: 0 auto;
        position: relative;
        width: 100%;
    }


    /* MR Sizing Chart */
    .responsive-chart-body:has(.mr-total) {
        min-height: var(--tinggi-dalam-chart);
    }

    .size-table-mr {
        --total-tinggi: calc(var(--tinggi-dalam-chart) - 55px);
        min-height: var(--total-tinggi);
    }

    /* PBJ Sizing chart */
    .responsive-chart-body:has(.pbj-kontraktual) {
        min-height: var(--tinggi-dalam-chart);
    }

    .responsive-chart-body:has(.pbj-kontraktual-rp) {
        min-height: var(--tinggi-dalam-chart);
    }

    .responsive-chart-body:has(.pbj-kontraktual-pkt) {
        min-height: var(--tinggi-dalam-chart);
    }

    /* ZI Sizing Chart */
    .responsive-chart-body:has(.zi-tahunan) {
        min-height: var(--tinggi-dalam-chart);
    }

    /* PENGADUAN Sizing Chart */
    .responsive-chart-body:has(.pengaduan-tahunan) {
        min-height: var(--tinggi-dalam-chart);
    }

    .responsive-chart-body:has(.pengaduan-kategori) {
        min-height: var(--tinggi-dalam-chart);
    }

    .responsive-chart-body:has(.pengaduan-telaah) {
        min-height: var(--tinggi-dalam-chart);
    }

    .responsive-chart-body:has(.pengaduan-bbws) {
        min-height: var(--tinggi-dalam-chart);
    }

    .responsive-chart-body:has(.pengaduan-dirpembina) {
        min-height: var(--tinggi-dalam-chart);
    }

    /* SOP Sizing Chart */
    .responsive-chart-body:has(.sop-tahunan) {
        min-height: var(--tinggi-dalam-chart);
    }

    .border-thumbnail {
        border-bottom: 10px solid rgb(255, 193, 59);
        border-radius: 10px 10px 30px 10px;
    }

    .mask {
        /* width: 100%;
        height: 100%;
        position: absolute; */
        background: rgba(255, 255, 255);
        border-end-end-radius: 10em;
        border-bottom: 10px solid rgb(255, 193, 59);
    }

    .font-table-head {
        font-family: 'Open Sans', sans-serif;
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
        padding-top: 1em;
        padding-bottom: 1em;
    }

    .font-table {
        font-family: 'Open Sans', sans-serif;
        font-size: 18px;
        font-weight: 500;
        font-style: normal;
        padding-top: 1em;
        padding-bottom: 1em;
    }

    .masthead {
        background-size: cover;
        min-height: auto;
        position: relative;
    }

    .header-fixed-size {
        width: auto;
        min-height: 80vh;
        margin-top: 3em;
        /* border: 1px solid black; */
    }

    .header-side {
        width: auto;
        min-height: 37.5vh;
        /* margin: 3em; */
        /* border: 1px solid black; */
        position: absolute;
    }

    /* PBJ */
    .terkontrak-PKT {
        background-color: rgb(111, 255, 92);
        color: black !important;
    }

    .persiapan-PKT {
        background-color: rgb(243, 193, 84);
        color: black !important;
    }

    .proses-PKT {
        background-color: rgb(255, 255, 0);
        color: black !important;
    }

    .belum-PKT {
        background-color: rgb(148, 129, 255);
        color: black !important;
    }

    .gagal-PKT {
        background-color: rgb(255, 86, 86);
        color: black !important;
    }

    .terkontrak-RP {
        background-color: rgb(111, 255, 92);
        color: black !important;
    }

    .persiapan-RP {
        background-color: rgb(243, 193, 84);
        color: black !important;
    }

    .proses-RP {
        background-color: rgb(255, 255, 0);
        color: black !important;
    }

    .belum-RP {
        background-color: rgb(148, 129, 255);
        color: black !important;
    }

    .gagal-RP {
        background-color: rgb(255, 86, 86);
        color: black !important;
    }

    .title-chart {
        font-family: 'Open Sans', sans-serif;
        font-size: 24px;
        font-weight: bold;
        font-style: normal;
        padding-bottom: .5em;
    }

    .kategori-korupsi {
        background-color: rgb(0, 120, 170);
        color: black !important;
    }

    .kategori-kolusi {
        background-color: rgb(252, 153, 24);
        color: black !important;
    }

    .kategori-wewenang {
        background-color: rgb(209, 209, 209);
        color: black !important;
    }

    .kategori-kt-pp {
        background-color: rgb(239, 211, 69);
        color: black !important;
    }

    .kategori-penyimpangan {
        background-color: rgb(58, 180, 242);
        color: black !important;
    }

    .kategori-pelaksanaan {
        background-color: rgb(133, 200, 138);
        color: black !important;
    }

    .kategori-penipuan {
        background-color: rgb(255, 180, 242);
        color: black !important;
    }

    .kategori-lainnya {
        background-color: rgb(162, 123, 92);
        color: black !important;
    }

    .telaah-terbukti {
        background-color: rgb(252, 153, 24);
        color: black !important;
    }

    .telaah-tdk-terbukti {
        background-color: rgb(0, 120, 170);
        color: black !important;
    }
</style>

{{-- catatan: Home --}}
{{-- catatan: berita --}}
<style>

</style>
