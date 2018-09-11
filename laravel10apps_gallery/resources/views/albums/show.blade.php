@extends ('layouts.app')

@section ('content')
	<h1>Album {{ $album->id }} <a href="{{ route('albums.edit', $album->id) }}">Edit</a></h1>
	<p>{{ $album->title }}</p>
	<p>{{ $album->description }}</p>
	<img width="100" src="{{ $album->cover }}"></p>

	<h3>Photos</h3>

	@if (count($album->photos) > 0)
		<ul>
		@foreach ($album->photos as $photo)
			<li>
				<a href="{{ route('photos.show', $photo->id) }}">
					<img width="100" src="{{ $photo->photo }}">
					{{ $photo->title }}
				</a>
				{!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'delete', 'onsubmit' => 'return confirm("Are you sure?");']) !!}
					{!! Form::bsSubmit('delete', ['btn-default']) !!}
				{!! Form::close() !!}
			</li>
		@endforeach
		</ul>
	@endif

	<h3>Upload photos</h3>

	{!! Form::open(['action' => 'PhotosController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
		{!! Form::bsText('title', null, []) !!}
		{!! Form::bsTextarea('description', null, []) !!}
		{!! Form::bsFile('photo', null, []) !!}
		{!! Form::bsHidden('album_id', $album->id, []) !!}
		{!! Form::bsSubmit('upload', ['btn-default']) !!}
	{!! Form::close() !!}
@endsection