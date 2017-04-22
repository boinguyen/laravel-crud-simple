<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />

    </head>
    <body>
        <div class="container-fluid">
            <header></header>
            @yield('content')
            <footer></footer>
        </div>

        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @stack('scripts')
    </body>
</html>
