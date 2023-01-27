<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

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
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 250px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="/homepage">
                <img src="{{ asset('image/petakom.png') }}" alt="petakom-logo" style="width: 75px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 text-center">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    {{-- --}}
                    @if(Auth::check())

                    @if( auth()->user()->category!= "Dean")
                    <li class="nav-item">

                        <div class="dropdown">
                            <span><a class="nav-link" aria-current="page" href="#">Election</a></span>

                            @if( auth()->user()->category == "Student")
                            <div id="myDropdown" class="dropdown-content">

                                <a class="nav-link" aria-current="page"
                                    class="nav-link {{ request()->routeIs('election*') ? 'active' : '' }}"
                                    href="{{ route('election.studList') }}">Vote for Election</a><br>
                                <a class="nav-link" aria-current="page" href="{{ route('election.register') }}">Register
                                    for Election</a><br>

                            </div>
                            @endif

                            @if( auth()->user()->category == "Committee")
                            <div id="myDropdown" class="dropdown-content">
                                <a class="nav-link" aria-current="page"
                                    class="nav-link {{ request()->routeIs('election*') ? 'active' : '' }}"
                                    href="/comList">View Election List</a><br>
                            </div>
                            @endif

                            @if( auth()->user()->category == "Coordinator")
                            <div id="myDropdown" class="dropdown-content">
                                <a class="nav-link" aria-current="page"
                                    class="nav-link {{ request()->routeIs('election*') ? 'active' : '' }}"
                                    href="/coorList">View Election List</a><br>
                            </div>
                            @endif

                            {{-- @if( auth()->user()->category == "Committee")

                            @endif

                            @if( auth()->user()->category == "HOSD")

                            @endif --}}

                            <!--tambah COMMITTEE & HOSD punya function-->
                            <!--guna IF ELSE-->

                        </div>
                    </li>
                    @endif

                    {{-- Calendar --}}
                    <li class="nav-item">
                        @if(auth()->user()->category == "Student")
                        <a class="nav-link" aria-current="page" href="{{ URL('calendar-event') }}">Calendar</a>
                        @else
                        <a class="nav-link" aria-current="page" href="#">Calendar</a>
                        @endif
                    </li>

                    {{-- Activites --}}
                    <li class="nav-item">
                        @if(Auth::check())
                        @if (auth()->user()->category == "Student" || auth()->user()->category == "Lecturer" ||
                        auth()->user()->category == "Committee")
                        <a class="nav-link" aria-current="page" href="{{ route('activity.login') }}">Activities</a>
                        @elseif(auth()->user()->category == "Coordinator")
                        <a class="nav-link" aria-current="page" href="{{ route('coor.page') }}">Activities</a>
                        @elseif(auth()->user()->category == "HOSD")
                        <a class="nav-link" aria-current="page" href="{{ route('hosd.page') }}">Activities</a>
                        @elseif(auth()->user()->category == "Dean")
                        <a class="nav-link" aria-current="page" href="{{ route('dean.page') }}">Activities</a>
                        @endif
                        @else
                        <a class="nav-link" aria-current="page" href="{{ route('proposed.activity') }}">Activities</a>
                        @endif
                    </li>

                    {{-- Bulletin --}}
                    <li class="nav-item">
                        @if (auth()->user()->category == 'Committee')
                        <a class="nav-link" aria-current="page"
                            href="{{ route('committee.indexpetakom') }}">Bulletin</a>
                        @else
                        <a class="nav-link" aria-current="page" href="{{ URL('/bulletinUserPage') }}">Bulletin</a>
                        @endif
                    </li>

                    {{-- Report --}}
                    <li class="nav-item">
                        @if (auth()->user()->category == 'Student' || auth()->user()->category == 'Lecturer' ||
                        auth()->user()->category == 'Committee')
                        <a class="nav-link" aria-current="page" href="{{ route('report.view') }}">Report</a>
                        @elseif(auth()->user()->category == 'HOSD')
                        <a class="nav-link" aria-current="page" href="{{ route('ReportHOSD.page') }}">Report</a>
                        @elseif(auth()->user()->category == 'Coordinator')
                        <a class="nav-link" aria-current="page" href="{{ route('ReportCoordinator.page') }}">Report</a>
                        @elseif(auth()->user()->category == 'Dean')
                        <a class="nav-link" aria-current="page" href="{{ route('ReportDean.page') }}">Report</a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="d-flex ms-auto gap-3">
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" category="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <mdb-dropdown-toggle slot="toggle" navlink tag="li" class="nav-item avatar" waves-fixed>
                                <mdb-icon icon="user-circle" v-if="!loggedIn" />
                                <mdb-avatar v-else>
                                    @if(Auth::user()->picture)
                                    {{-- <div class="mb-3 mx-auto"> --}}
                                        <img alt="profile-image" class="rounded-circle"
                                            src="{{asset('uploads/'. Auth::user()->picture)}}"
                                            style="width: 30px; height: 35px;" />
                                        {{--
                                    </div> --}}
                                    @else
                                    {{-- <div class="mb-3 mx-auto"> --}}
                                        <img class="rounded-circle" src="{{asset('uploads/pp.png')}}" alt=" User Avatar"
                                            width="30px" height="35px">
                                        {{--
                                    </div> --}}
                                    @endif

                                </mdb-avatar>
                            </mdb-dropdown-toggle>
                            {{ Auth::user()->Fname }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            @if( auth()->user()->category == "Coordinator")
                            <a class="dropdown-item" href="{{ route('userList.page') }}">
                                {{ __('List of User') }}
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('myProfile.page') }}">
                                {{ __('My Profile') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    @else
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0 text-center">

                            {{-- Calendar --}}
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Activities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Calendar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Report</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Bulletin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">Election</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div style="margin-top:100px;">
        @yield('content')
    </div>


</body>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script> --}}

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

</html>