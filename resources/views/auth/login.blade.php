<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('modular/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('modular/css/app.css') }}" rel="stylesheet">

    <!-- Theme initialization -->
    {{--  <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
        {};
        var themeName = themeSettings.themeName || '';
        if (themeName)
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
        }
        else
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
        }
    </script>  --}}
</head>
<body>
<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <div class="logo">
                        <span class="l l1"></span>
                        <span class="l l2"></span>
                        <span class="l l3"></span>
                        <span class="l l4"></span>
                        <span class="l l5"></span>
                    </div> PETRO-BGHMC </h1>
            </header>
            <div class="auth-content">
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
            </div>
        </div>
        {{--  <div class="text-center">
            <a href="index.html" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left"></i> Back to dashboard </a>
        </div>  --}}
    </div>
</div>
<!-- Reference block for JS -->
<div class="ref" id="ref">
    <div class="color-primary"></div>
    <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
    </div>
</div>
<script>
    (function(i, s, o, g, r, a, m)
    {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function()
        {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-80463319-4', 'auto');
    ga('send', 'pageview');
</script>
<script src="{{ asset('modular/js/vendor.js') }}"></script>
<script src="{{ asset('modular/js/app.js') }}"></script>
</body>
</html>
