@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit discusion {{ $discusion->title }}
                    <a href="{{ route('discusions.index' )}}">Back</a>
                </div>

                <div class="card-body">
                	<form action="{{ route('discusions.update', $discusion->id) }}" method="post">
                		{{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="channel_id">Pick a channel</label>
                            <select name="channel_id" id="channel_id" class="form-control">
                                @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}" {{ $channel->id == old('channel_id', $discusion->channel_id) ? 'selected' : '' }}>{{ $channel->title }}</option>
                                @endforeach
                            </select>
                        </div>

                		<div class="form-group">
                			<label for="title">Tilte</label>
                			<input type="text" name="title" id="title" class="form-control" value="{{ old('title', $discusion->title) }}">
                		</div>

                        <div class="form-group">
                            <label for="title">Body</label>
                            <textarea name="body" id="body" class="form-control">
                                {{ old('body', $discusion->body) }}
                            </textarea>
                        </div>

                		<div class="form-group">
                			<button type="submit" class="btn btn-primary">EDIT</button>
                		</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
