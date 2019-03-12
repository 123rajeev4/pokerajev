<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title') | Pokkerbuddy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://mobulous.app/healthapp/public/assets/css/jquery.timepicker.min.css" type="text/css">
	
    @include('include.head')
</head>
<body>
   <!--start header-->
    @include('include.header')
    <!--end header-->
	<!-- Login Sign Ups * -->

    @yield('content')
    @include('include.footer')

    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
	
    <script src="{{asset('public/assets/bootstrap/bootstrap.min.js')}}"></script>
    
    <!--main custome js-->
    <script src="{{asset('public/assets/js/custome.js')}}"></script>
	
	<script src="{{asset('public/assets/js/jquery.timepicker.js')}}"></script>
    
</body>
</html>
