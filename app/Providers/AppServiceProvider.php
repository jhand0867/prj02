<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

        /* 
         declaring a view composer that will 
         be executed everytime the sidebar include is loaded.
        */
        view()->composer('layouts.sidebar' , 
            function($view){
                /*
                 this callback function binds
                 the archives data to the view
                 to provide content.
                */

                $view->with(
                    'archives' ,
                    \App\Post::archives());

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
