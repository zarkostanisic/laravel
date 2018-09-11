@extends ('layouts.app')

@section ('content')

	{!! Form::open(['action' => 'AlbumsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
		{!! Form::bsText('title', null, []) !!}
		{!! Form::bsTextarea('description', null, []) !!}
		{!! Form::bsFile('cover', null, []) !!}
		{!! Form::bsSubmit('create', ['btn-default']) !!}
	{!! Form::close() !!}

@endsection