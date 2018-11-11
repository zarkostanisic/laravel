@extends ('layouts.app')

@section ('content')

	<div class="card">

		<div class="card-body">

			<h2 class="card-title">
				Tags
			</h2>

			<ul class="list-inline pb-1">
				<li class="list-inline-item">
					<a href="{{ route('tags.create') }}">
						Create new tag
					</a>
				</li>
			</ul>

			<div class="table-responsive">
				@if (count($tags) > 0)
					<table class="table">
						<tr>
							<th>Id</th>
							<th>Tag</th>
							<th></th>
							<th></th>
						</tr>
						@foreach ($tags as $tag)
							<tr>
								<td>{{ $tag->id }}</td>
								<td>{{ $tag->tag }}</td>
								<td>
									<form action="{{ route('tags.destroy', $tag->id) }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger">DELETE</button>
									</form>
								</td>

								<td>
									<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">EDIT</a>
								</td>

							</tr>
						@endforeach
					</table>
				@else
					<span class="card">No added tags.</span>
				@endif
			</div>
		</div>
	</div>
@endsection