@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit channel {{ $channel->title }}
                    <a href="{{ route('channels.index' )}}">Back</a>
                </div>

                <div class="card-body">
                	<form action="{{ route('channels.update', $channel->id) }}" method="post">
                		{{ csrf_field() }}
                        {{ method_field('PATCH') }}
                		<div class="form-group">
                			<label for="title">Tilte</label>
                			<input type="text" name="title" id="title" class="form-control" value="{{ old('title', $channel->title) }}">
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
