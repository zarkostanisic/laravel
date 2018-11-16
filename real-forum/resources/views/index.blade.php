@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Latest discusions</div>

                <div class="card-body">
                    <ul class="list-group mb-3">
                        @foreach ($discusions as $discusion)
                            <li class="list-group-item">
                                <img src="{{ $discusion->user->avatar }}" width="40" height="40" style="border-radius: 50%;">
                                <span>{{ $discusion->user->name }} {{ $discusion->created_at->diffForHumans() }}</span>
                                <hr>
                                <a href="{{ route('discusion', $discusion->slug)}}">{{ $discusion->title }}</a>
                                <p>{!! str_limit($discusion->body, 200) !!}</p>

                                <strong>{{ $discusion->replies->count() }} {{ str_plural('reply', $discusion->replies->count()) }}</strong>
                            </li>
                        @endforeach   
                    </ul>

                    {{ $discusions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
