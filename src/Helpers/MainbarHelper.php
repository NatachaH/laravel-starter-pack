<?php

/**
 * Return the mainbar title.
 * @param  string $section
 * @param  string $model
 * @param  string $action
 * @return string
 */
function mainbar(string $section, string $model = null, string $action = null)
{
    $translations = 'backend';

    $title = \Lang::has($translations.'.sidebar.'.$section) ? __($translations.'.sidebar.'.$section) : $section;

    if(!is_null($model))
    {
        $title .= \Lang::has($translations.'.model.'.$model) ? trans_choice($translations.'.model.'.$model,2) : $model;
    }

    if(!is_null($action))
    {
        $title .= \Lang::has($translations.'.action.'.$action) ? __($translations.'.action.'.$action) : $action;
    }

    return $title;
}
