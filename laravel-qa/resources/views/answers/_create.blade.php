<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your answer</h3>
                </div>
                <hr>
               <form action="{{ route('questions.answers.store', $question->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" rows="10">{{ old('body') }}</textarea>

                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>
                                    {{ $errors->first('body') }}
                                </strong>
                            </div>
                        @endif
                   </div>

                   <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg">Submit</button>
                   </div>
               </form>
            </div>
        </div>
    </div>   
</div>