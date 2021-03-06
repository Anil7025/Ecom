<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontEnd/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/price-range.css') }}" rel="stylesheet">
    <link href="{{asset('frontEnd/css/animate.css') }}" rel="stylesheet">
	<link href="{{asset('frontEnd/css/main.css') }}" rel="stylesheet">
	<link href="{{asset('frontEnd/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('frontEnd') }}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontEnd') }}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontEnd') }}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontEnd') }}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontEnd') }}/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	
	@include('frontEnd.frontEndLayout.header')
	
	@yield('contentSlider')
	

	@yield('contentMain')
		
	
	@include('frontEnd.frontEndLayout.footer')
	  
    <script src="{{asset('frontEnd/js/jquery.js') }}"></script>
	<script src="{{asset('frontEnd/js/bootstrap.min.js') }}"></script>
	<script src="{{asset('frontEnd/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{asset('frontEnd/js/price-range.js') }}"></script>
    <script src="{{asset('frontEnd/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{asset('frontEnd/js/main.js') }}"></script>
</body>
</html>