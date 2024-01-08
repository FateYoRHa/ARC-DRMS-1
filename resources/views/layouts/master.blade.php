<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link href="{{ asset('css/material-icons-min.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'ARC DRMS') }}</title>

    <!-- Scripts -->
    <!-- Use asset for local dev-->
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script src="{{ secure_asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"></script>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
     --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> --}}
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/media-query.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.css">

    {{-- DATATABLE REPORT STUFF --}}


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.4/b-2.3.6/sl-1.6.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="Editor-2.1.2/css/editor.dataTables.css">

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.13.4/b-2.3.6/sl-1.6.2/datatables.min.js"></script>
    <script type="text/javascript" src="Editor-2.1.2/js/dataTables.editor.js"></script>


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                @if (Auth::user()->is_admin == 3)
                    <a class="navbar-brand" href="{{ url('/records') }}" readonly>
                        {{ config('app.name', 'ARC DRMS') }}
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/records') }}">
                        {{ config('app.name', 'ARC DRMS') }}
                    </a>
                @endif
                <span class="navbar-acronym text-light">Digital Records Management System</span>

                <div class="navbar-nav" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <div class="sidebar-button">
                            <button class="btn btn-light" id="menu-toggle"><span
                                    class="material-icons-round material-icons-toggle">&#xe5d4</span></button>
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
                        <div class="sidebar-heading">
                            <img src="{{ asset('images/ubseal.png') }}" id="ubseal" alt="ubseal" class="img-fluid"
                                style="width: 5rem">
                        </div>
                        <a class="list-group-item list-group-item-action bg-dark text-light"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }} <svg class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px"
                                fill="#FFFFFF">
                                <g>
                                    <path d="M0,0h24v24H0V0z" fill="none" />
                                </g>
                                <g>
                                    <path
                                        d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z" />
                                </g>
                            </svg>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                    <div class="list-group-flush list-group-item-action bg-dark" id="user-display"> <span
                            class="badge bg-danger">{{ Auth::user()->username }} </span>
                        <span class="badge bg-success">
                            @if (Auth::user()->is_admin == 1)
                                Role: Admin
                            @elseif (Auth::user()->is_admin == 3)
                                Role: {{ Auth::user()->department }} Dean
                            @elseif (Auth::user()->is_admin == 2)
                                Role: Uploader
                            @else
                                Role: Viewer
                            @endif
                        </span>
                    </div>
                    @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                        <a href="{{ route('change.password') }}" class="btn mb-2" id="user-display-password">Change
                            Password</a>
                    @endif
                    <div class="list-group list-group-flush">
                        @if (Auth::user()->is_admin == 1)
                            <a href="{{ route('records.index') }}"
                                class="list-group-item list-group-item-action bg-dark text-light">Records <svg
                                    class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <g>
                                        <rect fill="none" height="24" width="24" />
                                        <g>
                                            <path
                                                d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z" />
                                        </g>
                                        <path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" />
                                    </g>
                                </svg></a>
                            <a href="{{ route('newrecords.index') }}"
                                class="list-group-item list-group-item-action bg-dark text-light">New Record <svg
                                    class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <g>
                                        <rect fill="none" height="24" width="24" />
                                        <rect fill="none" height="24" width="24" />
                                    </g>
                                    <g>
                                        <g />
                                        <g>
                                            <path
                                                d="M18,12c-0.55,0-1,0.45-1,1v5.22c0,0.55-0.45,1-1,1H6c-0.55,0-1-0.45-1-1V8c0-0.55,0.45-1,1-1h5c0.55,0,1-0.45,1-1 c0-0.55-0.45-1-1-1H5C3.9,5,3,5.9,3,7v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2v-6C19,12.45,18.55,12,18,12z" />
                                            <path
                                                d="M21.02,5H19V2.98C19,2.44,18.56,2,18.02,2h-0.03C17.44,2,17,2.44,17,2.98V5h-2.01C14.45,5,14.01,5.44,14,5.98 c0,0.01,0,0.02,0,0.03C14,6.56,14.44,7,14.99,7H17v2.01c0,0.54,0.44,0.99,0.99,0.98c0.01,0,0.02,0,0.03,0 c0.54,0,0.98-0.44,0.98-0.98V7h2.02C21.56,7,22,6.56,22,6.02V5.98C22,5.44,21.56,5,21.02,5z" />
                                            <path
                                                d="M14,9H8c-0.55,0-1,0.45-1,1c0,0.55,0.45,1,1,1h6c0.55,0,1-0.45,1-1C15,9.45,14.55,9,14,9z" />
                                            <path
                                                d="M14,12H8c-0.55,0-1,0.45-1,1c0,0.55,0.45,1,1,1h6c0.55,0,1-0.45,1-1C15,12.45,14.55,12,14,12z" />
                                            <path
                                                d="M14,15H8c-0.55,0-1,0.45-1,1c0,0.55,0.45,1,1,1h6c0.55,0,1-0.45,1-1C15,15.45,14.55,15,14,15z" />
                                        </g>
                                    </g>
                                </svg></a>
                            <a href="{{ route('import.index') }}"
                                class="list-group-item list-group-item-action bg-dark text-light">Import <svg
                                    class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <g>
                                        <rect fill="none" height="24" width="24" />
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M14,2H6C4.9,2,4.01,2.9,4.01,4L4,20c0,1.1,0.89,2,1.99,2H18c1.1,0,2-0.9,2-2V8L14,2z M18,20H6V4h7v5h5V20z M8,15.01 l1.41,1.41L11,14.84V19h2v-4.16l1.59,1.59L16,15.01L12.01,11L8,15.01z" />
                                        </g>
                                    </g>
                                </svg></a>

                            <a href="{{ route('students.index') }}"
                                class="list-group-item list-group-item-action bg-dark text-light">Student List <svg
                                    class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <rect fill="none" height="24" width="24" />
                                    <path
                                        d="M3,5v14h18V5H3z M7,7v2H5V7H7z M5,13v-2h2v2H5z M5,15h2v2H5V15z M19,17H9v-2h10V17z M19,13H9v-2h10V13z M19,9H9V7h10V9z" />
                                </svg></a>
                            <a
                                href="{{ route('departments.index') }}"class="list-group-item list-group-item-action bg-dark text-light">Departments</a>
                            <a
                                href="{{ route('courses.index') }}"class="list-group-item list-group-item-action bg-dark text-light">Courses</a>

                            <hr id="sidebar-hr" />
                            <div class="list-group list-group-flush">
                                <div class="dropdown">
                                    <a class="list-group-item list-group-item-action bg-dark text-light"
                                        role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                        aria-expanded="false">
                                        Users
                                        <svg class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                            height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z" />
                                        </svg>
                                    </a>

                                    <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                                        <li><a class="list-group-item list-group-item-action bg-dark text-light"
                                                href="{{ route('register') }}">Register</a></li>
                                        <li><a class="list-group-item list-group-item-action bg-dark text-light"
                                                href="{{ route('users.index') }}"><svg class="material-icons-sidebar"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    enable-background="new 0 0 24 24" height="24px"
                                                    viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                                                    <rect fill="none" height="24" width="24" />
                                                    <path
                                                        d="M3,5v14h18V5H3z M7,7v2H5V7H7z M5,13v-2h2v2H5z M5,15h2v2H5V15z M19,17H9v-2h10V17z M19,13H9v-2h10V13z M19,9H9V7h10V9z" />
                                                </svg> User List</a></li>
                                    </ul>
                                </div>
                            </div>
                        @elseif (Auth::user()->is_admin == 3)
                            <a href="{{ route('students.index') }}"
                                class="list-group-item list-group-item-action bg-dark text-light">Student List <svg
                                    class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <rect fill="none" height="24" width="24" />
                                    <path
                                        d="M3,5v14h18V5H3z M7,7v2H5V7H7z M5,13v-2h2v2H5z M5,15h2v2H5V15z M19,17H9v-2h10V17z M19,13H9v-2h10V13z M19,9H9V7h10V9z" />
                                </svg></a>
                        @else
                            <a href="{{ route('records.index') }}"
                                class="list-group-item list-group-item-action bg-dark text-light">Records <svg
                                    class="material-icons-sidebar" xmlns="http://www.w3.org/2000/svg"
                                    enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24"
                                    width="24px" fill="#FFFFFF">
                                    <g>
                                        <rect fill="none" height="24" width="24" />
                                        <g>
                                            <path
                                                d="M19,5v14H5V5H19 M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3L19,3z" />
                                        </g>
                                        <path d="M14,17H7v-2h7V17z M17,13H7v-2h10V13z M17,9H7V7h10V9z" />
                                    </g>
                                </svg></a>
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
