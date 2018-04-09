<?php

namespace Helldar\BadBrowser;

use Helldar\BadBrowser\Middlewares\BadBrowserMiddleware;
use Helldar\BadBrowser\Services\BadBrowser;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    protected $defer = false;

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([$this->configPath('settings.php') => config_path('bad_browser.php')], 'config');
        $this->publishes([__DIR__ . '/public' => public_path('vendor/bad-browser')], 'assets');

        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'bad-browser');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'bad_browser');
        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        $this->registerMiddleware(BadBrowserMiddleware::class);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath('settings.php'), 'bad_browser');
        $this->mergeConfigFrom($this->configPath('constants.php'), 'bad_browser_constants');

        $this->app->singleton('bad_browser', BadBrowser::class);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return ['bad_browser'];
    }

    /**
     * @param $middleware
     */
    protected function registerMiddleware($middleware)
    {
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        $kernel->pushMiddleware($middleware);
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    protected function configPath($filename)
    {
        return __DIR__ . '/config/' . $filename;
    }
}
