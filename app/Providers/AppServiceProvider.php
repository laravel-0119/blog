<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('name', 'Dmitrii Iurev');
        //View::share('title', 'Мой супер-пупер блог');

        View::composer('*', function ($view) {
            $a = 2 * 2;

            $view->with([
                'title' => $a
            ]);
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
