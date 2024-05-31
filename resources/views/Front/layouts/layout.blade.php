<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="{{asset('Front/assets/favicon.ico')}}"/>
    <!-- Global style/script files-->
    @include('Front.assets.css.global')
    @yield('headerCssJs')
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('Front/css/styles.css')}}" rel="stylesheet"/>
</head>
<body>
<!-- Header section -->
@include('Front.layouts.header')


<!-- Main Content-->
@yield('mainContent')


<!-- Footer section -->
@include('Front.layouts.footer')

<!-- Common JS files -->
@include('Front.assets.js.global')
<!-- Spesific Page Js files -->
@yield('footerJS')
<!-- Manual JS file-->
<script src="{{asset('Front/js/scripts.js')}}"></script>
</body>
</html>
