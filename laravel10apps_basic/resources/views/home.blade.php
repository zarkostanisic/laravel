@extends ('layouts.app')

@section ('content')
	@include('inc.errors')
	
	<h1>Home</h1>
	<p>Lorem ipsum</p>

@endsection

@section ('sidebar')
	@parent
	<p>This is <b>Home</b> sidebar</p>
@endsection