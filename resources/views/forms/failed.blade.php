@extends('layouts.form')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')


                                <div class="text-center">
                                    <h1 class="text-error" style="color:danger">FAILED!!</h1>
                                    <h3 class="mt-3 mb-2">Hi {{$application->first_name}}  {{$application->first_name}},</h3>
                                    <p class="text-dark mb-3">Sorry, but your payment was successful</p>

                                    <a href="/form" class="btn btn-success waves-effect waves-light">Back to form</a>
                                </div>
                       

@endsection
@section('script')
<script>

</script>
@endsection
