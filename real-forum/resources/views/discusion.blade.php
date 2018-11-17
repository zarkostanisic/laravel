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
                        <span>
                            {{ $discusion->user->name }}
                            <strong>({{ $discusion->user->points }} points)</strong>
                            {{ $discusion->created_at->diffForHumans() }}
                        </span>
                        <hr>
                    <p>@markdown ($discusion->body)</p>
                </div>

                @if ($best_answer)
                    <div class="card">
                        <div class="card-header text-center">
                            Best answer
                            @if ($discusion->user_id == Auth::user()->id)
                                <form action="{{ route('reply.best_answer_revise', $best_answer->id) }}" method="post" class="float-right">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">Revise the best answer</button>
                                </form>
                            @endif
                        </div>

                        <div class="card-body text-center">
                            <img src="{{ $discusion->user->avatar }}" width="40" height="40" style="border-radius: 50%;">
                                <span>
                                    {{ $best_answer->user->name }} 
                                    <strong>({{ $best_answer->user->points }} points)</strong>
                                    {{ $best_answer->created_at->diffForHumans() }}</span>
                                <hr>
                            <p>{!! $best_answer->body !!}</p>
                        </div>
                    </div>
                @endif
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
                                @if (!$best_answer && $discusion->user_id == Auth::user()->id)
                                    <form action="{{ route('reply.best_answer', $reply->id) }}" method="post" class="float-right">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">Mark as the best answer</button>
                                    </form>
                                @endif
                                <hr>
                                <p>{!! $reply->body !!}</p>
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

            @if (!$discusion->hasBestAnswer())
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
            @endif
        </div>
    </div>
</div>
@endsection
