@extends('layouts.app')

@extends ('layouts.app')

@section ('header')
<header class="header header-inverse bg-fixed" style="background-image: url({{ asset('img/bg-laptop.jpg') }})" data-overlay="8">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Login</h1>

      </div>
    </div>

  </div>
</header>
@endsection

@section ('content')


<section class="section" style="background-image: url({{ asset('img/bg-gift.jpg') }})" data-overlay="5">
<div class="container">

  <form method="POST" action="{{ route('login') }}"  class="section-dialog section-dialog-sm bg-gray py-40">
    @csrf

    <div class="form-group input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
    </div>

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <div class="form-group  input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-key"></i></span>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
    </div>

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif

    <div class="form-group input-group input-group-lg">
        <label class="form-check-label" for="remember">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            {{ __('Remember Me') }}
        </label>
    </div>

    <div class="row">
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

        </div>


         <div class="col-md-6">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Password') }}
                </a>
            @endif
        </div>
    </div>
</form>

</div>
</section>
@endsection
