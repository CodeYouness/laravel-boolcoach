<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        {{-- Chart.js --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </head>
    <body class="antialiased">
        {{-- @dd(Route::getCurrentRoute()); --}}
        <div id="app">
            <header class="mx-0">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm welcome-navbar">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">Boolcoach</a>

                        <div class="collapse navbar-collapse py-1" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                @auth
                                    <li class="nav-item mx-2">
                                        <a href="#" class="text-decoration-none text-dark">Coaches</a>
                                    </li>
                                @endauth
                            </ul>
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <div class="d-flex sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                            <li>
                                                <a href="{{ route('login') }}" class="text-decoration-none text-dark mx-2">Log in</a>
                                            </li>
                                            <li>
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="text-decoration-none text-dark mx-2">Register</a>
                                                @endif
                                            </li>
                                        </div>
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
            </header>
        </div>
    </body>
</html>
