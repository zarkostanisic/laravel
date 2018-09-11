@extends ('layouts.app')

@section ('content')

	{!! Form::open(['action' => 'PhotosController@store', 'method' => 'post']) !!}
		{!! Form::bsText('title', null, []) !!}
	{!! Form::close() !!}

@endsection