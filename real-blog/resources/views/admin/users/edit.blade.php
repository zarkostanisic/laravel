@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Edit user {{ $user->id }}</h2>

			<form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
				</div>

				<div class="form-group">
					<label for="password_confirmation">Password confirmation</label>
					<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
				</div>

 				<div class="form-group">
					<label for="about">About</label>
					<textarea name="about" id="about" class="form-control">
						{{ old('about', $user->profile->about) }}
					</textarea>
				</div>

				<div class="form-group">
					<label for="facebook">Facebook</label>
					<input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $user->profile->facebook) }}">
				</div>

				<div class="form-group">
					<label for="youtube">Youtube</label>
					<input type="text" name="youtube" id="youtube" class="form-control" value="{{ old('youtube', $user->profile->youtube) }}">
				</div>

				<div class="form-group">
					<label for="avatar">Avatar</label>
					<input type="file" name="avatar" id="avatar" class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">EDIT</button>
				</div>
			</form>
		</div>
	</div>
@endsection