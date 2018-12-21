<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title_page', 'Laravel')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/feed') }}" style="width: 11.3rem">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @include('layouts._nav_bar_left')

                    <!-- Right Side Of Navbar -->
                    @include('layouts._nav_bar_right')
                </div>
            </div>
        </nav>

        <main class="app-content py-4 mb-5 mb-sm-0">
            <div class="container">
                <div class="row justify-content-center">
{{--                    <div class="col-2">@include('layouts._nav_left')</div>--}}
                    <div class="col-12">
                        @include('layouts.partials.flash')
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-white fixed-bottom d-sm-none">
            <div class="container">
                @include('layouts._nav_footer')
            </div>
        </footer>

    @yield('js')

</body>
</html>
