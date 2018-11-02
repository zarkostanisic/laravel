@extends ('layouts.app')

@section ('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3><strong>Edit answer for question: </strong> {{ $question->title }}</h3>
                    </div>
                    <hr>
                   <form action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" method="post">
                        @csrf
                        @method ('PATCH')
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" rows="10">{{ old('body', $answer->body) }}</textarea>

                            @if ($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $errors->first('body') }}
                                    </strong>
                                </div>
                            @endif
                       </div>

                       <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Update</button>
                       </div>
                   </form>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection