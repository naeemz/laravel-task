<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('templates/front/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('templates/front/css/app.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">@lang('header.login')</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">@lang('header.register')</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.dashboard') }}"> @lang('home.dashboard') </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('header.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownLang"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('header.language')</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownLang">
                            <a href="{{ route('set.lang', ['lang' => 'en']) }}" class="dropdown-item @if( app()->getLocale() == 'en' ) active @endif">English</a>
                            <a href="{{ route('set.lang', ['lang' => 'fr']) }}" class="dropdown-item @if( app()->getLocale() == 'fr' ) active @endif">French</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('templates/front/js/jquery-3.1.1.min.js') }}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('templates/front/js/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ asset('templates/front/js/bootstrap.bundle.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('templates/front/js/ie10-viewport-bug-workaround.js') }}"></script>
    <script src="{{ asset('templates/front/js/app.js') }}"></script>

    @yield('js')

</body>
</html>
