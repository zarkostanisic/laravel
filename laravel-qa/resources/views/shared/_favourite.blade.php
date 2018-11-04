<a title="Add question as favourite" 
    class="favourite {{ Auth::guest() ? 'off' : ($model->is_favourited ? 'favourited' : '') }} mt-2" 
    onClick="
        event.preventDefault(); 
        document.getElementById('favourite-question-{{ $model->id }}').submit();">
    <i class="fas fa-star fa-2x"></i>
    <span class="favourites-count">{{ $model->favourites_count }}</span>
</a>
<form action="{{ route('questions.favourite', $model->id) }}" method="post" id="favourite-question-{{ $model->id }}">
    @csrf
    @if ($model->is_favourited)
    {{ method_field('DELETE') }}
    @endif
</form>