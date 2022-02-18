<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <!-- <link href="{{ asset('css/material-icons-min.css') }}" rel="stylesheet"> -->

    <title>{{ config('app.name', 'ARC DBMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media-query.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('#') }}">
                    {{ config('app.name', 'ARC DBMS') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                    <div class="list-group list-group-flush mb-auto">
                        <a href="{{ route('records.index') }}" class="list-group-item list-group-item-action bg-dark">Records <span class="material-icons-outlined material-icons-sidebar">article</span></a>
                        <a href="{{ route('newrecords.index') }}" class="list-group-item list-group-item-action bg-dark">New Record <span class="material-icons-round material-icons-sidebar">post_add</span></a>
                        <a href="{{ route('import.index') }}" class="list-group-item list-group-item-action bg-dark">Import <span class="material-icons-outlined material-icons-sidebar">upload_file</span></a>
                        <a href="#" class="list-group-item list-group-item-action bg-dark" hidden></a>

                        <a href="#" class="list-group-item list-group-item-action bg-dark" hidden>Archive <span class="material-icons-outlined material-icons-sidebar">archive</span></a>
                    </div>
                    <hr />
                    
                    <div class="list-group" id="dropdown-toggled">
                        <button onclick="sidebarDropDown()" type="button" class="dropbtn list-group-item list-group-item-action bg-dark">Users <span class="material-icons-outlined material-icons-sidebar-dropdown">expand_more</span></button>

                        <div id="sidebar-dropdown" class="dropdown-content">
                            <a href="{{ route('records.index') }}" class="list-group-item list-group-item-action bg-dark" id="bottom-sidenav">Accounts <span class="material-icons-outlined material-icons-sidebar">group</span></a>
                            <a href="{{ route('records.index') }}" class="list-group-item list-group-item-action bg-dark" id="bottom-sidenav">Register <span class="material-icons-outlined material-icons-sidebar">how_to_reg</span></a>
                        </div>
                    </div>

                    <script>
                       
                    </script>
                </div>
                <!-- /#sidebar-wrapper -->
            </aside>

            <main class="py-2">
                @include('sweetalert::alert')
                @yield('content')
            </main>
        </div>
        <!-- /#wrapper -->
    </div>
</body>

</html>