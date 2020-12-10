<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    @yield('css')
</head>

<body>

    <!-- Burger-menu (begin)-->
    @include('layouts.front.includes.burger_menu')
    <!-- Burger-menu (end)-->

    <header class="header header-narrow">
        <div class="topWhite-layer topWhite-layer-narrow">
            <div class="container">
                @include('layouts.front.includes.header_menu')
                @yield('header')
            </div>
        </div>
    </header>

    @yield('content')

    @include('layouts.front.includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>

</html>
