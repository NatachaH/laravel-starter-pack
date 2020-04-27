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

    $sectionTitle = \Lang::has($translations.'.sidebar.'.$section) ? __($translations.'.sidebar.'.$section) : $section;
    $title = ucfirst($sectionTitle);

    if(!empty($model))
    {
        $modelTitle = (\Lang::has($translations.'.model.'.$model) ? trans_choice($translations.'.model.'.$model,2) : $model);
        $title .= ' : '.ucfirst($modelTitle);
    }

    if(!empty($action))
    {
        $actionTitle = (\Lang::has('sp::action.'.$action) ? __('sp::action.'.$action) : $action);
        $title .= ' : '.ucfirst($actionTitle);
    }

    return $title;
}
