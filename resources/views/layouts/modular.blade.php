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
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-red.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">

    <!-- Scripts -->

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
<div class="main-wrapper">
    <div class="app" id="app">
        @include('includes.header')
        @include('includes.sidebar')
        <div class="sidebar-overlay" id="sidebar-overlay"></div>
        <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
        <div class="mobile-menu-handle"></div>
        <article class="content dashboard-page">
            @yield('content')
        </article>
        @include('includes.footer')
        @include('includes.modal')
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
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
{{--  <script src="{{ asset('js/turbolinks.js') }}"></script>  --}}
{{--  <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>  --}}
<script>
    //$(function () {
    //    $('[data-toggle="tooltip"]').tooltip()
    //})

    // Stops buttons from opening accordion
    $('.stop-accordion').on('click', function(e){
        $(this).find('.dropdown-toggle').dropdown('toggle');
        e.stopPropagation();
    });

    // Only one collapsible to show
    $('.collapse').on('show.bs.collapse', function () {
        $('.collapse.show').collapse('hide');
    });

    //Turbolinks.start();
</script>
@yield('scripts')
</body>
</html>
