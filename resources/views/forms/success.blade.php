@extends('layouts.form')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

                        <div class="card-body p-4">
                                <div class="text-center">
                                    <h3 class="text-error" style="color:green">SUCCESS!!</h3>
                                    <h3 class="mt-3 mb-2">Hi {{$application->first_name}}  {{$application->first_name}},</h3>
                                    <p class="text-dark mb-3">Your Payment was successful</p>

                                    <a href="/form" class="btn btn-success waves-effect waves-light">Back to form</a>
                                </div>
                        </div> <!-- end card-body -->

@endsection
@section('script')
<script>

</script>
@endsection
