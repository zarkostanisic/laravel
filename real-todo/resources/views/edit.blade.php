@extends ('layout')
@section ('content')
<div class="title m-b-md">
    Edit todo
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="{{ route('todos.update', $todo->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="todo">Todo</label>
                <input type="text" name="todo" id="todo" class="form-control" value="{{ old('todo', $todo->todo) }}">
                @if($errors->has('todo'))
                    <p class="alert alert-danger mt-1">{{ $errors->first('todo') }}</p>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection
