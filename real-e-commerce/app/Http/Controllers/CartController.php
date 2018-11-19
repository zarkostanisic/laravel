<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{

	public function show(){

		return view('cart.show');
	}

    public function add(Request $request, $id){
    	$quantity = (int)$request->quantity;
    	$product = Product::find($id);

    	$cart = $this->getCart();

    	if($cart){
    		$cart->add($product->id, $product->name, $product->price, $quantity);
    		$cart->store(auth()->id());
    	}else{
    		Cart::add($product->id, $product->name, $product->price, $quantity);
    		Cart::store(auth()->id());
    	}

    	return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function remove($uniqueId){
		$cart = $this->getCart();
		$cart->remove($uniqueId);
		$cart->store(auth()->id());

		return redirect()->back()->with('success', 'Product removed from cart.');
	}

	private function getCart(){
		return Cart::restore(auth()->id());
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
}
