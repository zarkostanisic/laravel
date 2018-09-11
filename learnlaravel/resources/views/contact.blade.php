@extends('layouts.app')

@section('content')

<h1>Contact</h1>

@if(count($people))
	<ul>
	@foreach($people as $person)
		<li>{{$person}}</li>
	@endforeach
	</ul>
@endif

@endsection

<?php /* ?>@section('footer')

<script type="text/javascript">
	alert('Hi visitor!');
</script>

@endsection<?php */?>