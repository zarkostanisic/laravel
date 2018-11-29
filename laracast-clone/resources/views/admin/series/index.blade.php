
@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #c2b2cd;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Series</h1>

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
      <h4>
      Series
      <a href="{{ route('series.create') }}" class="btn btn-primary">Create new series</a>
    </h4>

    <ul class="list-group">
      @forelse ($series as $s)
      <li class="list-group-item d-flex justify-content-between">
        <p>{{ $s->title }}</p>
        <div class="d-flex">
          <a href="{{ route('series.edit', $s->slug) }}" class="btn btn-primary">EDIT</a>
          <form action="{{ route('series.destroy', $s->slug) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">DELETE</button>
          </form>
        </div>
      </li>
      @empty  
        <p class="text-center">No series.</p>
      @endforelse
    </ul>
    </div>
</div>
</div>
@stop