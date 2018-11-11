@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Create a new user</h2>

			<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" value="{{ old('name') }}">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" value="{{ old('name') }}">
				</div>

				<div class="form-group">
					<label for="password_confirmation">Password confirmation</label>
					<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
				</div>

 				<div class="form-group">
					<label for="about">About</label>
					<input type="text" name="about" id="about" class="form-control" value="{{ old('about') }}">
				</div>

				<div class="form-group">
					<label for="facebook">Facebook</label>
					<input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook') }}">
				</div>

				<div class="form-group">
					<label for="youtube">Youtube</label>
					<input type="text" name="youtube" id="youtube" class="form-control" value="{{ old('youtube') }}">
				</div>

				<div class="form-group">
					<label for="avatar">Avatar</label>
					<input type="file" name="avatar" id="avatar" class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">CREATE</button>
				</div>
			</form>
		</div>
	</div>
@endsection