<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
