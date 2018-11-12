@extends ('layouts.app')

@section ('content')
	@include ('layouts.errors')
	<div class="card">

		<div class="card-body">

			<h2 class="card-title">Edit settings</h2>

			<form action="{{ route('settings.update', $settings->id) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
					<label for="site_name">Site name</label>
					<input type="text" name="site_name" id="site_name" class="form-control" value="{{ old('site_name', $settings->site_name) }}">
				</div>

				<div class="form-group">
					<label for="contact_number">Contact number</label>
					<input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $settings->contact_number) }}">
				</div>

				<div class="form-group">
					<label for="contact_email">Contact email</label>
					<input type="text" name="contact_email" id="contact_email" class="form-control" value="{{ old('contact_email', $settings->contact_email) }}">
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" id="address" class="form-control" value="{{ old('address', $settings->address) }}">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">EDIT</button>
				</div>
			</form>
		</div>
	</div>
@endsection