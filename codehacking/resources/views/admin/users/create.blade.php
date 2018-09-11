@extends ('layouts.admin')

@section ('content')

<h1>Create user</h1>

{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email', 'Email') !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('role_id', 'Role Id') !!}
		{!! Form::select('role_id', $roles, null, ['class' => 'form-control', 'placeholder' => 'Choose role']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('is_active', 'Status') !!}
		{!! Form::select('is_active', [0 => 'Not Active', 1 => 'Active'], 0, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('image_id', 'Image') !!}
		{!! Form::file('image_id', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password') !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password_confirmation', 'Password confirmation') !!}
		{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('CREATE', ['class' => 'btn btn-primary']) !!}
	</div>

	@include ('includes.form_errors')

{!! Form::close() !!}

@endsection