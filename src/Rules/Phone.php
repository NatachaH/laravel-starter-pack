<?php

namespace Nh\StarterPack\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      // ^\+? can start with a +
      // ([0-9\-\s]) can contain number and - and white space
      // {9,} lenth min of 9
      return preg_match('/^\+?([0-9\-\s]){9,}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('sp::rule.phone');
    }
}
