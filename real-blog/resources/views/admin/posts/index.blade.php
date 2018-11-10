@extends ('layouts.app')

@section ('content')
	
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">
				Posts
			</h2>
			
			<a href="{{ route('posts.create') }}">
				Create new post
			</a>

			<div class="table-responsive">
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
							<td><img src="{{ $post->featured }}" width="40" height="40"></td>
							<td>{{ $post->title }}</td>
							<td>{{ $post->category->name }}</td>
							<td>{{ $post->body }}</td>
							<td>
								<form action="{{ route('posts.destroy', $post->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger">DELETE</button>
								</form>
							</td>

							<td>
								<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">EDIT</a>
							</td>

						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection