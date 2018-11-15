@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $channel->title }}
                </div>

                <div class="card-body">
                	<ul class="list-group mb-3">
                        @foreach ($discusions as $discusion)
                            <li class="list-group-item">
                                <a href="{{ route('discusions.show', $discusion->slug)}}">{{ $discusion->title }}</a>
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
