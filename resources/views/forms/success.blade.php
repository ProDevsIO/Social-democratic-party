@extends('layouts.form')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-6">
                @include('errors.showerrors')
                    <div class="card bg-pattern">

                        <div class="card-body p-4">
                                 <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="/assets/images/sdp_new_logo.png" class="img-fluid avatar-xl rounded" alt="" height="70">
                                        </span>
                                    </a>
                
                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                           <img src="/assets/images/sdp_new_logo.png" class="img-fluid avatar-xl rounded" alt="" height="70">
                                        </span>
                                    </a>
                                </div>

                                <div class="text-center mt-4">
                                    <h1 class="text-error" style="color:green">SUCCESS!!</h1>
                                    <h3 class="mt-3 mb-2">Hi {{$application->first_name}}  {{$application->first_name}},</h3>
                                    <p class="text-dark mb-3">Your Payment was successful</p>

                                    <a href="/form" class="btn btn-success waves-effect waves-light">Back to Home</a>
                                </div>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                  
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

@endsection
@section('script')
<script>

</script>
@endsection
