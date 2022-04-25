<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <!-- <link href="{{ asset('css/material-icons-min.css') }}" rel="stylesheet"> -->

    <title>{{ config('app.name', 'ARC DBMS') }}</title>

    <!-- Scripts -->
    <!-- Use asset for local dev-->
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script src="{{ secure_asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/media-query.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('#') }}">
                    {{ config('app.name', 'ARC DBMS') }}
                </a>

                <div class="navbar-nav" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <div class="sidebar-button">
                            <button class="btn btn-light" id="menu-toggle"><span class="material-icons-round material-icons-toggle">more_vert</span></button>
                        </div>
                        <!-- Authentication Links -->
                        <!-- @guest
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
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex" id="wrapper">
            <aside>
                <!-- Sidebar -->
                <div class="bg-dark border-right" id="sidebar-wrapper">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action bg-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <span class="material-icons-round material-icons-sidebar">logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <div class="sidebar-heading"><img src="{{ asset('images/ubseal.png') }}" alt="ubseal"></div>
                    <div class="list-group-flush list-group-item-action bg-dark" id="user-display"> <span class="badge bg-danger">{{ Auth::user()->username }}</span></div>
                    @if(Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                    <a href="{{ route('change.password') }}" class="btn mb-2" id="user-display-password">Change Password</a>
                    @endif
                    <div class="list-group list-group-flush">
                        @if (Auth::user()->is_admin == 1)
                        <a href="{{ route('records.index') }}" class="list-group-item list-group-item-action bg-dark">Records <span class="material-icons-outlined material-icons-sidebar">article</span></a>
                        <a href="{{ route('newrecords.index') }}" class="list-group-item list-group-item-action bg-dark">New Record <span class="material-icons-round material-icons-sidebar">post_add</span></a>
                        <a href="{{ route('import.index') }}" class="list-group-item list-group-item-action bg-dark">Import <span class="material-icons-outlined material-icons-sidebar">upload_file</span></a>

                        <hr id="sidebar-hr" />
                        <div class="list-group list-group-flush">
                            <div class="dropdown">
                                <a class="list-group-item list-group-item-action bg-dark " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Users <span class="material-icons-outlined material-icons-sidebar">
                                        keyboard_arrow_down
                                    </span>
                                </a>

                                <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                                    <li><a class="list-group-item list-group-item-action bg-dark" href="{{ route('register') }}">Register</a></li>
                                    <li><a class="list-group-item list-group-item-action bg-dark" href="{{ route('users.index') }}"><span class="material-icons-outlined material-icons-sidebar">view_list</span> User List</a></li>
                                </ul>
                            </div>
                        </div>
                        @else
                        <a href="{{ route('records.index') }}" class="list-group-item list-group-item-action bg-dark">Records <span class="material-icons-outlined material-icons-sidebar">article</span></a>
                        @endif
                    </div>
                    <div class=""> </div>
                </div>
                <!-- /#sidebar-wrapper -->
            </aside>



            <div class="flex-fill flex-0">
                <main class="py-2">
                    @include('sweetalert::alert')
                    @yield('content')
                </main>
            </div>
        </div>
        <!-- /#wrapper -->
    </div>
    
    <!-- Script for Jquery Form -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>  
</body>

</html>