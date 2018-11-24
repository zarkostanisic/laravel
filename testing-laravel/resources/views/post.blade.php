<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>{{ $post->title }}</h1>
	<p>{{ $post->body }}</p>
	<p>{{ $post->createdAt() }}</p>
</body>
</html>