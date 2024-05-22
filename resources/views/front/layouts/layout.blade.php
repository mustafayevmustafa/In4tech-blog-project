<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="{{asset('front/assets/favicon.ico')}}" />
    <!-- Global style/script files-->
    @include('front.assets.css.global')
    @yield('headerCssJs')
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('front/css/styles.css')}}" rel="stylesheet" />
</head>
<body>
    <!-- Header section -->
    @include('front.layouts.header')


    <!-- Main Content-->
    @yield('mainContent')


    <!-- Footer section -->
    @include('front.layouts.footer')

    <!-- Common JS files -->
    @include('front.assets.js.global')
    <!-- Spesific Page Js files -->
    @yield('footerJS')
    <!-- Manual JS file-->
    <script src="{{asset('front/js/scripts.js')}}"></script>
</body>
</html>
