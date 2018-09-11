@extends ('layouts.app')

@section ('content')
	<h1>Todo {{ $todo->id }}</h1>
	<div class="well">
		<h3>{{ $todo->title }} <a href="/todos/{{ $todo->id }}/edit">edit</a></h3>
		<p>{{ $todo->body }}</p>
		<span class="label label-danger">{{ $todo->due }}</span>
	</div>
@endsection