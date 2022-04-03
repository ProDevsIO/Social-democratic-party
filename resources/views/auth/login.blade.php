@extends('layouts.login')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- form -->
<form action="/login" method="POST">
    @include("errors.showerrors")
    @csrf
    <div class="mb-3">
        <label for="emailaddress" class="form-label">Email address</label>
        <input class="form-control" name="email" type="email" id="emailaddress" required=""
            placeholder="Enter your email">
    </div>
    <div class="mb-3">
        <a href="#" class="text-muted float-end"><small>Forgot your password?</small></a>
        <label for="password" class="form-label">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" name="password" id="password" class="form-control" required placeholder="Enter your password">
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="checkbox-signin">
            <label class="form-check-label" for="checkbox-signin">Remember me</label>
        </div>
    </div>
    <div class="text-center d-grid">
        <button class="btn btn-success" type="submit">Log In </button>
    </div>


</form>
<!-- end form-->

<!-- Footer-->
<!-- Footer-->

@endsection
@section('script')

@endsection
