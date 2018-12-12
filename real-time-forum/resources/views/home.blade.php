<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Single Page Forum</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<v-app>
			<app-home></app-home>
		</v-app>
	</div>
	<script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>