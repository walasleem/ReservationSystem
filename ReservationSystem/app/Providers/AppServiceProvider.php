<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Bugsnag;
use Auth0\Login\Contract\Auth0UserRepository as Auth0UserRepositoryContract; 
use Auth0\Login\Repository\Auth0UserRepository as Auth0UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias('bugsnag.multi', \Illuminate\Contracts\Logging\Log::class);
        $this->app->alias('bugsnag.multi', \Psr\Log\LoggerInterface::class);
         $this->app->bind( Auth0UserRepositoryContract::class,
         Auth0UserRepository::class ); 
            //
    }
}
