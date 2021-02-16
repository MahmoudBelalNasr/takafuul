<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8" />
    <!-- IE Compatibility Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- First Mobile Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <link href="{{ asset('frontend_assets/css/font.css') }}" rel="stylesheet">


    <link href="{{ asset('frontend_assets/css/flaticon.css') }}" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('frontend_assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/bootstrap-rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/responisve.css') }}" />


    <!--[if lt IE 9]>
    <script src="{{ asset('frontend_assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/respond.min.js') }}"></script>
    <![endif]-->

    @yield('style')

</head>
<body>

@include('layouts.frontend.menuMobile')


<div class="transformPage">

    @include('layouts.frontend.header')

    <div class="headerHeight"></div>

    @include('layouts.frontend.slider')

    @include('sweetalert::alert')

    @yield('content')

    @include('layouts.frontend.footer')

</div>

    @yield('contact_modal')



<script src="{{ asset('frontend_assets/js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/jquery.bxslider.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend_assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/scrollIt.min.js') }}"></script>
<script src="{{ asset('frontend_assets/js/custom.js') }}"></script>
@yield('scripts')
</body>

</html>
