@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header text-center">Users</div>

                <div class="card-body text-center">
                   <h1><a href="{{ route('users.index') }}" class="text-white">{{ $users_count }}</a></h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header text-center">Categories</div>

                <div class="card-body text-center">
                   <h1><a href="{{ route('categories.index') }}" class="text-white">{{ $categories_count }}</a></h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header text-center">Tags</div>

                <div class="card-body text-center">
                   <h1><a href="{{ route('tags.index') }}" class="text-white">{{ $tags_count }}</a></h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header text-center">Posts</div>

                <div class="card-body text-center">
                   <h1><a href="{{ route('posts.index') }}" class="text-white">{{ $posts_count }}</a></h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
