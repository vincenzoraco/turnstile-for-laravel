<?php

declare(strict_types=1);

namespace VincenzoRaco\TurnstileLaravel\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use VincenzoRaco\Turnstile\DataObjects\TurnstileValidateDTO;
use VincenzoRaco\TurnstileLaravel\Facades\Turnstile;

class TurnstileCheck implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || $value === '') {
            $fail('The :attribute field is required.');

            return;
        }

        $result = Turnstile::validate(new TurnstileValidateDTO($value));

        if ($result->isFailure()) {
            $fail('The :attribute field verification failed.');
        }
    }
}
