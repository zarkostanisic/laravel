<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@foreach ($posts as $post)
		<h1>{{ $post->title }}</h1>
		<p>{{ str_limit($post->body) }}</p>
		<p>{{$post->createdAt() }}</p>
		<a href="/post/{{ $post->id }}">View Post Details</a>
	@endforeach
</body>
</html>