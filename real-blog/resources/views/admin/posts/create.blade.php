@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Create a new post</h2>

			<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">@lang('labels.title')</label>
					<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
				</div>

				<div class="form-group">
					<label for="category_id">Category</label>
					<select name="category_id" id="category_id" class="form-control">
						<option value="">Choose</option>
						@foreach ($categories as $category)
							<option value="{{ $category->id }}"
								{{ old('category_id') == $category-> id ? 'selected' : ''  }}
								>{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="featured">Featured</label>
					<input type="file" name="featured" id="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="body">Body</label>
					<textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">CREATE</button>
				</div>
			</form>
		</div>
	</div>
@endsection