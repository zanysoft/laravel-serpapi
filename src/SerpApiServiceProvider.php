<?php

namespace ZanySoft\LaravelSerpApi;

use Illuminate\Support\ServiceProvider;

class SerpApiServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if (function_exists('config_path')) {
            $this->publishes([
                __DIR__ . '/config/config.php' => config_path('laravel-serpapi.php'),
            ], 'serpapi-config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'laravel-serpapi');

        $this->app->bind('laravel-serpapi-search', function () {

            $api_key = config('laravel-serpapi.api_key');
            $engine = config('laravel-serpapi.search_engine') ?: 'google';

            return new SerpApiSearch($api_key, $engine);
        });
    }
}
