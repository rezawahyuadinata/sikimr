<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('Home.components.home.meta')
    <!-- Bootstrap CSS -->
    @include('Home.components.home.css')
    @include('Home.components.home.script-css')
    @stack('script-css')
</head>

<body class="index-page">
    @include('Home.components.home.head')
    @yield('section')
    <a href="#" class="to-top">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </a>
    @include('Home.components.home.footer')

    @include('Home.components.home.js')
    @include('Home.components.home.script-js')
    @stack('script-js')
</body>

</html>
