<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('metas')

	<title>@yield('title', '案例库')</title>

	<link rel="stylesheet" href="/vendor/jquery/bootstrap-4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/vendor/jquery/chosen/chosen.min.css">

	@yield('stylesheets')
	@yield('inportant_scripts')
</head>
<body>
	@yield('content')

	<!-- <script src="/vendor/jquery/jquery/jquery.1.9.0.js"></script> -->
	<script src="/vendor/jquery/jquery-3.2.1/jquery.min.js"></script>
	<script src="/vendor/jquery/popper-1.12.9/umd/popper.min.js"></script>
	<script src="/vendor/jquery/bootstrap-4.0.0/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery/chosen/chosen.jquery.min.js"></script>
	<script src="/vendor/jquery/handlebars/handlebars.1.0.0.js"></script>
	<script src="/vendor/jquery/waterfall/waterfall.0.1.73.js"></script>

	@yield('scripts')
</body>
</html>
