<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('sb-admin-2/vendor/metisMenu/metisMenu.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('sb-admin-2/vendor/morrisjs/morris.css') }}" />
        <link rel="stylesheet" href="{{ asset('sb-admin-2/dist/css/sb-admin-2.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />

        <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
        <script src="{{ asset('jquery-validation/dist/jquery.validate.min.js') }}"></script>

    </head>
    <body>
        <div id="wrapper">
            @include('Web::layouts._partials._nav')

            <div id="page-wrapper">
                <div class="container-fluid wrap-content">
                    <br/>
                    @yield('content')
                </div>
            </div>
        </div>

        @include('Web::layouts._partials.modal_processing')

        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script src="{{ asset('sb-admin-2/vendor/metisMenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('sb-admin-2/vendor/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('sb-admin-2/vendor/morrisjs/morris.min.js') }}"></script>
        <!--<script src="{{ asset('sb-admin-2/data/morris-data.js') }}"></script>-->
        <script src="{{ asset('sb-admin-2/dist/js/sb-admin-2.js') }}"></script>

        <script src="{{ asset('js/moment.js') }}"></script>
        <script src="{{ asset('bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

        @stack('scripts')
    </body>
</html>
