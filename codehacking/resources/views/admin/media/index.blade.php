@extends ('layouts.admin')

@section ('content')

<h1>Media</h1>

{!! Form::open(['method' => 'POST', 'action' => 'AdminMediaController@destroyBulk', 'id' => 'delete_bulk']) !!}
{!! Form::submit('DELETE BULK', ['class' => 'btn btn-primary', 'form' => 'delete_bulk']) !!}
<table class="table">
    <thead>
      <tr>
        <td>{!! Form::checkbox('selectAll', null, null, ['id' => 'selectAll']) !!}</td>
        <th>Id</th>
        <td>Image</td>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if (count($images))
        @foreach($images as $image)
        <tr>
          <th>{!! Form::checkbox('checkBoxArray[]', $image->id, null, ['class' => 'checkBoxArray']); !!}</th>
          <td>{{ $image->id }}</td>
          <td><img src="{{ $image->image }}" height="40"></td>
          <td>{{ $image->created_at->diffForHumans() }}</td>
          <td>{{ $image->updated_at->diffForHumans() }}</td>
          <td>
            {{--{!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediaController@destroy', $image->id], 'id' => 'delete']) !!}

              <div class="form-group">
                {!! Form::submit('DELETE', ['class' => 'btn btn-danger', 'form' => 'delete'])!!}
              </div>

            {!! Form::close() !!}--}}
          </td>
        </tr>
        @endforeach
      @endif
  </tbody>
</table>
{!! Form::close() !!}

@endsection

@section ('footer')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#selectAll').change(function(){
        if($(this).prop('checked')) $('.checkBoxArray').prop('checked', true);
        else $('.checkBoxArray').prop('checked', false);
      });
    });
  </script>
@endsection