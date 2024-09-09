<header id="app-header" class="d-flex align-items-end pb-lg-2 py-1 py-lg-0">
    <div class="d-flex justify-content-between align-items-center w-100 px-4">

        <h3 class="mb-0 d-lg-none"> Welcome back, {{ Auth::user()->name}}</h3>
        <h2 class="mb-0 d-none d-lg-block"> Welcome back, {{ Auth::user()->name}}</h2>
        <div class="d-flex justify-content-end align-items-center">
            <ul class="list-unstyled d-flex mb-0">
                <li class="mx-2">
                    <i class="fa-solid fa-bell"></i>
                </li>
            </ul>
            <div class="ms-3 profile-img rounded-circle d-flex justify-content-center align-items-center">
                <div class="profile-img rounded-circle d-flex justify-content-center align-items-center">
                    @if (Auth::user()->img_url)
                        <img src="{{asset('storage/' .Auth::user()->img_url)}}" alt="{{Auth::user()->nickname}} profile avatar" class="h-100">
                        <span class="d-none"></span>
                    @else
                        <span></span>
                    @endif

                </div>
            </div>
        </div>
    </div>
</header>
