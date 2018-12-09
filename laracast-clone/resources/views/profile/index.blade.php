
@extends('layouts.app')

@section('header')
 <header class="header header-inverse" style="background-color: #9ac29d">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <p class="fs-20 opacity-70">PROFILE</p>
            <h3>{{ $user->email }}</h3>
            <h1>COMPLETED LESSONS</h1>
            <strong>{{ $user->getTotalNumberOfCompletedLessons() }}</strong>
          </div>
        </div>

      </div>
    </header>
@stop

@section('content')

      <section class="section bg-gray">
        <div class="container">
          <h1>Series being watched</h1>
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
                  <a class="fw-600 fs-12" href="{{ route('series', $s->slug) }}">Read more <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                </div>
              </div>
            </div>
          </div>
          @empty
            <p class="text-center">No series.</p>
          @endforelse
        </div>
    </section>

    <section class="section bg-gray">
        <div class="container">
          <h1>Subscribe</h1>
          @php 
            $subscription = auth()->user()->subscriptions->first();
          @endphp
          @if ($subscription)
          <h3>
            Your current plan 
            <span class="badge badge-success">{{ $subscription->stripe_plan }}</span>
          </h3>

          <div class="card mb-30">
            <div class="row">
              <div class="col-12 text-center">
                <form action="{{ route('subscribe.change') }}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <select name="plan" id="plan" class="form-control">
                      <option value="monthly">Monthly</option>
                      <option value="yearly">Yearly</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">CHANGE PLAN</button>
                  </div>
                </form>
              </div>
  
            </div>
          </div>
          <section class="section bg-gray">
        <div class="container">
          <h3>Your current card <span class="badge badge-primary">{{ auth()->user()->card_brand }}:{{ auth()->user()->card_last_four }}</span></h3>
          <div class="card mb-30">
            <div class="row">
              <div class="col-12 text-center">
                <vue-update-card email="{{ auth()->user()->email }}"></vue-update-card>
              </div>
  
            </div>
          </div>
        </div>
    </section>
          @else
            <a href="/subscribe">Choose a plan</a>
          @endif
        </div>
    </section>
@stop

@section('scripts')
  <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection