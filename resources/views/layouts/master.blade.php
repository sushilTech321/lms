<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

    {{-- data tables --}}
    {{-- <link rel="stylesheet" href="{{asset('../assets/css/dataTables.min.css')}}"> --}}
    <link rel="stylesheet" href="../assets/css/dataTables.min.css">

    {{-- fontawesome link --}}
    <script src="https://kit.fontawesome.com/ee90f4096b.js" crossorigin="anonymous"></script>

    {{-- sweet alert  --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class="">
    <div class="wrapper ">
        {{-- sidebar --}}
        <div class="sidebar" data-color="green">
            <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
            <div class="logo">
                <a href="{{url('/dashboard')}}" class="simple-text logo-mini">
                    LMS
                </a>
                <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
                    Panel
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ 'dashboard' == request()->path() ? 'active' : '' }}">
                        <a href="{{url('dashboard')}}">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        {{-- <a href="/index">
                            <i class="fa-solid fa-users"></i>
                            <p>Employee</p>
                        </a> --}}
                        <a class="nav-link dropdown-toggle collapsed text-truncate "  href="#" data-toggle="collapse" data-target="#submenu2">
                            <i class="fa-solid fa-users"></i>
                            <p class="d-none d-sm-inline"> Employee</p>
                        </a>
                        <div class="collapse" id="submenu2">
                            <ul class="flex-column pl-2 nav"> 
                                <li class="nav-item {{ 'register' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link" href="{{url('register')}}">
                                        <i class="fa-regular fa-user"></i>
                                        <span> Register Employee </span> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="{{ 'leavetype' == request()->path() ? 'active' : '' }}">
                        <a href="{{url('/leavetype')}}">
                            {{-- <i class="fa-solid fa-notes-medical"></i> --}}
                            <i class="fa-solid fa-table"></i>
                            <p>Leave Types</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
                            <i class="fa-solid fa-circle-chevron-down"></i>
                            <span class="d-none d-sm-inline"> Manage Leave</span>
                        </a>
                        <div class="collapse" id="submenu1">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item {{ 'admin_approve' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link" href="{{url('admin_approve')}}"><i class="fa-solid fa-spinner"></i><span> Pending Leave </span></a>
                                </li>
                                <li class="nav-item {{ 'approved_leave' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link" href="{{url('approved_leave')}}">
                                        <i class="fa-solid fa-check"></i>Approved Leave
                                    </a>
                                </li>
                                <li class="nav-item  {{ 'rejected_leave' == request()->path() ? 'active' : '' }}">
                                    <a class="nav-link" href="{{url('rejected_leave')}}">
                                        <i class="fa-solid fa-xmark"></i>Declined Leave
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li  class="{{ 'Adminleave_history' == request()->path() ? 'active' : '' }}">
                        <a href="{{url('Adminleave_history')}}">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <p>Leave History</p>
                        </a>
                    </li>
                    {{-- <li class="{{ 'apitest' == request()->path() ? 'active' : '' }}">
                        <a href="{{url('apitest')}}">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Notifications</p>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        {{-- sidebar end --}}
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="{{url('dashboard')}}">Admin Panel</a>
                        <marquee loop="2" direction="right">
                            Welcome  <a class="text-uppercase text-success" id="">
                                 &nbsp; {{ Auth::user()->name }}
                            </a>
                        </marquee>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        {{-- <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form> --}}
                        <ul class="navbar-nav mr-4">
                            {{-- logout section --}}
                            <li class="nav-item dropdown">
                                <div class="dropdown">
                                    <button class="btn  text-uppercase   dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="now-ui-icons users_single-02"></i> &nbsp; {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        
                                        {{-- change password --}}
                                        <form action="{{url('admin_password')}}"> 
                                            {{ csrf_field() }}
                                            <button type="submit" class="dropdown-item text-dark"> <i class="fa-solid fa-gear"></i>Change Password </button>
                                        </form>
                                        {{-- logout --}}
                                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-right-to-bracket"></i>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                         </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <!-- content -->
            <div class="content">
                @yield('content')
            </div>
            {{-- footer --}}
            <footer class="footer">
                <div class=" container-fluid text-center ">
                   All right reserved &copy;2023
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    {{-- data tables js --}}
    {{-- <script src="{{asset('../assets/js/dataTables.min.js')}}"></script> --}}
    <script src="../assets/js/dataTables.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
    <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>

    @yield('scripts')

</body>
</html>
