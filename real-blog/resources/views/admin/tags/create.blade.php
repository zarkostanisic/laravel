@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Create a new tag</h2>

			<form action="{{ route('tags.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Tag</label>
					<input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag') }}">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">CREATE</button>
				</div>
			</form>
		</div>
	</div>
@endsection