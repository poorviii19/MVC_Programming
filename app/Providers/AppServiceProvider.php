<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //global data: simple global sharing
        View::share('appName', 'My laravel App');


        // using composer: use for logic based sharing  : * is for all views if you want target specific then you can put the views' name instead
        View::composer('*', function($view){
            $view->with('notification', 5);
        });


        View::composer('prac', function($view){
            $view->with('info', 'shared info');
        });
    }
}
