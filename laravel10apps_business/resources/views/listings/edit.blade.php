@extends ('layouts.app')

@section ('content')
	{!! Form::model($listing, ['action' => ['ListingsController@update', $listing->id], 'method' => 'put']) !!}
		{!! Form::text('name') !!}
		{!! Form::text('phone') !!}
        {!! Form::submit('edit') !!}
    {!! Form::close() !!}
@endsection