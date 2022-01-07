<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta
	name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="icon" href="img/favicon.png" type="image/png" />
	<title>@yield('head')</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.carousel.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/nice-select/css/nice-select.css') }}" />
	<!-- main css -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
	 @stack('extra-css')
</head>

@yield('content')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/template/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/template/popper.js') }}"></script>
<script src="{{ asset('js/template/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/template/nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/template/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/template/owl-carousel-thumb.min.js') }}"></script>
<script src="{{ asset('js/template/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/template/mail-script.js') }}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('js/template/gmaps.min.js') }}"></script>
<script src="{{ asset('js/template/theme.js') }}"></script>
 @stack('extra-js')
</body>
</html>
