@extends ('layouts.admin')

@section ('styles')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@endsection

@section ('content')

<h1>Media upload</h1>

{!! Form::open(['method' => 'POST', 'action' => 'AdminMediaController@store', 'class' => 'dropzone']) !!}

{!! Form::close() !!}

@endsection

@section ('footer')

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@endsection