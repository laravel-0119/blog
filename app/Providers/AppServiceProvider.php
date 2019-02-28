<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        View::share('name', $this->getName());
        View::share('title', 'Default title');
        View::share('page', 'login');


        /*View::share('name', 'Guest');
        View::share('name', 'Guest');
        View::share('name', 'Guest');
        View::share('name', 'Guest');*/

        $isAuth = true;

        View::composer(['404', 'login'], function ($view) use ($isAuth) {
            if ($isAuth !== true) {
                $name =  'guest';
            } else {
                $name =  'Dima';
            }

            $view->with('name', $name );
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


    protected function getName()
    {
        return 'Vasya Pupkin';
    }
}
