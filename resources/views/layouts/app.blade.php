<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Peta-MS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('bootstrap1/assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Summer Note CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{  Auth::check() ? '' : '/'}}">
                    <img src="{{ asset('image/petakom.png') }}" alt="petakom-logo" style="width: 75px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto gap-3">
                        <!-- Authentication Links -->
                        @guest

                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary" type="button">{{ __('Login') }}</a>
                            {{-- <a class="nav-link btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                            --}}
                        </li>
                        @endif

                        {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary" type="button">{{
                                __('Register') }}</a>
                        </li>
                        @endif --}}
                        {{-- @else --}}
                        {{-- <ul style="margin-right:270px;" class="navbar-nav ms-auto">
                            <!-- Home -->

                            <!-- Activities -->
                            @if (Auth::check())
                            @if (Auth::user()->category == 'student' || Auth::user()->category == 'lecturer')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('activity.login') }}">{{ __('Activities') }}</a>
                            </li>
                            @elseif(Auth::user()->category == 'committee')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('petakom.page') }}">{{ __('Activities') }}</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('proposed.activity') }}">{{ __('Activities') }}</a>
                            </li>
                            @endif
                            @endif

                            <!-- Calendar -->
                            <li class="nav-item">
                                <a class="nav-link" href="/homepage">{{ __('Calendar') }}</a>
                            </li>

                            <!-- Proposal -->
                        </ul> --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div style="margin-top:30px;">
            @yield('content')
        </div>

    </div>

    <!-- Script -->
    <script src="{{ asset('bootstrap1/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap1/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Summer Note JS link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
        $("#news_description").summernote({
            height: 250,
        });
        $('.dropdown-toggle').dropdown();
    });
    </script>

    <!-- Navbar -->
    <script>
        function setActive() {
        aObj = document.getElementById('app').getElementsByTagName('a');
        for(i=0;i<aObj.length;i++) { 
            if(document.location.href.indexOf(aObj[i].href)>=0) {
             aObj[i].className='active';
            }
        }
        }

        window.onload = setActive;
    </script>

</body>



</html>