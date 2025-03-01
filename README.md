A package to facilitate the server side validation of Cloudflare's Turnstile captcha service.

> [!NOTE]
> This package requires PHP 8.2+ and Laravel 11+ 

## Installation

You can install the package via composer:

```
composer global require vincenzoraco/turnstile-for-laravel
```

## Usage

Once installed, set the following ENV:
```
TURNSTILE_SECRET_KEY=
TURNSTILE_SITE_KEY=
```

Then publish the config file:

```
php artisan vendor:publish --tag=turnstile-config
```

> [!NOTE]
> `TURNSTILE_SITE_KEY` is only for your convenience to have it in the config

You can then use the facade:

```php
$result = Turnstile::validate(new TurnstileValidateDTO(
    $token,
));

if ($result->isFailure()) {
    throw new CaptchaException; // cutom exception
}
```
