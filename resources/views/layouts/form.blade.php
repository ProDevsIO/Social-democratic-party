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

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        @yield('content')
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="../assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="../assets/js/app.min.js"></script>
    @yield('script')
</body>
</html>
