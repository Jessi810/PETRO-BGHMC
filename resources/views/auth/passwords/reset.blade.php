@extends('auth._modular')

@section('content')
    <p class="text-center">NEW PASSWORD</p>
        <p class="text-muted text-center">
            <small>Enter your new password.</small>
    </p>
    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}" novalidate="">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control underlined" name="email" id="email" placeholder="Your email address" required> </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <div class="row">
                <div class="col-sm-6">
                    <input type="password" class="form-control underlined" name="password" id="password" placeholder="Enter password" required=""> </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control underlined" name="password_confirmation" id="password-confirm" placeholder="Re-type password" required=""> </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Save Password
                </button>
            </div>
        </div>
    </form>
@endsection
