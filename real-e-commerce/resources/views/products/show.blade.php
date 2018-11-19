@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->name }}</div>

                <div class="card-body">
                   <img src="{{ asset($product->image) }}" class="img-fluid mx-auto d-block rounded">
                   <form action="{{ route('cart.add', $product->id) }}" method="post">
                     {{ csrf_field() }}
                     <div class="row mt-3">
                     <div class="col-md-6"></div>
                     <div class="form-group col-md-3">
                       <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                     </div>

                     <div class="form-group col-md-3">
                       <button type="submit" class="btn btn-default">Add to cart</button>
                     </div>
                     </div>
                   </form>
                   <hr>
                   <span>Price: {{ $product->price }}</span>
                   <hr>
                   {{ $product->description }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
