<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!------- IE Compatibility Meta ------->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!---- Title ---->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!------- Theme Color meta ------->
    <meta name="theme-color" content="#2a8e82">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <!------- FontAwesome  ------->
    <script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">




    <link type="text/css" href="{{ asset('css/admin/sweetalert2.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/notyf.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/main.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/apexcharts.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/dropzone.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/choices.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/leaflet.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/volt.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">


</head>

<body>
    <div id="admin">


        <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


        <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


        <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
            <a class="navbar-brand me-lg-5" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-white.png') }}" style="max-width: 150px" alt="Bloomfield Logo">
            </a>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse simplebar-scrollable-y"
            data-simplebar>
            <div class="sidebar-inner px-4 pt-3">
                <div
                    class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg  d-flex justify-content-between align-items-center">
                            <i class="fa-solid fa-circle-user fa-3x"></i>
                        </div>
                        <div class="d-block">
                            <h2 class="h5 mb-3">Hi, {{ Str::ucfirst(Auth::user()->name) }} </h2>
                            <a href="../../pages/examples/sign-in.html"
                                class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center">
                                <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Sign Out
                            </a>
                        </div>
                    </div>
                    <div class="collapse-close d-md-none">
                        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                            aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <ul class="nav flex-column pt-3 pt-md-0">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link text-center">
                            <span class="sidebar-icon brand-img"><img src="{{ asset('images/favicon.png') }}"
                                    alt="Bloomfield Logo">
                            </span>
                            <span class="mt-1 sidebar-text">Bloomfield <small
                                    style="font-size: 0.7rem">PH</small></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ Request::is('*/dashboard*') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ Request::is('*/users*') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-users"></i>
                            </span>
                            <span class="sidebar-text">Users</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <span class="nav-link d-flex justify-content-between align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#submenu-app" aria-expanded="false">
                            <span>
                                <span class="sidebar-icon"> <i class="fa-solid fa-list"></i> </span>
                                <span class="sidebar-text">Categories</span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>
                        <div class="multi-level collapse  {{ Request::is('*/categories*') || Request::is('*/subcategories*') ? 'show' : '' }}" role="list" id="submenu-app" aria-expanded="false" style="">
                            <ul class="flex-column nav">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('*/categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                                        <span class="sidebar-text-contracted">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>       
                                        </span>
                                        <span class="sidebar-text">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg> 
                                            Main Categories
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('*/subcategories*') ? 'active' : '' }}" href="{{ route('admin.subcategories.index') }}">
                                        <span class="sidebar-text-contracted">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                        </span>
                                        <span class="sidebar-text">
                                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                            Sub Categories
                                        </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.products.index') }}"
                            class="nav-link {{ Request::is('*/products*') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-box-open"></i>
                            </span>
                            <span class="sidebar-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('admin.prescriptions.index') }}"
                            class="nav-link {{ Request::is('*/prescriptions*') ? 'active' : '' }}">
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-file-prescription"></i>
                            </span>
                            <span class="sidebar-text">Prescriptions</span>
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <span class="nav-link d-flex justify-content-between align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false">
                            <span>
                                <span class="sidebar-icon"> <i class="fa-solid fa-dolly"></i> </span>
                                <span class="sidebar-text"> Orders </span>
                            </span>
                            <span class="link-arrow">
                                <svg class="icon icon-sm" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </span>
                        <div class="multi-level collapse {{ Request::is('*/orders*') || Request::is('*/prescription_orders*') ? 'show' : '' }}" role="list" id="orders" aria-expanded="false" style="">
                            <ul class="flex-column nav">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('*/orders*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                                        <span class="sidebar-text-contracted">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </span>
                                        <span class="sidebar-text">
                                            <i class="fa-solid fa-cart-shopping me-0"></i>
                                            Subscriped Orders
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('*/prescription_orders*') ? 'active' : '' }}" href="{{ route('admin.prescription_orders.index') }}">
                                        <span class="sidebar-text-contracted">
                                            <i class="fa-solid fa-file-prescription"></i>
                                        </span>
                                        <span class="sidebar-text">
                                            <i class="fa-solid fa-file-prescription me-2"></i>
                                            Prescription Orders
                                        </span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
        </nav>

        <main class="content">

            <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
                <div class="container-fluid px-0">
                    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">

                        <div class="d-flex align-items-center"><button id="sidebar-toggle"
                                class="sidebar-toggle me-3 btn btn-icon-only d-none d-lg-inline-block align-items-center justify-content-center"><svg
                                    class="toggle-icon" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg></button></div>
                        <!-- Navbar links -->
                        <ul class="navbar-nav align-items-center" style="padding-right: 40px;">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark notification-bell unread dropdown-toggle"
                                    data-unread-notifications="true" href="#" role="button" data-bs-toggle="dropdown"
                                    data-bs-display="static" aria-expanded="false">
                                    <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                        </path>
                                    </svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">Notifications</a>
                                        @php
                                            $notifications = App\Models\Notification::with('user')->orderBy('id','desc')->take(5)->get();
                                        @endphp
                                        @if ($notifications->isEmpty())
                                        <a href="#" class="list-group-item list-group-item-action border-bottom">
                                            <div class="row align-items-center text-center">
                                                <p style="padding: 0px; margin: 0.5rem;">No Notifications!</p>
                                            </div>
                                        </a>
                                        @else
                                            @foreach ( $notifications as $notification )
                                                <a href="{{$notification->link}}" notification_id="{{$notification->id}}" class="notification-link {{$notification->as_read == '0' ? 'not_seen' : '' }} list-group-item list-group-item-action border-bottom">
                                                    <div class="row align-items-center">
                                                        <div class="col ps-0 ms-2">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <h4 class="h6 mb-0 text-small">{{ $notification->user->name }}</h4>
                                                                </div>
                                                                <div class="text-end">
                                                                    <small class="text-danger"> {{ $notification->created_at->format('d M Y') }} </small>
                                                                </div>
                                                            </div>
                                                            <p class="font-small mt-1 mb-0">
                                                                @if ( $notification->content == "create_order")
                                                                    New order has been created by {{ $notification->user->name }}
                                                                @elseif ( $notification->content == "upload_prescriotion")
                                                                    New prescription has been upload by <span class="font-wieght-bold"> {{ $notification->user->name }} </span>  
                                                                @elseif ( $notification->content == "create_prescription_order")
                                                                    There is new request for prescription medicines
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        @endif

                                        <a href="{{ route('admin.notifications.index') }}" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                                            <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown ms-lg-3">
                                <a class="nav-link dropdown-toggle pt-2 px-0" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="media d-flex align-items-center">
                                        <i class="fa-solid fa-user"></i>
                                        <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                            <span
                                                class="mb-0 font-small fw-bold text-gray-900">{{ Str::ucfirst(Auth::user()->name) }}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        My Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Settings
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Messages
                                    </a>
                                    <div role="separator" class="dropdown-divider my-1"></div>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                            </path>
                                        </svg>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>




            @yield('content')

            <!-- Back to top button -->
            <a id="button-scroll-up"></a>



        </main>



    </div>



    <script src="{{ asset('js/admin/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin/on-screen.umd.min.js') }}"></script>
    <script src="{{ asset('js/admin/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/admin/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('js/admin/countUp.umd.js') }}"></script>
    <script src="{{ asset('js/admin/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/admin/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/simple-datatables.js') }}"></script>
    <script src="{{ asset('js/admin/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/main.min.js') }}"></script>
    <script src="{{ asset('js/admin/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/admin/choices.min.js') }}"></script>
    <script src="{{ asset('js/admin/notyf.min.js') }}"></script>
    <script src="{{ asset('js/admin/leaflet.js') }}"></script>
    <script src="{{ asset('js/admin/svg-pan-zoom.min.js') }}"></script>
    <script src="{{ asset('js/admin/svgMap.min.js') }}"></script>
    <script src="{{ asset('js/admin/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/admin/Sortable.min.js') }}"></script>
    <script async defer="defer" src="{{ asset('js/admin/buttons.js') }}"></script>
    <script src="{{ asset('js/admin/volt.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin/custom.js') }}"></script>


</body>

</html>
