<?php

namespace Nh\StarterPack\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithoutSpace implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^\S*$/u', $value);
    }

    public function message()
    {
        return trans('sp::rule.without-space');
    }
}
