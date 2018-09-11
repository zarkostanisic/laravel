@extends ('layouts.app')

@section ('content')
	<a href="{{ route('posts.index') }}">Back to all posts!!!</a>
	<hr>
	
	<h1> {{ $post->title }} </h1>
	<p> {{ $post->body }} </p>

@endsection