<?php

namespace Nh\StarterPack\Rules;

use Illuminate\Contracts\Validation\Rule;

class Lowercase implements Rule
{
    public function passes($attribute, $value)
    {
        return mb_strtolower($value) === $value;
    }

    public function message()
    {
        return trans('sp::rule.lowercase');
    }
}
