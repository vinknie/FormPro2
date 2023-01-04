<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();  //Ajout bootstrap pour pagination
        
        Blade::if('admin', function () {            
            if (auth()->user() && auth()->user()->role == 'admin') {
                return 1;
            }
            return 0;
        });
        Blade::if('secretaire', function () {            
            if (auth()->user() && auth()->user()->role == 'secretaire') {
                return 1;
            }
            return 0;
        });
        Blade::if('formateur', function () {            
            if (auth()->user() && auth()->user()->role == 'formateur') {
                return 1;
            }
            return 0;
        });
    }
}
