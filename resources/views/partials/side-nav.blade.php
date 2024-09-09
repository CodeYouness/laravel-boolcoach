<nav id="side-nav" class="navbar navbar-expand-lg d-flex flex-column">
    <a class="my_logo text-decoration-none text-white fw-bold p-0 mb-4" href="#">Boolcoach</a>
    <div class="container-fluid d-flex flex-column flex-grow-1 justify-content-between">
        <ul class="navbar-nav d-flex flex-column w-100">
            <li class="nav-item d-flex align-items-center justify-content-around mb-2">
                <div class="menu-icon text-center">
                    <a href="{{route('users.index')}}" class="text-white">
                        <i class="fa-solid fa-house fs-4"></i>
                    </a>
                </div>
                <a href="{{route('users.index')}}" class="text-decoration-none text-white fs-4 flex-grow-1 ms-2">Dashboard</a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-around mb-2">
                <div class="menu-icon text-center">
                    <a href="" class="text-white">
                        <i class="fa-solid fa-user text-white fs-4"></i>
                    </a>
                </div>
                <a href="{{ route('users.show', auth()->id())}}" class="text-decoration-none text-white fs-4  flex-grow-1 ms-2">Profile</a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-around mb-2">
                <div class="menu-icon text-center text-center">
                    <a href="" class="text-white">
                        <i class="fa-solid fa-chart-line text-white fs-4"></i>
                    </a>
                </div>
                <a href="{{ route('statistics.index') }}" class="text-decoration-none text-white fs-4  flex-grow-1 ms-2">Statistics</a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-around mb-2">
                <div class="menu-icon text-center">
                    <a href="{{route('reviews.index')}}" class="text-white">
                        <i class="fa-solid fa-star text-white fs-4"></i>
                    </a>
                </div>
                <a href="{{route('reviews.index')}}" class="text-decoration-none text-white fs-4  flex-grow-1 ms-2">Reviews</a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-around mb-2">
                <div class="menu-icon text-center">
                    <a href="{{route('sponsorships.index')}}" class="text-white">
                        <i class="fa-solid fa-money-bills text-white fs-4"></i>
                    </a>
                </div>
                <a href="{{route('sponsorships.index')}}" class="text-decoration-none text-white fs-4  flex-grow-1 ms-2">Sponsorships</a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-around">
                <div class="menu-icon text-center">
                    <a href="{{route('messages.index')}}" class="text-white">
                        <i class="fa-solid fa-message text-white fs-4"></i>
                    </a>
                </div>
                <a href="{{route('messages.index')}}" class="text-decoration-none text-white fs-4  flex-grow-1 ms-2">Messages</a>
            </li>
        </ul>
        <ul class="navbar-nav d-flex flex-column w-100 mb-3">
            <li class="nav-item d-flex align-items-center justify-content-around mb-2">
                <div class="menu-icon text-center">
                    <a href="" class="text-white">
                        <i class="fa-solid fa-arrow-right-from-bracket text-white fs-4"></i>
                    </a>
                </div>
                <a href="" class="text-decoration-none text-white fs-4  flex-grow-1 ms-2">Logout</a>
            </li>
            <li class="nav-item d-flex align-items-center justify-content-around">
                <div class="menu-icon text-center text-center">
                    <a href="" class="text-white">
                        <i class="fa-solid fa-gear text-white fs-4"></i>
                    </a>
                </div>
                <a href="#" class="text-decoration-none text-white fs-4  flex-grow-1 ms-2">Settings</a>
            </li>
        </ul>
    </div>
</nav>
