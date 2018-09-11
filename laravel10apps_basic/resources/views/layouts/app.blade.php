<!DOCTYPE html>
<html>
<head>
	<title>Laravel 10 apps</title>

	<link rel="stylesheet" type="text/css" href="/css/app.css?v=1">
</head>
<body>
	@include ('inc.navbar')

	@if (Request::is('/'))
		@include ('inc.showcase')
	@endif
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				@yield ('content')
			</div>
			<div class="col-md-4">
				@include ('inc.sidebar')
			</div>
		</div>
	</div>

	<footer id="footer" class="text-center">
		<p>Lorem ipsum</p>
	</footer>
</body>
</html>