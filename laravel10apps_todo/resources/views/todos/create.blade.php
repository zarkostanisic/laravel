@extends ('layouts.app')

@section ('content')

	{!! Form::open(['action' => 'TodosController@store', 'method' => 'post']) !!}
		{!! Form::bsText('title', null, []) !!}
		{!! Form::bsTextArea('body', null, []) !!}
		{!! Form::bsSubmit('create', []) !!}
	{!! Form::close() !!}

@endsection