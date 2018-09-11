@extends ('layouts.app')

@section ('content')
<h1>Contact</h1>
{!! Form::open(['url' => '/contact/submit', 'method' => 'post']) !!}
	<div class="form-group">
		{!! Form::label('title', 'Title') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email', 'Email') !!}
		{!! Form::text('email', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('body', 'Body') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Send', ['name' => 'send', 'class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}

@include('inc.errors')

@endsection