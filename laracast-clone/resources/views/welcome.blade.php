
@extends('layouts.app')

@section('header')
 <header class="header header-inverse" style="background-color: #9ac29d">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <p class="fs-20 opacity-70">LESSONS</p>
            <h1>Featured Screencasts</h1>

          </div>
        </div>

      </div>
    </header>
@stop

@section('content')

      <section class="section bg-gray">
        <div class="container">
          @forelse ($series as $s)
          <div class="card mb-30">
            <div class="row">
              <div class="col-12 col-md-4 align-self-center">
                <a href="blog-single.html"><img src="{{ asset($s->image) }}" alt="..."></a>
              </div>
              <div class="col-12 col-md-8">
                <div class="card-block">
                  <h4 class="card-title">{{ $s->title }}</h4>
                  <p class="card-text">{{ $s->description }}</p>
                  <a class="fw-600 fs-12" href="blog-single.html">Read more <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                </div>
              </div>
            </div>
          </div>
          @empty
            <p class="text-center">No series.</p>
          @endforelse
        </div>
    </section>
@stop