<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Food Ordering System</title>

        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">
	    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/icomoon/icomoon.css') }}">
	    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/css/slick.cs') }}s"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick-theme.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/magnific-popup.css') }}"/>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>
	    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/style.css') }}">

	</head>
<body>

    @include("layouts.header")

    <div class="container">
        @yield('content')
    </div>

    @include("layouts.footer")

    <script src="{{ asset('frontend/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/script.js') }}"></script>
    @stack('scripts')

</body>

</html>
