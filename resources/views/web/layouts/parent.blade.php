<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@lang('web.arab-training-group')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset("web/img/favicon.png")}}" rel="icon">
  <link href="{{asset("web/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset("web/vendor/animate.css/animate.min.css")}}" rel="stylesheet">
  <link href="{{asset("web/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("web/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
  <link href="{{asset("web/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset("web/css/style.css")}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency - v4.9.1
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  @if(app()->getLocale() == 'ar')    
    <link rel="stylesheet" href="{{asset(app()->getLocale().'css/rtl.css')}}" type="text/css">
      {{-- @else  --}}
      {{-- english style --}}
       {{-- <link rel="stylesheet" href="{{asset(app()->getLocale().'css/rl.css')}}" type="text/css"> --}}
      @endif


  @yield('style')

</head>

<body>
@include('web.partials.header')
  @yield('content')
@include('web.partials.footer')



<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset("web/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("web/vendor/swiper/swiper-bundle.min.js")}}"></script>
<script src="{{asset("web/vendor/php-email-form/validate.js")}}"></script>
@yield('script')


<!-- Template Main JS File -->
<script src="{{asset("web/js/main.js")}}"></script>

</body>

</html>

  