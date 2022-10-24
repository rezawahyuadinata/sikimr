<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-free/css/all.css') }}" rel="stylesheet">
        <style>
        #bgimage {
            background-image: url('{{asset('img/login/bg_login.png')}}');
            background-repeat: repeat;
            /* position: fixed; */
            width: 100%;
            height: 100%;
            background-size: 100%;
        }
    </style>
</head>
<body id="bgimage">
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="{{ asset('js') }}/global.js"></script>
<script src="{{ asset('js/register-index.js') }}"></script>
<script>
    var urlRegister = '{{ route("registers.store") }}';
    </script>
</body>
    {{-- <script src="{{ asset('js') }}/register-index.js"></script> --}}
</html>
