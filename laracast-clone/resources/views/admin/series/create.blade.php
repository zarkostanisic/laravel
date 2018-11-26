
@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #c2b2cd;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Create Series</h1>

      </div>
    </div>

  </div>
</header>
@stop

@section('content')

<div class="section">
<div class="container">

  <div class="row gap-y">
    <div class="col-12 col-md-12">

      <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group">
          <input class="form-control form-control-lg" type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
        </div>

        <span>{{ $errors->has('title') ? $errors->first('title') : '' }}</span>

        <div class="form-group">
          <input class="form-control form-control-lg" type="file" name="image" id="image">
        </div>

        <span>{{ $errors->has('image') ? $errors->first('image') : '' }}</span>

        <div class="form-group">
          <textarea class="form-control form-control-lg" name="description" id="description" rows="4" placeholder="Description">{{ old('description') }}</textarea>
        </div>

        <span>{{ $errors->has('description') ? $errors->first('description') : '' }}</span>


        <button type="submit" class="btn btn-lg btn-primary btn-block" type="submit">CREATE</button>
      </form>

    </div>


</div>
</div>
@stop