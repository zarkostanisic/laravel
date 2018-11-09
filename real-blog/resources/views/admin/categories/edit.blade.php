@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Edit category {{ $category->name }}</h2>

			<form action="{{ route('categories.update', $category->id) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">EDIT</button>
				</div>
			</form>
		</div>
	</div>
@endsection