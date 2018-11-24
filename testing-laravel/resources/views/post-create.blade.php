<form action="/posts/store" method="post">
	{{ csrf_field() }}
	<input type="text" name="title" id="title">
	<input type="text" name="body" id="body">
	<button type="submit">Create</button>
</form>