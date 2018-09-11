@extends ('layouts.app')

@section ('content')
	<a href="{{ route('posts.index' )}}">Back to all posts!!!</a>
	<hr>	

	<h1>Edit post</h1>
	
	{{--<form method="POST" action="{{ route('posts.update', $post->id) }}">
		
		{{ csrf_field() }}

		<input type="hidden" name="_method" value="PUT">

		<div class="form-group">
			<input type="text" name="title" placeholder="Title" value="{{ $post->title }}" class="form-control">
		</div>

		<div class="form-group">
			<textarea name="body" placeholder="Body" class="form-control">{{ $post->body }}</textarea>
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="UPDATE" class="btn btn-default">
		</div>
	</form>--}}

	{!! Form::model($post, ['method' => 'PUT', 'action' => ['PostsController@update', $post->id]]) !!}


		<div class="form-group">
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('body', 'Body') !!}
			{!! Form::textarea('body', null, ['class' => 'form-control', 'cols' => '20', 'rows' => '2']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('UPDATE', ['class' => 'btn btn-info']) !!}
		</div>

	{!! Form::close() !!}

@endsection