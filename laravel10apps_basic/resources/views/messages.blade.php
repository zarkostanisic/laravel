@extends ('layouts.app')

@section ('content')
	<h1>Messages</h1>
	@if (count($messages) > 0)
		@foreach($messages as $message)
			<ul class="list-group">
				<li class="list-group-item">Id: {{ $message->id }}</li>
				<li class="list-group-item">Title: {{ $message->title }}</li>
				<li class="list-group-item">Email: {{ $message->email }}</li>
				<li class="list-group-item">Body: {{ $message->body }}</li>
				<li class="list-group-item">Created at: {{ $message->created_at }}</li>
				<li class="list-group-item">Updated at: {{ $message->updated_at }}</li>
			</ul>
			<hr>
		@endforeach
	@endif
@endsection