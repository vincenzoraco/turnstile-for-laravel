<?php

declare(strict_types=1);

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

    #[\Override]
    public function register(): void
    {
        $this->mergeConfigFrom(dirname(__DIR__, 2).'/config/turnstile.php', 'turnstile');

        $this->app->bind('turnstile', fn ($app): TurnstileLaravel => new TurnstileLaravel);
    }
}
