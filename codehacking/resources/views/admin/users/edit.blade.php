@extends ('layouts.admin')

@section ('content')

<h1>Edit user {{ $user->id }}</h1>

<div class="col-sm-3">
	<img src="{{ $user->image ? $user->image->image : 'http://placehold.it/400x400' }}" class="img-responsive img-rounded">
</div>

<div class="col-sm-9">

	{!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
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
			{!! Form::select('is_active', [0 => 'Not Active', 1 => 'Active'], null, ['class' => 'form-control']) !!}
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
			{!! Form::submit('EDIT', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

	{!!Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

		<div class="form-group">
			{!! Form::submit('DELETE', ['class' => 'btn btn-danger'])!!}
		</div>
	{!! Form::close() !!}

	@include ('includes.form_errors')
</div>



@endsection