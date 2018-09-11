@extends ('layouts.admin')

@section ('content')

<h1>Comments</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <td>Author</td>
        <td>Post</td>
        <td>Body</td>
        <td>Status</td>
        <th>Created</th>
        <th>Updated</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @if (count($comments))
      @foreach ($comments as $comment)
      <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->author }}</td>
        <td>{{ $comment->post->title }}</td>
        <td>{{ $comment->body }}</td>
        <td>{{ $comment->is_active == 1 ? 'Active' : 'Is not active' }}</td>
        <td>{{ $comment->created_at }}</td>
        <td>{{ $comment->updated_at }}</td>
        <td>
          <a href="{{ route('blog.post', $comment->post->id)}}" target="_blank">View post</a>
          <br>
          <a href="{{ route('admin.comment.replies.show', $comment->id)}}" target="_blank">View replies</a>
          {!! Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
            {!! Form::hidden('is_active', $comment->is_active == 1 ? 0 : 1) !!}
            <div class="form-group">
              {!! Form::submit($comment->is_active == 1 ? 'BLOCK' : 'UNBLOCK', ['class' => $comment->is_active == 1 ? 'btn btn-primary' : 'btn btn-default'] ) !!}
            </div>
          {!! Form::close() !!}

          {!! Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
            <div class="form-group">
              {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
            </div>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    @else
      <tr><td colspan="9" class="text-center">No comments</td></tr>
    @endif
  </tbody>
</table>

@endsection