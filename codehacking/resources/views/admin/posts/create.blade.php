@extends ('layouts.admin')

@section ('content')

	<h1>Create post</h1>

	{!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

		<div class="form-group">
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Category') !!}
			{!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Choose category']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('image_id', 'Image') !!}
			{!! Form::file('image_id', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			@include ('includes.tinyeditor')
		</div>

		<div class="form-group">
			{!! Form::submit('CREATE', ['class' => 'btn btn-primary']) !!}
		</div>

		@include ('includes.form_errors')

	{!! Form::close() !!}


	
@endsection