<?php

namespace VincenzoRaco\TurnstileLaravel;

use InvalidArgumentException;
use VincenzoRaco\Turnstile\Turnstile;

class TurnstileLaravel extends Turnstile
{
    public function __construct()
    {
        parent::__construct(
            $this->getSecretKey(),
        );
    }

    /**
     * @throws InvalidArgumentException
     */
    private function getSecretKey(): string
    {
        $secretKey = config('turnstile.secret_key');

        if (empty($secretKey)) {
            throw new InvalidArgumentException(
                'Secret key must be set in config/turnstile.php',
            );
        }

        if (! is_string($secretKey)) {
            throw new InvalidArgumentException(
                'Secret key must be a string',
            );
        }

        return $secretKey;
    }
}
