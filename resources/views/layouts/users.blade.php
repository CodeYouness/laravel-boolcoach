<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    @vite(['resources/sass/app.scss', 'resources/sass/navbar-hover-links.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="users-wrapper" class="container-fluid d-flex p-0">
        @include('partials.side-nav')
        <main id="page-main-section" class="d-flex flex-column">
            @include('partials.header')
            @yield('main-content')
            @include('partials.footer')
        </main>
    </div>

    @yield('custom-script')
    @vite(['resources/js/altPropic.js'])
</body>

</html>
