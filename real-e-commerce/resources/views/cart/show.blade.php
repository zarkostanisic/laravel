@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <?php //dd($cart); ?>
                        @if ($cart && $cart->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cart->content() as $item)
                                    <tr>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <form id="quantity-{{ $item->id }}" action="{{ route('cart.update', $item->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <input onChange="document.getElementById('quantity-{{ $item->id }}').submit();" type="number" name="quantity" value="{{ $item->quantity }}">
                                                <input type="hidden" name="quantity_old" value="{{ $item->quantity }}">
                                            </form>
                                        </td>
                                        <td>{{ ($item->price * $item->quantity) }}
                                        <td>
                                            <form action="{{ route('cart.remove', $item->getUniqueId()) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">REMOVE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="5">Total: {{ $cart->getTotal() }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="1">
                                            <form action="{{ route('cart.clear') }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">CLEAR CART</button>
                                            </form>
                                        </td>
                                        <td colspan="1">
                                            <form action="{{ route('cart.checkout') }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary">CHECKOUT</button>
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        @else
                            <span>No items.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
