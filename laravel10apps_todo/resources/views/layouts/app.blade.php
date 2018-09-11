<!DOCTYPE html>
<html>
<head>
	<title>Todos</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>

	@include('inc.navbar')

	<div class="container">
		@yield ('content')
		@include('inc.errors')
	</div>

	<footer id="footer" class="text-center">
		Footer
	</footer>
</body>
</html>