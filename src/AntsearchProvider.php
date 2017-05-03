<?php
namespace Antsfree\Antsearch;

use Illuminate\Support\ServiceProvider;

class AntsearchProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('antsearch', function() {
            return new AntsearchService();
        });
    }
}
