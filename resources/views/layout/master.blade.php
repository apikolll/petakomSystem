<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
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

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

</head>


<body>
    <nav class="navbar navbar-expand-lg bg-body fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="/">
                <img src="{{ asset('image/petakom.png') }}" alt="petakom-logo" style="width: 75px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 text-center">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>

                    @if( auth()->user()->category!= "Dean")
                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('activity*') ? 'active' : '' }}" aria-current="page" href="/activity">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Proposal</a>
                    </li>
                    <li class="nav-item">

                        <div class="dropdown">
                            <span><a class="nav-link" aria-current="page" href="#">Election</a></span>

                            @if( auth()->user()->category == "Student")
                            <div id="myDropdown" class="dropdown-content">
                                <a class="nav-link" aria-current="page" class="nav-link {{ request()->routeIs('election*') ? 'active' : '' }}" href="{{ route('election.student.studList') }}">Vote for Election</a><br>
                                <a class="nav-link" aria-current="page" href="{{ route('election.student.register') }}">Register for Election</a><br>
                            </div>o
                            @endif

                            @if( auth()->user()->category == "Committee")
                            <div id="myDropdown" class="dropdown-content">
                                <a class="nav-link" aria-current="page" class="nav-link {{ request()->routeIs('election*') ? 'active' : '' }}" href="/comList">View Election List</a><br>
                            </div>
                            @endif

                            @if( auth()->user()->category == "Coordinator")
                            <div id="myDropdown" class="dropdown-content">
                                <a class="nav-link" aria-current="page" class="nav-link {{ request()->routeIs('election*') ? 'active' : '' }}" href="/hosdList">View Election List</a><br>
                            </div>
                            @endif

                            <!--tambah COMMITTEE & HOSD punya function-->
                            <!--guna IF ELSE-->

                        </div>

                        <a class="nav-link" aria-current="page" href="{{ route('proposed.activity') }}">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/calendar-event">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('proposal.view') }}">Proposal</a>

                    </li>
                    @endif

                    @if( auth()->user()->category == "Committee" || auth()->user()->category == "HOSD" )
                    <li class="nav-item">

                        <a class="nav-link" aria-current="page" href="#">Calendar</a>

                        <a class="nav-link" aria-current="page" href="{{ route('report.view') }}">Report</a>

                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Report</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/bulletinUserPage">Bulletin</a>
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                </ul>

                <a href="{{ route('login') }}" class="btn btn-primary" type="button">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary" type="button">Register</a>

            </div>
        </div>
    </nav>

    <div style="margin-top:100px;">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>