@extends ('layouts.app')

@section ('header')
<header class="header header-inverse bg-fixed" style="background-image: url({{ asset('img/bg-laptop.jpg') }})" data-overlay="8">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Reset your password</h1>

      </div>
    </div>

  </div>
</header>
@endsection

@section ('content')


<section class="section" style="background-image: url({{ asset('img/bg-gift.jpg') }})" data-overlay="5">
<div class="container">

<form method="POST" action="{{ route('password.update') }}" class="section-dialog section-dialog-sm bg-gray py-40">
@csrf

<input type="hidden" name="token" value="{{ $token }}">

<div class="form-group input-group input-group-lg">
    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email">
</div>
 @if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif

<div class="form-group input-group input-group-lg">
    <span class="input-group-addon"><i class="fa fa-key"></i></span>
    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
</div>
@if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif

<div class="form-group input-group input-group-lg">
    <span class="input-group-addon"><i class="fa fa-key"></i></span>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm password">
</div>

<div class="form-group row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary form-control">
            {{ __('Reset Password') }}
        </button>
    </div>
</div>
</form>

</div>
</section>
@endsection
