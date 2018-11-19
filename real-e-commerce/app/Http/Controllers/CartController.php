<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;

class CartController extends Controller
{	

	public function show(){

		return view('cart.show');
	}

    public function add(Request $request, $id){
    	$quantity = (int)$request->quantity;
    	$product = Product::find($id);

    	Cart::restore(auth()->id());
    	Cart::add($product->id, $product->name, $product->price, $quantity);
    	Cart::store(auth()->id());

    	return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function remove($uniqueId){
		Cart::restore(auth()->id());
		Cart::remove($uniqueId);
		Cart::store(auth()->id());

		return redirect()->back()->with('success', 'Product removed from cart.');
	}

	public function clear(){
		Cart::destroy(auth()->id());

		return redirect()->route('cart.show')->with('success', 'Cart empty.');
	}

	public function checkout(){
		$cart = $this->getCart();

		Cart::destroy(auth()->id());

		return redirect()->back()->with('success', 'Checkout success.');
	}

	public function update(Request $request, $id){
		$quantity = (int)$request->quantity;
		$quantity_old = (int)$request->quantity_old;

		$quantity = $quantity - $quantity_old;


    	$product = Product::find($id);

    	$cart = $this->getCart();

    	$cart->add($product->id, $product->name, $product->price, $quantity);
    	$cart->store(auth()->id());

    	return redirect()->back()->with('success', 'Product quantity succesfully updated..');
	}
}
