<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('categories', Category::all()); 

        view()->composer(['layouts.app', 'cart.show', 'cart.confirm'], function ($view) 
        {
            $token = auth()->id() !== null ? auth()->id() : Session::get('cart_unique_token');

            $view->with('cart', Cart::restore($token) );    
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
