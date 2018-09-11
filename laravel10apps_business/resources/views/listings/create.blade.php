@extends ('layouts.app')

@section ('content')
	{!! Form::open(['action' => 'ListingsController@store', 'method' => 'post']) !!}
		{!! Form::text('name') !!}
		{!! Form::text('phone') !!}
        {!! Form::submit('create') !!}
    {!! Form::close() !!}
@endsection