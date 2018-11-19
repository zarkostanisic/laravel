@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $category->name }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </td>
                                        <td>@money($product->price, 'USD')</td>
                                        <td>
                                            <form action="{{ route('cart.add', $product->id) }}" method="post">
                                             {{ csrf_field() }}
                                             <div class="row mt-3">
                                             <div class="col-md-6"></div>
                                             <div class="form-group col-md-3">
                                               <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                                             </div>

                                             <div class="form-group col-md-3">
                                               <button type="submit" class="btn btn-primary">Add to cart</button>
                                             </div>
                                             </div>
                                           </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
