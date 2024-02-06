<?php

namespace DevSolux\AdminLTETemplates;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminLTETemplatesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'laravel-adminlte');
        $this->publishes([
            __DIR__.'/../views/common' => resource_path('views/vendor/laravel-adminlte/common'),
        ], 'adminlte-views');

        $this->publishes([
            __DIR__.'/../views/templates' => resource_path('views/vendor/laravel-adminlte/templates'),
        ], 'laravel-adminlte');

        Paginator::defaultView('laravel-adminlte::common.paginator');
        Paginator::defaultSimpleView('laravel-adminlte::common.simple_paginator');

        Blade::directive('ocb', function () {
            return '<?php echo "{{ " ?>';
        });

        Blade::directive('ccb', function () {
            return '<?php echo " }}" ?>';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
