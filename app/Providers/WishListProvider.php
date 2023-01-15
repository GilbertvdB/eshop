<?php

namespace App\Providers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use App\Classes\DBStorage;
use Illuminate\Support\ServiceProvider;

class WishListProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('wishlist', function($app)
        {
            $storage = new DBStorage();
            $events = $app['events'];
            $instanceName = 'cart_2';
            // $session_key = '88uuiioo99888';
            // $session_key = Auth::id();

            if (Auth::check()) {
                $userId = Auth::id();
                $session_key = $userId;
            } else {
                $session_key = request()->cookie('guest_session');
            }

            return new Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });
    }
}
