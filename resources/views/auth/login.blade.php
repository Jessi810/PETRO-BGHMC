@extends('auth._modular')

@section('content')
    <p class="text-center">LOGIN TO CONTINUE</p>
    <form id="login-form" action="{{ route('login') }}" method="POST" novalidate="">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control underlined" name="email" id="email" placeholder="Your email address" required> </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required> </div>
        <div class="form-group">
            <label for="remember">
                <input class="checkbox" id="remember" type="checkbox">
                <span>Remember me</span>
            </label>
            <a href="{{ route('password.request') }}" class="forgot-btn pull-right">Forgot password?</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Login</button>
        </div>
        <div class="form-group">
            <p class="text-muted text-center">Don't have an account?
                <a href="{{ route('register') }}">Sign Up!</a>
            </p>
        </div>
    </form>
@endsection