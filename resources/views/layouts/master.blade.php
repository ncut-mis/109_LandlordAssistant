<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
</head>
<body class="homepage is-preload">
<div id="page-wrapper">

    <!-- Nav -->
    @include('layouts.partials.navigation')

    <!-- Main -->
    @yield('content');

    <!-- Footer -->
    @include('layouts.partials.footer');

</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('js/jquery.scrolly.min.js')}}"></script>
<script src="{{asset('js/browser.min.js')}}"></script>
<script src="{{asset('js/breakpoints.min.js')}}"></script>
<script src="{{asset('js/util.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/tw-city-selector.js')}}"></script>
<script>
    new TwCitySelector();
</script>

</body>
</html>
