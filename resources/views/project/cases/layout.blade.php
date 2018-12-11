<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('metas')

	<title>@yield('title', '案例库')</title>

	@yield('stylesheets')
	@yield('inportant_scripts')
</head>
<body>
	@yield('content')

	<!-- <script src="/vendor/jquery/jquery/jquery.1.9.0.js"></script> -->
	<!-- <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script> -->
	<!-- <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script> -->
	<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
	<script src="/vendor/jquery/handlebars/handlebars.1.0.0.js"></script>
	<script src="/vendor/jquery/waterfall/waterfall.0.1.73.js"></script>
	@yield('scripts')
</body>
</html>
