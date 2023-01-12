<?php

namespace Nh\StarterPack\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithoutUrl implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Get url    
        $protocol_pattern = "/[a-z]+:\/\/\S+/";
        $url_pattern = "/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@%_\+.~#?&\/\/=]*)/";

        return !preg_match($protocol_pattern, $value) && !preg_match($url_pattern, $value);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('sp::rule.without-url');
    }
}
