@extends ('layouts.app')

@section ('content')
	<h1>Listing {{ $listing->id }}</h1>
	<div>
		{{ $listing->name }}
		<hr>
		{{ $listing->phone }}
	</div>
@endsection