<?php

namespace App\Rules\Github;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class PullRequestLink implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string                                       $attribute
     * @param mixed                                        $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match(
            pattern: config('regex.github.pull_request.url'),
            subject: $value,
        )) {
            $fail('The :attribute must be a correct pull request link.');
        }
    }
}
