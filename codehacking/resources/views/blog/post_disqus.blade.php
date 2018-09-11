@extends ('layouts.blog')

@section ('content')
	
<!-- Blog Post -->

<!-- Title -->
<h1>{{ $post->title }}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->image ? $post->image->image : $post->imagePlaceholder() }}" alt="">

<hr>

<!-- Post Content -->

<p>{!! $post->body !!}</p>

<hr>

@include ('includes.disqus')

<hr>

@endsection