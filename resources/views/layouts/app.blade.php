<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link ref="preload" href="https://fonts.googleapis.com/css?family=Nunito" as="font">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.header-nav')
        <main class="py-4 container">
            @if (session('success') || session('error'))
                <div class="alert @if(session('success')) alert-success @else alert-error @endif">
                    {{ session('success') ?? session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
