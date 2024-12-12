<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flood Predictor') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-color: #1B1B1B; /* Dark Background */
            color: #FFFFFF; /* Text Color */
        }

        /* Navbar styles */
        nav {
            background-color: #151515; /* Darker Nav Background */
            padding: 15px; /* Add some padding */
        }

        /* Navbar links */
        nav a {
            color: #EAB308; /* Custom Link Color */
            margin-right: 15px; /* Space between links */
        }

        nav a:hover {
            color: #FBBF24; /* Link Hover Color */
        }

        /* Navbar collapse */
        .collapse {
            display: none; /* Initially hide the menu */
        }

        .collapse.show {
            display: block; /* Show the menu when toggled */
        }

        /* Dropdown styles */
        .dropdown-menu {
            background-color: #151515; /* Darker Dropdown Background */
            border: none; /* Remove border */
        }

        .dropdown-item {
            color: #EAB308; /* Dropdown Item Color */
        }

        .dropdown-item:hover {
            background-color: #EAB308; /* Dropdown Item Hover Background */
            color: #1B1B1B; /* Dropdown Item Hover Text Color */
        }

        .navbar-nav {
            margin-left: auto; /* Aligns the right-side items */
        }

        .container {
            max-width: 1200px; /* Limit container width */
        }

        .py-4 {
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav>
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand" style="color: #f8d57e">
                    {{ config('app.name', 'Flood Predictor') }}
                </a>
                <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <!-- Add any left-side items here -->
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
