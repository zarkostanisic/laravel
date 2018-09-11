@extends ('layouts.admin')

@section ('content')

<h1>Comment {{ $id }} replies</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <td>Author</td>
        <td>Comment id</td>
        <td>Body</td>
        <td>Status</td>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if (count($replies))
      @foreach ($replies as $reply)
      <tr>
        <td>{{ $reply->id }}</td>
        <td>{{ $reply->author }}</td>
        <td>{{ $reply->comment_id }}</td>
        <td>{{ $reply->body }}</td>
        <td>{{ $reply->is_active == 1 ? 'Active' : 'Is not active' }}</td>
        <td>{{ $reply->created_at }}</td>
        <td>{{ $reply->updated_at }}</td>
        <td>
          {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
            {!! Form::hidden('is_active', $reply->is_active == 1 ? 0 : 1) !!}
            <div class="form-group">
              {!! Form::submit($reply->is_active == 1 ? 'BLOCK' : 'UNBLOCK', ['class' => $reply->is_active == 1 ? 'btn btn-primary' : 'btn btn-default'] ) !!}
            </div>
          {!! Form::close() !!}

          {!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
            <div class="form-group">
              {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
            </div>
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    @else
      <tr><td colspan="9" class="text-center">No replies</td></tr>
    @endif
  </tbody>
</table>

@endsection