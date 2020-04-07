<?php

/**
 * Return a notification message.
 * @param  string $message
 * @param  string $attribute
 * @return string
 */
function notification(string $message, string $attribute)
{
    $translations   = 'sp::notification';

    if(\Lang::has($translations.'.'.$message))
    {
        $attr = \Lang::has($translations.'.attributes.'.$attribute) ? __($translations.'.attributes.'.$attribute) : $attribute;
        return __($translations.'.'.$message, ['attribute' => $attr]);
    } else {
        return $message;
    }
}
