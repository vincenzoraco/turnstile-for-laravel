<?php

declare(strict_types=1);

namespace VincenzoRaco\TurnstileLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use VincenzoRaco\TurnstileLaravel\TurnstileLaravel;

/**
 * @mixin TurnstileLaravel
 */
class Turnstile extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'turnstile';
    }
}
