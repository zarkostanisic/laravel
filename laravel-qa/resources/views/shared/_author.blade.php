<span class="text-muted">{{ $label }}  {{ $model->created_date }}</span>
<div class="media mt-2">
    <a href="{{ $model->user->url }}" class="pr-2">
        <img src="{{ $model->user->avatar }}">
        <div class="media-body mt-2">
            <a href="{{ $model->user->url }}">
                {{ $model->user->name }}
            </a>
        </div>
    </a>
</div>