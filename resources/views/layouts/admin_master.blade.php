<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="{{asset('css/styles_owner.css')}}" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/mark.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles_owner.css" rel="stylesheet" />
</head>
<body class="sb-nav-fixed">
<!-- Navbar Brand-->
@include('layouts.admin_partials.navigation')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            @yield('page-content')
        </main>
        @include('layouts.admin_partials.footer')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('js/scripts_owner.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="js/simple-datatables.js" ></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="js/scripts.js"></script>
<script src="{{asset('js/tw-city-selector.js')}}"></script>
<script>
    new TwCitySelector({
        districtFieldName: 'area'
    });
</script>
</body>
</html>
