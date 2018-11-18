@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    EDIT CATEGORY {{ $category->name }}
                    <a href="{{ route('categories.index') }}">BACK</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">EDIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
