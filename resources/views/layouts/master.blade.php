<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles (bootstrap file ) -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <!-- fontawesome link  -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>
    <body>

    {{-- including nav bar  --}}
    @include('layouts.includes.admin-navbar')

    <div id="layoutSidenav">
        {{-- including sidebar --}}
        @include('layouts.includes.admin-sidebar')

        <div id="layoutSidenav_content">
            <main>
                    @yield('content')
            </main>

            {{-- including footer --}}
            @include('layouts.includes.admin-footer')

        </div>
    </div>

    <!-- /////////////-----script files-----\\\\\\\\\\\\-->
    <!-- bootstrap js file -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- main js file -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>
