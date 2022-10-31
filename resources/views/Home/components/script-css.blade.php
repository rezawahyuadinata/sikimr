{{-- UNDONE(Reza): memberikan animasi dalam css --}}
{{-- style dasar --}}
<style>
    /* variabel */
    :root {
        --title-color: #009AFF;
        --sub-title-color: #377EC2;
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

    .navbar-font-style:has(.navbar-menu) {
        color: black;
    }

    .navbar-font-style:has(.navbar-menu):hover {
        color: var(--sub-title-color);
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

{{-- navbar style --}}
<style>
    html {
        scroll-behavior: smooth;
    }

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
</style>

{{-- header style --}}
<style>
    .mask {
        /* width: 100%;
        height: 100%;
        position: absolute; */
        background: rgba(255, 255, 255);
        border-end-end-radius: 10em;
        border-bottom: 10px solid rgb(255, 193, 59);
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
</style>

{{-- Home --}}
<style>
    .berita {
        display: inline;
        align position: relative;
        width: 75%;
        height: auto;
    }

    .berita:has(.titleberita) {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        color: var(--title-color)
    }

    .berita:has(.titleselengkapnya) {
        font-family: 'Open Sans', sans-serif;
        font-size: 13px;
        font-weight: 400;
        font-style: normal;
        color: var(--sub-title-color)
    }
</style>
