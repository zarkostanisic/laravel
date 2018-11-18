@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                   <img src="{{ asset($product->image) }}" class="img-fluid mx-auto d-block rounded">
                   <hr>
                   <span>Price: {{ $product->price }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
