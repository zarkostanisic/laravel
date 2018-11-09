@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Edit post {{ $post->title }}</h2>

			<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
				</div>

				<div class="form-group">
					<label for="featured">Featured</label>
					<input type="file" name="featured" id="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea name="body" id="body" class="form-control">{{ old('body', $post->body) }}</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">EDIT</button>
				</div>
			</form>
		</div>
	</div>
@endsection