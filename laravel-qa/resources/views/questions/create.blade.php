@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
	                <div class="d-flex align-items-center">
	                    <h2>Ask question</h2>
	                    <div class="ml-auto">
	                        <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
	                    </div>
	                </div>
           		</div>

                <div class="card-body">
                    <h3>Question form</h3>
                    <form action="{{ route('questions.store') }}" method="post">
                    	@csrf
                    	<div class="form-group">
                    		<label for="title">Title</label>
                    		<input type="test" name="title" id="title" class="form-control {{ ($errors->has('title')) ? 'is-invalid' : '' }}" value="{{ old('title') }}">

                    		@if ($errors->has('title'))
                    			<div class="invalid-feedback">
                    				<strong>{{ $errors->first('title') }}</strong>
                    			</div>
                    		@endif
                    	</div>

                    	<div class="form-group">
                    		<label for="body">Body</label>
                    		<textarea rows="10" name="body" id="body" class="form-control {{ ($errors->has('body')) ? 'is-invalid' : '' }}" placeholder="Explain your question">{{ old('body') }}</textarea>

                    		@if ($errors->has('body'))
                    			<div class="invalid-feedback">
                    				<strong>{{ $errors->first('body') }}</strong>
                    			</div>
                    		@endif
                    	</div>

                    	<div class="form-group">
                    		<button type="submit" class="btn btn-outline-primary btn-lg">Ask this question</button>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
