@extends ('layouts.app')

@section ('content')
	<a href="{{ route('posts.index' )}}">Back to all posts!!!</a>
	<hr>	

	<h1>Create post</h1>

	{{--<form method="POST" action="{{ route('posts.index') }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" name="title" placeholder="Title" class="form-control">
		</div>

		<div class="form-group">
			<label for="body">Body</label>
			<textarea name="body" placeholder="Body" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="CREATE" class="btn btn-default">
		</div>
	</form>--}}

	{!! Form::open(['method' => 'POST', 'action' => 'PostsController@store','files' => 'true']) !!}

		<div class="form-group">
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('body', 'Body') !!}
			{!! Form::textarea('body', null, ['class' => 'form-control', 'cols' => '20', 'rows' => '2']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('image', 'Image') !!}
			{!! Form::file('image', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('CREATE', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

@endsection