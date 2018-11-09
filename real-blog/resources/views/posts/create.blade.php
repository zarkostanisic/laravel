@extends ('layouts.app')

@section ('content')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Create a new post</h2>

			<form action="{{ route('posts.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control">
				</div>

				<div class="form-group">
					<label for="featured">Featured</label>
					<input type="file" name="featured" id="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea name="body" id="body" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">CREATE</button>
				</div>
			</form>
		</div>
	</div>
@endsection