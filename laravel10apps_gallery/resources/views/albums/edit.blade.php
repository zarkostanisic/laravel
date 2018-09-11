@extends ('layouts.app')

@section ('content')

	{!! Form::model($album, ['action' => ['AlbumsController@update', $album->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
		{!! Form::bsText('title', null, []) !!}
		{!! Form::bsTextarea('description', null, []) !!}
		{!! Form::bsFile('cover', null, []) !!}
		{!! Form::bsSubmit('edit', ['btn-default']) !!}
	{!! Form::close() !!}

@endsection