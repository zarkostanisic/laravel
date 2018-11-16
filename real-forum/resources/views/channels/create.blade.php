@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create new channel
                    <a href="{{ route('channels.index' )}}">Back</a>
                </div>

                <div class="card-body">
                	<form action="{{ route('channels.store') }}" method="post">
                		{{ csrf_field() }}
                		<div class="form-group">
                			<label for="title">Tilte</label>
                			<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                		</div>

                		<div class="form-group">
                			<button type="submit" class="btn btn-primary">CREATE</button>
                		</div>
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
