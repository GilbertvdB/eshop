<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind(OrderContract::class, OrderRepository::class);
        Schema::defaultStringLength(191);
    }
}
