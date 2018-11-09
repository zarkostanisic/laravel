@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Create a new category</h2>

			<form action="{{ route('categories.store') }}" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">CREATE</button>
				</div>
			</form>
		</div>
	</div>
@endsection