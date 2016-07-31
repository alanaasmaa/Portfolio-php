<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Bouncer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
        * Allow Sidebar to read Tags and Categoryes when ever blog_sidebar view is loaded.
        */
        view()->composer(
            'layouts.partials.blog_sidebar',
            'App\Http\ViewComposers\BSidebarComposer'
            );  
        /**
        * Enable JosephSilber/bouncer cache 
        * Rembmber to refresh the cache whenever you make changes to user's abilities/roles.
        */
        Bouncer::cache();
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
