<?php

namespace Igniter\Flame\Pagic;

use Igniter\Flame\Pagic\Model;
use Igniter\Flame\Pagic\Source\SourceResolver;
use Illuminate\Support\ServiceProvider;

/**
 * Class PagicServiceProvider
 * @package Igniter\Flame\Pagic
 */
class PagicServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        Model::setSourceResolver($this->app['pagic']);

        Model::setEventDispatcher($this->app['events']);

        Model::setCacheManager($this->app['cache']);
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->singleton('pagic', function ($app) {
            return new SourceResolver;
        });
    }
}