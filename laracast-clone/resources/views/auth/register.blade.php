@extends ('layouts.app')

@section ('header')
<header class="header header-inverse bg-fixed" style="background-image: url({{ asset('img/bg-laptop.jpg') }})" data-overlay="8">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Register</h1>

      </div>
    </div>

  </div>
</header>
@endsection

@section ('content')


<section class="section" style="background-image: url({{ asset('img/bg-gift.jpg') }})" data-overlay="5">
<div class="container">
  <h2 class="text-white text-center">Get started free</h2>
  <br>

  <form action="register" method="post" class="section-dialog section-dialog-sm bg-gray py-40">
  	{{ csrf_field() }}
    <div class="form-group input-group input-group-lg">
      <span class="input-group-addon"><i class="fa fa-user"></i></span>
      <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ old('name') }}">
    </div>
    <span>{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

    <div class="form-group input-group input-group-lg">
      <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
      <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
    </div>
    <span>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

    <div class="form-group input-group input-group-lg">
      <span class="input-group-addon"><i class="fa fa-key"></i></span>
      <input type="password" class="form-control" placeholder="Password" name="password" id="password">
    </div>
    <span>{{ $errors->has('password') ? $errors->first('password') : '' }}</span>

    <div class="form-group input-group input-group-lg">
      <span class="input-group-addon"><i class="fa fa-key"></i></span>
      <input type="password" class="form-control" placeholder="Password (confirm)" name="password_confirmation" id="password-confirm">
    </div>

    <button type="submit" class="btn btn-block btn-lg btn-success">Get started</button>
  </form>

</div>
</section>
@endsection