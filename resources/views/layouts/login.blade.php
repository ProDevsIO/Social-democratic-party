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
    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <!-- App css -->
    <link href="/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="/assets/css/config/default/app.min.css" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="/assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" />
    <link href="/assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/login.css" rel="stylesheet" type="text/css" />
    @yield('style')
</head>

<body class="loading auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-start">
                        <div class="auth-logo">
                            <a href="{{ url('/') }}" class="logo logo-dark text-center">
                                <span class="logo-lg">
                                    <img src="/assets/images/favicon.png" alt="" height="125">
                                </span>
                            </a>
                           

                            <a href="{{ url('/') }}" class="logo logo-light text-center">
                                <span class="logo-lg">
                                <img src="/assets/images/favicon.png" alt="" height="125">
                                </span>
                            </a>
                        </div>
                    </div>



                    @yield('content')



                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <!-- <h2 class="mb-3 text-white">Tracking made Easy!</h2>
                <p class="lead">
                    Doing business without advertising is like winking at a girl in the dark. You know what you are doing, but no one else does
                </p>
                <h5 class="text-white">
                    -  Stuart Britt
                </h5> -->
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>
    @yield('script')
</body>

</html>
