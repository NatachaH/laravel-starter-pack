<?php

/**
 * Return a clean request()
 * @param  string $key
 */
function requestClean($key)
{
    $result = null;

    if(request()->has($key))
    {
        $value = request()->input($key);
        $result = is_array($value) ? array_filter($value) : $value;
    }

    return  $result;
}
