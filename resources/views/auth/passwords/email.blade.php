@extends('auth._modular')

@section('content')
    <p class="text-center">PASSWORD RECOVER</p>
    <p class="text-muted text-center">
        <small>Enter your email address to recover your password.</small>
    </p>
    <form id="reset-form" action="{{ route('password.email') }}" method="POST" novalidate="">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control underlined" name="email" id="email" placeholder="Your email address" required> </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Reset</button>
        </div>
        <div class="form-group clearfix">
            <a class="pull-left" href="{{ route('login') }}">return to Login</a>
            <a class="pull-right" href="{{ route('register') }}">Sign Up!</a>
        </div>
    </form>
@endsection