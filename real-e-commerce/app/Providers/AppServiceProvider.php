<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function ($view) 
        {
            $cart = Cart::restore(auth()->id());
            $categories = Category::all();

            $view->with('cart', $cart )->with('categories', $categories);    
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
