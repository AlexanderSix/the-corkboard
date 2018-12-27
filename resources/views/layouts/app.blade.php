<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script>
        window.csrfToken = document.head.querySelector("meta[name=csrf-token][content]").content;
    </script>
    <script src="{{ mix('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-laravel {{ (Route::current()->uri == 'register') ? ' is-transparent' : '' }}" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ url('/') }}" class="navbar-item">
                    <h5 class="navbar-title">{{ config('app.name', 'The Corkboard') }}</h5>
                </a>
                <span class="navbar-burger burger" data-target="navbarMenuHeroC">
                                <span></span>
                                <span></span>
                                <span></span>
                                </span>
            </div>
            <div id="navbar-menu" class="navbar-menu">
                <div class="navbar-end links">
                    @guest
                        <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div class="navbar-item has-dropdown">
                            <a class="navbar-link">{{ Auth::user()->name }}</a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
