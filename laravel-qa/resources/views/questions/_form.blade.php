@csrf
<div class="form-group">
	<label for="title">Title</label>
	<input type="test" name="title" id="title" class="form-control {{ ($errors->has('title')) ? 'is-invalid' : '' }}" value="{{ old('title', $question->title) }}">

	@if ($errors->has('title'))
		<div class="invalid-feedback">
			<strong>{{ $errors->first('title') }}</strong>
		</div>
	@endif
</div>

<div class="form-group">
	<label for="body">Body</label>
	<textarea rows="10" name="body" id="body" class="form-control {{ ($errors->has('body')) ? 'is-invalid' : '' }}" placeholder="Explain your question">{{ old('body', $question->body) }}</textarea>

	@if ($errors->has('body'))
		<div class="invalid-feedback">
			<strong>{{ $errors->first('body') }}</strong>
		</div>
	@endif
</div>

<div class="form-group">
	<button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>