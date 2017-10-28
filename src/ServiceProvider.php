<?php

namespace RulWeb\Swal;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'swal');
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAlert();
    }

    /**
     * Register the swal class.
     *
     * @return void
     */
    protected function registerAlert()
    {
        $this->app->singleton('swal', function (Container $app) {
            return new Swal($app['session.store']);
        });

        $this->app->alias('swal', Swal::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides(): array
    {
        return ['swal'];
    }
}