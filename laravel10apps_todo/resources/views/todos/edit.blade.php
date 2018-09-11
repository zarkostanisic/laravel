@extends ('layouts.app')

@section ('content')

	{!! Form::model($todo, ['action' => ['TodosController@update',  $todo->id], 'method' => 'put']) !!}
		{!! Form::bsText('title', null, []) !!}
		{!! Form::bsTextArea('body', null, []) !!}
		{!! Form::bsSubmit('edit', []) !!}
	{!! Form::close() !!}

	{!! Form::open(['action' => ['TodosController@destroy', $todo->id], 'method' => 'delete']) !!}
		{!! Form::bsSubmit('delete', []) !!}
	{!! Form::close() !!}


@endsection