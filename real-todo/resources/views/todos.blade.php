@extends ('layout')
@section ('content')
<div class="title m-b-md">
    Todos
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="{{ route('todos.create') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="todo">Todo</label>
                <input type="text" name="todo" id="todo" class="form-control" value="{{ old('todo') }}">
                @if($errors->has('todo'))
                    <p class="alert alert-danger mt-1">{{ $errors->first('todo') }}</p>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>

<ul>
    @foreach ($todos as $todo)
    <li>
        {{ $todo->todo }}
        <form action="{{ route('todos.delete', $todo->id) }}" method="post" onSubmit="return confirm('Are you sure')">
            @csrf
            {{ method_field('DELETE') }}

            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">Edit</a>

            @if ($todo->completed == 0)
                <a href="{{ route('todos.complete', $todo->id) }}" class="btn btn-success">Mark as complete </a>
            @else
                <span>Completted!</span>
            @endif
        </form>
    </li>
    @endforeach
</ul>
@endsection
