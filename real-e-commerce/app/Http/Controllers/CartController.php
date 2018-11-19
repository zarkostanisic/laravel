<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use Mail;

class CartController extends Controller
{	
	private $token;

	public function __construct(){
		$this->middleware(function ($request, $next){
			$token = Session::get('cart_unique_token');

	        if(auth()->id() !== null){
				$this->token = auth()->id();

			}else if($token === null){
				$this->token = time() . rand(1, 1000);

				Session::put(['cart_unique_token' => $this->token]);
			}else {
				$this->token = $token;
			}

	        return $next($request);
	    });
	}

	public function show(){

		return view('cart.show');
	}

    public function add(Request $request, $id){
    	$quantity = (int)$request->quantity;
    	$product = Product::find($id);

    	Cart::restore($this->token);
    	Cart::add($product->id, $product->name, $product->price, $quantity);
    	Cart::store($this->token);

    	return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function remove($uniqueId){
		Cart::restore($this->token);
		Cart::remove($uniqueId);
		Cart::store($this->token);

		return redirect()->back()->with('success', 'Product removed from cart.');
	}

	public function update(Request $request, $id){
		$quantity = (int)$request->quantity;
		$quantity_old = (int)$request->quantity_old;

		$quantity = $quantity - $quantity_old;


    	$product = Product::find($id);

    	$cart = Cart::restore($this->token);

    	$cart->add($product->id, $product->name, $product->price, $quantity);
    	$cart->store($this->token);

    	return redirect()->back()->with('success', 'Product quantity succesfully updated.');
	}

	public function clear(){
		Cart::destroy($this->token);

		return redirect()->route('cart.show')->with('success', 'Cart empty.');
	}

	public function confirm(){
		return view('cart.confirm');
	}

	public function checkout(){
		$cart = Cart::restore($this->token);;

		Cart::destroy($this->token);

		Mail::to(auth()->user()->email)->send(new \App\Mail\PurchaseSuccessfull($cart));

		return redirect()->route('cart.show')->with('success', 'Checkout success.');
	}
}
