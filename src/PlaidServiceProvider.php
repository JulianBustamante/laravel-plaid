<?php

namespace JulianBustamante\Laravel\Plaid;

use Illuminate\Support\ServiceProvider;
use JulianBustamante\Plaid\Plaid as PlaidClient;

class PlaidServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/plaid.php' => config_path('plaid.php'),
            ], 'config');
        }

        $this->loadMigrationsFrom(__DIR__.'/../resources/migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/plaid.php', 'plaid');

        $this->app->singleton('plaid', function ($app) {
            $plaid = new PlaidClient(
                $app['config']['plaid']['client_id'],
                $app['config']['plaid']['secret'],
                $app['config']['plaid']['environment']
            );

            return new Plaid($plaid);
        });

        $this->app->alias('plaid', Plaid::class);
    }
}
