<?php


namespace Jleon\LaravelPnotify;


use Illuminate\Support\ServiceProvider;

class NotifyServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/laravelPnotify.php', 'laravelPnotify'
        );

        $this->app->bind(
            'Jleon\LaravelPnotify\SessionStore',
            'Jleon\LaravelPnotify\LaravelSessionStore'
        );

        $this->app->bind(
            'Jleon\LaravelPnotify\ConfigRepo',
            'Jleon\LaravelPnotify\LaravelConfigRepo'
        );

        $this->app->bind('notify', function()
        {
            return $this->app->make('Jleon\LaravelPnotify\Notifier');
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'laravelPnotify');

        $this->publishes([
            __DIR__.'/config/laravelPnotify.php' => config_path('laravelPnotify.php'),
        ]);
    }
}