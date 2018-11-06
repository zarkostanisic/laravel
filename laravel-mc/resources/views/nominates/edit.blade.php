@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nominate
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nominate, ['route' => ['nominates.update', $nominate->id], 'method' => 'patch']) !!}

                        @include('nominates.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection