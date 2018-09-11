@extends ('layouts.app')

@section ('content')
	<h1>Photo {{ $photo->id }}</h1>
	<p>{{ $photo->title }}</p>
	<p>{{ $photo->description }}</p>
	<img width="100" src="{{ $photo->photo }}"></p>
@endsection