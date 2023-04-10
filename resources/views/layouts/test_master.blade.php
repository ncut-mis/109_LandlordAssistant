<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
</head>
<body class="homepage is-preload">
<div id="page-wrapper">

    <!-- Nav -->
    @include('layouts.test_partials.navigation')

    <!-- Main -->
    @yield('content');

    <!-- Footer -->
    @include('layouts.test_partials.footer');

</div>

<!-- Scripts -->
<script src="{{asset('js/jquery.min.js')}}"></script>{{asset('')}}
<script src="{{asset('js/jquery.dropotron.min.js')}}"></script>
<script src="{{asset('js/jquery.scrolly.min.j')}}s"></script>
<script src="{{asset('js/browser.min.js')}}"></script>
<script src="{{asset('js/breakpoints.min.js')}}"></script>
<script src="{{asset('js/util.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
