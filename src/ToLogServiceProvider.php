<?php

namespace Vahagn\ToLog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ToLogServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (! defined('TO_LOG_SERVICE_PATH')) {
            define('TO_LOG_SERVICE_PATH', realpath(__DIR__.'/../'));
        }

        $this->registerConfigs();
        $this->registerCommands();
        $this->registerPublishes();

        $this->app->singleton( \Vahagn\ToLog\Contracts\ToLog::class,ToLog::class);
        $this->app->alias(\Vahagn\ToLog\Contracts\ToLog::class,'Vahagn.to_log');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResources();
        $this->registerTranslations();
        $this->registerRoutes();
    }

    /**
     * Register the routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $domain = config('to-log.route.domain');
        $path = config('to-log.route.path');
        $middleware = config('to-log.route.middleware');

        if (empty($path) || empty($middleware)) {
            return;
        }

        Route::group([
            'domain' => $domain,
            'prefix' => $path,
            'middleware' => $middleware,
            'as' => 'to-log::',
            'namespace' => 'Vahagn\ToLog\Http\Controllers',
        ], function () {
            $this->loadRoutesFrom(TO_LOG_SERVICE_PATH.'/routes/web.php');
        });
    }

    /**
     * Register the resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(TO_LOG_SERVICE_PATH.'/resources/views', 'to-log');
    }

    /**
     * Register the rranslations.
     *
     * @return void
     */
    protected function registerTranslations()
    {
        $this->loadTranslationsFrom(TO_LOG_SERVICE_PATH.'/resources/lang', 'to-log');
    }

    /**
     * Register configs.
     *
     * @return void
     */
    protected function registerConfigs()
    {
        $this->mergeConfigFrom(TO_LOG_SERVICE_PATH.'/config/config.php', 'to-log');
    }

    /**
     * Register publishes.
     *
     * @return void
     */
    protected function registerPublishes()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                TO_LOG_SERVICE_PATH.'/config/config.php' => config_path('to-log.php'),
            ], 'to-log-config');

            $this->publishes([
                TO_LOG_SERVICE_PATH.'/public' => public_path('vendor/to-log'),
            ], 'to-log-assets');
        }
    }

    /**
     * Register commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\AssetsCommand::class,
                Console\InstallCommand::class,
            ]);
        }
    }
}
