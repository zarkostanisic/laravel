@extends ('layouts.admin')

@section ('content')

<h1>Edit post {{ $post->id }}</h1>

<div class="col-sm-3">
	<img src="{{$post->image ? $post->image->image : $post->imagePlaceholder() }}" class="img-responsive img-rounded">
</div>

<div class="col-sm-9">


	{!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id] , 'files' => true]) !!}
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
			{!! Form::submit('EDIT', ['class' => 'btn btn-primary']) !!}
		</div>

		@include ('includes.form_errors')
	{!! Form::close() !!}

	{!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
		<div class="form-group">
			{!! Form::submit('DELETE', ['class' => 'btn btn-danger'])!!}
		</div>
	{!! Form::close() !!}
</div>
	
@endsection