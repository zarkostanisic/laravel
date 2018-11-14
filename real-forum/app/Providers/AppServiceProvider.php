<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Channel;
use View;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        App::singleton('channels', function($app)
        {
            return Channel::all();
        });

        View::share('channels', Channel::all());
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
