@extends ('layouts.app')

@section ('content')
	<a href="{{ route('posts.create') }}">Create a new post!!!</a>
	<hr>

	<ul>
	@foreach ($posts as $post)
		<li>
			<img src="{{ $post->path }}" height="50">
			<a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
			<a href="{{ route('posts.edit', $post->id) }}">EDIT</a>

			{{--<form method="POST" action="{{ route('posts.destroy', $post->id) }}">

				{{ csrf_field() }}

				<input type="hidden" name="_method" value="DELETE">
				<input type="submit" name="submit" value="DELETE">
			</form>--}}

			{!! Form::open(['method' => 'DELETE', 'action' => ['PostsController@destroy', $post->id]]) !!}
				<div class="form-group">
					{!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
				</div>
			{!! Form::close() !!}
		</li>
	@endforeach
	</ul>

@endsection