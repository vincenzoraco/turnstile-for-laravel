<?php

namespace VincenzoRaco\TurnstileLaravel\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use VincenzoRaco\TurnstileLaravel\Providers\TurnstileServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            TurnstileServiceProvider::class,
        ];
    }
}
