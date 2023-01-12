<?php

namespace Nh\StarterPack\Rules;

use Illuminate\Contracts\Validation\Rule;

class WithoutHtmlTag implements Rule
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
        // Get HTML tag
        $html_pattern = "/<(?:\"[^\"]*\"['\"]*|'[^']*'['\"]*|[^'\">])+>/";

        return !preg_match($html_pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    { 
        return trans('sp::rule.without-html-tag');
    }
}
