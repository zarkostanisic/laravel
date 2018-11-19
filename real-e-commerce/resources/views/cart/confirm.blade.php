@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>

                <div class="card-body">
                    <div class="table-responsive">
                        @if ($cart && $cart->count() > 0)
                            <span>{{ $cart->getTotal() }}</span>
                            <form action="{{ route('cart.checkout') }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">CHECKOUT</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
