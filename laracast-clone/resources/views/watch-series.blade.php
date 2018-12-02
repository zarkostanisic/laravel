
@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #c2b2cd;background-image: url('{{ asset($series->image) }}'); background-repeat:  no-repeat; background-size: contain;background-position: bottom center;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>{{ $series->title }}</h1>
        <h5>{{ $lesson->title }}</h5>

      </div>
    </div>

  </div>
</header>
@stop

@section('content')

<div class="section">
<div class="container">

  <div class="row gap-y">
    <div class="col-12 col-md-12 text-center">
      <vue-player default_lesson="{{ $lesson }}" next_lesson="{{ $next_lesson ? route('series.watch', [$series->slug, $next_lesson->id]) : '' }}"></vue-player>
    </div>
    <div class="col-md-12">
    @if ($prev_lesson)
      <a href="{{ route('series.watch', [$series->slug, $prev_lesson->id]) }}" class="btn btn-info float:left">PREV LESSON</a>
    @endif

    @if ($next_lesson)
      <a href="{{ route('series.watch', [$series->slug, $next_lesson->id]) }}" class="btn btn-info float-right">NEXT LESSON</a>
    @endif
    </div>
    <div class="col-md-12">
      <ul class="list-group">
        @foreach ($series->getOrderedLessons() as $l)
          <li class="list-group-item d-flex justify-content-between">
            {{ $l->title }}
            @if ($lesson->id == $l->id)
              <p>NOW PLAYING!</p>
            @else
              <a href="{{ route('series.watch', [$series->slug, $l->id]) }}" class="btn btn-primary">PLAY</a>
            @endif
          </li>
        @endforeach
      </ul>
    </div>
</div>
</div>
@stop