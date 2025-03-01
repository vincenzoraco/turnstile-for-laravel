<?php

namespace VincenzoRaco\TurnstileLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use VincenzoRaco\TurnstileLaravel\TurnstileLaravel;

class TurnstileServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            dirname(__DIR__, 2).'/config/turnstile.php' => config_path('turnstile.php'),
        ], 'turnstile-config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/turnstile.php', 'skeleton');

        $this->app->bind('turnstile', function ($app) {
            return new TurnstileLaravel;
        });
    }
}
