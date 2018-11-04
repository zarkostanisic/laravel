<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount }} {{ str_plural('answer', $answersCount) }}</h2>
                </div>
                <hr>
                @include('layouts._messages')

                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This answer is useful." class="vote-up {{ Auth::guest() ? 'off' : ''}}"
                                onClick="
                                event.preventDefault(); 
                                document.getElementById('up-vote-answer-{{ $answer->id }}').submit();
                            ">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>

                            <form action="{{ route('answers.vote', $answer->id) }}" method="post" id="up-vote-answer-{{ $answer->id }}">
                                @csrf
                                <input type="hidden" name="vote" value="1">
                            </form>
                            
                            <strong>{{ $answer->votes_count }}</strong> {{ str_plural('vote', $answer->votes_count) }}
                            <a title="This answer is not useful." class="vote-down {{ Auth::guest() ? 'off' : ''}}"
                                onClick="
                                event.preventDefault(); 
                                document.getElementById('down-vote-answer-{{ $answer->id }}').submit();
                            ">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            <form action="{{ route('answers.vote', $answer->id) }}" method="post" id="down-vote-answer-{{ $answer->id }}">
                                @csrf
                                <input type="hidden" name="vote" value="-1">
                            </form>
                            @can('accept', $answer)
                                <a title="Mark as best answer"
                                    class="{{ $answer->status }} mt-2"
                                    onClick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();"
                                    >
                                    <i class="fas fa-check fa-2x"></i>
                                </a>
                                <form id="accept-answer-{{ $answer->id }}" action="{{ route('answers.accept', $answer->id )}}" method="post">
                                    @csrf
                                </form>
                            @else
                                @if($answer->is_best)
                                     <a title="Mark as best answer"
                                        class="{{ $answer->status }} mt-2"
                                        >
                                        <i class="fas fa-check fa-2x"></i>
                                    </a>
                                @endif
                            @endcan
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        @if (Auth::check())
                                            @if (Auth::user()->can('update', $answer))
                                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            @endif
                                            @can('delete', $answer)
                                            <form class="form-delete" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="post">
                                               {{ method_field('DELETE') }}
                                               @csrf
                                               <button type="submit" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            @endcan
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <span class="text-muted">Answered  {{ $answer->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}">
                                        <div class="media-body mt-2">
                                            <a href="{{ $answer->user->url }}">
                                                {{ $answer->user->name }}
                                            </a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>   
</div>