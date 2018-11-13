@extends ('admin.layouts.app')

@section ('content')
	
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">
				Trashed posts
			</h2>

			<div class="table-responsive">
				@if (count($posts) > 0)
					<table class="table">
						<tr>
							<th>Id</th>
							<th>Image</th>
							<th>Title</th>
							<th>Category</th>
							<th>Body</th>
							<th></th>
							<th></th>
						</tr>
						@foreach ($posts as $post)
							<tr>
								<td>{{ $post->id }}</td>
								<td><img src="{{ $post->featured }}" width="40" height="40" title="{{ $post->title }}"></td>
								<td>{{ $post->title }}</td>
								<td>{{ $post->category->name }}</td>
								<td>{{ $post->body }}</td>
								<td>
									<form action="{{ route('posts.remove', $post->id) }}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger">REMOVE</button>
									</form>
								</td>

								<td>
									<form action="{{ route('posts.restore', $post->id) }}" method="post">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-success">RESTORE</button>
									</form>
								</td>

							</tr>
						@endforeach
					</table>
				@else
					<span class="card">No trashed posts.</span>
				@endif
			</div>
		</div>
	</div>
@endsection