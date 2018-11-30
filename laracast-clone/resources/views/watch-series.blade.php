
@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #c2b2cd;background-image: url('{{ asset($series->image) }}'); background-repeat:  no-repeat; background-size: contain;background-position: bottom center;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>{{ $series->title }}</h1>
        <h5>{{$lesson->title }}</h5>

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
      <p>{{ $series->description }}</p>
    </div>
</div>
</div>
@stop