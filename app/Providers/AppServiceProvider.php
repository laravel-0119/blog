<?php

namespace App\Providers;

use App\Custom\Classes\MainMenu;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(MainMenu $mainMenu)
    {
        View::share('name', $this->getName());
        View::share('title', 'Default title');
        View::share('page', 'login');
        View::share('mainMenu', $mainMenu->buildMenu());

        View::composer('*', function ($view) {
            $view->with('currentRoute', Route::currentRouteName());
        });

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
