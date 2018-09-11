@extends ('layouts.app')

@section ('content')
	@if (count($albums) > 0)
		<ul>
		@foreach ($albums as $album)
			<li>
				<img width="40" src="{{ $album->cover }}">
				<a href="{{ route('albums.show', $album->id )}}">{{ $album->title }}</a></li>
		@endforeach
		</ul>
	@endif
@endsection