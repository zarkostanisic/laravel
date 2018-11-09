@extends ('layouts.app')

@section ('content')

	<div class="card">

		<div class="card-body">

			<h2 class="card-title">
				Categories
			</h2>
			
			<a href="{{ route('categories.create') }}">
				Create new category
			</a>

			<div class="table-responsive">
				<table class="table">
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th></th>
						<th></th>
					</tr>
					@foreach ($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td>
								<form action="{{ route('categories.destroy', $category->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger">DELETE</button>
								</form>
							</td>

							<td>
								<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">EDIT</a>
							</td>

						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection