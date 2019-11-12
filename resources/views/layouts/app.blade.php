<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/hamburger.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar">
            <div class="container">
                <a class="logo" href="{{ url('/') }}">
                    <img src="{{ asset('images/liftlog-logo.svg') }}" alt="{{ config('app.name', 'LiftLog') }}" class="logo-liftlog">
                </a>

                <button class="navbar-toggler hamburger hamburger--spin" id="hamburger" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                </button>
            </div>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-msg">Welcome back, {{ Auth::user()->name }}!</li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Exercises</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/categories/">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/settings/">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
        <main class="my-3">
            <div class="container single-exercise">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</html>
