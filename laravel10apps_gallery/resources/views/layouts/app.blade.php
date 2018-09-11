<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	@include ('inc.navbar')
	<div class="container">
		@include ('inc.errors')
		@yield ('content')
	</div>
</body>
</html>