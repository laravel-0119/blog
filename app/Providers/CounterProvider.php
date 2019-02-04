<?php

namespace App\Providers;

use App\Includes\Classes\MyCounter;
use Illuminate\Support\ServiceProvider;

class CounterProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->singleton('AwesomeCounter', function ($app) {
            return new MyCounter();
        });*/

        $this->app->bind(
            'App\Includes\Interfaces\CounterInterface',
            'App\Includes\Classes\MyCounter'
        );
    }
}
