<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ARC DRMS') }}</title>

    <!-- Scripts -->
    <!-- Use asset for local dev -->
    <script src="{{ secure_asset('js/app.js') }}" ></script>
    <script src="{{ secure_asset('js/custom.js') }} "></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/media-query.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.css">
</head>
<body>
    <div id="app-login">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
