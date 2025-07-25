<?php

namespace XaviCabot\Laravel\Holded;

use Illuminate\Support\ServiceProvider;
use XaviCabot\Laravel\Holded\Contracts\HoldedInterface;

class HoldedServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/holded.php', 'holded');

        $this->app->singleton(HoldedInterface::class, function () {
            return new Holded();
        });

        $this->app->alias(HoldedInterface::class, 'holded');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/holded.php' => config_path('holded.php'),
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function provides()
    {
        return [
            'holded',
            Holded::class
        ];
    }

}