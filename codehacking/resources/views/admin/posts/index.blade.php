@extends ('layouts.admin')

@section ('content')

@if (Session::has('deleted_post') )
  <div class="alert alert-success">
    {{ Session::get('deleted_post') }}
  </div>
@endif

<h1>Posts</h1>

<table class="table">
    <thead>
      <tr>
      	<th>Id</th>
      	<td>Image</td>
      	<th>Title</th>
      	<td>User</td>
      	<td>Category</td>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($posts))
      	@foreach($posts as $post)
	      <tr>
	      	<td>{{ $post->id }}</td>
	      	{{--<td><img src="{{$post->image ? $post->image->image : $post->imagePlaceholder() }}" height="40"></td>--}}
          <td><img src="{{ $post->user->gravatar }}" height="40"></td>
	      	<td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
	      	<td>{{ $post->user ? $post->user->name : '' }}</td>
	      	<td>{{ $post->category ? $post->category->name : '' }}</td>
        	<td>{{ str_limit($post->body, 30) }}</td>
	        <td>{{ $post->created_at->diffForHumans() }}</td>
	        <td>{{ $post->updated_at->diffForHumans() }}</td>
          <td>
           {{--<a href="{{ route('blog.post', $post->id) }}" target="_blank">View post by</a>--}}
            <br>
            <a href="{{ route('blog.post', $post->slug) }}" target="_blank">View post by slug</a>
            <br>
              <a href="{{ route('blog.post_disqus', $post->slug) }}" target="_blank">View post by disqus</a>
            <br>
            <a href="{{ route('admin.comments.show', $post->id) }}" target="_blank">View comments</a>

          </td>
	      </tr>
      	@endforeach
      @endif
	</tbody>
</table>
<dib class="row">
  {{ $posts->render() }}
</div>

@endsection