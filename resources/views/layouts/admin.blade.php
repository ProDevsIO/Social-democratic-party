<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>SDP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Social-Democratic-Party portal" name="description" />
    <meta content="ProDevs Outsourcing Ltd" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/sdp_new_logo.png">

    <!-- Plugins css -->
    <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        integrity="sha512-htNvyHHSudmoBXn6EWHJNChOqj6bjdATOD9Cj63VcJKtonHBnWZmTiYaI+tUzVv4dZlE+SaWjoq6mhL3ztfAJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <style>
        :root {
            --bs-body-bg: #F8F8F8 !important;
        }

        .left-side-menu {
            background-color: #006400;
        }

        #side-menu ul,
        #side-menu li,
        #side-menu a {
            color: white !important;

        }

        .modal-backdrop {

            background: none !important;
            position: inherit !important;
        }

        .modal.fade.show {
            background: #212529;
            opacity: .9;
        }



        .left-side-menu {
            height: 100vh !important;

        }

        .pac-container {
            z-index: 1600 !important;
        }

        .avatar-lg {
            height: 2.5rem !important;
            width: 2.5rem !important;
        }
    </style>

    <style>
        #current-user {
            min-height: 70px;
        }
    </style>
    @yield('style')
</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <div id="wrapper">

        <div class="navbar-custom">
            <div class="container-fluid">

                <ul class="list-unstyled topnav-menu float-end mb-0">


                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span class="me-3 d-none d-sm-inline">Hello {{auth()->user()->first_name}} (Admin)</span>
                            <img src="/assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ms-1">

                                <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">

                            <!-- item-->

                            <!-- item-->



                            <div class="dropdown-divider"></div>

                            <!-- item-->

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="javascript:void(0);" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>

                                    <span>Logout</span>
                                </a>
                            </form>


                        </div>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ url('/admin/dashboard') }}" class="logo logo-dark text-center">
                        <span class="logo-sm mt-2">
                          <h1 style="color:#006400">SDP</h2>
                        </span>
                        <span class="logo-lg mt-2">
                          <h1 style="color:#006400">SDP</h2>
                        </span>
                    </a>

                    <a href="{{ url('/admin/dashboard') }}" class="logo logo-light text-center">
                        <span class="logo-sm">
                           <h2>SDP</h2>
                        </span>
                        <span class="logo-lg">
                           <h2>SDP</h2>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="/assets/images/users/user-1.jpg" alt="user-img"
                            title="{{ auth()->user()->first_name." ".auth()->user()->last_name }}"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-bs-toggle="dropdown">{{ auth()->user()->first_name."
                                ".auth()->user()->last_name }}</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>
                           
                            <li>
                                <a href="{{ url('/admin/dashboard') }}">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/admin/forms') }}">
                                    <i data-feather="clipboard"></i>
                                    <span> Forms </span>
                                </a>
                            </li>
                           
                           
                            <li>
                                <a href="{{ url('/admin/categories') }}">
                                <i data-feather="grid"></i>
                                    <span> Categories </span>
                                </a>
                            </li>
                           
                            <li>
                                <a href="{{ url('/admin/positions') }}">
                                    <i data-feather="user-check"></i>
                                    <span> Subcategoriess </span>
                                </a>
                            </li>

                            <li>
                                <a href="#settings" data-bs-toggle="collapse">
                                    <i data-feather="book-open"></i>
                                    <span> Applications </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="settings">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ url('/admin/application/paid') }}">Paid </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/admin/application/unpaid') }}">Unpaid</a>
                                        </li> 
                                    </ul>
                                </div>
                            </li> 


                        </ul>

                    </div>


                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->


                </div>
            </div>
        </div>

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="/assets/libs/flatpickr/flatpickr.min.js"></script>
        {{-- <script src="/assets/libs/apexcharts/apexcharts.min.js"></script> --}}

        <script src="/assets/libs/selectize/js/standalone/selectize.min.js"></script>

        <!-- Dashboar 1 init js-->

        <!-- App js-->
        <script src="/assets/js/app.min.js"></script>


        <script>
            function openModal(target){

            $(target).modal('show');

            $('.modal-backdrop').remove();



        }
        function closeModal(target){
            $(target).modal('hide');
            $('.modal-backdrop').remove();
        }
        // close the div in 5 secs
        window.setTimeout("closeAlertDiv();", 7000);

        function closeAlertDiv() {
            if(document.getElementById("alertdiv")){
                document.getElementById("alertdiv").style.display = " none";
            }
        }
        </script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
            integrity="sha512-hgoywpb1bcTi1B5kKwogCTG4cvTzDmFCJZWjit4ZimDIgXu7Dwsreq8GOQjKVUxFwxCWkLcJN5EN0W0aOngs4g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(function () {

                $("#selectize-select").selectize({});
            })


        </script> --}}

        @yield('script')
</body>

</html>
