<!DOCTYPE html>
<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <meta name="description" content="">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    <link href="{{asset('css/dashboards-analytics.css')}}" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/demostyles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/vendor/css/core.css')}}" rel="stylesheet" />
    <link href="{{asset('css/vendor/css/theme-default.css')}}" rel="stylesheet" />
    <link href="{{asset('css/vendor/libs/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset('css/vendor/fonts/boxicons.css')}}" rel="stylesheet" />

</head>
<body class="sb-nav-fixed">
    <div id="layoutSidenav_content">
        <main>
            @yield('page-content')
        </main>
        @include('layouts.renter_partials.footer')
    </div>
</div>

<script src="{{asset('js/Demo/config.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/Demo/dashboards-analytics.js')}}"></script>
<script src="{{asset('js/Demo/extended-ui-perfect-scrollbar.js')}}"></script>
<script src="{{asset('js/Demo/form-basic-inputs.js')}}"></script>
<script src="{{asset('js/Demo/main.js')}}"></script>
<script src="{{asset('js/Demo/pages-account-settings-account.js')}}"></script>
<script src="{{asset('js/Demo/ui-modals')}}"></script>
<script src="{{asset('js/Demo/ui-popover.js')}}"></script>
<script src="{{asset('js/Demo/ui-toasts.js')}}"></script>
<script src="{{asset('css/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('css/vendor/js/helpers.js')}}"></script>
<script src="{{asset('css/vendor/js/menu.js')}}"></script>
</body>
</html>
