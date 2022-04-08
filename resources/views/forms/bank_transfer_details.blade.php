@extends('layouts.form')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')


                                <div class="text-center">

                                    <h3 class="mt-3 mb-2">Bank:{{$bank}} </h3>
                                    <h3 class="text-dark mb-3">Account: {{$account}}</h3>
                                    <h4 class="text-dark mb-3">₦{{$application->payment->price}}</h4>
                                    <p class="text-danger">Please make a transfer to this account after which, you are to click the verify button below</p>
                                    <a href="{{url('/charges/successful?transact='. $transact)}}" class="btn btn-success waves-effect waves-light">Verify Transfer</a>
                                </div>
                       

@endsection
@section('script')
<script>

</script>
@endsection
