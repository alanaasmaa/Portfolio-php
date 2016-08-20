<?php

namespace App\Providers;

use AlgoliaSearch\Client;
use App\Contracts\Search;
use App\Services\AlgoliaSearch;
use Bouncer;
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
        $this->app->singleton(Search::class, function() {
            $config = config('services.algolia');
            
            return new AlgoliaSearch (
                new Client($config['app_id'], $config['api_key'])
            );
        });
    }
}
