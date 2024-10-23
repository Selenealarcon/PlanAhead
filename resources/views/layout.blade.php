<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PlanAhead - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo_sf_verd.png') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @section('stylesheets')
        @show
        @stack('scripts')        
    </head>
    <body>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
