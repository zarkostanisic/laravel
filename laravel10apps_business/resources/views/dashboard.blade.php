@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <h1>Listings</h1>
                    <a href="/listings/create">Create listing</a>
                    @if (count($listings) > 0)
                        <ul>
                        @foreach ($listings as $listing)
                            <li><a href="/listings/{{ $listing->id }}">{{ $listing->name }}</a><a href="/listings/{{ $listing->id }}/edit">edit</a></li>

                            {!! Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'delete', 'onSubmit' => 'return confirm("Are you sure?");']) !!}
                                {!! Form::submit('delete') !!}
                            {!! Form::close() !!}
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
