<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('Home.components.meta')
    <!-- Bootstrap CSS -->
    @include('Home.components.css')
    @include('Home.components.script-css')
    @stack('script-css')
</head>

<body class="index-page">
    @include('Home.components.navbar')
    @include('Home.components.head')
    @yield('section')
    @include('Home.components.footer')

    @include('Home.components.js')
    @include('Home.components.script-js')
    @stack('script-js')
</body>

</html>
