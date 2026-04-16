<?php

use Illuminate\Support\Facades\Config;
use VincenzoRaco\TurnstileLaravel\Facades\Turnstile;
use VincenzoRaco\TurnstileLaravel\TurnstileLaravel;

it('registers the turnstile binding in the container', function () {
    Config::set('turnstile.secret_key', 'test-secret-key');

    $instance = app('turnstile');

    expect($instance)->toBeInstanceOf(TurnstileLaravel::class);
});

it('resolves the facade to a TurnstileLaravel instance', function () {
    Config::set('turnstile.secret_key', 'test-secret-key');

    $instance = Turnstile::getFacadeRoot();

    expect($instance)->toBeInstanceOf(TurnstileLaravel::class);
});

it('merges the config correctly', function () {
    expect(config('turnstile.secret_key'))->toBeNull()
        ->and(config('turnstile.site_key'))->toBeNull();
});

it('throws when secret key is missing', function () {
    Config::set('turnstile.secret_key', null);

    app('turnstile');
})->throws(InvalidArgumentException::class, 'Secret key must be set in config/turnstile.php');

it('throws when secret key is empty', function () {
    Config::set('turnstile.secret_key', '');

    app('turnstile');
})->throws(InvalidArgumentException::class, 'Secret key must be set in config/turnstile.php');

it('throws when secret key is not a string', function () {
    Config::set('turnstile.secret_key', 12345);

    app('turnstile');
})->throws(InvalidArgumentException::class, 'Secret key must be a string');
