
@extends('layouts.app')

@section('header')
 <header class="header header-inverse" style="background-color: #9ac29d">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1>Subscribe</h1>
          </div>
        </div>

      </div>
    </header>
@stop

@section('content')

      <section class="section bg-gray">
        <div class="container">
          <vue-stripe></vue-stripe>
        </div>
    </section>
@stop

@section('scripts')
  <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection