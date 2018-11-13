@extends ('admin.layouts.app')

@section ('content')
	@include ('admin.layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Edit tag {{ $tag->tag }}</h2>

			<form action="{{ route('tags.update', $tag->id) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="name">Tag</label>
					<input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag', $tag->tag) }}">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">EDIT</button>
				</div>
			</form>
		</div>
	</div>
@endsection