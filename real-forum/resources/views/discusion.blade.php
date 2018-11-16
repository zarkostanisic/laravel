@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $discusion->title }}

                    @if (Auth::check())
                        @if ($discusion->is_watched_by_auth_user())
                            <form action="{{ route('discusion.unwatch', $discusion->id) }}" method="post" class="float-right">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger">UNWATCH</button>
                            </form>
                        @else
                            <form action="{{ route('discusion.watch', $discusion->id) }}" method="post" class="float-right">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">WATCH</button>
                            </form>
                        @endif
                    @endif
                </div>

                <div class="card-body">
                    <img src="{{ $discusion->user->avatar }}" width="40" height="40" style="border-radius: 50%;">
                        <span>{{ $discusion->user->name }} {{ $discusion->created_at->diffForHumans() }}</span>
                        <hr>
                    <p>{!! $discusion->body !!}</p>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    {{ $discusion->replies->count() }} {{ str_plural('reply', $discusion->replies->count()) }}
                </div>

                <div class="card-body">
                    <ul class="list-group mb-3">
                        @foreach ($discusion->replies as $reply)
                            <li class="list-group-item">
                                <img src="{{ $reply->user->avatar }}" width="40" height="40" style="border-radius: 50%;">
                                <span>{{ $reply->user->name }} {{ $reply->created_at->diffForHumans() }}</span>
                                <hr>
                                <p>{!! str_limit($reply->body, 200) !!}</p>
                                <hr>
                                <p>
                                    <span class="badge">
                                        {{ $reply->likes->count() }} {{ str_plural('like', $reply->likes->count()) }}
                                    </span>

                                    @if (Auth::check())
                                        @if ($reply->is_liked_by_auth_user())
                                            <form action="{{ route('reply.unlike', $reply->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">UNLIKE</button>
                                            </form>
                                        @else
                                            <form action="{{ route('reply.like', $reply->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-success">LIKE</button>
                                            </form>
                                        @endif
                                    @endif
                                </p>
                            </li>
                        @endforeach   
                    </ul>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">
                    Create new reply
                </div>

                <div class="card-body">
                    <form action="{{ route('discusion.reply', $discusion->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label id="body">Body</label>
                            <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                         </div>

                         <div class="form-group">
                             <button type="submit" class="btn btn-primary">Reply</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
