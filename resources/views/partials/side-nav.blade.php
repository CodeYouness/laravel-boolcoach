
<nav id="side-nav" class="navbar navbar-expand-lg d-flex flex-column">
    <a id="boolcoach-logo" href="http://localhost:5174/" class="my_logo text-decoration-none text-white fw-bold p-0 mb-4 d-none d-lg-block">Boolcoach
    </a>
    <a id="boolcoach-logo" href="http://localhost:5174/" class="my_logo text-decoration-none p-0 mb-4 d-lg-none">
        <img src="{{ asset('images/BoolCoach Logo.png') }}" alt="BoolCoach Logo">
    </a>

    {{-- ! NAVBAR CONTAINER --}}
    <div class="container-fluid d-flex flex-column flex-grow-1 justify-content-between">

        {{-- ! TOP NAV --}}
        <ul class="navbar-nav d-flex flex-column w-100">

            {{-- ! DASHBOARD --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('users.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 text-center d-flex align-items-center">
                        <a href="{{route('users.index')}}" class="menu-icon">
                            <i class="fa-solid fa-house mx-2" ></i>
                        </a>
                        <a href="{{route('users.index')}}" class="text-decoration-none flex-grow-1 ms-3 d-none d-lg-block" >Dashboard</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! PROFILE --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('users.show', auth()->id()) ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 text-center d-flex align-items-center">
                        <a href="{{ route('users.show', auth()->id())}}" class="menu-icon">
                            <i class="fa-solid fa-user mx-2"></i>
                        </a>
                        <a href="{{ route('users.show', auth()->id())}}" class="text-decoration-none  flex-grow-1 ms-3 d-none d-lg-block">Profilo</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! STATISTICS --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('statistics.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 text-center d-flex align-items-center">
                        <a href=" {{ route('statistics.index') }}" class="menu-icon">
                            <i class="fa-solid fa-chart-line mx-2" ></i>
                        </a>
                        <a href="{{ route('statistics.index') }}" class="text-decoration-none text-white fs-4 flex-grow-1 ms-3 d-none d-lg-block">Statistiche</a>
                    </div>
                    <div class="bold-line"></div>
                </div>

            </li>

            {{-- ! REVIEWS --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('reviews.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 text-center d-flex align-items-center">
                        <a href="{{route('reviews.index')}}" class="menu-icon">
                            <i class="fa-solid fa-star mx-2"></i>
                        </a>
                        <a href="{{route('reviews.index')}}" class="text-decoration-none flex-grow-1 ms-3 d-none d-lg-block">Recensioni</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! SPONSORSHIPS --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('sponsorships.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 text-center d-flex align-items-center">
                        <a href="{{route('sponsorships.index')}}" class="menu-icon">
                            <i class="fa-solid fa-money-bills mx-2"></i>
                        </a>
                        <a href="{{route('sponsorships.index')}}" class="text-decoration-none flex-grow-1 ms-3 d-none d-lg-block">Sponsorizzazioni</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! MESSAGES --}}
            <li class="nav-item d-flex align-items-center {{Route::is('messages.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 d-flex text-center align-items-center">
                        <a href="{{route('messages.index')}}" class="menu-icon">
                            <i class="fa-solid fa-message mx-2"></i>
                        </a>
                        <a href="{{route('messages.index')}}" class="text-decoration-none  flex-grow-1 ms-3 d-none d-lg-block">Messaggi</a>
                    </div>
                        <div class="bold-line"></div>
                </div>
            </li>
        </ul>

        {{-- ! BOTTOM NAV --}}
        <ul class="navbar-nav d-flex flex-column w-100 mb-3">

            {{--! LOGOUT --}}
            <li class="nav-item d-flex align-items-center">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 d-flex text-center align-items-center">
                        <a href="{{ route('logout') }}" class="menu-icon"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket mx-2"></i>
                        </a>
                        <a href="{{ route('logout') }}" class="text-decoration-none flex-grow-1 ms-3 d-none d-lg-block" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Disconnettiti
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! SETTINGS --}}
            {{-- <li class="nav-item d-flex align-items-center">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 d-flex text-center align-items-center">
                        <a href="" class="text-white menu-icon">
                            <i class="fa-solid fa-gear mx-2"></i>
                        </a>
                        <a href="#" class="text-decoration-none fs-4  flex-grow-1 ms-3">Settings</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li> --}}
        </ul>

    </div>
</nav>
