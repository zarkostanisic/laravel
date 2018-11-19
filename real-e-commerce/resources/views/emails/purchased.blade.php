<!DOCTYPE html>
<html>
<head>
	<title>Purchase successful</title>
</head>
<body>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">Thank you for purchasing</div>

	                <p>Lorem ipsum.</p>

	                <div class="card-body">
	                    <div class="table-responsive">
	                        @if ($cart && $cart->count() > 0)
	                        <table class="table">
	                            <thead>
	                                <tr>
	                                    <th>Name</th>
	                                    <th>Price</th>
	                                    <th>Quantity</th>
	                                    <th>Subtotal</th>
	                                </tr>
	                            </thead>

	                            <tbody>
	                                @foreach (Cart::content() as $item)
	                                    <tr>
	                                        <td>
	                                            {{ $item->name }}
	                                        </td>
	                                        <td>@money($item->price, 'USD')</td>
	                                        <td>{{ $item->quantity }}</td>
	                                        <td>@money($item->price * $item->quantity, 'USD')
	                                    </tr>
	                                @endforeach
	                                    <tr>
	                                        <td colspan="5">Total: @money(Cart::getTotal(), 'USD')</td>
	                                    </tr>
	                            </tbody>
	                        </table>
	                        @endif
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
</html>
