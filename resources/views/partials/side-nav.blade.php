
<nav id="side-nav" class="navbar navbar-expand-lg d-flex flex-column">
    <p class="my_logo text-decoration-none text-white fw-bold p-0 mb-4">Boolcoach</p>

    {{-- ! NAVBAR CONTAINER --}}
    <div class="container-fluid d-flex flex-column flex-grow-1 justify-content-between">

        {{-- ! TOP NAV --}}
        <ul class="navbar-nav d-flex flex-column w-100">

            {{-- ! DASHBOARD --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('users.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 menu-icon text-center d-flex align-items-center">
                        <a href="{{route('users.index')}}" >
                            <i class="fa-solid fa-house mx-2" ></i>
                        </a>
                        <a href="{{route('users.index')}}" class="text-decoration-none flex-grow-1 ms-2" >Dashboard</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! PROFILE --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('users.show', auth()->id()) ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 menu-icon text-center d-flex align-items-center">
                        <a href="">
                            <i class="fa-solid fa-user mx-2"></i>
                        </a>
                        <a href="{{ route('users.show', auth()->id())}}" class="text-decoration-none  flex-grow-1 ms-2">Profile</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! STATISTICS --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 menu-icon text-center d-flex align-items-center">
                        <a href="">
                            <i class="fa-solid fa-chart-line mx-2"></i>
                        </a>
                        <a href="#" class="text-decoration-none flex-grow-1 ms-2">Statistics</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! REVIEWS --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('reviews.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 menu-icon text-center d-flex align-items-center">
                        <a href="{{route('reviews.index')}}">
                            <i class="fa-solid fa-star mx-2"></i>
                        </a>
                        <a href="{{route('reviews.index')}}" class="text-decoration-none flex-grow-1 ms-2">Reviews</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! SPONSORSHIPS --}}
            <li class="w-100 nav-item d-flex align-items-center mb-2 {{Route::is('sponsorships.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 menu-icon text-center d-flex align-items-center">
                        <a href="{{route('sponsorships.index')}}">
                            <i class="fa-solid fa-money-bills mx-2"></i>
                        </a>
                        <a href="{{route('sponsorships.index')}}" class="text-decoration-none flex-grow-1 ms-2">Sponsorships</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! MESSAGES --}}
            <li class="nav-item d-flex align-items-center {{Route::is('messages.index') ? 'active-link' : ''}}">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 menu-icon d-flex text-center align-items-center">
                        <a href="{{route('messages.index')}}">
                            <i class="fa-solid fa-message mx-2"></i>
                        </a>
                        <a href="{{route('messages.index')}}" class="text-decoration-none  flex-grow-1 ms-2">Messages</a>
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
                    <div class="w-100 menu-icon d-flex text-center align-items-center">
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket mx-2"></i>
                        </a>
                        <a href="{{ route('logout') }}" class="text-decoration-none flex-grow-1 ms-2" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>

            {{-- ! SETTINGS --}}
            <li class="nav-item d-flex align-items-center">
                <div class="link-container d-flex flex-column">
                    <div class="w-100 menu-icon d-flex text-center align-items-center">
                        <a href="" class="text-white">
                            <i class="fa-solid fa-gear mx-2"></i>
                        </a>
                        <a href="#" class="text-decoration-none fs-4  flex-grow-1 ms-2">Settings</a>
                    </div>
                    <div class="bold-line"></div>
                </div>
            </li>
        </ul>

    </div>
</nav>
