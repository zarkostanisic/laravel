@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-body">
                    <div class="card-title">
    	                <div class="d-flex align-items-center">
    	                    <h1>{{ $question->title }}</h1>
    	                    <div class="ml-auto">
    	                        <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
    	                    </div>
    	                </div>
               		</div>

                    <hr>

                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This question is useful." class="vote-up {{ Auth::guest() ? 'off' : ''}}"
                                onClick="
                                    event.preventDefault(); 
                                    document.getElementById('up-vote-question-{{ $question->id }}').submit();
                                ">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>

                            <form action="{{ route('questions.vote', $question->id) }}" method="post" id="up-vote-question-{{ $question->id }}">
                                @csrf
                                <input type="hidden" name="vote" value="1">
                            </form>
                            
                            <span class="votes-count">{{ $question->votes_count }}</span>
                            <a title="This question is not useful." 
                                class="vote-down {{ Auth::guest() ? 'off' : ''}}"
                                onClick="
                                    event.preventDefault(); 
                                    document.getElementById('down-vote-question-{{ $question->id }}').submit();
                                ">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            <form action="{{ route('questions.vote', $question->id) }}" method="post" id="down-vote-question-{{ $question->id }}">
                                @csrf
                                <input type="hidden" name="vote" value="-1">
                            </form>
                            
                            <a title="Add question as favourite" 
                                class="favourite {{ Auth::guest() ? 'off' : ($question->is_favourited ? 'favourited' : '') }} mt-2" 
                                onClick="
                                    event.preventDefault(); 
                                    document.getElementById('favourite-question-{{ $question->id }}').submit();">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favourites-count">{{ $question->favourites_count }}</span>
                            </a>
                            <form action="{{ route('questions.favourite', $question->id) }}" method="post" id="favourite-question-{{ $question->id }}">
                                @csrf
                                @if ($question->is_favourited)
                                {{ method_field('DELETE') }}
                                @endif
                            </form>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}

                            <div class="float-right">
                                <span class="text-muted">asked  {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}">
                                        <div class="media-body mt-2">
                                            <a href="{{ $question->user->url }}">
                                                {{ $question->user->name }}
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include ('answers._index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count
    ])
    @if(Auth::check())
        @include ('answers._create')
    @endif
</div>
@endsection
